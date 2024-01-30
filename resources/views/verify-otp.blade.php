@extends('layouts.app') <!-- Assuming you have a master layout, adjust as needed -->

@section('content')
    <style>
        .otp-verification-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #f0f0f0; /* Light gray background */
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .otp-verification-container:hover {
            background-color: #e2e6ea; /* Lighter background on hover */
        }

        .otp-title {
            text-align: center;
            color: black;
        }

        .otp-form {
            margin-top: 20px;
        }

        .otp-input {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .verify-btn,
        .new-otp-btn {
            background-color: #007bff;
            color: #fff;
            padding: 15px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin-top: 20px;
        }

        .verify-btn:hover,
        .new-otp-btn:hover {
            background-color: #0056b3;
        }

        .timer-container {
            text-align: center;
            margin-top: 20px;
        }

        .timer {
            font-size: 18px;
            color: #333;
            display: inline-block;
            padding: 8px 16px;
            background-color: #1a202c;
            color: #fff;
            border-radius: 6px;
            margin-top: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease-in-out;
        }

        .timer:hover {
            background-color: #0056b3;
        }

        .timer-fade {
            animation: fadeTimer 0.5s ease-in-out;
        }

        @keyframes fadeTimer {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @error('otp')
    <div class="alert alert-danger">{{ $message }}</div>
    <div class="card text-white bg-danger mb-3" id="errorCard" style="max-width: 18rem; display: none;">
        <div class="card-header">Error</div>
        <div class="card-body">
            <h5 class="card-title">Time is up!</h5>
            <p class="card-text">Please request a new OTP.</p>
            <button type="button" class="btn btn-primary" onclick="requestNewOTP()">Request New OTP</button>
        </div>
    </div>
    @enderror

    <div class="otp-verification-container">
        <h2 class="otp-title">OTP Verification</h2>

        <div class="timer-container">
            <p class="timer timer-fade" id="timer">Timer: 2:00</p>
        </div>

        <form method="post" action="{{ route('verify.otp', ['email' => $user->email]) }}" class="otp-form">
            @csrf
            <input type="hidden" name="email" value="{{ $user->email }}">
            <label for="otp" style="color: #1a202c">Enter OTP:</label>
            <input type="text" id="otp" name="otp" required class="otp-input">
            <button type="submit" class="verify-btn">Verify OTP</button>
        </form>

        <form method="post" action="{{ route('generate.otp', ['email' => $user->email]) }}" onsubmit="requestNewOTP(); return false;">
            @csrf
            <button type="submit" class="new-otp-btn">Request New OTP</button>
        </form>


        <!-- Add this HTML for the Bootstrap card -->


    </div>
    </div>

    <script>
        // JavaScript for the countdown timer
        let timeLeft = 120; // 2 minutes in seconds
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `Timer: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        function countdown() {
            if (timeLeft > 0) {
                timeLeft--;
                updateTimer();
            } else {
                // Handle timeout, for example, redirect to a timeout page or disable the form
                errorCard.style.display = 'block';
                // You may redirect or perform other actions here
            }
        }

        // Update the timer every second
        setInterval(countdown, 1000);

        // Function to request a new OTP
        function requestNewOTP() {
            fetch('{{ route('generate.otp', ['email' => $user->email]) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // You may include additional headers as needed
                },
            })
                .then(response => response.json())
                .then(data => {
                    console.log('New OTP requested!', data);

                    // You may reset the timer or perform other UI updates here
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Handle errors, display error message, etc.
                });
        }
    </script>
@endsection
