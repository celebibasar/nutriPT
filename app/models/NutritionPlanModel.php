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
    public function saveUserPlan ($userId, $age, $weight, $height){
        try {
            $stmt = $this->db->prepare("
                UPDATE users 
                SET age = :age, height = :height, weight = :weight
                WHERE user_id = :user_id
            ");
            return $stmt->execute([
                ':user_id' => $userId,
                ':height' => intval($height),
                ':weight' => intval($weight),
                ':age' => intval($age),
            ]);
        } catch (PDOException $e) {
            error_log("Save User Plan Error: " . $e->getMessage());
            return false;
        }
    }

    public function getMealPlanByUserId($userId)
    {
        // SQL sorgusu
        $sql = "SELECT * FROM nutrition_plan WHERE user_id = :user_id ORDER BY created_at DESC LIMIT 1";
        
        // Prepared statement oluştur
        $stmt = $this->db->prepare($sql);
        
        // Parametreyi bağla
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        
        // Sorguyu çalıştır
        $stmt->execute();
        
        // Sonuçları al
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Eğer sonuç varsa döndür, yoksa null döndür
        return $result ? $result : null;
    }

    function getDailyMeals($goal, $activityLevel, $dailyCalories, $vegetarian, $mealPreference, $mealCount) {
        // Örnek yemekler (Veritabanından veya dış bir kaynaktan çekilebilir)
        $meals = [
            'Breakfast' => [
                'Protein Shake' => 300, 
                'Oats and Fruit' => 350, 
                'Scrambled Eggs' => 400, 
                'Avocado Toast' => 450,
                'Pancakes' => 500,
                'Greek Yogurt with Honey' => 350,
                'Egg and Spinach Wrap' => 400,
                'Peanut Butter Smoothie' => 450,
                'Bagel with Cream Cheese' => 350,
                'Muesli with Almonds' => 400,
                'Cottage Cheese with Berries' => 350,
                'Breakfast Burrito' => 500,
                'Egg White Omelette' => 350,
                'Smoked Salmon Toast' => 500,
                'Apple Cinnamon Oatmeal' => 400,
                'French Toast with Syrup' => 550
            ],
            'Vegetarian Breakfast' => [
                'Chia Pudding' => 300, 
                'Vegan Pancakes' => 400,
                'Almond Butter Toast' => 350,
                'Fruit Salad' => 250,
                'Oatmeal with Nuts' => 350,
                'Tofu Scramble' => 450,
                'Vegan Smoothie Bowl' => 400,
                'Avocado and Tomato Toast' => 350,
                'Vegan French Toast' => 450,
                'Vegan Sausage with Scrambled Tofu' => 500,
                'Mango Coconut Chia Pudding' => 350,
                'Vegan Granola with Plant Milk' => 400,
                'Acai Bowl' => 450,
                'Banana Nut Smoothie' => 400,
                'Sweet Potato Hash' => 450
            ],
            'Lunch' => [
                'Grilled Chicken and Veg' => 500, 
                'Salmon and Veg' => 550, 
                'Turkey Sandwich' => 450, 
                'Beef Stir Fry' => 550,
                'Chicken Caesar Salad' => 600,
                'Tuna Salad' => 400,
                'Chicken Burrito Bowl' => 600,
                'Chicken Parmesan' => 650,
                'Grilled Steak and Salad' => 700,
                'BBQ Chicken Wrap' => 550,
                'Beef Tacos' => 500,
                'Pasta Primavera with Chicken' => 600,
                'Shrimp Tacos' => 450,
                'Chicken Fajitas' => 550,
                'Poke Bowl with Tuna' => 500
            ],
            'Vegetarian Lunch' => [
                'Veggie Salad' => 400, 
                'Tofu Stir-fry' => 450,
                'Chickpea Salad' => 350,
                'Lentil Soup' => 350,
                'Quinoa Bowl' => 450,
                'Grilled Veggie Wrap' => 400,
                'Falafel with Hummus' => 500,
                'Mushroom Risotto' => 550,
                'Vegan Burrito' => 500,
                'Sweet Potato and Black Bean Salad' => 400,
                'Vegetarian Chili' => 500,
                'Zucchini Noodles with Tomato Sauce' => 350,
                'Vegan Burger' => 600,
                'Veggie Paella' => 550,
                'Stuffed Bell Peppers' => 450
            ],
            'Dinner' => [
                'Salmon and Veg' => 550, 
                'Chicken Salad' => 400, 
                'Steak and Veg' => 700,
                'Pasta with Meatballs' => 600,
                'Grilled Shrimp' => 500,
                'Chicken and Rice' => 450,
                'Roast Chicken with Vegetables' => 650,
                'Baked Salmon with Rice' => 600,
                'Lamb Chops and Veg' => 750,
                'Grilled Pork Chops' => 650,
                'Chicken Alfredo' => 700,
                'Beef Wellington' => 800,
                'Grilled Tuna Steaks' => 600,
                'Sushi with Salmon and Avocado' => 500,
                'Roast Beef and Potatoes' => 750
            ],
            'Vegetarian Dinner' => [
                'Vegan Stew' => 450,
                'Vegetable Stir Fry' => 400,
                'Tofu and Rice' => 450,
                'Vegetable Curry' => 500,
                'Grilled Portobello Mushroom' => 350,
                'Eggplant Parmesan' => 600,
                'Vegetarian Lasagna' => 550,
                'Stuffed Zucchini' => 450,
                'Cauliflower Steak with Rice' => 500,
                'Vegan Tacos' => 400,
                'Lentil and Spinach Soup' => 350,
                'Butternut Squash Risotto' => 550,
                'Vegetarian Shepherd’s Pie' => 600,
                'Vegan Mac and Cheese' => 550,
                'Sweet Potato and Kale Salad' => 400,
                'Chickpea and Spinach Stew' => 450
            ]
        ];
    
        // Meal Count ve Meal Preference'a göre öğün ayarları
        $mealsPerDay = [];
        $mealTypes = [
            1 => ['Lunch'],
            2 => ['Breakfast', 'Lunch'],
            3 => ['Breakfast', 'Lunch', 'Dinner'],
            4 => ['Breakfast', 'Lunch', 'Dinner', 'Snack'],
            5 => ['Breakfast', 'Lunch', 'Dinner', 'Snack1', 'Snack2'],
            6 => ['Breakfast', 'Lunch', 'Dinner', 'Snack1', 'Snack2', 'Evening Snack'],
            7 => ['Breakfast', 'Lunch', 'Dinner', 'Snack1', 'Snack2', 'Evening Snack', 'Night Snack']
        ];
    
        if (array_key_exists($mealCount, $mealTypes)) {
            $mealsPerDay = $mealTypes[$mealCount];
        }
    
        // Tarih üzerinden yemek planını oluştur
        $dailyMeals = [];
        $currentDate = new DateTime(); // Bugünün tarihi
        for ($i = 0; $i < 30; $i++) { // 30 gün boyunca yemek planı oluştur
            $dateKey = $currentDate->format('Y-m-d'); // Her günün tarihi anahtar olarak
            $dailyMeals[$dateKey] = [];
    
            foreach ($mealsPerDay as $mealType) {
                // Vejetaryen kontrolü
                if ($vegetarian && isset($meals["Vegetarian $mealType"])) {
                    $mealList = $meals["Vegetarian $mealType"];
                } else {
                    $mealList = $meals[$mealType];
                }
    
                // Kalori filtreleme işlemi
                $filteredMeals = [];
                foreach ($mealList as $meal => $calories) {
                    if ($goal == 'Weight Loss' && $calories <= $dailyCalories / $mealCount) {
                        $filteredMeals[$meal] = $calories;
                    } elseif ($goal == 'Weight Gain' && $calories >= $dailyCalories / $mealCount) {
                        $filteredMeals[$meal] = $calories;
                    } elseif ($goal == 'Maintain' && $calories == $dailyCalories / $mealCount) {
                        $filteredMeals[$meal] = $calories;
                    }
                }
    
                // Öğün listesinde sonuç varsa, bunu ekleyelim
                if (!empty($filteredMeals)) {
                    $selectedMeal = array_rand($filteredMeals);
                    $dailyMeals[$dateKey][$mealType] = $selectedMeal;
                } else {
                    // Eğer filteredMeals boşsa, mealList'teki herhangi bir öğün seçilebilir
                    $selectedMeal = array_rand($mealList);
                    $dailyMeals[$dateKey][$mealType] = $selectedMeal;
                }
            }
    
            // Günün tarihini bir gün ileri alıyoruz
            $currentDate->modify('+1 day');
        }
    
        // Sonuçları döndürelim
        return $dailyMeals;
    }
    

    public function getUserPlanByUserId($userId) {
        $query = "SELECT * FROM user_meal_plans WHERE user_id = :user_id AND end_date >= CURDATE() LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function saveMealPlan($userId, $planJson, $startDate, $endDate) {
        $query = "INSERT INTO user_meal_plans (user_id, plan_json, start_date, end_date) 
                  VALUES (:user_id, :plan_json, :start_date, :end_date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':plan_json', $planJson, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $endDate, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    
    
    

}
?>