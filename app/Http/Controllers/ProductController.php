<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Product;
use App\Models\Category;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    //helper

    public function helper(){
        $message  = ChMessage::select("users.name","users.image as user_image","ch_messages.body","ch_messages.from_id as user_id","ch_messages.created_at")
        ->where("ch_messages.from_id","!=",Auth::user()->id)
        ->join("users","users.id","ch_messages.from_id")
        ->orderBy("ch_messages.created_at","desc")
        ->groupBy("ch_messages.from_id")
        ->paginate(4);
        return ["message" => $message];

    }
   
    //i phone
    public function iphoneProductPage(){
        $searchVal = request("searchval");
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","iphone")
        ->when($searchVal,function($table,$searchVal){
            $table->where("products.name","like","%{$searchVal}%")
            ->paginate(5);

        })
        ->orderBy("created_at","desc")
        ->paginate(5);
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.iphone.iphone",compact("data","message"));
    }
    //to create page 
    public function createIphonePage(){
        $alldata = $this->helper();
        $message  = $alldata["message"];
        $categories = Category::paginate();
        $types = Type::paginate();
        return view("admin.product.iphone.create",compact("categories","types","message"));
    }
    // mavbook page 
    public function macbookpage(){
        $searchVal = request("searchval");
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","macbook")
        ->when($searchVal,function($table,$searchVal){
            $table->where("products.name","like","%{$searchVal}%")
            ->paginate(5);

        })
        ->orderBy("created_at","desc")
        ->paginate(5);
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.macbook.macbook",compact("data","message"));
    }

    //to create macbook page 
    public function createMacbookPage(){
        $categories = Category::paginate();
        $types = Type::paginate();
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.macbook.create",compact("categories","types","message"));
    }

    //to watch page 
    public function watchPage(){
        $searchVal = request("searchval");
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","watch")
        ->when($searchVal,function($table,$searchVal){
            $table->where("products.name","like","%{$searchVal}%")
            ->paginate(5);

        })
        ->orderBy("created_at","desc")
        ->paginate(5);
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.watch.watch",compact("data","message"));
    }

    //to create watch page 
    public function createWatchPage(){
        $categories = Category::paginate();
        $types = Type::paginate();
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.watch.create",compact("categories","types","message"));
    }

    //ipad page 
    public function ipadPage(){
        $searchVal = request("searchval");
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","ipad")
        ->when($searchVal,function($table,$searchVal){
            $table->where("products.name","like","%{$searchVal}%")
            ->paginate(5);

        })
        ->orderBy("created_at","desc")
        ->paginate(5);
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.ipad.ipad",compact("data","message"));
    }

    //create ipad page 
    public function creatIpadPage(){
        $categories = Category::paginate();
        $types = Type::paginate();
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.ipad.create",compact("categories","types","message"));
    }

    //create product (can commonly use)
    public function createProduct(Request $data){
        //validation
        $this->validation($data);
        $finalData = $this->indirectData($data);
        Product::create($finalData);
        if($finalData['category_id'] === '1'){
            return redirect()->route('admin#iphoneproductpage');
            }
            if($finalData['category_id'] === '2'){
                return redirect()->route('admin#macbookpage');
            }
            if($finalData['category_id'] === '3'){
                return redirect()->route('admin#ipadpage');
            }
            if($finalData['category_id'] === '4'){
                return redirect()->route('admin#watchpage');
            }
            return "success";
            return redirect()->route('admin#homepage');
    }

    //helper function

    public function validation($data){
        $validationRules = [
            "name" => "required|max:100|string|",
            "category_id" => "required",
            "type_id" => "required",
            "specification" => "required|max:300|string|",
            "description" => "required|max:300|string|",
            "price" => "required",
        ];
        Validator::make($data->all(),$validationRules)->validate();
    }
    public function indirectData($data){
        $indirectData  =  [
            "name" => $data->name,
            "category_id" => $data->category_id,
            "type_id" => $data->type_id,
            "specification" => $data->specification,
            "description" => $data->description,
            "price" => $data->price,
        ];
        return $indirectData;
    }

    //upload the image 
    public function uploadImage($data){
        if($data->hasFile("image")){
            $filename = uniqid().$data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
        }
        return $filename;
    }

    public function deleteProduct($id){
        $data = Product::where("id",$id)->first()->toArray();
        $image = $data["image"];
        if($image !== null){
            Storage::delete("public/".$image);
        }
        Product::where("id",$id)->delete();
        return back();
    }

    //update the product page 
    public function updatePage($id){
        $categories = Category::paginate();
        $types = Type::paginate();
        $data = Product::where("id",$id)->first()->toArray();
        $alldata = $this->helper();
        $message  = $alldata["message"];
        return view("admin.product.update.update",compact("data","categories","types","message"));
    }

    //update 
    public function update(Request $data){
        $id = $data->idforupdate;
        //validation
        $this->validation($data);
        $finalData = $this->indirectData($data);
        if($data->hasFile("image")){
            $oldfile = Product::where("id",$id)->first()->toArray();
            $oldimage = $oldfile["image"];
            if($oldimage !== null){
                Storage::delete("public/".$oldimage);
            }
            $filename = uniqid().$data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
            $finalData["image"] = $filename;
            Product::where("id",$id)->update($finalData);
            return redirect()->route('admin#homepage');
            
        }
            Product::where("id",$id)->update($finalData);
            return redirect()->route('admin#homepage');
    }

}
