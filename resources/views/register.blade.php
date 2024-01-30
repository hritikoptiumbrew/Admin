<!-- resources/views/register.blade.php -->

@extends('layouts.app') <!-- Assuming you have a master layout, adjust as needed -->

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <style>
            .registration-container {
                max-width: 400px;
                margin: 50px auto; /* Added space at the top and bottom */
                background-color: #f0f0f0; /* Light gray background */
                padding: 60px; /* Padding without right padding */
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Slight box shadow for depth */
                transition: background-color 0.3s ease;
            }

            .registration-container:hover {
                background-color: #e2e6ea; /* Lighter background on hover */
            }

            .registration-title {
                text-align: center;
                color: #333;
            }

            .registration-form {
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

            <div class="registration-container">
                <h2 class="registration-title">User Registration</h2>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('register') }}" class="registration-form">
                    @csrf <!-- CSRF protection -->

                    <div class="form-group">
                        <label for="name" style="color: #1a202c">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

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

                    <div class="form-group">
                        <label for="password_confirmation" style="color: #1a202c">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role" style="color: #1a202c">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="moderator">Moderator</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
    </div>
@endsection
