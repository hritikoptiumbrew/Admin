<!-- resources/views/login.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout, adjust as needed -->

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <style>
            /* Styles remain unchanged */
            .login-container {
                max-width: 400px;
                margin: 50px auto; /* Added space at the top and bottom */
                background-color: #f0f0f0; /* Light gray background */
                padding: 60px; /* Padding without right padding */
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Slight box shadow for depth */
                transition: background-color 0.3s ease;
            }

            .login-container:hover {
                background-color: #e2e6ea; /* Lighter background on hover */
            }

            .login-title {
                text-align: center;
                color: #333;
            }

            .login-form {
                margin-top: 20px;
            }

            .form-group {
                margin-bottom: 20px; /* Added more space between form groups */
            }

            .form-control {
                width: 100%;
                padding: 15px; /* Increased padding for larger input fields */
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 6px;
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
                padding: 15px 25px; /* Increased padding for larger button */
                border: none;
                border-radius: 6px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .error-message {
                color: #dc3545; /* Red color for error messages */
                margin-top: 5px; /* Adjust as needed */
            }
        </style>

        <div class="login-container">
            <h2 class="login-title">User Login</h2>

            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form method="post" action="{{ route('login') }}" class="login-form">
                @csrf <!-- CSRF protection -->

                <div class="form-group">
                    <label for="email" style="color: #1a202c">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" style="color: #1a202c">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
