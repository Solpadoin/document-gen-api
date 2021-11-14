<?php

namespace App\OJS\Storage;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Storage;
use Log;

class StorageContainer implements Interfaces\IStorage
{
    public function upload(UploadedFile $file, string $directory = self::DIR_SHARED) : bool
    {
        $filepath = $this->storagePath($directory).$this->setName($file);

        Storage::put($filepath, $file->getContent());

        Log::debug(self::class.' file '.$filepath.' is trying to be saved');

        return File::exists($filepath);
    }

    private function setName(UploadedFile $file)
    {
        return date('d-m-Y').'_'.$file->getClientOriginalName();
    }

    /**
     * @param string $directory folder where file should be store
     */
    private function storagePath(string $directory) : string
    {
        return 'public'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR;
    }
}
