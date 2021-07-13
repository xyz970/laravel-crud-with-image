<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class ImageTempController extends Controller
{
    public function postStore(Request $request)
    {
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $actual_image = Image::make($file->getRealPath());

            $height = $actual_image->height() / 4;

            $width = $actual_image->width() / 4;
            $actual_image->resize($width,$height)->save(public_path().'/assets/img/temporary/'.$filename);
            // $file->storeAs(public_path().'/assets/img/temporary/',$filename);
            // $file->move(public_path('assets/img/temporary/'), $filename);
            return $filename;
        }
        return response()->json(['Gagal'], 500);
    }

    public function getDelete($filename)
    {
        unlink(public_path('assets/img/temporary/') . $filename);
    }
}
