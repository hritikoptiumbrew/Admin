<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Correct import statement
use App\Mail\OtpMail;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $otp = Str::random(6, '1234567890');
        Mail::to($user->email)->send(new OtpMail($otp));

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|unique:users|max:100|email',
            'password' => 'required|string|min:8|max:100|confirmed',
            'role' => 'required|in:admin,user,moderator', // Ensure role is one of the specified values

        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


// Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => null,
            'otp' => $otp,'otp_created_at' => now(), // Set current timestamp
        ]);



        return redirect()->route('verify.otp', ['email' => $user->email])
            ->with('message', 'Registration successful. Please verify your email.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Generate and store OTP in the user model
            $otp = $this->generateOtp();
            $user->otp = $otp;
            $user->save();

            // Send OTP via email
            Mail::to($user->email)->send(new OtpMail($otp));

            // Redirect to OTP verification page
            return redirect()->route('verify.otp', ['email' => $user->email]);
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    private function generateOtp()
    {
        return strval(rand(100000, 999999));
    }










    //--------------------------------------------------------------------------------------------------------//


    // UserController.php

    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|unique:users|max:100|email',
            'password' => 'required|string|min:8|max:100',
            'role' => 'required|in:admin,user,moderator',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create($request->all());
        return response()->json(['user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|max:100|email',
            'password' => 'required|string|min:8|max:100',
            'role' => 'required|in:admin,user,moderator',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->update($request->all());
        return response()->json(['user' => $user], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }


}

