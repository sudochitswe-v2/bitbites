<?php

namespace Bb\Blendingbites\Libs\Database;

use Bb\Blendingbites\Libs\Database\MySQL;
use PDO;
use PDOException;

class RecipesTable
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function getAll()
    {
        $sql = "
            SELECT
                r.id AS recipe_id,
                r.name AS recipe_name,
                r.image,
                r.short_description,
                r.description,
                
                dp.id AS dietary_preference_id,
                dp.name AS dietary_preference_name,
                
                d.id AS difficulty_id,
                d.name AS difficulty_name,
                d.value AS difficulty_value,
                
                c.id AS cuisine_id,
                c.name AS cuisine_name,
                
                f.user_id AS liked_user_id
                
            FROM recipes r
            LEFT JOIN recipe_dietary_preferences rdp ON r.id = rdp.recipe_id
            LEFT JOIN dietary_preferences dp ON rdp.dietary_preference_id = dp.id
            LEFT JOIN difficulties d ON r.difficulty_id = d.id
            LEFT JOIN cuisines c ON r.cuisine_id = c.id
            LEFT JOIN favouriates f ON r.id = f.recipe_id
            ORDER BY r.id DESC;
        ";

        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        // Grouping the data by recipe_id
        $groupedRecipes = [];
        foreach ($results as $row) {
            $recipeId = $row['recipe_id'];

            if (!isset($groupedRecipes[$recipeId])) {
                $groupedRecipes[$recipeId] = [
                    'id' => $recipeId,
                    'name' => $row['recipe_name'],
                    'image' => $row['image'],
                    'short_description' => $row['short_description'],
                    'description' => $row['description'],
                    'difficulty' => [
                        'id' => $row['difficulty_id'],
                        'name' => $row['difficulty_name'],
                        'value' => $row['difficulty_value']
                    ],
                    'cuisine' => [
                        'id' => $row['cuisine_id'],
                        'name' => $row['cuisine_name']
                    ],
                    'dietary_preferences' => [],
                    'liked_user_ids' => []
                ];
            }

            // Add dietary preferences
            if ($row['dietary_preference_id']) {
                $dietaryPreference = [
                    'id' => $row['dietary_preference_id'],
                    'name' => $row['dietary_preference_name']
                ];
                if (!in_array($dietaryPreference, $groupedRecipes[$recipeId]['dietary_preferences'])) {
                    $groupedRecipes[$recipeId]['dietary_preferences'][] = $dietaryPreference;
                }
            }

            // Add liked user IDs
            if ($row['liked_user_id']) {
                $groupedRecipes[$recipeId]['liked_user_ids'][] = $row['liked_user_id'];
            }
        }

        return array_values($groupedRecipes);
    }

    public function delete($id)
    {
        $query = "DELETE FROM recipes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
    }
    public function getById($id)
    {
        $query = "SELECT * FROM recipes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);
        return $recipe;
    }
    public function update($data)
    {
        $updateQuery = "UPDATE recipes SET name = :name,difficulty_id = :difficulty_id ,cuisine_id = :cuisine_id, short_description = :short_description, 
        image = :image, description = :description WHERE id = :id";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->execute($data);
    }

    public function insert($data)
    {
        $insertQuery = "INSERT INTO recipes (name, difficulty_id, cuisine_id,short_description, image, description) VALUES (:name,:difficulty_id, :cuisine_id, :short_description,:image, :description)";
        $insertStmt = $this->db->prepare($insertQuery);
        return $insertStmt->execute($data);
    }
}
