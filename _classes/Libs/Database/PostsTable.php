<?php

namespace Bb\Blendingbites\Libs\Database;

use PDO;

class PostsTable
{
    private ?PDO $db = null;
    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function getAll()
    {
        $sql = "SELECT
	u.name AS user_name,
	u.profile AS user_profile,
    p.*,
    COUNT(c.id) AS total_comments
FROM
    posts p
LEFT JOIN
    comments c 
ON
    p.id = c.post_id
INNER JOIN
	users u
ON
	p.user_id = u.id
GROUP BY
    p.id
ORDER BY
	p.id DESC";
        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function insert($data)
    {
        $insertQuery = "INSERT INTO posts (content, image, user_id) VALUES (:content, :image, :user_id)";
        $insertStmt = $this->db->prepare($insertQuery);
        $success = $insertStmt->execute($data);
        return $this->db->lastInsertId();
    }


    public function getById($id)
    {
        $selectQuery = "SELECT * FROM posts WHERE id = :id";
        $selectStmt = $this->db->prepare($selectQuery);
        $selectStmt->execute(['id' => $id]);
        return $selectStmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function update($data)
    {
        $updateQuery = "UPDATE posts SET content = :content, image = :image WHERE id = :id";
        $updateStmt = $this->db->prepare($updateQuery);
        $success = $updateStmt->execute($data);
        return $updateStmt->rowCount();
    }
    public function updateWithImage($data)
    {
        $updateQuery = "UPDATE posts SET content = :content, image = :image WHERE id = :id";
        $updateStmt = $this->db->prepare($updateQuery);
        return $updateStmt->execute($data);
    }

    public function delete($id)
    {
        $deleteQuery = "DELETE FROM posts WHERE id = :id";
        $deleteStmt = $this->db->prepare($deleteQuery);
        return $deleteStmt->execute(['id' => $id]);
    }
    public function detail($id)
    {
        $sql = "SELECT
	u.name AS user_name,
	u.profile AS user_profile,
    p.*,
    COUNT(c.id) AS total_comments
FROM
    posts p
LEFT JOIN
    comments c
ON
    p.id = c.post_id
INNER JOIN
	users u
ON
	p.user_id = u.id
	
WHERE	p.id = :id
GROUP BY
    p.id;";
        $selectStmt = $this->db->prepare($sql);
        $selectStmt->execute(['id' => $id]);
        $post =  $selectStmt->fetch(\PDO::FETCH_ASSOC);

        $commentsTable = new CommentsTable(new MySQL());

        $post['comments'] = $commentsTable->getCommentsByPost($id);
        return $post;
    }
}
