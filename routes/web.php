<?php


use App\Models\Type;
use App\Models\Product;
use App\Models\Category;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\ShippingMethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //admin
    Route::group(["prefix" => "admin","middleware" => "adminmiddleware"] , function(){
        //404 route 
        Route::fallback(function(){

        $message  = ChMessage::select("users.name","users.image as user_image","ch_messages.body","ch_messages.from_id as user_id","ch_messages.created_at")
        ->where("ch_messages.from_id","!=",Auth::user()->id)
        ->join("users","users.id","ch_messages.from_id")
        ->orderBy("ch_messages.created_at","desc")
        ->groupBy("ch_messages.from_id")
        ->paginate(4);

    
            return view("admin.home.404",compact("message"));
        });


        Route::get("home",[AdminController::class,"homePage"])->name("admin#homepage");
        //category 
        Route::get("category/createpage",[CategoryController::class,"createPage"])->name("admin#categorycreatepage");
        Route::post("category/create",[CategoryController::class , "createCategory"])->name("admin#createcategory");
        Route::get("category/delete/{id}",[CategoryController::class,"deleteCatgory"])->name("admin#deletecategory");
        //type
        Route::get("type/typepage",[TypeController::class , "typePage"])->name("admin#typepage");
        Route::get("type/createpage",[TypeController::class , "createtypePage"])->name("admin#createtypepage");
        Route::post("type/create",[TypeController::class , "createType"])->name("admin#createtype");
        Route::get("type/create/{id}",[TypeController::class , "deleteType"])->name("admin#deletetype");
        
        // product
        //iphone
        Route::get("product/iphoneproductpage",[ProductController::class,"iphoneProductPage"])->name("admin#iphoneproductpage");
        Route::get("product/createiphonepage",[ProductController::class,"createIphonePage"])->name("admin#createiphonepage");
        Route::post("product/createiphone",[ProductController::class,"createProduct"])->name("admin#createiphone");
        //macbook
        Route::get("product/macbookpage",[ProductController::class,"macbookpage"])->name("admin#macbookpage");
        Route::get("product/createmacbookpage",[ProductController::class,"createMacbookPage"])->name("admin#createmacbookpage");
        Route::post("product/createmacbook",[ProductController::class,"createProduct"])->name("admin#createmacbook");

        //over all update 
        Route::get("product/updatepage/{id}",[ProductController::class,"updatePage"])->name("admin#updatepage");
        Route::post("product/update",[ProductController::class,"update"])->name("admin#update");

        // watch 
        Route::get("product/watchpage",[ProductController::class,"watchPage"])->name("admin#watchpage");
        Route::get("product/createwatchpage",[ProductController::class,"createWatchPage"])->name("admin#createwatchpage");
        Route::post("product/createwatch",[ProductController::class,"createProduct"])->name("admin#createwatch");
        Route::get("product/deleteproduct/{id}",[ProductController::class,"deleteProduct"])->name("admin#deleteproduct");

        //ipad
         Route::get("product/ipadpage",[ProductController::class,"ipadPage"])->name("admin#ipadpage");
         Route::get("product/createipadpage",[ProductController::class,"creatIpadPage"])->name("admin#createipadpage");
         Route::post("product/createipad",[ProductController::class,"createProduct"])->name("admin#createipad");

         //account information
        Route::get("account",[AdminController::class,"accountPage"])->name("admin#accountpage");
        Route::post("updateaccount",[AdminController::class,"updateAcc"])->name("admin#updateaccount");

        //customer list
        Route::get("customerlist",[AdminController::class,"customerList"])->name("admin#customerlist");
        Route::get("deletecustomer/{id}",[AdminController::class,"deleteCustomer"])->name("admin#deletecustomer");
        Route::get("updaterole/{id}",[AdminController::class,"updateRole"])->name("admin#updaterole");
        Route::post("updating",[AdminController::class,"updating"])->name("admin#updating");

        //order list 
        Route::get("orderlist",[AdminController::class,"orderlist"])->name("admin#orderlistpage");
        Route::get("changestatus",[AjaxController::class,"changestatus"])->name("ajax#changestatus");

        // member 
        Route::get("member",[AdminController::class,"memberlist"])->name("admin#memberlist");
        Route::get("createmember",[AdminController::class,"createmember"])->name("admin#createmember");
        Route::post("createteammember",[AdminController::class,"createteam"])->name("admin#createteam");
        Route::get("deletemember/{id}",[AdminController::class,"deletemember"])->name("admin#deletemember");

        // orderstatus changing 
        Route::get('/orderstatus',[AdminController::class,"statusChange"])->name("admin#statuschange");


    });
    //customer
    Route::group(["prefix" => "customer","middleware" => "customermiddleware"] , function(){
        Route::fallback(function(){
            return view("customer.home.404");
        });
        Route::get("home",[CustomerController::class,"homePage"])->name("customer#homepage");

        // testing
        Route::get("datatesting",function(){
            $product = base64_encode(json_encode(Product::get()->toArray()));
            return view("test",compact("product"));
        });
        Route::post("datatesting",function(Request $request){
            dd(json_decode(base64_decode($request->data)));
        })->name("import");

        //category search 
        Route::get("search/category/{id}",[CustomerController::class,"searchCategory"])->name("customer#searchcategory");
        Route::get("search/all",[CustomerController::class,"searchAll"])->name("customer#searchall");
        Route::get("returncategorydata",[AjaxController::class,"returnCategory"])->name("ajax#returncategory");
        Route::get("allproducts",[CustomerController::class,"allProduct"])->name("customer#allproduct");

        //ajax
        Route::get("latestitem",[AjaxController::class,"LatestItem"])->name("ajax#latestitem");
        Route::get("addtocart",[AjaxController::class,"addtocart"])->name("ajax#addtocart");
        Route::get("addtowishlist",[AjaxController::class,"addtowishlist"])->name("ajax#addtowishlist");

        // single product 
        Route::get("singleproduct/{id}",[CustomerController::class,"singleProduct"])->name("customer#singleproduct");

        // cart 
        Route::get("cart",[CartController::class,"cartPage"])->name("customer#cartpage");

        //order list 
        Route::get("orderlist",[OrderListController::class,"OrderList"])->name("customer#orderlist");

        //shipping
        Route::get("shipping",[ShippingMethodController::class,"shipping"])->name("customer#shipping");
        //delete cart
        Route::get("deletecart",[CartController::class,"deletesinglecart"])->name("customer#deletesinglecart");
        Route::get("clearallcart",[CartController::class,"clearallcart"])->name("customer#clearallcart");

        // wishlist
        Route::get("wishlist",[WishListController::class,"wishListPage"])->name("customer#wishlist");
        Route::get("deletewishlist/{id}",[WishListController::class,"deleteWishList"])->name("customer#deletewishlist");
        Route::get("clearallwishlist",[WishListController::class,"clearAllWishList"])->name("customer#clearwishlist");

        //account information
        Route::get("account",[CustomerController::class,"accountInfoPage"])->name("customer#accountpage");
        Route::get("editaccountpage",[CustomerController::class,"editAccPage"])->name("customer#editaccpage");
        Route::post("updateaccount",[CustomerController::class,"updateAcc"])->name("customer#updateAcc");
        Route::get("changepasswordpage",[CustomerController::class,"changePassPage"])->name("customer#changepasswordpage");
        Route::post("updatepassword",[CustomerController::class,"updatePass"])->name("customer#updatepassword");
        Route::get("accountaddress",[CustomerController::class,"accountaddresspage"])->name("customer#accountaddresspage");
        Route::get("accountorder",[CustomerController::class,"accountorderpage"])->name("customer#accountorderpage");

        //about us for customer
        Route::get("aboutus",[AboutusController::class,"aboutusPage"])->name("customer#aboutuspage");

        // contact us page 
        Route::get("contactus",[ContactController::class,"contact"])->name("customer#contact");
        Route::post("contactdata",[ContactController::class,"contactData"])->name("customer#contactdata");

        // post method 
        Route::post("review",[FeedbackController::class,"review"])->name("customer#review");

        // testing 
        
        
        
    });
});
//authantication
Route::group(["middleware" => "authmiddleware"],function(){
    Route::redirect("/","loginpage");
    Route::get("registerpage",[AuthController::class,"registerPage"])->name("auth#registerpage");
    Route::get("loginpage",[AuthController::class,"loginPage"])->name("auth#loginpage");
    Route::get("redirect",[AuthController::class,"redirect"])->name("auth#redirect");
});
