<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\WishList;
use App\Models\OrderList;
use App\Models\Viewcount;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //helper functtion
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

        $feedbackdata = Feedback::paginate(4);

        $trendingdata = Viewcount::select("viewcounts.*","products.*","categories.name as category_name",DB::raw("COUNT('viewcounts.product_id') as count"))
        ->join("products","viewcounts.product_id","products.id")
        ->groupBy("viewcounts.product_id")
        ->join("categories","products.category_id","categories.id")
        ->take(4)
        ->get()->toArray();

        $recentproductdata = Product::select("products.*","categories.name as category_name")
        ->join("categories","categories.id","products.category_id")
        ->orderBy("products.created_at","desc")
        ->paginate(4);

        $highpricedata = Product::select("products.*","categories.name as category_name")
        ->join("categories","categories.id","products.category_id")
        ->orderBy("products.price","desc")
        ->paginate(4);




    

        
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
            "feedbackdata" => $feedbackdata,
            "trendingdata" => $trendingdata,
            "recentproductdata" => $recentproductdata,
            "highpricedata"  => $highpricedata,
        ];
    }
    //to home page 
    public function homePage(){
        $ComData = $this->helper();
        $data = $ComData['data'];
        $categories = $ComData['categories'];
        $cartdata = $ComData['cartdata'];
        //sud product data
        $iphonedata = $ComData['iphonedata'];
        $macbookdata = $ComData['macbookdata'];
        $iwatchdata = $ComData['iwatchdata'];
        $ipaddata = $ComData['ipaddata'];
        $feedbackdata = $ComData["feedbackdata"];
        $trendingdata  =$ComData["trendingdata"];
        $recentproductdata = $ComData["recentproductdata"];
        $highpricedata = $ComData["highpricedata"];
        $productData = Product::query()
        ->select("products.name",'products.created_at')
        ->addSelect(["category_name" => Category::select("name")->whereColumn("id",'products.category_id')->take(1)])
        ->addSelect(["type_name" => Type::select("name")->whereColumn("id",'products.type_id')->take(1)])
        ->get()->toArray();
        $orderstatus = OrderList::query()
        ->selectRaw("count(case when status = 1 then 1 end) as pending")
        ->selectRaw("count(case when status = 2 then 1 end) as delivered")
        ->selectRaw("count(case when status = 3 then 1 end) as rejected")
        ->first()->toArray();
        return view("customer.home.home",compact("data","categories","cartdata","iphonedata","macbookdata","iwatchdata","ipaddata","feedbackdata","trendingdata","recentproductdata","highpricedata"));
    }

    //search by category 
    public function searchCategory($id){
        $alldata = $this->helper();
        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];


        $productdata = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("products.category_id",$id)
        ->paginate(6);
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);
        $categories = Category::paginate();
        return view("customer.categorylist.home",compact("productdata","categories","cartdata","data","iphonedata","macbookdata","iwatchdata","ipaddata"));
    }

    //search global

    public function searchAll(){

        $alldata = $this->helper();
        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];


        $searchval = request("searchval");
        $productdata = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->when($searchval,function($table,$searchval){
            $table->where("products.name","like","%{$searchval}%")->paginate(6);
        })
        ->paginate(6);
        $categories = Category::paginate();
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);
        return view("customer.categorylist.home",compact("productdata","categories","cartdata","data","iphonedata","macbookdata","iwatchdata","ipaddata"));
    }

    //product page 
    public function allProduct(){
        $alldata = $this->helper();
        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];

        $productdata = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->paginate(6);
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);
        $categories = Category::paginate();
        return view("customer.categorylist.home",compact("categories","productdata","cartdata","data","iphonedata","macbookdata","iwatchdata","ipaddata"));
    }

    //single product page
    public function singleProduct($id){
        $alldata = $this->helper();

        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        Viewcount::create([
            "user_id" => Auth::user()->id,
            "product_id" => $id
        ]);
        $singledata = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->where("products.id",$id)
        ->first()->toArray();
        $overalldata  = Product::select("products.*","categories.name as category_name","types.name as type_name")
        ->join("categories","products.category_id","categories.id")
        ->join("types","products.type_id","types.id")
        ->orderBy("products.created_at","desc")
        ->get()->toArray();
        $cartdata = Cart::select("carts.*","products.name as product_name","products.price as product_price","categories.name as category_name","products.image as product_image")
        ->join("products","carts.product_id","products.id")
        ->join("categories","products.category_id","categories.id")
        ->where("carts.user_id",Auth::user()->id)
        ->orderby("carts.created_at","desc")
        ->paginate(4);
        $viewcount = Viewcount::where("product_id",$id)->paginate();
        $wishlistcount = WishList::where("product_id",$id)->paginate();
        $reviewdata = Feedback::where("product_id",$id)->orderBy("created_at","desc")->paginate(10);
        $categories = Category::paginate();
        return view("customer.singleproduct.product",compact("categories","singledata","viewcount","wishlistcount","cartdata","overalldata","data","iphonedata","macbookdata","iwatchdata","ipaddata","reviewdata"));
    }
    
    //account information page
    public function accountInfoPage(){
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


        return view("customer.account.account",compact("data","cartdata","categories","iphonedata","macbookdata","iwatchdata","ipaddata","orderdata","shippingdata"));
    }

    //edit account page 
    public function editAccPage(){
        $alldata = $this->helper();

        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        $orderdata = $alldata["orderdata"];
        $categories = $alldata['categories'];
        $cartdata = $alldata['cartdata'];
        return view("customer.account.accountedit",compact("data","categories","cartdata","iphonedata","macbookdata","iwatchdata","ipaddata","orderdata"));
    }

    // update account information
    public function updateAcc(Request $data){
        $id = Auth::user()->id;
        $this->validation($data,$id);
        $finaldata = $this->indirectdata($data);
        if($data->hasFile("image")){
            $oldfile = User::where("id",$id)->first()->toArray();
            $oldimage = $oldfile['image'];
            if($oldimage !== null){
                Storage::delete("public/".$oldimage);
            }
            $filename = uniqid().$data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
        }
        $finaldata["image"] = $filename;
        User::where("id",$id)->update($finaldata);
        return redirect()->route("customer#editaccpage");
    }

    //chnge password page
    public function changePassPage(){
        $alldata = $this->helper();

        $data = $alldata['data'];
        $iphonedata = $alldata['iphonedata'];
        $macbookdata = $alldata['macbookdata'];
        $iwatchdata = $alldata['iwatchdata'];
        $ipaddata = $alldata['ipaddata'];
        $categories = $alldata['categories'];
        $cartdata = $alldata['cartdata'];
        $orderdata = $alldata['orderdata'];
        return view("customer.account.password",compact("data","categories","cartdata","iphonedata","macbookdata","iwatchdata","ipaddata","orderdata"));
    }

    //update password
    public function updatePass(Request $data){
        $oldpassword = $data->oldpassword;
        $newpassword = $data->newpassword;
        $id = Auth::user()->id;
        $this->validationForPass($data);
        $user = User::where("id",$id)->first()->toArray();
        $Dbpassword = $user['password'];

        if(Hash::check($oldpassword,$Dbpassword)){
            User::where("id",$id)->update(["password" => Hash::make($newpassword)]);
            return redirect()->route("customer#changepasswordpage")->with(["status" => "Passwords have changed"]);

        }else{
            return redirect()->route("customer#changepasswordpage")->with(["error" => "invalid password!"]);
        }
    }

    //account address page 
    public function accountaddresspage(){
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

        return view("customer.account.account-address",compact("data","cartdata","categories","iphonedata","macbookdata","iwatchdata","ipaddata","orderdata","shippingdata"));
    }

    //acouunt order page
    public function accountorderpage(){
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
        $orderlistdata = $alldata["orderlistdata"];

        return view("customer.account.account-order",compact("data","cartdata","categories","iphonedata","macbookdata","iwatchdata","ipaddata","orderdata","shippingdata","orderlistdata"));

    }

    //validation for password
    public function validationForPass($data){
        $validationRule = [
            "oldpassword" => "required",
            "newpassword" => ["required","min:8","regex:/[A-Z]/","regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/","string"],
                        ];
        $validationText = ['newpassword.regex' => "password must be like Aa12#"];

        Validator::make($data->all(),$validationRule,$validationText)->validate();
    }

    // validation
    public function validation($data,$id){
        $validationRule = [
            "name" => "required|min:4|max:20",
            "email" => "required|email|unique:users,email,".$id,
            "gender" => "required",
            "address" => "required|max:50",
            "phnumber" => "required",
            "image" => "required"
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }

    public function indirectdata($data){
        $indirectData  = [
            "name" => $data->name,
            "email" => $data->email,
            "gender" => $data->gender,
            "address" => $data->address,
            "phnumber" => $data->phnumber,
        ];

        return $indirectData;
    }
    ////404 page 
        // 404
        public function customer404(){
        $ComData = $this->helper();
        $data = $ComData['data'];
        $categories = $ComData['categories'];
        $cartdata = $ComData['cartdata'];
        //sud product data
        $iphonedata = $ComData['iphonedata'];
        $macbookdata = $ComData['macbookdata'];
        $iwatchdata = $ComData['iwatchdata'];
        $ipaddata = $ComData['ipaddata'];
        $feedbackdata = $ComData["feedbackdata"];
        $trendingdata  =$ComData["trendingdata"];
        $recentproductdata = $ComData["recentproductdata"];
        $highpricedata = $ComData["highpricedata"];
        return view("customer.home.404",compact("data","categories","cartdata","iphonedata","macbookdata","iwatchdata","ipaddata","feedbackdata","trendingdata","recentproductdata","highpricedata"));
        }

}
