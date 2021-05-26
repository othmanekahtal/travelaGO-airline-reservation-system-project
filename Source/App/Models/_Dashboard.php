<?php

class _Dashboard
{
    private $db;

    /**
     * _Dashboard constructor.
     */
    public function __construct()
    {
        $this->db = new database();
    }

    /**
     * @return mixed
     */
    public function getFlights()
    {
        $this->db->query('SELECT * FROM flights');
        $this->db->execute();
        return $this->db->fetch_all_as_arr();
    }

    public function GetReservations()
    {
        $this->db->query('SELECT * FROM reservation');
        $this->db->execute();
        return $this->db->fetch_all_as_arr();
    }
}