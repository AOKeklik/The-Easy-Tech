<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\ImageService;

class AdminProfileController extends Controller
{
    public function index():View
    {
        return view("admin.profile.index");
    }

    public function profile_update(Request $request, ImageService $imageService)
    {
        try{
            $validator = \Validator::make($request->all(),[
	            "name"=>"required|string",
	            "email"=>[
	                "required",
	                "email",
	                Rule::unique("users","email")->ignore(auth()->user()->id)
                ],
                "avatar"=>"nullable|file|mimes:jpg,jpeg,png|max:1048576",
	        ]);

	        if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);

            $avatar = $imageService->uploadUserAvatar($request);
	        $user=User::find(auth()->user()->id);

	        if(!$user)
	            throw new Exception("User not found.");

	        $user->name=$request->name;
	        $user->email=$request->email;
	        $user->avatar=$avatar;

	        if(!$user->update())
	            throw new Exception("Failed to update profile.");
	        
	        return response()->json(["success"=>["message"=>"Profile updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
    public function profile_password_update(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
	            "old_password"=>"required|string|min:7|max:13",
	            "password"=>"required|string|min:7|max:13",
	            "confirm_password"=>"required|string|same:password"
	        ]);

            if(!$validator->passes())
	            return response()->json(["form_error"=>["message"=>$validator->errors()->toArray()]]);

	        $user=User::find(auth()->user()->id);

	        if(!$user)
	            throw new Exception("User not found.");

	        if(!password_verify($request->old_password,$user->password))
	            throw new Exception("Current password is incorrect.");

	        $user->password=password_hash($request->password,PASSWORD_DEFAULT);

	        if(!$user->update())
	            throw new Exception("Failed to update the password.");

	        return response()->json(["success"=>["message"=>"Password updated successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}


