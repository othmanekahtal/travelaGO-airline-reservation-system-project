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

    public function deleteFlights($id)
    {
        $this->db->query('DELETE FROM flights WHERE id=:id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function editFlights($id, $departDate, $arrivalDate, $departure, $arrival, $resetPlace, $Trademark)
    {
        $this->db->query('
                UPDATE 
                    flights
                SET 
                    date_depart = :departDate,
                    date_arriv = :arrivalDate,
                    departure = :departure,
                    arrival=:arrival,
                    limit_place=:limit_place,
                    trademark=:trademark
                WHERE
                      id=:id;
        ');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $this->db->bind(':limit_place', $resetPlace, PDO::PARAM_INT);
        $this->db->bind(':departDate', $departDate, PDO::PARAM_STR);
        $this->db->bind(':arrivalDate', $arrivalDate, PDO::PARAM_STR);
        $this->db->bind(':departure', $departure, PDO::PARAM_STR);
        $this->db->bind(':arrival', $arrival, PDO::PARAM_STR);
        $this->db->bind(':trademark', $Trademark, PDO::PARAM_STR);
        return $this->db->execute();
    }
}