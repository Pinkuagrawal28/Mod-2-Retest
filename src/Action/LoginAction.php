<?php

namespace App\Action;

use App\Query\UserQuery;

/***
   * This classes Handles The Login System
   */
class LoginAction{
  /**
   * Function to login the user and to redirect as per role
   */
  public function login(){
    $mail = $_POST["email"];
    $password = $_POST["password"];

    $user = new UserQuery();

    $userData  = $user->getUser($mail,$password);

    if($userData){
      if($userData[0]["role"]=="admin"){
        $_SESSION["role"] = "admin";
        $_SESSION["name"] = $mail;
        header('Location: /player');
      }

      else{
        $_SESSION["role"] = "normal";
        $_SESSION["name"] = $mail;
        $_SESSION["points"] = 100;
        $_SESSION["strength"] = 0;
        header('Location: /team');
      }
    }
    else{
      header('Location: /');
    }
  }

  public function logout(){
    $_SESSION["role"] = "";
    $_SESSION["name"] = "";
    header('Location: /');
  }
}