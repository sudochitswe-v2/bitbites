<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;

class UsersTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }
    public function getAll()
    {
        $statement = $this->db->query("SELECT * FROM users");

        return $statement->fetchAll();
    }
    public function insert($data)
    {
        // create query statement with sql paramters
        $query = " INSERT INTO  users 
            (name, email, phone, address, password, role_id, created_at) 
            VALUES 
            (:name, :email, :phone, :address, :password, :role_id, NOW()) ";

        // bind sql parameters
        $statement = $this->db->prepare($query);

        $statement->execute($data);
    }

    public function findByEmailAndPassword($email, $password)
    {
        $statement = $this->db->prepare("
            SELECT users.*, roles.name AS role, roles.value
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id
            WHERE users.email = :email 
            AND users.password = :password
        ");

        $statement->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        echo $password;
        echo $email;
        $row = $statement->fetch();

        return $row ?? false;
    }
}
