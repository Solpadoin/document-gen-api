<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ojs\Convert\FileConverter;
use App\Ojs\Storage\StorageContainer;

class UserController extends Controller
{
    private FileConverter $converter;
    private StorageContainer $container;

    public function __construct(FileConverter $fileConverter, StorageContainer $storageContainer)
    {
        $this->converter = $fileConverter;
        $this->container = $storageContainer;
    }

    public function me()
    {
        return view('pages.profile.me');
    }

    public function renderQrCode()
    {
        return view('pages.profile.qr');
    }

    public function convertWordToPdf(Request $request)
    {            
        if ($request->hasFile('attachment')) {
            $filepath = $this->converter->toPdf($request->file('attachment'));
            return response()->download($filepath);
        }

        return redirect()->back();
    }

    public function convertPdfToWord(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $file = $this->converter->toWord($request->file('attachment'));

            //return response()->download($file->getRealPath());
        }

        return redirect()->back();
    }

    public function uploadToStorage(Request $request)
    {
        $this->container->upload($request->file('attachment'));

        return redirect()->back();
    }
}
