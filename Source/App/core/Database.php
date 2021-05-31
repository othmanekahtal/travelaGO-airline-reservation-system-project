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

    /**
     * database constructor.
     */
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

    /**
     * @param $sql
     */
    public function query($sql)
    {
        $this->stmt = $this->database_command->prepare($sql);
    }

    /**
     * @param $placeholder
     * @param $value
     * @param null $type
     */
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

    /**
     * @return mixed
     */
    public function execute(): mixed
    {
        return $this->stmt->execute();
    }

    /**
     * @return mixed
     */
    public function fetch_as_obj(): mixed
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function fetch_all_as_arr(): mixed
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     */
    public function rowCount(): mixed
    {
        return $this->stmt->rowCount();
    }
}