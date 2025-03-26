<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminEmail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function signin_view():View
    {
        return view("admin.auth.signin");
    }
    public function forget_view():View
    {
        return view("admin.auth.forget");
    }
    public function reset_view(Request $request)
    {
        try{
            $admin = User::where("email", $request->email)->first();

            if(!$admin)
                throw new \Exception("Invalid or expired reset token.");

            if(!password_verify($admin->remember_token,$request->token))
                throw new \Exception("Invalid or expired reset token.");

            return view("admin.auth.reset",["token"=>$request->token,"email"=>$request->email]);
        }catch(\Exception $err){
            return redirect()->route("admin.signin.view")->with("error",$err->getMessage());
        }
    }


    public function signin_submit(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                "email"=>"required|email|exists:users,email",
                "password"=>"required|string|min:8",
            ]);

            if($validator->fails())
	                return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            $credential=[
                "email"=>$request->email,
                "password"=>$request->password,
                "status"=>1,
            ];
    
            if(!auth()->attempt($credential))
                throw new \Exception("Not valid user or password!");
            
            return response()->json(["success"=>["message"=>"Login successful! Welcome back.","redirect"=>route("admin.view")]]);
        }catch(\Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }
    public function forget_submit(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                "email"=>"required|email|exists:users,email",
            ]);

            if($validator->fails())
	            return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            $admin = User::where("email",$request->email)->first();
            
            $token = bin2hex(random_bytes(16));
            $hashed_token = password_hash($token, PASSWORD_DEFAULT);
            $reset_link = url("admin/reset?email=".$admin->email."&token=".$hashed_token);

            $admin->status=0;
            $admin->remember_token=$token;
            
            if(!$admin->update())
                throw new \Exception("Failed to update user details. Please try again.");

            $subject="Password Reset Request";
            $message="<p>We received a request to reset your password.</p>";
            $message.="<p>Please click the link below to proceed: </p>";
            $message.="<a href='$reset_link'>Reset Your Password</a>";
    
            \Mail::to($request->email)->send(new AdminEmail($subject,$message));
            
            return response()->json(["success"=>["message"=>"Please check your email and follow the steps there!","redirect"=>route("admin.signin.view")]]);
        }catch(\Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }
    public function reset_submit(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "password"=>"required|string|min:8|max:13",
                "confirm_password"=>"required|string|min:8|same:password",
            ]);

            if($validator->fails())
	            return response()->json(["form_error" => ["message" => $validator->errors()->toArray()]]);
    
            $admin=User::where("email", $request->email)->first();
    
            if(!$admin)
                throw new \Exception("Invalid email address or token!");
    
            if(!password_verify($admin->remember_token, $request->token))
                throw new \Exception("Invalid email address or token!");
    
            $admin->password=password_hash($request->password, PASSWORD_DEFAULT);
            $admin->remember_token=null;
            $admin->status=1;
            
            if(!$admin->update())
                throw new \Exception("Failed to update user details. Please try again.");
    
            return response()->json(["success"=>["message"=>"Password has been updated usccessfully!","redirect"=>route("admin.signin.view")]]);
        }catch(\Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }
    public function signout_submit()
    {
        try{
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();

            return response()->json(["success"=>["message"=>"Successfully logged out.","redirect"=>route("admin.signin.view")]]);
        }catch(\Exception $err){
            return response()->json(["error" => ["message" =>$err->getMessage()]]);
        }
    }
}
