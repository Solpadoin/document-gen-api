<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ojs\Convert\FileConverter;

class UserController extends Controller
{
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
            $filePath = (new FileConverter())->toPdf($request->file('attachment'));
            return response()->download($filePath);
        }

        return redirect()->back();
    }

    public function convertPdfToWord(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $file = (new FileConverter())->toWord($request->file('attachment'));

            //return response()->download($file->getRealPath());
        }

        return redirect()->back();
    }
}
