<?php

namespace Bb\Blendingbites\Libs\Database;

use ArrayObject;
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

    // Search function
    public function search($text)
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
            WHERE r.name LIKE :text
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':text' => "%$text%"]);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $groupedRecipes = self::groupRecipes($results);
        return array_values($groupedRecipes);
    }


    public function groupRecipes(array $data)
    {
        $groupedRecipes = [];
        foreach ($data as $row) {
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
        return $groupedRecipes;
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
            LEFT JOIN favorites f ON r.id = f.recipe_id
            ORDER BY r.id DESC;
        ";

        $statement = $this->db->query($sql);
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        // Grouping the data by recipe_id

        $groupedRecipes = self::groupRecipes($results);
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
        $cuisineTable = new CuisinesTable(new MySQL());
        $difficultiesTable = new DifficultiesTable(new MySQL());
        $cuisine = $cuisineTable->getById($recipe['cuisine_id']);
        $difficulty = $difficultiesTable->getById($recipe['difficulty_id']);
        $recipe['difficulty'] = $difficulty;
        $recipe['cuisine'] = $cuisine;
        $recipe['dietary_preferences'] = self::getDietaryPreferences($id);
        return $recipe;
    }
    public function update($data, $dietaryPreferencesIds)
    {
        $updateQuery = "UPDATE recipes SET name = :name,difficulty_id = :difficulty_id ,cuisine_id = :cuisine_id, short_description = :short_description, 
        image = :image, description = :description, ingredients_description=:ingredients_description WHERE id = :id";
        $updateStmt = $this->db->prepare($updateQuery);
        $updateStmt->execute($data);
        self::deleteRecipeDietaryPreferences($data['id']);
        self::createAllDietaryPreferences($data['id'], $dietaryPreferencesIds);
    }

    public function insert($data, $dietaryPreferencesIds)
    {
        $insertQuery = "INSERT INTO recipes (name, difficulty_id, cuisine_id,short_description, image, description,ingredients_description) 
        VALUES (:name,:difficulty_id, :cuisine_id, :short_description,:image, :description,:ingredients_description)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->execute($data);
        $id = $this->db->lastInsertId();
        self::createAllDietaryPreferences($id, $dietaryPreferencesIds);
    }

    public function filterByCuisineAndDifficulty($search = '', $cuisine = '', $difficulty = '')
    {
        $sql = "SELECT
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
            LEFT JOIN favorites f ON r.id = f.recipe_id
            WHERE 1 = 1";

        $params = [];

        if (!empty($search)) {
            $sql .= " AND (LOWER(r.name) LIKE LOWER(:search) OR LOWER(c.name) LIKE LOWER(:search))";
            $params[':search'] = "%$search%";
        }

        if (!empty($cuisine)) {
            $sql .= " AND LOWER(c.name) = LOWER(:cuisine)";
            $params[':cuisine'] = trim($cuisine);
        }

        if (!empty($difficulty)) {
            $sql .= " AND LOWER(d.name) = LOWER(:difficulty)";
            $params[':difficulty'] = trim($difficulty);
        }

        $sql .= " ORDER BY r.id DESC";



        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);



        return self::groupRecipes($results);
    }

    private function deleteRecipeDietaryPreferences($recipeId)
    {
        $query = "DELETE FROM recipe_dietary_preferences WHERE recipe_id = :recipe_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':recipe_id' => $recipeId]);
    }
    private function createAllDietaryPreferences($recipeId, $dietaryPreferences)
    {
        foreach ($dietaryPreferences as $dietaryPreference) {
            $query = "INSERT INTO recipe_dietary_preferences (recipe_id, dietary_preference_id) VALUES (:recipe_id, :dietary_preference_id)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':recipe_id' => $recipeId, ':dietary_preference_id' => $dietaryPreference]);
            $this->db->lastInsertId();
        }
    }
    private function getDietaryPreferences($recipeId)
    {
        $query = "SELECT dietary_preference_id FROM recipe_dietary_preferences WHERE recipe_id = :recipe_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':recipe_id' => $recipeId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function details($recipeId)
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
LEFT JOIN favorites f ON r.id = f.recipe_id
WHERE r.id = :recipe_id;
";

        $statement = $this->db->prepare($sql);
        $statement->execute([':recipe_id' => $recipeId]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $data = self::groupRecipes($results);
        return array_values($data)[0];
    }
}
