<?php

class NutritionPlanController {
    
    // 1. Adım: Beslenme Planı Oluşturma
    public function step1() {
        require_once __DIR__ . '/step1_view.php'; // İlk adımın view dosyasına yönlendir
    }

    // 2. Adım: Beslenme Planı Adımlarını Belirleme
    public function step2() {
        require_once __DIR__ . '/step2_view.php'; // İkinci adımın view dosyasına yönlendir
    }

    // 3. Adım: Beslenme Planını Tamamlama
    public function step3() {
        require_once __DIR__ . '/step3_view.php'; // Üçüncü adımın view dosyasına yönlendir
    }

    public function step4() {
        require_once __DIR__ . '/step4_view.php'; // Üçüncü adımın view dosyasına yönlendir
    }

    // Son adım: Beslenme Planını Kaydetme ve Tamamlama
    public function finish() {
        // Burada beslenme planını veritabanına kaydedebiliriz.
        // Veritabanı işlemleri yapılacak.
        echo "Beslenme planınız başarıyla tamamlandı!";
    }
}
?>
