<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    public function uploadAdvertImages(Request $request)
    {
        $imagename = rand(100000, 999999);

        if ($request->file('image')) {
            $file = $request->file('image');
            $ext = $request->image->extension();
            $filename = "ads_$imagename.$ext";
            $file->move(public_path('ads'), $filename);
            // return(view('advert'));
        } else {
            $filename = null;
            // return(view('advert'));
        }
    }

    public function getAdvertImages()
    {
        $ads = Storage::disk('public_index')->files('ads');
        // return(view('advert'));
        // loop thru image array and append publicpath() to load images
    }

    public function deleteAdvertImages($image_path)
    {
        if (Storage::disk('public_index')->exists($image_path)) {
            Storage::disk('public_index')->delete($image_path);
            return redirect()->action([AdvertController::class, 'getAdvertImages']);
        }
    }
}
