<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class FileEntriesController extends Controller
{
    public function index(Request $request) {
        //$file = Input::file('file');
        $file = $request->all();
        $path = $request->file->store('public');
        dump(getimagesize($path));
        //$width = Image::make($path)->width();




//        $upload_file = $request->file($path);
//        $height = Image::make($upload_file)->height();
//        $width = Image::make($upload_file)->width();

//        dump($height);
        dd( $request->file);
        //        $filename = $file->getClientOriginalName();
        //
        //        $path = hash( 'sha256', time());
        //
        //        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
        //            $input['filename'] = $filename;
        //            $input['mime'] = $file->getClientMimeType();
        //            $input['path'] = $path;
        //            $input['size'] = $file->getClientSize();
        //            $file = FileEntry::create($input);
        //
        //            return response()->json([
        //                'success' => true,
        //                'id' => $file->id
        //            ], 200);
        //        }
        //        return response()->json([
        //            'success' => false
        //        ], 500);
    }
}
