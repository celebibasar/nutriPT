<?php

class MealController {
    private $mealModel;

    public function __construct($mealModel) {
        $this->mealModel = $mealModel;
    }

    // Yemekleri türüne göre getir
    public function showMeals($type)
    {
        $meals = $this->mealModel->getMealsByType($type);
        include_once __DIR__ . '/../modules/meals/' . $type . '_meals.php';}

}
