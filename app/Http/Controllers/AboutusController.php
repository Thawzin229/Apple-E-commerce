<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Aboutus;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Auth;

class AboutusController extends Controller
{
    public function helper()
    {
        $data = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->paginate(8);
        $categories = Category::paginate();
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);

        $orderdata = Order::where("user_id",Auth::user()->id)->paginate();
        $shippingdata = ShippingMethod::select("shipping_methods.*","users.name as user_name")
        ->join("users","users.id","shipping_methods.user_id")
        ->where("user_id",Auth::user()->id)->paginate();

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

        $ordelistdata = OrderList::select("order_lists.*","products.name as product_name","products.image as product_image")
        ->join("products","order_lists.product_id","products.id")
        ->where("order_lists.user_id",Auth::user()->id)
        ->paginate(3);

        $teamdata = Aboutus::paginate();
        $feedbackdata = Feedback::paginate(4);
        
        return [
            "data" => $data,
            "categories" => $categories,
            "cartdata" => $cartdata,
            "iphonedata" => $iphonedata,
            "macbookdata" => $macbookdata,
            "iwatchdata" => $iwatchdata,
            "ipaddata" => $ipaddata,
            "orderdata" => $orderdata,
            "shippingdata" => $shippingdata,
            "orderlistdata" => $ordelistdata,
            "teamdata" => $teamdata,
            "feedbackdata" => $feedbackdata
        ];
    }
    //about us page 
    public function aboutusPage(){
        $alldata = $this->helper();

        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        $categories = $alldata['categories'];
        $cartdata = $alldata['cartdata'];
        $orderdata = $alldata['orderdata'];
        $shippingdata = $alldata['shippingdata'];
        $teamdata = $alldata['teamdata'];
        $feedbackdata = $alldata['feedbackdata'];
        return view("customer.aboutus.aboutus",compact("categories","cartdata","data","iphonedata","macbookdata","iwatchdata","ipaddata","teamdata","feedbackdata"));
    }
}
