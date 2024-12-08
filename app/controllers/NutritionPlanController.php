<?php


class NutritionPlanController {
    private $nutritionPlanModel;
    private $userModel;

    public function __construct($nutritionPlanModel, $userModel) {
        $this->nutritionPlanModel = $nutritionPlanModel;

        $this->userModel = $userModel;
    }
    // 1. Adım: Beslenme Planı Oluşturma
    public function step1() {
        require_once __DIR__ . '/../modules/nutrition_plan/step1_view.php'; // İlk adımın view dosyasına yönlendir
    }

    // 2. Adım: Beslenme Planı Adımlarını Belirleme
    public function step2() {
        require_once __DIR__ . '/../modules/nutrition_plan/step2_view.php'; // İkinci adımın view dosyasına yönlendir
    }

    // 3. Adım: Beslenme Planını Tamamlama
    public function step3() {
        require_once __DIR__ . '/../modules/nutrition_plan/step3_view.php'; // Üçüncü adımın view dosyasına yönlendir
    }
    public function mealPlanCalendar() {
        require_once __DIR__ . '/../modules/nutrition_plan/meal_plan_calendar.php'; // Beslenme planı takviminin view dosyasına yönlendir
    }
    
    // Beslenme Planını Kaydetme
    public function finish()
    {
        // Kullanıcının oturum açıp açmadığını kontrol et
        if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
            header('Location: /login');
            exit();
        }

        $email = $_SESSION['email'] ?? null;
        if (!$email) {
            die('Oturumda e-posta bulunamadı.');
        }

        $userData = $this->userModel->getUserByEmail($email);
        if (!$userData || !isset($userData['user_id'])) {
            die('Kullanıcı bulunamadı.');
        }
        $userId = $userData['user_id'];

        $nutritionPlan = $_SESSION['nutrition_plan'] ?? null;

        if (!$nutritionPlan) {
            die('Beslenme planı verileri eksik.');
        }

        $goal = $nutritionPlan['goal'] ?? null;
        $activityLevel = $nutritionPlan['activity_level'] ?? null;
        $dailyCalories = $nutritionPlan['daily_calories'] ?? null;
        $vegetarian = $nutritionPlan['vegetarian'] ?? null;
        $mealPreference = $nutritionPlan['meal_preference'] ?? null;
        $mealCount = $nutritionPlan['meal_count'] ?? null;

        // Tüm verilerin doldurulmuş olup olmadığını kontrol et
        $missingFields = [];
        if (!$goal) $missingFields[] = 'Goal';
        if (!$activityLevel) $missingFields[] = 'Activity Level';
        if (!$dailyCalories) $missingFields[] = 'Daily Calories';
        if (!$vegetarian) $missingFields[] = 'Vegetarian';
        if (!$mealPreference) $missingFields[] = 'Meal Preference';
        if (!$mealCount) $missingFields[] = 'Meal Count';

        if (!empty($missingFields)) {
            $fields = implode(', ', $missingFields);
            die('Eksik alanlar: ' . $fields . '. Lütfen tüm alanları doldurun.');
        }

        $this->nutritionPlanModel->saveNutritionPlan($userId, $goal, $activityLevel, $dailyCalories, $vegetarian, $mealPreference, $mealCount);

        unset($_SESSION['nutrition_plan']);

        header('Location: /meal_plan_calendar');
        exit();
    }


}
?>
