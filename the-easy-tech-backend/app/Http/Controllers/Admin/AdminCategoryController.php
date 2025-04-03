<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
            
require '../vendor/autoload.php';

class AdminCategoryController extends Controller
{
    public function index() :View
    {
        $categories=Category::orderBy("id","desc")->get();
        return view("admin.category.index",compact("categories"));
    }
    public function category_table_view() :View
    {
        $categories=Category::orderBy("id","desc")->get();
        return view("admin.category.table",compact("categories"));
    }
    public function category_add_view() :View
    {
        $categories=Category::orderBy("id","desc")->get();
        return view("admin.category.add",compact("categories"));
    }
    public function category_edit_view($category_id)
    {
        $category=Category::find($category_id);
        $categories=Category::orderBy("id","desc")->get();
        if(!$category)
            return redirect()->route("admin.category.view")->with("error","The category not found.");

        return view("admin.category.edit",compact("category","categories"));
    }


    public function category_store(Request $request) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "parent_id"=>"nullable|string|exists:categories,id",
                "name"=>"required|string",
                "slug" => "required|string|unique:categories",
                "type"=>"required|string|in:blog,page,study",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $category=new Category();
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->slug);
    
            $category->name=$request->name;
            $category->slug=$slug;
            $category->parent_id =$request->parent_id;
            $category->type =$request->type;
    
            if(!$category->save())
                throw new Exception("Failed to save category."); 
    
            return response()->json(["success"=>["message"=>"Category added successfully.","redirect"=>route("admin.category.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function category_update(Request $request) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "name"=>"required|string",
                "position"=>"nullable|string",
                "desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $category=Category::find($request->category_id);
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->slug);

            if(!$category)
                throw new Exception("Category not found."); 

            $category->name=$request->name;
            $category->slug=$slug;
            $category->parent_id =$request->parent_id;
            $category->type =$request->type;

            if(!$category->save())
                throw new Exception("Failed to update category."); 
    
            return response()->json(["success"=>["message"=>"Category updated successfully.","redirect"=>route("admin.category.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function category_status_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "category_id" => "required|numeric|exists:categories,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $category=Category::find($request->category_id);
    
            if(!$category)
                throw new Exception("Category not found.");
    
            $category->status=$request->status;
    
            if(!$category->save())
                throw new Exception("Failed to update category  status.");
    
            return response()->json(["success"=>["message"=>"Category status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function category_delete(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "category_id" => "required|numeric|exists:categories,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $category=Category::find($request->category_id);
    
            if(!$category)
                 throw new Exception("Category not found.");
    
            if(!$category->delete())
                 throw new Exception("Failed to delete the category.");
    
            return response()->json(["success"=>["message"=>"The category  deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
