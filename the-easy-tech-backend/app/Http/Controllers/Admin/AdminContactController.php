<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts=Contact::orderBy("id","desc")->get();
        return view("admin.contact.index",compact("contacts"));
    }
    public function contact_table_view() :View
    {
        $contacts=Contact::orderBy("id","desc")->get();
        return view("admin.contact.table",compact("contacts"));
    }
    public function contact_detail_view($contact_id)
    {
        $contact=Contact::find($contact_id);

        if(!$contact)
            return redirect()->route("admin.contact.view")->with("error","The contact not found.");

        return view("admin.contact.detail",compact("contact"));
    }

    public function contact_delete(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                "contact_id" => "required|numeric|exists:contacts,id"
            ]);
    
            if(!$validator->passes())
                return response()->json(["error" => ["message" => $validator->errors()->first()]]);
    
            $contact=Contact::find($request->contact_id);
    
            if(!$contact)
                 throw new Exception("Contact not found.");
    
    
            if(!$contact->delete())
                 throw new Exception("Failed to delete the contact.");
    
            return response()->json(["success"=>["message"=>"The contact deleted successfully."]]);
        }catch(Exception $err){
            return response()->json(["error"=>["message"=>$err->getMessage()]]);
        }
    }
}
