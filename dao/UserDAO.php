<?php 

require_once("models/User.php");

class UserDAO implements UserDAOInterface {


    private $conn;

    private $url;

    public function __construct(PDO $conn, $url) {
        $this->conn = $conn;
        $this->url = $url;
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

    }

    public function update(User $user) {

    }

    public function findByToken($token) {

    }

    public function verifyToken($protected = false) {

    }

    public function setTokenToSession($token, $redirect = true) {

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