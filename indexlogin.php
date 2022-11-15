<?php
class User{
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public function __construct($username, $password, $firstName, $lastName){
        $this -> username = $username;
        $this -> password = password_hash($password, PASSWORD_DEFAULT);
        $this -> firstName = $firstName;
        $this -> lastName = $lastName;
    }
    public function getFullname()
    {
        return "<br>"."Firstname: ".$this -> firstName."<br>"."Lastname: ".$this -> lastName;
    }
    
    public function getUsername()
    {
        return "Username: ".$this -> username;
    }
    public function login($username, $password)
    {
        $hash = password_hash("123456", PASSWORD_DEFAULT);
        return $username == 'admin' && password_verify($password, $hash);
    }
}