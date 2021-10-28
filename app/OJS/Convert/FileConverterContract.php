<?php

namespace App\OJS\Convert;

use Illuminate\Http\UploadedFile;

interface FileConverterContract
{
    public function toPdf(UploadedFile $file);
    public function toWord(UploadedFile $file);
}
