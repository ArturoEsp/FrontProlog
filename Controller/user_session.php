<?php

class UserSession{

    public function __construct(){
        $has_session = session_status() == PHP_SESSION_ACTIVE; 
        
        if($has_session){

        }else{
            session_start();
        }
       
    }

    public function setCurrentUser($user){
        $_SESSION['user'] = $user;

    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }

}

?>