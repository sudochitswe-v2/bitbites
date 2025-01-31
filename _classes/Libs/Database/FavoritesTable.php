<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;
use PDO;

class FavoritesTable
{
    private ?PDO $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function create($data)
    {
        $insertQuery = "INSERT INTO favorites (user_id, recipe_id) VALUES (:user_id, :recipe_id)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->execute($data);
        return $this->db->lastInsertId();
    }
    public function delete($data)
    {
        $sql = "DELETE FROM favorites WHERE user_id = :user_id AND recipe_id = :recipe_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}
