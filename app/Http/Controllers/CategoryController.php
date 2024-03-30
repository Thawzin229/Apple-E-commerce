<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function helper(){
        $message  = ChMessage::select("users.name","users.image as user_image","ch_messages.body","ch_messages.from_id as user_id","ch_messages.created_at")
        ->where("ch_messages.from_id","!=",Auth::user()->id)
        ->join("users","users.id","ch_messages.from_id")
        ->orderBy("ch_messages.created_at","desc")
        ->groupBy("ch_messages.from_id")
        ->paginate(4);
        return ["message" => $message];

    }
    //category create page
    public function createPage(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.category.create",compact("message"));
    }

    //create category
    public function createCategory(Request $data)
    {
        Category::create(["name" => $data->name]);
        return redirect()->route('admin#homepage');
    }

    //delete categroy
    public function deleteCatgory($id){
        Category::where("id",$id)->delete();
        return redirect()->route('admin#homepage');
    }
}
