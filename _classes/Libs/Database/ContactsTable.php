<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;

class ContactsTable
{
    private $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM contacts ORDER BY id DESC";
        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function insert($data)
    {
        $insertQuery = "INSERT INTO contacts (first_name,last_name,email,phone,message) VALUES (:first_name,:last_name,:email,:phone,:message)";
        $insertStmt = $this->db->prepare($insertQuery);
        return $insertStmt->execute($data);
    }
}
