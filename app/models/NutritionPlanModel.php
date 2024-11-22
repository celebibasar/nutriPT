<?php
class NutritionPlanModel
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function saveNutritionPlan($userId, $goal, $activityLevel, $dailyCalories, $vegetarian, $mealPreference, $mealCount)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO nutrition_plan (user_id, goal, activity_level, daily_calories, vegetarian, meal_preference, meal_count)
                VALUES (:user_id, :goal, :activity_level, :daily_calories, :vegetarian, :meal_preference, :meal_count)
            ");
            return $stmt->execute([
                ':user_id' => $userId,
                ':goal' => htmlspecialchars($goal),
                ':activity_level' => htmlspecialchars($activityLevel),
                ':daily_calories' => intval($dailyCalories),
                ':vegetarian' => htmlspecialchars($vegetarian),
                ':meal_preference' => htmlspecialchars($mealPreference),
                ':meal_count' => intval($mealCount),
            ]);
        } catch (PDOException $e) {
            error_log("Save Nutrition Plan Error: " . $e->getMessage());
            return false;
        }
    }



}
?>