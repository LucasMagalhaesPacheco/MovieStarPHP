<?php

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);


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


    } else {
        //submit message minium data missing
      $message->setMessage("Please fill in all fields, thanks!", "error", "back");
    }
} else if($type == "login") {

}