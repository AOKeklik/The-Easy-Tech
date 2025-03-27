<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index() :View
    {
        $testimonials=Testimonial::orderBy("id","desc")->get();
        return view("admin.testimonial.index",compact("testimonials"));
    }
    public function testimonial_table_view() :View
    {
        $testimonials=Testimonial::orderBy("id","desc")->get();
        return view("admin.testimonial.table",compact("testimonials"));
    }
    public function testimonial_add_view() :View
    {
        return view("admin.testimonial.add");
    }
    public function testimonial_edit_view($testimonial_id)
    {
        $testimonial=Testimonial::find($testimonial_id);

        if(!$testimonial)
            return redirect()->route("admin.testimonial.view")->with("error","The Testimonial not found.");

        return view("admin.testimonial.edit",compact("testimonial"));
    }


    public function testimonial_store(Request $request) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "name"=>"required|string",
                "position"=>"nullable|string",
                "desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $testimonial=new Testimonial();
    
            $testimonial->name=$request->name;
            $testimonial->desc=$request->desc;
            $testimonial->position=$request->position;
    
            if(!$testimonial->save())
                throw new Exception("Failed to save testimonial."); 
    
            return response()->json(["success"=>["message"=>"Testimonial added successfully.","redirect"=>route("admin.testimonial.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function testimonial_update(Request $request) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "name"=>"required|string",
                "position"=>"nullable|string",
                "desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $testimonial=Testimonial::find($request->testimonial_id);

            if(!$testimonial)
                throw new Exception("Testimonial not found."); 

            $testimonial->name=$request->name;
            $testimonial->desc=$request->desc;
            $testimonial->position=$request->position;
    
            if(!$testimonial->save())
                throw new Exception("Failed to update testimonial."); 
    
            return response()->json(["success"=>["message"=>"Testimonial updated successfully.","redirect"=>route("admin.testimonial.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function testimonial_status_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "testimonial_id" => "required|numeric|exists:testimonials,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $testimonial=Testimonial::find($request->testimonial_id);
    
            if(!$testimonial)
                throw new Exception("Testimonial not found.");
    
            $testimonial->status=$request->status;
    
            if(!$testimonial->save())
                throw new Exception("Failed to update testimonial status.");
    
            return response()->json(["success"=>["message"=>"Testimonial status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function testimonial_delete(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "testimonial_id" => "required|numeric|exists:testimonials,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $testimonial=Testimonial::find($request->testimonial_id);
    
            if(!$testimonial)
                 throw new Exception("Testimonial not found.");
    
            if(!$testimonial->delete())
                 throw new Exception("Failed to delete the testimonial.");
    
            return response()->json(["success"=>["message"=>"The testimonial deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
