<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;
use PDO;

class UsersTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getAll($search = '')
    {
        if ($search) {
            $query = "SELECT users.*, roles.name AS role
                      FROM users 
                      LEFT JOIN roles ON users.role_id = roles.id
                      WHERE users.name LIKE :search OR users.email LIKE :search";

            $statement = $this->db->prepare($query);
            $statement->execute([':search' => "%$search%"]);
        } else {
            $query = "SELECT users.*, roles.name AS role FROM users LEFT JOIN roles ON users.role_id = roles.id";
            $statement = $this->db->query($query);
        }

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $query = "INSERT INTO users 
                  (first_name, last_name, name, profile, date_of_birth, phone, email, password, role_id) 
                  VALUES 
                  (:first_name, :last_name, :name, :profile, :date_of_birth, :phone, :email, :password, :role_id)";

        $statement = $this->db->prepare($query);
        $statement->execute($data);
    }

    public function findByEmailAndPassword($email, $password)
    {
        $statement = $this->db->prepare("
            SELECT users.*, roles.name AS role, roles.value
            FROM users 
            LEFT JOIN roles ON users.role_id = roles.id
            WHERE users.email = :email 
            AND users.password = :password
        ");

        $statement->execute([':email' => $email, ':password' => $password]);
        return $statement->fetch() ?? false;
    }

    public function getById($id)
    {
        $query = "SELECT users.*, roles.name AS role, roles.value
                  FROM users 
                  LEFT JOIN roles ON users.role_id = roles.id
                  WHERE users.id = :id";

        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $query = "UPDATE users SET
                  first_name = :first_name,
                  last_name = :last_name,
                  name = :name,
                  date_of_birth = :date_of_birth,
                  profile = :profile,
                  phone = :phone
                  WHERE id = :id";

        $statement = $this->db->prepare($query);
        $statement->execute($data);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $this->db->prepare($query);
        return $statement->execute([':id' => $id]);
    }
}
