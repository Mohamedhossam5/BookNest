<?php

namespace App;

class Auth
{

    public function isAuth(){
        return isset($_SESSION['UserID']);
    }

    public function reDirectToLogin(){
        if(!$this->isAuth()){
            header('Location: ../pages/login.php');
        }
    }

    public function reDirectIfFound(){
        if($this->isAuth()){
            header('Location: ../pages/main.php');
        }
    }
}
