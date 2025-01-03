<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;
use PDO;

class DifficultiesTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM difficulties";
        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function getById($id)
    {
        $selectQuery= "SELECT * FROM Difficulties where id=:id";
        $selectStmt=$this->db->prepare($selectQuery);
        $selectStmt->execute(['id'=>$id]);
        return $selectStmt->fetch(\PDO::FETCH_ASSOC);
    }
}
