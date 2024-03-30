<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingMethod;

class ShippingMethodController extends Controller
{
    //
    public function shipping(Request $data){
        ShippingMethod::create([
            "user_id" => $data->user_id,
            "order_code" => $data->order_code,
            "email" => $data->email,
            "phnumber"=> $data->phnumber,
            "country" => $data->country,
            "province" =>$data->province,
            "order_note" => $data->ordernote,
            "payment_method" => $data->payment
        ]);
    }

}
