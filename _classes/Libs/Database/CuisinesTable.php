<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;

class CuisinesTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM cuisines";
        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
