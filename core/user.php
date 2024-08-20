<?php


class User
{

    private $conn;
    private $table = 'users';

    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function register()
    {
        try {
            $query = 'INSERT INTO ' . $this->table . ' 
        SET username = :username, email = :email, password = :password';

            $stmt = $this->conn->prepare($query);

            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            if ($stmt->execute()) {
                return  array('success'=> true, 'message' => 'User Registered');
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return  array('success'=> false, 'message' => 'Email has been already registered.');
            }
            throw $e;
        }


        printf('Error %s\n', $stmt->error);
        return  array('success'=> false, 'message' => 'User Not Registered');
    }

    public function login()
    {

        $query = 'SELECT id, username, email, password from '. $this->table.' 
        WHERE email = :email';



        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $this->email);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($this->password, $row['password'])){
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->email = $row['email'];
                return true;
            }
        }

        return false;
        /* return array('success' => false, 'message' => 'User not found'); */

    }
}
