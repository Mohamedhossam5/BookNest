<?php

namespace App;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class Sesh
{
    public function logIn(){
        if(isset($_POST['logInBtn'])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $dbObj = new DB();

            $selstatement = 'SELECT * FROM users WHERE Email = ?';
            $queryObj = $dbObj->connection->prepare($selstatement);
            $queryObj->bind_param('s', $email);
            $queryStatus = $queryObj->execute();

            if(!$queryStatus){
                // alert henaa
            } else {
                $result = $queryObj->get_result();

                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();

                    if(password_verify($password, $row['Password'])){
                        // alert welcome henaa
                        $_SESSION['UserID'] = $row["UserID"];
                        $_SESSION['username'] = $row["Name"];
                        // $_SESSION['email'] = $row['Email'];
                        header('location: ../pages/main.php');
                        exit();


                    } else{
                        // alert wrong pass henaaa
                    }

                } else {
                    // alert email not found henaa
                }
            }
        }
    }

    public function logOut(){
        if(isset($_GET['logout'])){
            session_unset();
            session_destroy();
            header('location: ../pages/login.php');
        }
    }
}