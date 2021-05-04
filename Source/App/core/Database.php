<?php

class database
{
    private string $user = USER;
    private string $host = HOST;
    private string $password = PASSWORD;
    private string $database = DATABASE;
    private PDO $database_command;
    private $stmt;
    private $error;

    public function __construct()
    {
        // set dsn :
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $options = array(PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->database_command = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->database_command->prepare($sql);
    }

    public function bind($placeholder, $value, $type = null)
    {
        if (is_null($type)) $type = match (true) {
            is_int($value) => PDO::PARAM_INT,
            is_bool($value) => PDO::PARAM_BOOL,
            is_string($value) => PDO::PARAM_STR,
            default => PDO::PARAM_NULL,
        };
        $this->stmt->bindValue($placeholder, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function fetch_as_obj()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetch_all_as_arr()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}