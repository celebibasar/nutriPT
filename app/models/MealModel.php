<?php

class MealModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Yemekleri türüne göre al
    public function getMealsByType($type)
    {
        $sql = "SELECT * FROM meals_list WHERE type = :type";
        $stmt = $this->db->prepare($sql);

        // :type parametresini bağla
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);

        $stmt->execute();

        // Sonuçları döndür
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllMeals() {
        $stmt = $this->db->query("SELECT * FROM meals_list");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMealById($id) {
        $stmt = $this->db->prepare("SELECT * FROM meals_list WHERE id = ?");
        
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateMeal($id, $name, $description, $calories, $protein, $carbs, $fat, $image_url) {
        $stmt = $this->db->prepare("UPDATE meals_list SET name = ?, description = ?, calories = ?, protein = ?, carbs = ?, fat = ?, image_url = ? WHERE id = ?");
        $stmt->execute([$name, $description, $calories, $protein, $carbs, $fat, $image_url, $id]);
    }

    public function addMeal($name, $description, $calories, $protein, $carbs, $fat, $image_url) {
        $query = "INSERT INTO meals_list (name, description, calories, protein, carbs, fat, image_url) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name, $description, $calories, $protein, $carbs, $fat, $image_url]);
    }
    

    public function deleteMeal($mealId) {
        $stmt = $this->db->prepare("DELETE FROM meals_list WHERE id = :id");
        $stmt->bindParam(':id', $mealId, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
