<?php # Script User.php

// // If it's going to need the database, then it's
// // probably smart to require it before we start
// require_once 'database.php';

class User
{

//    private $userId,
//        $username,
//        $password,
//        $firstName,
//        $lastName;

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getFullName()
    {
        // Return the full name
        return $this->firstName . ' ' . $this->lastName;
    }

    public function authenticate($user, $pass)
    {
        $sql = "SELECT * FROM user WHERE username=:user AND password=SHA1(:pass)";

        $query = $this->db->prepare($sql);

        $query->bindParam(':user', $user);
        $query->bindParam(':pass', $pass);

        $query->execute();

        return $query->fetch();

    }

    // Create new user into the database
    public function create()
    {
    }

    public function update()
    {

        //Prepare Query
        $sql = 'UPDATE TABLE user SET '
            . "firstName='$this->firstName', lastName='$this->lastName' "
            . "WHERE userId={$this->userId}";

    }

    public function delete()
    {


    }

}