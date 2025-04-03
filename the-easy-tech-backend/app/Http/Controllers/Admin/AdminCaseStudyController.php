<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudies;
use App\Models\Category;
use App\Services\ImageService;
use Cocur\Slugify\Slugify;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCaseStudyController extends Controller
{
    public function index() :View
    {
        $caseStudies=CaseStudies::orderBy("id","desc")->get();
        return view("admin.caseStudy.index",compact("caseStudies"));
    }
    public function caseStudy_table_view() :View
    {
        $caseStudies=CaseStudies::orderBy("id","desc")->get();
        return view("admin.caseStudy.table",compact("caseStudies"));
    }
    public function caseStudy_add_view() :View
    {
        $categories=Category::
            where("type", "study")->
            orderBy("id","desc")->
            get();
        return view("admin.caseStudy.add",compact("categories"));
    }
    public function caseStudy_edit_view($caseStudy_id)
    {
        $caseStudy=CaseStudies::find($caseStudy_id);
        $categories=Category::orderBy("id","desc")->get();

        if(!$caseStudy)
            return redirect()->route("admin.caseStudy.view")->with("error","The caseStudy not found.");

        return view("admin.caseStudy.edit",compact("caseStudy","categories"));
    }


    public function caseStudy_store(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "category_id"=>"required|numeric|exists:categories,id",
                "slug"=>"required|string",
                "image"=>"required|file|mimes:jpg,jpeg,png|max:1048576",
                "title"=>"required|string",
                "desc"=>"required|string",
                "seo_title"=>"nullable|string",
                "seo_desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $caseStudy=new CaseStudies();
            $slugify = new Slugify();
            $image = $imageService->uploadPhoto($request,$caseStudy,"caseStudy");
            $slug = $slugify->slugify($request->title);
    
            $caseStudy->category_id=$request->category_id;
            $caseStudy->slug=$slug;
            $caseStudy->image=$image;
            $caseStudy->title=$request->title;
            $caseStudy->desc=$request->desc;
            $caseStudy->seo_title=$request->seo_title;
            $caseStudy->seo_desc=$request->seo_desc;
    
            if(!$caseStudy->save())
                throw new Exception("Failed to save caseStudy."); 
    
            return response()->json(["success"=>["message"=>"CaseStudy added successfully.","redirect"=>route("admin.caseStudy.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function caseStudy_update(Request $request,ImageService $imageService) 
    {
        try{
            $validator = Validator::make($request->all(),[
                "caseStudy_id"=>"required|numeric|exists:case_studies,id",
                "category_id"=>"required|numeric|exists:categories,id",
                "slug"=>"required|string",
                "image"=>"nullable|file|mimes:jpg,jpeg,png|max:1048576",
                "title"=>"required|string",
                "desc"=>"required|string",
                "seo_title"=>"nullable|string",
                "seo_desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $caseStudy=CaseStudies::find($request->caseStudy_id);
            $slugify = new Slugify();

            if(!$caseStudy)
                throw new Exception("CaseStudy not found."); 

            $image = $imageService->uploadPhoto($request,$caseStudy,"caseStudy");
            $slug = $slugify->slugify($request->title);
    
            $caseStudy->category_id=$request->category_id;
            $caseStudy->slug=$slug;
            $caseStudy->image=$image;
            $caseStudy->title=$request->title;
            $caseStudy->desc=$request->desc;
            $caseStudy->seo_title=$request->seo_title;
            $caseStudy->seo_desc=$request->seo_desc;
    
            if(!$caseStudy->save())
                throw new Exception("Failed to update caseStudy."); 
    
            return response()->json(["success"=>["message"=>"CaseStudy updated successfully.","redirect"=>route("admin.caseStudy.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function caseStudy_status_update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                "caseStudy_id" => "required|numeric|exists:case_studies,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $caseStudy=CaseStudies::find($request->caseStudy_id);
    
            if(!$caseStudy)
                throw new Exception("CaseStudy not found.");
    
            $caseStudy->status=$request->status;
    
            if(!$caseStudy->save())
                throw new Exception("Failed to update caseStudy status.");
    
            return response()->json(["success"=>["message"=>"CaseStudy status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function caseStudy_delete(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                "caseStudy_id" => "required|numeric|exists:case_studies,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $caseStudy=CaseStudies::find($request->caseStudy_id);
    
            if(!$caseStudy)
                    throw new Exception("CaseStudy not found.");
    
            if(is_file(public_path("uploads/caseStudy/").$caseStudy->image))
                unlink(public_path("uploads/caseStudy/").$caseStudy->image);
    
            if(!$caseStudy->delete())
                    throw new Exception("Failed to delete the caseStudy.");
    
            return response()->json(["success"=>["message"=>"The caseStudy deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
