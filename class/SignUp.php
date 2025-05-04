<?php

namespace App;

class SignUp
{
    public function SignUp(){
        if (isset($_POST['signUpBtn'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['password1'];
            // $DefaultRole = "Viewer";

            if ($password != $confirmPassword) {
                \App\Alert::PrintMessage("Passwords did not match", "danger");
            } else {
                $dbObj = new \App\DB();
                $instStmnt = "INSERT INTO users VALUES (NULL,?,?,?)";
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $queryObj = $dbObj->connection->prepare($instStmnt);
                $queryObj->bind_param("sss", $username, $email, $hashedPassword);
                $queryObj->execute();
                header('location: ../pages/login.php');
            }
        }
    }
}