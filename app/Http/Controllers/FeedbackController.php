<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    //add review
    public function review(Request $data){
        $this->validation($data);
        $insertdata = [
            "name" => $data->name,
            "email" => $data->email,
            "review" => $data->review,
            "product_id" => $data->product_id,
            "user_id" => $data->user_id,
        ];
        Feedback::create($insertdata);
        return back();
    }

    //validation
    public function validation($data){
        $validationRule = [
            "name" => "required",
            "email" => "required",
            "review" => "required",
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }
}
