<?php

namespace App\Helpers;

class UploadFile
{
    public function handle($file,$folder)
    {
        if(is_null($file) || is_string($file)){
            return $file;
        }

        $image=time().'-'.$file->getClientOriginalName();
        $path='public/'.$folder;
        $file->storeAs($path, $image);
        return $image;
    }

}
