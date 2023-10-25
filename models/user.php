<?php

  class User {


    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $image;
    public $bio;
    public $token;

    public function generateToken() {
      //This function return hash token with fifty caracteres
      return bin2hex(random_bytes(50));
    }

    public function generatePassword($password) {
      // this function return hash password
      // This model PHP, is insurance password use with updates languages PHP forever
      return password_hash($password, PASSWORD_DEFAULT);
    }
  }

  interface UserDAOInterface {
    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function findByToken($token);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function changePassword(User $user);
  }

?>