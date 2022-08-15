<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class FileController extends Controller
{
    public static function uploadFile(Request $request){

        // Validation
        $request->validate([
          'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        $file = $request->file('file');
        $fileName=time().'_'.$file->getClientOriginalName();
        $file->move(public_path("/").'files/',$fileName);
        $file_url=url('files',$fileName);
        // $uploadFile->$fileName;
        // $uploadFile->$file_url;
        // return  $file_url;
        return response()->json([
            'fileName' =>  $fileName,
            'file_url' => $file_url
          ]);;
        // ->successResponse($file_url , null,'upload Successfully ', 200 );

    }
}
