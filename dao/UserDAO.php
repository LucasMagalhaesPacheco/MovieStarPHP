<?php 

require_once("models/User.php");
require_once("models/Message.php");

class UserDAO implements UserDAOInterface {


    private $conn;
    private $message;
    private $url;

    public function __construct(PDO $conn, $url) {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }
    
    public function buildUser($data) {
       $user = new User();

       $user->id = $data["id"];
       $user->name = $data["name"];
       $user->lastname = $data["lastname"];
       $user->password = $data["password"];
       $user->bio = $data["bio"];
       $user->email = $data["email"];
       $user->image = $data["image"];
       $user->token = $data["token"];
       
       return $user;
    }

    public function create(User $user, $authUser = false) {
        $stmt = $this->conn->prepare("INSERT INTO users(
          name, lastname, email, password, token) VALUES (
            :name, :lastname, :email, :password, :token)");


        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":lastname", $user->lastname);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute(); 
        
        //Autenticon user case AuthUser is True
        if($authUser) {
            $this->setTokenToSession($user->token);
        }

    }

    public function update(User $user) {

    }

    public function findByToken($token) {

    }

    public function verifyToken($protected = false) {

    }

    public function setTokenToSession($token, $redirect = true) {

        //Save token in the session
        $_SESSION["token"] = $token;

        if($redirect) {
          // Redirect for user profile
          $this->message->setMessage("Welcome User!",  "sucess", "editprofile.php");
        }

    }

    public function authenticateUser($email, $password) {

    }

    public function findByEmail($email) {
       if($email != "") {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE EMAIL = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        //Utilizado o método Rowcount para verificarmos a quantidade de linhas, que chegou do banco de dados
        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $user = $this->buildUser($data);
        } else 
        {
            return false;
        }

       } else {
        return false;
       }

    }

    public function findById($id) {

    }

    public function changePassword(User $user) {

    }
}



?>