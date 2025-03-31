<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\ImageService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    function setting_edit_view(): View
    {
        $setting=Setting::pluck("value","key");
        return view('admin.setting.edit',compact("setting"));
    }

    function setting_general_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'site_name' => "required|max:255",
                'site_email' => "required|email|max:255",
                'site_phone' => "required|max:255",
                'site_address' => "required|max:255",
                'site_copy' => "required|max:255",
            ]);

            if($validator->fails())
                return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            foreach ($validator->validated() as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
		        
            return response()->json(["success"=>["message"=>"Setting general updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }

    function setting_image_update(Request $request,ImageService $imageService)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'site_favicon' => "nullable|file|max:1000",
                'site_logo' => "nullable|file|max:1000",
            ]);

            if($validator->fails())
                return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            foreach ($validator->validated() as $key => $file) {
                $image = $imageService->uploadSettingPhoto($request,$key,"setting");
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $image]
                );
            }
		        
            return response()->json(["success"=>["message"=>"Setting image updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }

    function setting_link_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'link_facebook' => "url|max:255",
                'link_linkedin' => "url|max:255",
                'link_twitter' => "url|max:255",
                'link_instagram' => "url|max:255",
                'link_youtube' => "url|max:255",
            ]);

            if($validator->fails())
                return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            foreach ($validator->validated() as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
		        
            return response()->json(["success"=>["message"=>"Setting link updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }
}
