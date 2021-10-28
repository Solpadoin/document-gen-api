<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;

class OjsUser extends Model
{
    use HasFactory;

    public static function getUserById($id)
    {
        return DB::select('select * from users where user_id = :id', ['id' => $id]);
    }

    public static function getUserNameById($id)
    {
        return DB::select('select username from users where user_id = :id', ['id' => $id]);
    }

    public static function getUserEmailById($id)
    {
        return DB::select('select email from users where user_id = :id', ['id' => $id]);
    }

    public static function findUserByEmail($email)
    {
        return DB::select('select * from users where email = :email', ['email' => $email]);
    }

    /**
     * This method should check if credentials are valid and user account exists
     */
    public static function validCredentials($email, $password) : bool
    {
        $userdata = DB::select('select * from users where email = :email', ['email' => $email]);

        if (empty($userdata[0])) {
            return false;
        }

        // first found account, email should be unique anyway
        $userAccount = $userdata[0];

        if (empty($userAccount->password) || !password_verify($password, $userAccount->password)) {
            return false;
        }

        if (! Auth::attempt(['email' => $email, 'password' => $password], true)) {
            // import user and retry...
            return static::importUser($userAccount->email, $userAccount->username, $userAccount->password)
                        && Auth::attempt(['email' => $email, 'password' => $password], true);
        }

        return true;
    }

    /**
     * Register new account data
     */
    public static function register($username, $password, $email) : bool
    {
        $accountData = array(
            'email'     => $email,
            'username'  => $username,
            'password'  => password_hash($password, PASSWORD_BCRYPT),
            'date_registered' => date('c')
        );

        return static::importUser($email, $username, $password) && DB::table('users')->insert($accountData);
    }

    /**
     * Import user to the local users table
     */
    public static function importUser($email, $username, $password) : bool
    {
        // already exists
        if (count(User::where('email', $email)->where('username', $username)->get()) > 0) return true;

        // import a new user
        $localUser = new User(array(
            'email'     => $email,
            'username'  => $username,
            'password'  => password_hash($password, PASSWORD_BCRYPT),
        ));

        return $localUser->save();
    }
}
