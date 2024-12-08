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

}
