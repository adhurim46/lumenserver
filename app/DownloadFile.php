<?php


namespace App;


use http\Env\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFile
{

    public function  downloadFile(Request $request){

        $file = Storage::get('/uploads');
        return response()->header = array(
            'Content-Type:' . mime_content_type($file),
            'Content-Length' . filesize($file),
            'Content-Disposition' . "attachment; fileName:$file ",



        );
    }
}
