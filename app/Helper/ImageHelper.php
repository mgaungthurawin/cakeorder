<?php

namespace App\Helper;

use App;
use Image;
use Illuminate\Support\Facades\Input;

class ImageHelper 
{

    private $filename; 

    public function upload($request, $filename, $folder)
    {

        if (Input::hasFile($filename)) {
            $image = Input::file($filename);
            $name = time() . '.' . $image->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $name = preg_replace('/\s+/', '', $name);
            $path = public_path($folder .'/' . $name);  
            Image::make($image->getRealPath())->resize(400, 400)->save($path);
            $insertpath = $folder . '/' . $name;
            return $insertpath;
        }
        return null;
    }
}