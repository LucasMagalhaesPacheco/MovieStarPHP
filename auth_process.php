<?php

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);


// Verifica o tipo do forms

$type = filter_input(INPUT_POST, "type");

//verification type forms

if($type == "register") {
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    //miminum data check

    if($name && $lastname && $email && $password) {
      //To checking password

      if($password === $confirmpassword ) {

        //To checking unique Email
        if($userDao->findByEmail($email) === false) {

          $user = new User();

          // Creation token and password;
          $userToken = $user->generateToken();
          // This function of PHP is for protect password
          $finalPassword = $user->generatePassword($password);

          $user->name = $name;
          $user->lastname = $lastname;
          $user->email = $email;
          $user->password = $finalPassword;
          $user->token = $userToken;
          //Autorization Function
          $auth = true;
          $userDao->create($user, $auth);

        } else {
          //submit email iqual a true
         $message->setMessage("Email is registered", "error", "back");

        }
              
        
      } else {
         //submit password no iqual 
         $message->setMessage("Passwords not the same", "error", "back");
      }

    } else {
        //submit message minium data missing
      $message->setMessage("Please fill in all fields, thanks!", "error", "back");
    }
} else if($type == "login") {

}