<?php
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
$mealPlan = $this->nutritionPlanModel->getMealPlanByUserId($userId); 

if (!$mealPlan) {
    die('Beslenme planı bulunamadı.');
}

$userPlan = $this->nutritionPlanModel->getUserPlanByUserId($userId);

if ($userPlan && new DateTime($userPlan['end_date']) >= new DateTime()) {
    $startDate = new DateTime($userPlan['start_date']);
    $endDate = new DateTime($userPlan['end_date']);
} else {
    $startDate = new DateTime();
    $endDate = (clone $startDate)->modify('+30 days');

    $newPlan = $this->nutritionPlanModel->getDailyMeals(
        $mealPlan['goal'],
        $mealPlan['activity_level'],
        $mealPlan['daily_calories'],
        $mealPlan['vegetarian'],
        $mealPlan['meal_preference'],
        $mealPlan['meal_count']
    );

    if (empty($newPlan)) {
        die('Plan oluşturulamadı!'); 
    }

    $planJson = json_encode($newPlan);

    if ($planJson === false) {
        die('JSON formatına dönüştürme hatası: ' . json_last_error_msg());
    }
    $this->nutritionPlanModel->saveMealPlan(
        $userId,
        $planJson,
        $startDate->format('Y-m-d'),
        $endDate->format('Y-m-d')
    );

    $userPlan = [
        'plan_json' => $planJson,
        'start_date' => $startDate->format('Y-m-d'),
        'end_date' => $endDate->format('Y-m-d'),
    ];
}

$mealPlan = json_decode($userPlan['plan_json'], true);

if ($userPlan) {
    $userPlanJson = json_decode($userPlan['plan_json'], true);
}


$currentDate = new DateTime();  
if (isset($_GET['month_offset'])) {
    $monthOffset = (int)$_GET['month_offset'];
    $currentDate->modify("$monthOffset month"); 
} else {
    $monthOffset = 0;
}


$currentMonth = $currentDate->format('F Y');
$firstDayOfMonth = new DateTime($currentDate->format('Y-m-01'));
$firstDayOfWeek = (int)$firstDayOfMonth->format('w');
$firstDayOfWeek = ($firstDayOfWeek === 0) ? 6 : $firstDayOfWeek - 1;
$daysInMonth = (int)$firstDayOfMonth->format('t');

$weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Plan Calendar</title>
    <style>
        <?php require_once __DIR__ . '/../styles/style.css'; ?>
    </style>
</head>
<body>
    <?php include_once __DIR__ . '/../navbar.php'; ?>

    <div class="container">
        <div class="header">
            <h2>Monthly Meal Plan for <?php echo $currentMonth; ?></h2>
            <a href="?month_offset=<?php echo ($monthOffset === 1) ? 0 : -1; ?>" class="prev-month button">&lt; Previous Month</a>
            <a href="?month_offset=<?php echo ($monthOffset === -1) ? 0 : 1; ?>" class="next-month button">Next Month &gt;</a>
        </div>
    </div>
    <table class="meal-plan-calendar">
        <thead>
            <tr>
                <?php foreach ($weekDays as $day): ?>
                    <th><?php echo $day; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $dayCounter = 1; // Ayın ilk günü
            $totalCells = $firstDayOfWeek + $daysInMonth; // Ayın günleri + boş hücreler
            $weeks = ceil($totalCells / 7); // Kaç hafta gerektiğini hesapla

            for ($row = 0; $row < $weeks; $row++) {
                echo "<tr>";
                for ($col = 0; $col < 7; $col++) {
                    $cellIndex = ($row * 7) + $col;
                    if ($cellIndex >= $firstDayOfWeek && $dayCounter <= $daysInMonth) {
                        $currentDay = (clone $firstDayOfMonth)->modify('+' . ($dayCounter - 1) . ' days');
                        $isCurrentDay = ($currentDay->format('Y-m-d') === (new DateTime())->format('Y-m-d')) ? 'current-day' : '';

                        $dailyMeals = $userPlanJson[$currentDay->format('Y-m-d')] ?? [];
                        ?>
                        <td class="<?php echo $isCurrentDay; ?>">
                            <span class="day-number"><?php echo $dayCounter; ?></span>
                            <div class="meal-slot">
                                <strong>Breakfast:</strong><br>
                                <?php if (!empty($dailyMeals['Breakfast'])): ?>
                                    <a href="https://www.youtube.com/results?search_query=<?php echo urlencode($dailyMeals['Breakfast'] . ' recipe'); ?>" target="_blank">
                                        <?php echo htmlspecialchars($dailyMeals['Breakfast']); ?>
                                    </a>
                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>
                                <br><br>

                                <strong>Lunch:</strong><br>
                                <?php if (!empty($dailyMeals['Lunch'])): ?>
                                    <a href="https://www.youtube.com/results?search_query=<?php echo urlencode($dailyMeals['Lunch'] . ' recipe'); ?>" target="_blank">
                                        <?php echo htmlspecialchars($dailyMeals['Lunch']); ?>
                                    </a>
                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>
                                <br><br>

                                <strong>Dinner:</strong><br>
                                <?php if (!empty($dailyMeals['Dinner'])): ?>
                                    <a href="https://www.youtube.com/results?search_query=<?php echo urlencode($dailyMeals['Dinner'] . ' recipe'); ?>" target="_blank">
                                        <?php echo htmlspecialchars($dailyMeals['Dinner']); ?>
                                    </a>
                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>
                                <br>
                            </div>
                        </td>
                        <?php
                        $dayCounter++;
                    } else {
                        echo "<td></td>"; // Boş hücre
                    }
                }
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
</body>
</html>
