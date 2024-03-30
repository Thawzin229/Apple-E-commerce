<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    //order list 
    public function OrderList(Request $data){
        $finalTotalPrice = 0;
        foreach($data->all() as $item){
            $orderdata = OrderList::create([
                "user_id" => $item["user_id"],
                "product_id" => $item["product_id"],
                "quantity" => $item["quantity"],
                "totalprice" => $item["totalprice"],
                "order_code" => $item["order_code"],
            ]);
            $finalTotalPrice += $item['totalprice'];
        }

        //put  the dat into order table
        Order::create([
            "user_id" => $orderdata->user_id,
            "order_code" => $orderdata->order_code,
            "totalprice" => $finalTotalPrice + 1000,
        ]);

        //clear the cart table 
        Cart::where("user_id",Auth::user()->id)->delete();



    }

 
}
