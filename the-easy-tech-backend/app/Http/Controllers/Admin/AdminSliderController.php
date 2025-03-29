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
    public function index() :View
    {
        $sliders=Slider::orderBy("id","desc")->get();
        return view("admin.slider.index",compact("sliders"));
    }
    public function slider_table_view() :View
    {
        $sliders=Slider::orderBy("id","desc")->get();
        return view("admin.slider.table",compact("sliders"));
    }
    public function slider_add_view() :View
    {
        return view("admin.slider.add");
    }
    public function slider_edit_view($slider_id)
    {
        $slider=Slider::find($slider_id);

        if(!$slider)
            return redirect()->route("admin.slider.view")->with("error","The slider not found.");

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
    
            $slider=new Slider();
            $image = $imageService->uploadPhoto($request,$slider,"slider");
    
            $slider->image=$image;
            $slider->title=$request->title;
            $slider->desc=$request->desc;
            $slider->button_link=$request->button_link;
    
            if(!$slider->save())
                throw new Exception("Failed to save slide."); 
    
            return response()->json(["success"=>["message"=>"Slider added successfully.","redirect"=>route("admin.slider.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function slider_update(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "image"=>"nullable|file|mimes:jpg,jpeg,png|max:1048576",
                "title"=>"nullable|string",
                "desc"=>"nullable|string",
                "button_link"=>"nullable|url",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $slider=Slider::find($request->slider_id);

            if(!$slider)
                throw new Exception("Slider not found."); 

            $image = $imageService->uploadPhoto($request,$slider,"slider");
    
            $slider->image=$image;
            $slider->title=$request->title;
            $slider->desc=$request->desc;
            $slider->button_link=$request->button_link;
    
            if(!$slider->save())
                throw new Exception("Failed to update slide."); 
    
            return response()->json(["success"=>["message"=>"Slider updated successfully.","redirect"=>route("admin.slider.view")]]);
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
    
            $slider=Slider::find($request->slider_id);
    
            if(!$slider)
                throw new Exception("Slider not found.");
    
            $slider->status=$request->status;
    
            if(!$slider->save())
                throw new Exception("Failed to update slider status.");
    
            return response()->json(["success"=>["message"=>"Slider status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function slider_delete(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "slider_id" => "required|numeric|exists:sliders,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $slider=Slider::find($request->slider_id);
    
            if(!$slider)
                 throw new Exception("Slider not found.");
    
            if(is_file(public_path("uploads/slider/").$slider->image))
                unlink(public_path("uploads/slider/").$slider->image);
    
            if(!$slider->delete())
                 throw new Exception("Failed to delete the slide.");
    
            return response()->json(["success"=>["message"=>"The slider deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
