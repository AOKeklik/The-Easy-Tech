<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gatewaytwo;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
use Exception;

require '../vendor/autoload.php';

class AdminGatewaytwoController extends Controller
{
    public function gatewaytwo_edit_view()
    {
        $gatewaytwo=Gatewaytwo::first();
        return view("admin.gatewaytwo.edit",compact("gatewaytwo"));
    }

    public function gatewaytwo_update (Request $request,ImageService $imageService)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "project"=>"required|string",
                "review"=>"required|string",
                "experience"=>"required|string",
                "title"=>"required|string",
                "desc"=>"nullable|string",
                "status" => "required|numeric|in:1,0",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $gatewaytwo=Gatewaytwo::first();

            if(!$gatewaytwo)
                throw new Exception("Gatewaytwo not found."); 

            $image = $imageService->uploadPhoto($request,$gatewaytwo,"gatewaytwo");
    
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->slug);
    

            $gatewaytwo->slug=$slug;
            $gatewaytwo->image=$image;
            $gatewaytwo->project=$request->project;
            $gatewaytwo->review=$request->review;
            $gatewaytwo->experience=$request->experience;
            $gatewaytwo->title=$request->title;
            $gatewaytwo->desc=$request->desc;
            $gatewaytwo->status=$request->status;
    
            if(!$gatewaytwo->save())
                throw new Exception("Failed to update gatewaytwo."); 
    
            return response()->json(["success"=>["message"=>"Gatewaytwo updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
