<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification OTP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            overflow: hidden;
        }

        h1 {
            color: #e44d26;
            margin-bottom: 10px;
        }

        p {
            color: #333;
            margin-bottom: 20px;
        }

        strong {
            display: inline-block;
            color: #e44d26;
            font-size: 1.5em;
            padding: 8px 12px;
            background-color: #fff;
            border: 2px solid #e44d26;
            border-radius: 6px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        strong:hover {
            background-color: #e44d26;
            color: #fff;
        }

        @keyframes highlight {
            0% { background-color: #e44d26; }
            50% { background-color: #fff; }
            100% { background-color: #e44d26; }
        }

        .highlight {
            animation: highlight 2s infinite;
        }

        /* Additional Styles for Card Effect */
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="container">
        <h1>Email Verification OTP</h1>
        <p>Your OTP for email verification is: <strong class="highlight">{{ $otp }}</strong></p>
        <p>Please use this OTP to verify your email address.</p>
    </div>
</div>
</body>
</html>
