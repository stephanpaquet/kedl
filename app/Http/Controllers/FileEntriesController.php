<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Validator;
use File;

class FileEntriesController extends Controller
{
    public function index(Request $request, Route $route) {
//dd($request->route()->getActionMethod());
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|image|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('file');


        //Display File Name
        //        echo 'File Name: '.$file->getClientOriginalName();
        //        echo '<br>';
        //
        //        //Display File Extension
        //        echo 'File Extension: '.$file->getClientOriginalExtension();
        //        echo '<br>';
        //
        //        //Display File Real Path
        //        echo 'File Real Path: '.$file->getRealPath();
        //        echo '<br>';
        //
        //        //Display File Size
        //        echo 'File Size: '.$file->getSize();
        //        echo '<br>';
        //
        //        //Display File Mime Type
        //        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $fileNameDestination = base64_encode($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

        list ($imageWidth, $imageHeight) = getimagesize($file->getRealPath());
        $image = [
            'path' => "/{$destinationPath}/{$fileNameDestination}",
            'size' => $file->getSize(),
            'mimeType' => $file->getMimeType(),
            'size' => [
                'width' => $imageWidth,
                'height' => $imageHeight,
            ],
        ];
        $file->move($destinationPath, $fileNameDestination);

        $request->session()->put('session', [
            'image' => $image
        ]);

        return redirect('/roomview');
    }
}
