<?php

require_once ('../vendor/autoload.php');

use App\Auth;
use App\CRUD;
use App\DB;
use App\Sesh;

$seshObj = new Sesh();
$authObj = new Auth();
$crudObj = new CRUD();

//$BookID = $_SESSION['BookID'];

$authObj->reDirectToLogin();
$seshObj->logOut();
$books = $crudObj->GetAllBooks();
$crudObj->DeleteBook();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Books | BookNest</title>
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
            padding-top: 70px;
        }

        header, footer {
            background-color: #5f4b8b;
            color: #ffffff;
        }

        header {
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            padding: 40px;
        }

        .book-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f3eaff;
            border-radius: 10px;
            overflow: hidden;
        }

        .book-table th, .book-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .book-table th {
            background-color: #4e3c75;
            color: #fff;
        }

        .book-table tr:hover {
            background-color: #e6d8fa;
        }

        .book-table input {
            border: none;
            background: transparent;
            font-size: 14px;
            color: #3e3e3e;
            width: 100%;
        }

        .book-table input:focus {
            outline: none;
            background-color: #e6d8fa;
            border-radius: 4px;
        }

        .actions form {
            display: inline-block;
        }

        .actions button {
            margin: 0 4px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-btn {
            background-color: #6d59a5;
            color: white;
        }

        .delete-btn {
            background-color: #b34d4d;
            color: white;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
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
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/LBMS/pages/layout/navbar.php'; ?>
</header>

<main>
    <h2>All Books</h2>
    <table class="book-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>

                <form method="post">
                    <td><input type="text" name="title" value="<?= htmlspecialchars($book['Title']) ?>" readonly  /></td>
                    <td><input type="number" name="price" value="<?= htmlspecialchars($book['Price']) ?>" readonly  /></td>
                    <td><input type="text" name="description" value="<?= htmlspecialchars($book['Description']) ?>" readonly /></td>
                    <td class="actions">

                        <a href="UpBooks.php?BookID=<?php echo $book['BookID'] ?>">
                            <button class="update-btn" type="button" name="updateBook"> Update </button>
                        </a>

                        <a href="?DelBook=<?php echo $book['BookID'] ?>">
                            <button class="delete-btn" type="button" name="deleteBook"> Delete </button>
                        </a>

                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>

<footer>
    <p>&copy; 2025 BookNest Library. All rights reserved.</p>
</footer>

</body>
</html>
