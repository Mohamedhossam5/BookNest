<?php


require_once ('../vendor/autoload.php');

use App\Auth;
use App\CRUD;
use App\DB;
use App\Sesh;

$seshObj = new Sesh();
$authObj = new Auth();
$crudObj = new CRUD();


$authObj->reDirectToLogin();
$seshObj->logOut();
//$crudObj->AddBook();


$BookID = $_GET['BookID'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBtn'])) {
    $crudObj->UpdateBook($BookID);
}

$booksArr = $crudObj->GetBookByID($BookID);
?>


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Your Books | BookNest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #ffffff;
            color: #3e3e3e;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 70px;
        }

        header {
            background-color: #5f4b8b;
            padding: 16px 40px;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
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

        main {
            flex: 1;
            padding: 40px;
        }

        .form-container {
            background-color: #f3eaff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(95, 75, 139, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h2 {
            font-family: 'Merriweather', serif;
            color: #4a3f6c;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a3f6c;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #5f4b8b;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #6d59a5;
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
<header>
    <h1>BookNest</h1>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/LBMS/pages/layout/navbar.php';?>


</header>

<main>
    <div class="form-container">
        <h2>Update Your Book</h2>
        <form action="" method="post">
            <label for="title">Title</label>
            <input value="<?php echo $booksArr['Title']?>" type="text" id="title" name="title" required />

            <label for="price">Price</label>
            <input value="<?php echo $booksArr['Price']?>" type="number" id="price" name="price" required />

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($booksArr['Description']); ?></textarea>



            <button type="submit" name="updateBtn">Update Book</button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2025 BookNest Library. All rights reserved.</p>
</footer>

</body>
</html>
