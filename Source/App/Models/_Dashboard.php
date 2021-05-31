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
        $this->db->query(/** @lang text */ 'SELECT * FROM flights');
        $this->db->execute();
        return $this->db->fetch_all_as_arr();
    }

    /**
     * @param $admin
     * @param $departDate
     * @param $arrivalDate
     * @param $departure
     * @param $arrival
     * @param $resetPlace
     * @param $Trademark
     * @return mixed
     */
    public function addFlight($admin, $departDate, $arrivalDate, $departure, $arrival, $resetPlace, $Trademark)
    {
        $this->db->query(/** @lang text */ '
            INSERT INTO
            `flights`
            (`date_depart`,`date_arriv`,`departure`,`arrival`,`limit_place`,`trademark`,`admin`)
            
            VALUES
            (
            :departDate,
            :arrivalDate,
            :departure,
            :arrival,
            :limit_place,
            :trademark,
            :admin
            )
            ');
        $this->db->bind(':admin', $admin, PDO::PARAM_STR);
        $this->db->bind(':limit_place', $resetPlace, PDO::PARAM_INT);
        $this->db->bind(':departDate', $departDate, PDO::PARAM_STR);
        $this->db->bind(':arrivalDate', $arrivalDate, PDO::PARAM_STR);
        $this->db->bind(':departure', $departure, PDO::PARAM_STR);
        $this->db->bind(':arrival', $arrival, PDO::PARAM_STR);
        $this->db->bind(':trademark', $Trademark, PDO::PARAM_STR);
        return $this->db->execute();
    }

    /**
     * @param $id
     * @return mixed
     */

    /**
     * @param $id
     * @param $departDate
     * @param $arrivalDate
     * @param $departure
     * @param $arrival
     * @param $resetPlace
     * @param $Trademark
     * @return mixed
     */

    public function editFlights($id, $departDate, $arrivalDate, $departure, $arrival, $resetPlace, $Trademark)
    {
        $this->db->query(/** @lang text */ '
                UPDATE
                `flights`
                SET
                `date_depart` = :departDate,
                `date_arriv` = :arrivalDate,
                `departure` = :departure,
                `arrival`=:arrival,
                `limit_place`=:limit_place,
                `trademark`=:trademark
                WHERE
                `id`=:id;
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

    /**
     * @return mixed
     */

    /**
     * @param $id
     * @return mixed
     */
    public function deleteFlights($id)
    {
        $this->db->query(/** @lang text */ 'DELETE FROM flights WHERE id=:id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    /**
     * @param $id
     * @return array
     */
    public function GetReservations($id)
    {
        $this->db->query(/** @lang text */ 'SELECT p.id FROM user u INNER JOIN passenger p ON (p.id_user=u.id) WHERE u.id =:id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $id_Passenger = $this->db->fetch_all_as_arr();
        $finalResult = [];
        foreach ($id_Passenger as $i => $id) {
            $this->db->query(/** @lang text */ 'SELECT * FROM reservation WHERE id_passanger=:id');
            $this->db->bind(':id', $id['id'], PDO::PARAM_INT);
            $result = $this->db->fetch_as_obj();
            if ($result) {
                array_push($finalResult, $result);
            }
        }
        return $finalResult;
    }

    /**
     * @param $id_user
     * @param $is_user
     * @param $name
     */
    public function addPassanger($id_user, $is_user, $name)
    {
        $this->db->query(/** @lang text */ '
        INSERT INTO
        passenger
        (id_user,is_in_user,name)
        VALUES
        (:id_user,:is_user,:name)
        ');
        $this->db->bind(':id_user', $id_user, PDO::PARAM_INT);
        $this->db->bind(':is_user', $is_user, PDO::PARAM_INT);
        $this->db->bind(':name', $name, PDO::PARAM_STR);
        $r = $this->db->execute();
        if ($r) {
            return $this->GetLastRecord()->id;
        } else {
            return 0;
        }
    }

    /**
     * @param $id
     * @param $id_flight
     * @param $is_user
     * @param $name
     * @return bool|string
     */
    public function addReservation($id, $id_flight, $is_user, $name)
    {
        $r = $this->addPassanger($id, $is_user, $name);
        if ($r) {
            $isAvailable = $this->minusToOne($id_flight);
//            var_dump($isAvailable);
            if ($isAvailable) {
                $this->db->query(/** @lang text */ '
                        INSERT INTO reservation (id_passanger,id_flight)
                        VALUES (:passenger,:flight);
                ');
                $this->db->bind(':passenger', $r, PDO::PARAM_INT);
                $this->db->bind(':flight', $id_flight, PDO::PARAM_INT);
                $return = $this->db->execute();
                if ($return) {
                    return true;
                } else {
                    //EF : ERROR IN FLIGHT :
                    return 'EF';
                }
            }

        } else {
            // EP:ERROR IN PASSENGER :
            return 'EP';
        }
    }


    /**
     * @return mixed
     */
    private function GetLastRecord()
    {
        $this->db->query(/** @lang text */ 'SELECT * FROM passenger ORDER BY id DESC LIMIT 1');
        return $this->db->fetch_as_obj();
    }


    /**
     * @param $id_Flights
     */
    private function minusToOne($id_Flights)
    {
        $this->db->query(/** @lang text */ 'SELECT limit_place FROM flights WHERE id=:id_f');
        $this->db->bind(':id_f', $id_Flights, PDO::PARAM_INT);
        $number = $this->db->fetch_as_obj()->limit_place;
        $number = (int)$number - 1;
//        var_dump($number);
        if ($number >= 0) {
            $this->db->query(/** @lang text */ 'UPDATE flights SET limit_place = :newLimit WHERE id=:id_f');
            $this->db->bind(':newLimit', $number, PDO::PARAM_INT);
            $this->db->bind(':id_f', $id_Flights, PDO::PARAM_INT);
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }

}