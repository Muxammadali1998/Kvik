<?php

namespace App\Helpers;

class UploadFile
{
    public function handle($file,$folder)
    {
        $image=time().'-'.$file->getClientOriginalName();
        $path='public/'.$folder;
        $file->storeAs($path, $image);
        return $image;
    }

}
