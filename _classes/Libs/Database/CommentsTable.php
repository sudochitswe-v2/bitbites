<?php

namespace Bb\Blendingbites\Libs\Database;

use PDO;

class CommentsTable
{
    private ?PDO $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM comments ORDER BY id DESC";
        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function getCommentsByPost($postId)
    {
        $sql = "SELECT
	u.name AS user_name,
	u.profile AS user_profile,
	c.*
FROM
	comments c
INNER JOIN
	users u
ON
	c.user_id = u.id
	WHERE
	c.post_id  = :post_id
GROUP BY
	c.user_id;";
        $statement = $this->db->prepare($sql);
        $statement->execute(['post_id' => $postId]);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
    public function insert($data)
    {
        $insertQuery = "INSERT INTO comments (content, post_id, user_id) VALUES (:content, :post_id, :user_id)";
        $insertStmt = $this->db->prepare($insertQuery);
        return $insertStmt->execute($data);
    }
    public function getById($id)
    {
        $selectQuery = "SELECT * FROM comments WHERE id = :id";
        $selectStmt = $this->db->prepare($selectQuery);
        $selectStmt->execute(['id' => $id]);
        return $selectStmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($data)
    {
        $updateQuery = "UPDATE comments SET content = :content WHERE id = :id";
        $updateStmt = $this->db->prepare($updateQuery);
        return $updateStmt->execute($data);
    }
    public function delete($id)
    {
        $deleteQuery = "DELETE FROM comments WHERE id = :id";
        $deleteStmt = $this->db->prepare($deleteQuery);
        return $deleteStmt->execute(['id' => $id]);
    }
    
    // public function countCommentsByPost($postId)
    // {
    //     $sql = "SELECT COUNT(*) as total FROM comments WHERE post_id = :post_id";
    //     $statement = $this->db->prepare($sql);
    //     $statement->execute(['post_id' => $postId]);
    //     return $statement->fetch(\PDO::FETCH_ASSOC)['total'];
    // }
}
