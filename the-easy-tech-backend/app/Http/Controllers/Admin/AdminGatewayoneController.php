<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gatewayone;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
require '../vendor/autoload.php';

class AdminGatewayoneController extends Controller
{
    public function gatewayone_edit_view()
    {
        $gatewayone=Gatewayone::first();
        return view("admin.gatewayone.edit",compact("gatewayone"));
    }

    public function gatewayone_update (Request $request,ImageService $imageService)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "phone"=>"required|string",
                "title"=>"required|string",
                "desc"=>"nullable|string",
                "status" => "required|numeric|in:1,0",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $gatewayone=Gatewayone::first();

            if(!$gatewayone)
                throw new Exception("Gatewayone not found."); 

            $image = $imageService->uploadPhoto($request,$gatewayone,"gatewayone");
    
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->slug);
    

            $gatewayone->slug=$slug;
            $gatewayone->image=$image;
            $gatewayone->phone=$request->phone;
            $gatewayone->title=$request->title;
            $gatewayone->desc=$request->desc;
            $gatewayone->status=$request->status;
    
            if(!$gatewayone->save())
                throw new Exception("Failed to update gatewayone."); 
    
            return response()->json(["success"=>["message"=>"Gatewayone updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function gatewayone_status_update (Request $request)
    {

    }
}
