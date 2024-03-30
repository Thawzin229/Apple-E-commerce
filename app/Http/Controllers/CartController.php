<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    //helper functions
    public function helper(){
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->paginate(8);

        $iphonedata  = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","iphone")
        ->paginate(8);
        $macbookdata  = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","macbook")
        ->paginate(8);
        $iwatchdata  = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","watch")
        ->paginate(8);
        $ipaddata  = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("categories.name","ipad")
        ->paginate(8);
        
        return [
            "data" => $data,
            "iphonedata" => $iphonedata,
            "macbookdata" => $macbookdata,
            "iwatchdata" => $iwatchdata,
            "ipaddata" => $ipaddata,
        ];
    }
    //cart page 
    public function cartPage(){
        $alldata = $this->helper();
        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];

        $categories = Category::paginate();
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image","products.id as product_id")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->orderby("carts.created_at","desc")
        ->where("carts.user_id",Auth::user()->id)
        ->paginate();
        $totalprice  = $this->totalPirce($cartdata);
        return view("customer.cart.cart",compact("categories","cartdata","totalprice","data","iphonedata","macbookdata","iwatchdata","ipaddata"));
    }

    public function totalPirce($cartdata){
        $totolprice = 0;
        foreach($cartdata as $item){
            $totolprice += $item["totalprice"];
        }
        return $totolprice;
    }

    //delete single cart
    public function deletesinglecart(Request $data){
        Cart::where("id",$data->id)->delete();
        return ["status" => "deleted"];
    }

    //clear all cart
    public function clearallcart(Request $data){
        if($data->all  === "allclear"){
            Cart::where("user_id",Auth::user()->id)->delete();
            return ["status" => "all clear"];
        }
    }
}
