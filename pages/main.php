<?php


require_once ('../vendor/autoload.php');

use App\Auth;
use App\Sesh;

$authObj = new Auth();
$seshObj = new Sesh();



$authObj->reDirectToLogin();
$seshObj->logout();



//echo "<pre>";
//var_dump($_SESSION['UserID']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to BookNest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            background: #ffffff;
            color: #3e3e3e;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        header {
            background-color: #5f4b8b;
            padding: 16px 40px;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-family: 'Merriweather', serif;
            font-size: 26px;
        }

        nav {
            display: flex;
            gap: 10px;
            background-color: #4e3c75;
            padding: 8px 16px;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.2s;
        }

        nav a:hover {
            background-color: #6d59a5;
            transform: translateY(-2px);
        }

        .hero {
            background-color: #f3eaff;
            padding: 60px 40px;
            text-align: center;
            border-bottom: 2px solid #d1c4e9;
        }

        .hero h2 {
            font-family: 'Merriweather', serif;
            font-size: 38px;
            margin-bottom: 20px;
            color: #4a3f6c;
        }

        .hero p {
            font-size: 18px;
            color: #6e5c8c;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }

        .card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(95, 75, 139, 0.1);
            border-left: 5px solid #9575cd;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            font-family: 'Merriweather', serif;
            margin-bottom: 10px;
            color: #5f4b8b;
        }

        .card p {
            color: #6e5c8c;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #5f4b8b;
            color: #ffffff;
        }
    </style>
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/LBMS/pages/layout/navbar.php'; ?>

<main>
    <section class="hero">
        <h2>Welcome Back to BookNest</h2>
        <p>Discover new books, manage your collection, and enjoy reading!</p>
    </section>

    <section class="features">
        <div class="card">
            <h3>Explore Catalog</h3>
            <p>Browse thousands of books by category, author, or title.</p>
        </div>
        <div class="card">
            <h3>My Borrowed Books</h3>
            <p>Track what you've borrowed and when it's due back.</p>
        </div>
        <div class="card">
            <h3>Wishlist</h3>
            <p>Save titles you want to read later in one place.</p>
        </div>
        <div class="card">
            <h3>Recommendations</h3>
            <p>Get suggestions based on your reading history and interests.</p>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2025 BookNest Library. All rights reserved.</p>
</footer>


</body>
</html>
