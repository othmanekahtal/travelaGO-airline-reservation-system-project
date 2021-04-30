<?php

class users_
{
    private $db;

    public function __construct()
    {
        $this->db = new database();
    }

    public function search($email,$password)
    {
        $sql = 'SELECT * FROM user where email=:email and password=:password';
        $this->db->query($sql);
        $this->db->bind(":email",$email,PDO::PARAM_STR);
        $this->db->bind(":password",$password,PDO::PARAM_STR);
        return count($this->db->fetch_all_as_arr());
    }
    public function insertUser($name,$email,$password,$birthday,$role){

    }
}