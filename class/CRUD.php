<?php

namespace App;

class CRUD
{
    public function AddBook(){
        if (isset($_POST['addNewBook'])) {
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $insertStatement = 'INSERT INTO book VALUES (NULL,?,?,?,?)';
            $dbObj = new DB();

            $queryObj = $dbObj->connection->prepare($insertStatement);
            $queryObj->bind_param('sdsi', $title, $price, $description,$_SESSION['UserID']);
            $queryStatus = $queryObj->execute();

            if(!$queryStatus) {
                // echo error
            } else {
                // echo done
                header("location: ../pages/Books.php");
            }
        }
    }
    public function GetAllBooks(){
        $selectStatement = 'SELECT * FROM book where UserID = ?';
        $dbObj = new DB();
        $queryObj = $dbObj->connection->prepare($selectStatement);
        $queryObj->bind_param('i', $_SESSION['UserID']);
        $queryObj->execute();
        return $queryObj->get_result();
    }

    public function GetBookByID($BookID)
    {
        $selectStatement = 'SELECT * FROM book where BookID = ?';
        $dbObj = new DB();
        $querObj = $dbObj->connection->prepare($selectStatement);
        $querObj->bind_param('i',$BookID);
        $querObj->execute();
        return ($querObj->get_result())->fetch_assoc();
    }

    public function UpdateBook($BookID){

        if (isset($_POST['updateBtn'])){
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $updateStatement = 'UPDATE `book` SET Title = ? , Price = ? , Description = ? WHERE BookID = ?';
            $dbObj = new DB();

            $queryObj = $dbObj->connection->prepare($updateStatement);
            $queryObj->bind_param('sssi',$title,$price,$description,$BookID);
            $queryStatus = $queryObj->execute();

            if($queryStatus){
                header('location: ../pages/Books.php');
            }
        }
    }

    public function DeleteBook(){
        if (isset($_GET['DelBook'])){

            $BookID = $_GET['DelBook'];
            $deleteStatement = 'DELETE FROM book WHERE BookID = ?';

            $dbObj = new DB();
            $queryObj = $dbObj->connection->prepare($deleteStatement);
            $queryObj->bind_param('i',$BookID);

            $queryStatus = $queryObj->execute();

            if($queryStatus){
                header('location: ../pages/Books.php');
            } else {
                // ALERT HENAAAAA
            }
        }
    }
}