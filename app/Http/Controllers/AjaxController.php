<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\WishList;
use App\Models\OrderList;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //lastest item

    public function LatestItem(Request $val){
        if($val->val === "latest"){
            $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
            ->join("categories","products.category_id","categories.id")
            ->join("types","products.type_id","types.id")
            ->orderby("created_at","desc")
            ->get()->toArray();
            return ["data" => $data];
        }

        if($val->val === "lowestprice"){
            $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
            ->join("categories","products.category_id","categories.id")
            ->join("types","products.type_id","types.id")
            ->orderby("products.price","asc")
            ->get()->toArray();
            return ["data" => $data];
        }


        if($val->val === "highestprice"){
            $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
            ->join("categories","products.category_id","categories.id")
            ->join("types","products.type_id","types.id")
            ->orderby("products.price","desc")
            ->get()->toArray();
            return ["data" => $data];
        }
    }


    //return the category data
    public function returnCategory(Request $id){
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("products.category_id",$id->id)
        ->get()->toArray();

        return $data;
    }

    //add to cart 
    public function addtocart(Request $data){
        Cart::create([
            "user_id" => $data->user_id,
            "product_id" => $data->product_id,
            "quantity" => $data->quantity,
            "totalprice" => $data->totalprice
        ]);
        // ***** product reducing  *****
        // $product_count = Product::where("id",$data->product_id)->first()->stock_count;
        // $current_count = $product_count - $data->quantity;
        // Product::where("id",$data->product_id)->update(['stock_count'=>$current_count]);


        return ["status" => "added"];
    }

    //add to wishlist
    public function addtowishlist(Request $data){
        WishList::create([
            "user_id" => $data->user_id,
            "product_id" => $data->product_id,
        ]);
        return ["status" => "added"];
    }

    //change order status
    public function changestatus(Request $data){
        OrderList::where("id",$data->id)->update(["status"=>$data->status]);
        return ["status" => "success"];
    }
}
