<?php


namespace App\Utilities;


use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class uploadFile
{
        public static function uploadFile($file,$filename){
        //get type file with extension
        if(strpos($file,'.jpg') || strpos($file,'.pdf')
            || strpos($file,'.png')){
            return $file;
        }else{
            $extension = $file->getClientOriginalExtension();
            //create name

            $filename = $filename.'_'.uniqid(). ".".$extension;
            //storage file
            $file->move(public_path('public/upload/imageUsers'), $filename);
            return url('/public/upload/imageUsers/'.$filename);
        }
    }


}