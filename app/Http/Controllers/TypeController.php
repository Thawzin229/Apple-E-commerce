<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    //
    public function helper(){
        $message  = ChMessage::select("users.name","users.image as user_image","ch_messages.body","ch_messages.from_id as user_id","ch_messages.created_at")
        ->where("ch_messages.from_id","!=",Auth::user()->id)
        ->join("users","users.id","ch_messages.from_id")
        ->orderBy("ch_messages.created_at","desc")
        ->groupBy("ch_messages.from_id")
        ->paginate(4);
        return ["message" => $message];

    }
    //to model page 
    public function typePage(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $data = Type::paginate(5);
        return view("admin.type.type",compact("data","message"));
    }
    //create page 
    public function createtypePage(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.type.create",compact("message"));
    }
    //create the model
    public function createType(Request $data){
        Type::create(["name" => $data->name]);
        return redirect()->route('admin#typepage');
    }

    //delete type 
    public function deleteType($id){
        Type::where("id",$id)->delete();
        return redirect()->route('admin#typepage');

    }
}
