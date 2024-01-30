<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string', // Adjust validation rules as needed
        ]);

        $user = User::where('email', $request->email)->first();

        $otpExpiryDuration = 2;
        if ($user->otp === $request->otp &&
            now()->diffInMinutes($user->otp_created_at) <= $otpExpiryDuration
        ) {
            $user->update(['verified' => true]);
            return redirect()->route('dashboard')->with('message', 'Registration successful!');
        } else {
            // Invalid OTP or expired
            // Handle accordingly
            return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

    }


    public function generateOtp(Request $request)
    {
        // Your logic to generate a new OTP

        $newOtp = strval(rand(100000, 999999));// Replace this with your actual logic to generate OTP

        return response()->json(['otp' => $newOtp]);
    }





    public function showVerificationForm($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            abort(404); // Handle the case where the user is not found
        }

        return view('verify-otp', compact('user'));
    }

}
