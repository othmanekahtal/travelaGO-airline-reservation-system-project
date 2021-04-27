<?php

class post
{
    private $db;

    public function __construct()
    {
        $this->db = new database();
    }

    public function getPost()
    {
        $sql = 'SELECT * FROM test';
        $this->db->query($sql);
        return $this->db->fetch_all_as_arr();

    }
}