<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\ImageService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index() :View{
        $slides=Slider::orderBy("id","desc")->get();
        return view("admin.slider.index",compact("slides"));
    }
    public function slider_table_view() :View{
        $slides=Slider::orderBy("id","desc")->get();
        return view("admin.slider.table",compact("slides"));
    }
    public function slider_add_view() :View{
        return view("admin.slider.add");
    }
    public function slider_edit_view($slider_id){
        $slider=Slider::find($slider_id);

        if(!$slider)
            return redirect()->route("admin.slider.view")->with("error","The slide not found.");

        return view("admin.slider.edit",compact("slider"));
    }


    public function slider_store(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "image"=>"required|file|mimes:jpg,jpeg,png|max:1048576",
                "title"=>"nullable|string",
                "desc"=>"nullable|string",
                "button_link"=>"nullable|url",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $slide=new Slider();
            $image = $imageService->uploadSliderPhoto($request);
    
            $slide->image=$image;
            $slide->title=$request->title;
            $slide->desc=$request->desc;
            $slide->button_link=$request->button_link;
    
            if(!$slide->save())
                throw new Exception("Failed to save slide."); 
    
            return response()->json(["success"=>["message"=>"Slide added successfully.","redirect"=>route("admin.slider.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function slider_update(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "title"=>"nullable|string",
                "desc"=>"nullable|string",
                "button_link"=>"nullable|url",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $slide=Slider::find($request->slider_id);

            if(!$slide)
                throw new Exception("Slider not found."); 

            $image = $imageService->updateSliderPhoto($request,$slide);
    
            $slide->image=$image;
            $slide->title=$request->title;
            $slide->desc=$request->desc;
            $slide->button_link=$request->button_link;
    
            if(!$slide->save())
                throw new Exception("Failed to update slide."); 
    
            return response()->json(["success"=>["message"=>"Slide updated successfully.","redirect"=>route("admin.slider.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function slider_status_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "slider_id" => "required|numeric|exists:sliders,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $slide=Slider::find($request->slider_id);
    
            if(!$slide)
                throw new Exception("Slide not found.");
    
            $slide->status=$request->status;
    
            if(!$slide->save())
                throw new Exception("Failed to update slide status.");
    
            return response()->json(["success"=>["message"=>"Slide status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function slider_delete(Request $request){
        try{
            $validator = \Validator::make($request->all(), [
                "slider_id" => "required|numeric|exists:sliders,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $slide=Slider::find($request->slider_id);
    
            if(!$slide)
                 throw new Exception("Slide not found.");
    
            if(is_file(public_path("uploads/slider/").$slide->image))
                unlink(public_path("uploads/slider/").$slide->image);
    
            if(!$slide->delete())
                 throw new Exception("Failed to delete the slide.");
    
            return response()->json(["success"=>["message"=>"The slide deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
