<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
require '../vendor/autoload.php';

class AdminAboutController extends Controller
{
    public function about_edit_view()
    {
        $about=About::first();
        return view("admin.about.edit",compact("about"));
    }

    public function about_update (Request $request, ImageService $imageService)
    {
        try{
            $validator = \Validator::make($request->all(),[
                'title' => 'required|string|max:255',
                'desc' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'phone' => 'nullable|string|max:20',
                'growth' => 'nullable|string|max:255',
                'solving' => 'nullable|string|max:255',
                'income' => 'nullable|string|max:255',
                'achiever' => 'nullable|string|max:255',
                "status" => "required|numeric|in:1,0",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);

            $about = About::first();
            $image = $imageService->uploadPhoto($request,$about,"about");

            if(!$about)
                throw new Exception("About not found."); 

            $about->title=$request->title;
            $about->desc=$request->desc;
            $about->image = $image;
            $about->phone=$request->phone;
            $about->growth=$request->growth;
            $about->solving=$request->solving;
            $about->income=$request->income;
            $about->achiever=$request->achiever;
            $about->status=$request->status;

            if(!$about->update())
                throw new Exception("Failed to update about."); 
    
            return response()->json(["success"=>["message"=>"About updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
