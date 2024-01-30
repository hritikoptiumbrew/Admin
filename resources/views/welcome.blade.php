<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role-Based</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a202c;
            color: #fff;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        main {
            padding: 1rem;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .product-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-sizing: border-box;
            background-color: #f0f0f0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        .product-title {
            font-size: 1.2rem;
            margin: 0.5rem 0;
            color: #333;
        }

        .product-price {
            color: #e44d26;
            font-weight: bold;
        }

        .button-container {
            text-align: center;
            margin-top: 1rem;
        }

        .button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            margin: 0.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .login-button {
            background-color: #333;
            color: #fff;
        }

        .signup-button {
            background-color: #e44d26;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <h1>Role-Based</h1>
</header>

<main>
    <div class="product-container">
        <!-- Product 1 -->
        <div class="product-card">
            <img class="product-image" src="https://picsum.photos/250/150" alt="Product 1">
            <h2 class="product-title">Product 1</h2>
            <p class="product-price">$19.99</p>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <img class="product-image" src="https://picsum.photos/250/154" alt="Product 2">
            <h2 class="product-title">Product 2</h2>
            <p class="product-price">$29.99</p>
        </div>

        <!-- Add more product cards as needed -->
    </div>

    <div class="button-container">
        <button class="button login-button"><a href="{{ route('login') }}" >Login</a></button>
        <button class="button signup-button"><a href="{{ route('register') }}" >Sign Up</a></button>
    </div>
</main>

</body>
</html>
