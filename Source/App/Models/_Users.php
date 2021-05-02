<?php

class _users{
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
    public function Is_new_Email($email){

        $this->db->query('SELECT * FROM user where email=:email');
        $this->db->bind(":email",$email);
        $row = $this->db->fetch_as_obj();
        if(count($row)!=0){
            return true;
        }
        else{
            return false;
        }
    }
}