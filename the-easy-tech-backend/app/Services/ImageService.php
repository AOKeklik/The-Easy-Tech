<?php

namespace App\Services;

use App\Models\Setting;
use Exception;


class ImageService
{
    public function uploadUserAvatar($request)
    {
        try{
            $user = auth()->user();
            $image = $user->avatar;
            $uploadPath = "uploads/user/";

            if($request->hasFile("avatar")){
                $file = $request->file("avatar");

                if(
                    strpos($image,"avatar") === false && 
                    is_file(public_path($uploadPath).$image)
                )
                    unlink(public_path($uploadPath).$image);

                $image=$this->processImage($file,$uploadPath);
            }

            return $image;
        }catch(Exception $err){
            throw $err;
        }
    }
    public function uploadPhoto($request,$table,$path)
    {
        try{
            $image = $table?->image ?? null;
            $uploadPath = "uploads/".$path."/";

            if($request->hasFile("image")){
                $file = $request->file("image");

                if(is_file(public_path($uploadPath.$image)))
                    unlink(public_path($uploadPath.$image));

                $image=$this->processImage($file,$uploadPath);
            }

            return $image;
        }catch(Exception $err){
            throw $err;
        }
    }
    public function uploadSettingPhoto($request,$key,$path)
    {
        try{
            $table = Setting::where("key", $key)->first();
            $image = $table?->value ?? null;
            $uploadPath = "uploads/".$path."/";

            if($request->hasFile($key)){
                $file = $request->file($key);

                if($image && is_file(public_path($uploadPath.$image)))
                    unlink(public_path($uploadPath.$image));

                $image=$this->processImage($file,$uploadPath);
            }

            return $image;
        }catch(Exception $err){
            throw $err;
        }
    }
    protected function processImage($file, $uploadPath)
    {
        if(!is_dir($uploadPath))
	        mkdir($uploadPath,0577,true);

        $image=uniqid().".".$file->getClientOriginalExtension();

        list($width,$height)=getimagesize($file->getPathname());
        $thumbnail=imagecreatetruecolor($width,$height);

        switch($file->getClientOriginalExtension()){
            case "jpg": case "jpeg": $source_image=imagecreatefromjpeg($file->getPathname());break;
            case "png": $source_image=imagecreatefrompng($file->getPathname());break;
            default: redirect()->back()->with("error","Invalid image format.");
        }

        imagecopyresampled($thumbnail,$source_image,0,0,0,0,$width,$height,$width,$height);
        imagejpeg($thumbnail,public_path($uploadPath).$image,90);

        imagedestroy($thumbnail);
        imagedestroy($source_image);

        return $image;
    }
}