<?php

namespace App\OJS\Storage\Interfaces;

use Illuminate\Http\UploadedFile;

interface IStorage
{
    const DIR_SHARED = 'shared';
    const DIR_USER   = 'users';

    public function upload(UploadedFile $file, string $directory = self::DIR_SHARED) : bool;
}
