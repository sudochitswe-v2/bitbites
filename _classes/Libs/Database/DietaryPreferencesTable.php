<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;

class DietaryPreferencesTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM dietary_preferences ORDER BY id DESC";
        $statement =$this->db->query($sql);
        $results=$statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function insert($data)
    {
        $insertQuery="INSERT INTO dietary_preferences (name) VALUES(:name)";
        $insertstatement=$this->db->prepare($insertQuery);
        return $insertstatement->execute($data);
    }
    public function getById($id)
    {
        $selectQuery = "SELECT * FROM dietary_preferences WHERE id=:id";
        $selectStmt=$this->db->prepare($selectQuery);
        $selectStmt->execute(['id'=>$id]);
        return $selectStmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($data)
    {
        $updateQuery ="UPDATE dietary_preferences SET name = :name WHERE id=:id";
        $updateStmt = $this->db->prepare($updateQuery);
        return $updateStmt->execute($data);
    }
    public function delete($id)
    {
        $deleteQuery="DELETE FROM dietary_preferences WHERE id=:id";
        $deleteStmt=$this->db->prepare($deleteQuery);
        return $deleteStmt->execute(['id'=>$id]);
    }
        
}

