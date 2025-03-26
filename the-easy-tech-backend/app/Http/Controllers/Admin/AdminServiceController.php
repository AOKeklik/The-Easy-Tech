<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ImageService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Cocur\Slugify\Slugify;
require '../vendor/autoload.php';

class AdminServiceController extends Controller
{
    public function index() :View{
        $services=Service::orderBy("id","desc")->get();
        return view("admin.service.index",compact("services"));
    }
    public function service_table_view() :View{
        $services=Service::orderBy("id","desc")->get();
        return view("admin.service.table",compact("services"));
    }
    public function service_add_view() :View{
        return view("admin.service.add");
    }
    public function service_edit_view($service_id){
        $service=Service::find($service_id);

        if(!$service)
            return redirect()->route("admin.service.view")->with("error","The service not found.");

        return view("admin.service.edit",compact("service"));
    }


    public function service_store(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "icon"=>"required|string",
                "title"=>"required|string",
                "desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $service=new Service();
            $image = $imageService->uploadPhoto($request,$service,"service");

            $slugify = new Slugify();
            $slug = $slugify->slugify($request->title);
    

            $service->slug=$slug;
            $service->image=$image;
            $service->icon=$request->icon;
            $service->title=$request->title;
            $service->desc=$request->desc;
    
            if(!$service->save())
                throw new Exception("Failed to save service."); 
    
            return response()->json(["success"=>["message"=>"Service added successfully.","redirect"=>route("admin.service.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function service_update(Request $request,ImageService $imageService) 
    {
        try{
            $validator = \Validator::make($request->all(),[
                "icon"=>"required|string",
                "title"=>"required|string",
                "desc"=>"nullable|string",
            ]);

            if(!$validator->passes())
                return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);
    
            $service=Service::find($request->service_id);

            if(!$service)
                throw new Exception("Service not found."); 

            $image = $imageService->uploadPhoto($request,$service,"service");
    
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->title);
    

            $service->slug=$slug;
            $service->image=$image;
            $service->icon=$request->icon;
            $service->title=$request->title;
            $service->desc=$request->desc;
    
            if(!$service->save())
                throw new Exception("Failed to update service."); 
    
            return response()->json(["success"=>["message"=>"Service updated successfully.","redirect"=>route("admin.service.view")]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function service_status_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                "service_id" => "required|numeric|exists:services,id",
                "status" => "required|numeric|in:1,0",
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $service=Service::find($request->service_id);
    
            if(!$service)
                throw new Exception("Service not found.");
    
            $service->status=$request->status;
    
            if(!$service->save())
                throw new Exception("Failed to update service status.");
    
            return response()->json(["success"=>["message"=>"Service status updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function service_delete(Request $request){
        try{
            $validator = \Validator::make($request->all(), [
                "service_id" => "required|numeric|exists:services,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $service=Service::find($request->service_id);
    
            if(!$service)
                 throw new Exception("Service not found.");
    
            if(is_file(public_path("uploads/service/").$service->image))
                unlink(public_path("uploads/service/").$service->image);
    
            if(!$service->delete())
                 throw new Exception("Failed to delete the service.");
    
            return response()->json(["success"=>["message"=>"The service deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
