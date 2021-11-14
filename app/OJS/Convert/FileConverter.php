<?php

namespace App\OJS\Convert;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Log;

class FileConverter implements FileConverterContract
{
    /** 
     * Word Document to the PDF
     * @return string filepath
     */
    public function toPdf($file) : string
    {
        Log::debug(self::class.' converting file to the pdf format');

        // Output file path
        $outputFile = $this->getOutputFilePath();

        // Set the PDF Engine Renderer Path
        Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));
        Settings::setPdfRendererName('DomPDF');
        Settings::setDefaultFontName('dejavu sans');

        Log::debug(self::class.' pdf settings are set...Font: ' .Settings::getDefaultFontName(). ', Renderer Name: '.Settings::getPdfRendererName());

        // Save it into PDF
        $writer = IOFactory::createWriter(IOFactory::load($file), 'PDF');
        $writer->save($outputFile); 

        Log::debug(self::class.' file '.$outputFile.' is trying to be saved');

        return File::exists($outputFile) ? $outputFile : $file->getRealPath();
    }

    private function getOutputFilePath()
    {
        return storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.Str::random().'.pdf');
    }

    /** 
     * PDF document to the Word
     */
    public function toWord($file)
    {

    }
}
