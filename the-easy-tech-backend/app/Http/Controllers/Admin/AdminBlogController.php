<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Services\ImageService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
            
require '../vendor/autoload.php';

class AdminBlogController extends Controller
{
    public function index() :View
    {
        $blogs=Blog::orderBy("id","desc")->get();
        return view("admin.blog.index",compact("blogs"));
    }
    public function blog_table_view() :View
    {
        $blogs=Blog::orderBy("id","desc")->get();
        return view("admin.blog.table",compact("blogs"));
    }
    public function blog_add_view() :View
    {
        $categories=Category::
            where("type", "blog")->
            orderBy("id","desc")->
            get();
        return view("admin.blog.add",compact("categories"));
    }
    public function blog_edit_view($blog_id)
    {
        $blog=Blog::find($blog_id);
        $categories=Category::orderBy("id","desc")->get();

        if(!$blog)
            return redirect()->route("admin.blog.view")->with("error","The blog not found.");

        return view("admin.blog.edit",compact("blog","categories"));
    }


    public function blog_store(Request $request,ImageService $imageService) 
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
    
            $blog=new Blog();
            $slugify = new Slugify();
            $image = $imageService->uploadPhoto($request,$blog,"blog");
            $slug = $slugify->slugify($request->title);
    
            $blog->category_id=$request->category_id;
            $blog->slug=$slug;
            $blog->image=$image;
            $blog->title=$request->title;
            $blog->desc=$request->desc;
            $blog->seo_title=$request->seo_title;
            $blog->seo_desc=$request->seo_desc;
    
            if(!$blog->save())
                throw new Exception("Failed to save blog."); 
    
            return response()->json(["success"=>["message"=>"Blog added successfully.","redirect"=>route("admin.blog.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function blog_update(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "blog_id"=>"required|numeric|exists:blogs,id",
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
    
            $blog=Blog::find($request->blog_id);
            $slugify = new Slugify();

            if(!$blog)
                throw new Exception("Blog not found."); 

            $image = $imageService->uploadPhoto($request,$blog,"blog");
            $slug = $slugify->slugify($request->title);
    
            $blog->category_id=$request->category_id;
            $blog->slug=$slug;
            $blog->image=$image;
            $blog->title=$request->title;
            $blog->desc=$request->desc;
            $blog->seo_title=$request->seo_title;
            $blog->seo_desc=$request->seo_desc;
    
            if(!$blog->save())
                throw new Exception("Failed to update blog."); 
    
            return response()->json(["success"=>["message"=>"Blog updated successfully.","redirect"=>route("admin.blog.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function blog_status_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "blog_id" => "required|numeric|exists:blogs,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $blog=Blog::find($request->blog_id);
    
            if(!$blog)
                throw new Exception("Blog not found.");
    
            $blog->status=$request->status;
    
            if(!$blog->save())
                throw new Exception("Failed to update blog status.");
    
            return response()->json(["success"=>["message"=>"Blog status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function blog_delete(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "blog_id" => "required|numeric|exists:blogs,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $blog=Blog::find($request->blog_id);
    
            if(!$blog)
                 throw new Exception("Blog not found.");
    
            if(is_file(public_path("uploads/blog/").$blog->image))
                unlink(public_path("uploads/blog/").$blog->image);
    
            if(!$blog->delete())
                 throw new Exception("Failed to delete the blog.");
    
            return response()->json(["success"=>["message"=>"The blog deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
