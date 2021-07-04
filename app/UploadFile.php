<?php


namespace App;


use App\Functions;
use http\Env\Request;

class UploadFile
{
    public function  uploadFile(Request  $request){

        $request->validate([

            'file'=> 'required|mimes:png,jpg,jpeg,cvs,txt,pdf|max:2048'
        ]);

        $filemodel = new File;

        if($request->file()){
            $filename = time(). '_' . $request->file->getClientOriginalName();
            $filepath = $request->file('file')->move('uploads', $filename, 'public');

            $filemodel->name = time().'_'.$request->file->getClientOriginalName();
            $filemodel->file_path =  '/storage' . $filepath;
            $filemodel->save();
        }


    }



}
