<?php
class _Users
{
    private $db;

    public function __construct()
    {
        $this->db = new database();
    }

    public function findUser($email, $password)
    {
        $sql = 'SELECT * FROM user where email=:email';
        $this->db->query($sql);
        $this->db->bind(":email", $email, PDO::PARAM_STR);
        $row = $this->db->fetch_as_obj();
        $hashed_password = $row->password;
        if ($row) {
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function insertUser($data)
    {
        $this->db->query('insert into user (name,email,password,birthday,role) values (:name,:email,:password,:birthday,:role)');
        // bind placeholders :
        $this->db->bind(":name", $data['name'], PDO::PARAM_STR);
        $this->db->bind(":email", $data['email'], PDO::PARAM_STR);
        $this->db->bind(":password", $data['password'], PDO::PARAM_STR);
        $this->db->bind(":role", $data['role'], PDO::PARAM_STR);
        $this->db->bind(":birthday", $data['date'], PDO::PARAM_STR);
        // verify query execution:
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function Is_new_Email($email)
    {

        $this->db->query('SELECT * FROM user where email=:email');
        $this->db->bind(":email", $email);
        $row = $this->db->fetch_as_obj();
        if ($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }
    }


}