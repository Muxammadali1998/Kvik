<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class DeleteFile
{
    public function handle($filename,$folder)
    {
        if(Storage::exists('/public/'.$folder.'/'.$filename)){;
            Storage::delete('/public/'.$folder.'/'.$filename);
        }
    }

}
