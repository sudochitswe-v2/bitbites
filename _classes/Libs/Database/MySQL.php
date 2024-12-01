<?php

namespace Bb\Blendingbites\Helpers\Libs\Database;

use Exception;

class MySQL
{
    private $dbhost;
    private $dbuser;
    private $dbname;
    private $dbpass;
    private $db;

    public function __construct()
    {
        $this->dbhost = $_ENV['DB_HOST'];
        $this->dbuser = $_ENV['DB_USER'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->dbpass = $_ENV['DB_PASSWORD'];
        $this→db = null;
    }
    public function connect()
    {
        try {
            $this->db = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            return $this->db;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
