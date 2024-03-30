<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aboutus;
use App\Models\Category;
use App\Models\ChMessage;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
    //to home page 
    public function homePage(){
        $data = Category::paginate(5);
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.home.home",compact("data","message"));
    }

    //to account page 
    public function accountPage(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.account.account",compact("message"));
    }

    //update acc information 
    public function updateAcc(Request $data){
        $id = Auth::user()->id;
        $this->validation($data);
        $finalData = $this->indirectData($data);
        $filename = $this->uploadImage($data,$id);
        $finalData["image"] = $filename;
        User::where("id",$id)->update($finalData);
        return redirect()->route("admin#accountpage");
    }

    //customer list
    public function customerList(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $searchval = request("searchval");
        $data = User::where("role","customer")
        ->when($searchval,function($table,$searchval){
            $table->where("name","like","%{$searchval}%")
            ->paginate();
        })
        ->paginate();
        return view("admin.customerlist.customer",compact("data","message"));
    }

    //delete customer
    public function deleteCustomer($id){
        $data = User::where("id",$id)->first()->toArray();
        $image = $data['image'];
        if($image !== null){
            Storage::delete("public/".$image);
        }
        User::where("id",$id)->delete();
        return back();

    }

    //update the customer role
    public function updateRole($id){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $data  = User::where("id",$id)->first()->toArray();
        return view("admin.roleupdate.update",compact("data","message"));

    }

    //updating the role
    public function updating(Request $data){
        $id = $data->idforupdate;
        User::where("id",$id)->update(["role" => $data->role]);
        return redirect()->route('admin#customerlist');
    }

    //order list management

    public function orderlist(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $orderlistdata = OrderList::select("order_lists.*","products.name as product_name","products.image as product_image")
        ->join("products","order_lists.product_id","products.id")
        ->paginate(6);
        return view("admin.orderlist.orderlist",compact("orderlistdata","message"));
    }

    public function statusChange()
    {
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $status = request("status");
        $orderlistdata = OrderList::select("order_lists.*","products.name as product_name","products.image as product_image")
        ->join("products","order_lists.product_id","products.id")
        ->where("order_lists.status",$status)
        ->paginate(6);

        return view("admin.orderlist.orderlist",compact("orderlistdata","message"));

        
    }


    //memebr list
    public function memberlist(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $memberlistdata  = Aboutus::paginate();
        return view("admin.member.member",compact("memberlistdata","message"));
    }
    //create member page 
    public function createmember(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.member.create",compact("message"));
    }

    //create team
    public function createteam(Request $data)
    {
        $this->validationforteam($data);
        $finalDataForTeam = $this->indirectDataforTeam($data);
        $filename = $this->uploadImageForTeam($data);
        $finalDataForTeam["image"] = $filename;
        Aboutus::create($finalDataForTeam);
        return redirect()->route("admin#memberlist");
    }

    //deleete team
    public function deletemember($id){
        $oldfile = Aboutus::where("id",$id)->first()->toArray();
        $oldimage = $oldfile["image"];
        if($oldimage !== null){
            Storage::delete("public/".$oldimage);
        }
        Aboutus::where("id",$id)->delete();
        return redirect()->route("admin#memberlist");
    }

    ///helper function
    public function indirectData($data){
        $indirectData = [
            "name" => $data->name,
            "email" => $data->email,
            "phnumber" => $data->phnumber,
            "address" => $data->address,
            "gender" => $data->gender,
        ];
        return $indirectData;
    }
    //for team
    public function validationforteam($data){
        $validationRule = [
            "name" => "required",
            "career" => "required",
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }

    public function indirectDataforTeam($data){
        $indirectDataforTeam = [
            "name" => $data->name,
            "career" => $data->career,
        ];
        return $indirectDataforTeam;
    }

    public function uploadImageForTeam($data){
        if($data->hasFile("image")){
            $filename = uniqid(). $data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
        }
        return $filename;
    }

    //

/////////////////////////////////////////////////////
    public function validation($data){
        $id = Auth::user()->id;
        $validationRule = [
            "email" => "required|email|unique:users,email,".$id,
            "name" => "required|string|max:100|unique:users,name,".$id,
            "phnumber" => "required|string|max:100",
            "address" => "required|string|max:200",
            "gender" => "required|string|max:200",
            "image" => "required|file",
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }

    public function uploadImage($data,$id){
        if($data->hasFile("image")){

            $oldfile = User::where("id",$id)->first()->toArray();
            $oldimage = $oldfile["image"];
            if($oldimage !== null){
                Storage::delete("public/".$oldimage);
            }

            $filename = uniqid(). $data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
        }
        return $filename;
    }

        
}
