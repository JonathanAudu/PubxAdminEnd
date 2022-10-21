<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    public function scrollableads()
    {
        $files = Storage::disk('public_index')->files('ads');
        if(!empty($files)){
            foreach ($files as $key => $file) {
                $files[$key] = "data:image/png;base64, ".base64_encode(Storage::disk('public_index')->get($file));
            }
            return $files;
        }
    }
}
