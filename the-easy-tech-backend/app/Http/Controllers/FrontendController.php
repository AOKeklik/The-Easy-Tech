<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\About;
use App\Models\Blog;
use App\Models\CaseStudies;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Gatewayone;
use App\Models\Gatewaytwo;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    function setting_get()
    {
        try{
            $setting=settings();  
            return response()->json([
                "message"=>"Settings retrieved successfully.",
                "data"=>$setting
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function slider_all_get()
    {
        try{
            $sliders=Slider::
                orderBy("id","desc")->
                where("status",1)->
                get();
            
            return response()->json([
                "message"=>"Sliders retrieved successfully.",
                "data"=>$sliders
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function service_all_get()
    {
        try{
            $services=Service::
                orderBy("id","desc")->
                where("status",1)->
                get();
            
            return response()->json([
                "message"=>"Services retrieved successfully.",
                "data"=>$services
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function service_get($id,$slug)
    {
        try{
            $service=Service::
                where("id",$id)->
                where("slug",$slug)->
                where("status",1)->
                first();

            if (!$service)
                return response()->json(["error" => ["message"=>"Service not found.",]], 404);
            
            return response()->json([
                "message"=>"Service retrieved successfully.",
                "data"=>$service
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function gatewayone_get()
    {        
        try{
            $gatewayone=Gatewayone::
                where("status",1)->
                first();
            
            return response()->json([
                "message"=>"Gatewayone retrieved successfully.",
                "data"=>$gatewayone
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function gatewaytwo_get()
    {
        try{
            $gatewaytwo=Gatewaytwo::
            where("status",1)->
            first();

            return response()->json([
                "message"=>"Gatewaytwo retrieved successfully.",
                "data"=>$gatewaytwo
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function testimonial_all_get()
    {
        try{
            $testimonials=Testimonial::
                orderBy("id","desc")->
                where("status",1)->
                get();
            
            return response()->json([
                "message"=>"Testimonials retrieved successfully.",
                "data"=>$testimonials
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function blog_all_get()
    {
        try{
            $blog=Blog::
                orderBy("id","desc")->
                where("status",1)->
                get()
                ->map(function ($blog) {
                    return [
                        "id"=>$blog->id,
                        "category_id"=>$blog->category?->id,
                        "category_name"=>$blog->category?->name ?? "Uncategorized",
                        "slug"=>$blog->slug,
                        "image"=>$blog->image,
                        "title"=>$blog->title,
                        "desc"=>$blog->desc,
                        "seo_title"=>$blog->seo_title,
                        "seo_desc"=>$blog->seo_desc,
                        "created_at"=>$blog->created_at,
                        "updated_at"=>$blog->updated_at,
                    ];
                });
            
            return response()->json([
                "message"=>"Blog retrieved successfully.",
                "data"=>$blog
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function blog_category_all_get()
    {
        try{
            $blogs=Category::
                orderBy("id","desc")->
                where("type","blog")->
                get()
                ->map(function ($blog) {
                    return [
                        "id"=>$blog->id,
                        "slug"=>$blog->slug,
                        "name"=>$blog->name,
                    ];
                });
            
            return response()->json([
                "message"=>"Category retrieved successfully.",
                "data"=>$blogs
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function blog_by_category_all_get($slug)
    {
        try{
            $category = Category::
                where('type', "blog")->
                where('slug', $slug)->
                first();

            if (!$category)
                return response()->json(['error' => ['message' => 'Category not found.']], 404);

            $blogs=Blog::
                where("category_id",$category->id)->
                where("status",1)->
                orderBy("id","desc")->
                get()
                ->map(function ($blog) {
                    return [
                        "id"=>$blog->id,
                        "category_id"=>$blog->category?->id,
                        "category_name"=>$blog->category?->name ?? "Uncategorized",
                        "slug"=>$blog->slug,
                        "image"=>$blog->image,
                        "title"=>$blog->title,
                        "desc"=>$blog->desc,
                        "seo_title"=>$blog->seo_title,
                        "seo_desc"=>$blog->seo_desc,
                        "created_at"=>$blog->created_at,
                        "updated_at"=>$blog->updated_at,
                    ];
                });
            
            return response()->json([
                "message"=>"Blog retrieved successfully.",
                "data"=>$blogs
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function blog_get($id,$slug)
    {
        try{
            $blog=Blog::
                where("id",$id)->
                where("slug",$slug)->
                where("status",1)->
                first();

            if (!$blog)
                return response()->json(["error" => ["message"=>"Blog not found.",]], 404);
            
            return response()->json([
                "message"=>"Blog retrieved successfully.",
                "data"=> [
                    "id"=>$blog->id,
                    "slug"=>$blog->slug,
                    "image"=>$blog->image,
                    "title"=>$blog->title,
                    "desc"=>$blog->desc,
                    "seo_title"=>$blog->seo_title,
                    "seo_desc"=>$blog->seo_desc,
                    "category_name"=>$blog->category?->name ?? "Uncategorized",
                    "created_at"=>$blog->created_at,
                    "updated_at"=>$blog->updated_at,
                ]
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function caseStudy_all_get()
    {
        try{
            $caseStudies=CaseStudies::
                orderBy("id","desc")->
                where("status",1)->
                get()
                ->map(function ($caseStudy) {
                    return [
                        "id"=>$caseStudy->id,
                        "slug"=>$caseStudy->slug,
                        "image"=>$caseStudy->image,
                        "title"=>$caseStudy->title,
                        "desc"=>$caseStudy->desc,
                        "seo_title"=>$caseStudy->seo_title,
                        "seo_desc"=>$caseStudy->seo_desc,
                        "category_name"=>$caseStudy->category?->name ?? "Uncategorized",
                        "created_at"=>$caseStudy->created_at,
                        "updated_at"=>$caseStudy->updated_at,
                    ];
                });
            
            return response()->json([
                "message"=>"CaseStudies retrieved successfully.",
                "data"=>$caseStudies
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function caseStudy_get($id,$slug)
    {
        try{
            $caseStudy=CaseStudies::
                where("id",$id)->
                where("slug",$slug)->
                where("status",1)->
                first();

            if (!$caseStudy)
                return response()->json(["error" => ["message"=>"CaseStudy not found.",]], 404);
            
            return response()->json([
                "message"=>"CaseStudy retrieved successfully.",
                "data"=> [
                    "id"=>$caseStudy->id,
                    "slug"=>$caseStudy->slug,
                    "image"=>$caseStudy->image,
                    "title"=>$caseStudy->title,
                    "desc"=>$caseStudy->desc,
                    "seo_title"=>$caseStudy->seo_title,
                    "seo_desc"=>$caseStudy->seo_desc,
                    "category_name"=>$caseStudy->category?->name ?? "Uncategorized",
                    "created_at"=>$caseStudy->created_at,
                    "updated_at"=>$caseStudy->updated_at,
                ]
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function about_get()
    {        
        try{
            $about=About::
                where("status",1)->
                first();
            
            return response()->json([
                "message"=>"About retrieved successfully.",
                "data"=>$about
            ],200);
        }catch(Exception $err) {
            return response()->json(["error"=>["message"=>$err->getMessage()]], 500);
        }
    }
    public function contact_submit(Request $request){
        try{
            $validated = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|min:10',
            ]);

            if ($validated->fails())
                return response()->json(["message"=>$validated->errors()->first()], 422);

            $formData = $validated->validated();

            Contact::create($formData);

            \Mail::to($request->email)->send(new ContactFormSubmitted($formData));

            return response()->json(['message'=>'Your message has been sent successfully!',$formData], 200);
        }catch(Exception $err){
            return response()->json(["message"=>$err->getMessage()], 500);
        }
    }
}
