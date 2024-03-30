<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    public function helper(){
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->paginate(8);
        $categories = Category::paginate();
        $wishlistdata = WishList::select("wish_lists.*","products.name as product_name","products.price as product_price","products.image as product_image","categories.name as category_name","products.id as product_id")
        ->join("products","wish_lists.product_id","products.id")
        ->where("wish_lists.user_id",Auth::user()->id)
        ->join("categories","products.category_id","categories.id")
        ->paginate(4);



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
            "cartdata" => $cartdata,
            "categories" => $categories,
            "wishlistdata" => $wishlistdata,
            "data" => $data,
            "iphonedata" => $iphonedata,
            "macbookdata" => $macbookdata,
            "iwatchdata" => $iwatchdata,
            "ipaddata" => $ipaddata,
        ];
    }
    //wishpage 
    public function wishListPage(){
        $alldata = $this->helper();
        $cartdata = $alldata['cartdata'];
        $categories = $alldata['categories'];
        $wishlistdata = $alldata['wishlistdata'];
        $data = $alldata['data'];
        //sud product data
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        return view("customer.wishlist.wishlist",compact("cartdata","categories","wishlistdata","data","iphonedata","macbookdata","iwatchdata","ipaddata") );
    }

    //deelte wishlist
    public function deleteWishList($id){
        WishList::where("id",$id)->delete();
        $alldata = $this->helper();
        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        $cartdata = $alldata['cartdata'];
        $categories = $alldata['categories'];
        $wishlistdata = $alldata['wishlistdata'];
        return view("customer.wishlist.wishlist",compact("cartdata","categories","wishlistdata","data","iphonedata","macbookdata","iwatchdata","ipaddata"));
    }

    //clear all wishlist
    public function clearAllWishList(Request $data){
        if($data->status === "allclear"){
            WishList::where("user_id",Auth::user()->id)->delete();
            return ["status" => "done"];
        }
    }
}
