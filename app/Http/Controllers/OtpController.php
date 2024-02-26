<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendOtp(Request $request){
        $email  = $request->email;
        $otp =  rand(10000,99999);
    }
}
