<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $email  = $request->email;
        $otp =  rand(10000, 99999);
        // Store OTP in Redis with a 5-minute expiration
        Redis::setex("otp:$email", 300, $otp);
        // Send OTP by email
        Mail::to($email)->send(new OtpMail($otp));
        return response()->json([
            'message'=> 'OTP sent successfully'
        ]);
    }
}
