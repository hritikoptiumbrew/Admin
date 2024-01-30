<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Add your stylesheets or CDN links here -->
    <style>
        body {
            background-color: #333; /* Dark background color for the body */
            color: #fff; /* Text color for better contrast */
            font-family: 'Arial', sans-serif; /* Adjust the font family if needed */
        }
    </style>
</head>
<body>

@yield('content')

<!-- Add your scripts or CDN links here -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
