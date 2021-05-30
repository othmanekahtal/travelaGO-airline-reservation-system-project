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
        $sql = /** @lang text */
            'SELECT * FROM user where email=:email';
        $this->db->query($sql);
        $this->db->bind(":email", $email, PDO::PARAM_STR);
        $row = $this->db->fetch_as_obj();
        if ($row) {
            $hashed_password = $row->password;
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
        $this->db->query(/** @lang text */ 'insert into user (name,email,password,role) values (:name,:email,:password,:role)');
        // bind placeholders :
        $this->db->bind(":name", $data['name'], PDO::PARAM_STR);
        $this->db->bind(":email", $data['email'], PDO::PARAM_STR);
        $this->db->bind(":password", $data['password'], PDO::PARAM_STR);
        $this->db->bind(":role", $data['role'], PDO::PARAM_STR);
        // verify query execution:
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function Is_new_Email($email)
    {

        $this->db->query(/** @lang text */ 'SELECT * FROM user where email=:email');
        $this->db->bind(":email", $email);
        $row = $this->db->fetch_as_obj();
        if ($this->db->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function GetCol($col, $email)
    {
        $this->db->query(/** @lang text */ 'SELECT ' . $col . ' FROM user where email=:col');
        $this->db->bind(":col", $email);
        return $this->db->fetch_as_obj();
    }

}