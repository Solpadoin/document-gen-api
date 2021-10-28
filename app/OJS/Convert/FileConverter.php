<?php

namespace App\OJS\Convert;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;

class FileConverter implements FileConverterContract
{
    /** 
     * Word Document to the PDF
     * @return string filepath
     */
    public function toPdf($file) : string
    {
        // Output file path
        $outputFile = $this->getOutputFilePath();

        // Set the PDF Engine Renderer Path
        Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));
        Settings::setPdfRendererName('DomPDF');
        Settings::setDefaultFontName('dejavu sans');

        // Save it into PDF
        $PDFWriter = IOFactory::createWriter(IOFactory::load($file), 'PDF');
        $PDFWriter->save($outputFile); 

        return File::exists($outputFile) ? $outputFile : $file->getRealPath();
    }

    private function getOutputFilePath()
    {
        return public_path('files'.DIRECTORY_SEPARATOR.Str::random().'.pdf');
    }

    /** 
     * PDF document to the Word
     */
    public function toWord($file)
    {

    }
}
