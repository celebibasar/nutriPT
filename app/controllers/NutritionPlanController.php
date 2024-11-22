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
        
            // SESSION'dan nutrition_plan verilerini al
            $goal = $_SESSION['nutrition_plan']['goal'] ?? null;
            $activityLevel = $_SESSION['nutrition_plan']['activity_level'] ?? null;
            $dailyCalories = $_SESSION['nutrition_plan']['daily_calories'] ?? null;
            $vegetarian = $_SESSION['nutrition_plan']['vegetarian'] ?? null;
            $mealPreference = $_SESSION['nutrition_plan']['meal_preference'] ?? null;
            $mealCount = $_SESSION['nutrition_plan']['meal_count'] ?? null;
        
            // Tüm verilerin doldurulmuş olup olmadığını kontrol et
            if (!$goal || !$activityLevel || !$dailyCalories || !$vegetarian || !$mealPreference || !$mealCount) {
                echo '<a>' . $goal . ' ' . $activityLevel . ' ' . $dailyCalories . ' ' . $vegetarian . ' ' . $mealPreference . ' ' . $mealCount . '</a>';
                die('Tüm alanların doldurulması gerekiyor.');
            }
        
            // Verileri Model'e aktar
            $this->nutritionPlanModel->saveNutritionPlan($userId, $goal, $activityLevel, $dailyCalories, $vegetarian, $mealPreference, $mealCount);

            unset($_SESSION['nutrition_plan']);
        
            header('Location: /home');
            exit();
        }
        

}
?>
