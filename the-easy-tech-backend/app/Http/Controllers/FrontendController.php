<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gatewayone;
use App\Models\Gatewaytwo;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;

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
                        "slug"=>$blog->slug,
                        "image"=>$blog->image,
                        "title"=>$blog->title,
                        "desc"=>$blog->desc,
                        "seo_title"=>$blog->seo_title,
                        "seo_desc"=>$blog->seo_desc,
                        "category_name"=>$blog->category?->name ?? "Uncategorized",
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
}
