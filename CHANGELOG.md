# Changelog

## 23.11.24 v0.21 Yapılan Değişikliklerin Özeti
- **İstek Yolunun Normalleştirilmesi**: Tutarlı URL eşleşmesini sağlamak için son eklenen çizgiler kaldırıldı.
- **Yönlendirme Durumlarının İyileştirilmesi**: Ana sayfaya erişmenin birden fazla yolunu ele almak için `switch` ifadesi güncellendi.
- **Mantığı Konsolide Etme**: `switch` ifadesinde doğrudan `$request` kullanılarak yönlendirme mantığı basitleştirildi.
- **URL Yeniden Yazma**: Apache için `.htaccess` dosyasıyla URL yönlendirme yapılandırma talimatları eklendi.

### Detaylı açıklama

#### 1. İstek Yolunun Normalleştirilmesi
##### Önce:
```php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
```
Orijinal `$request` değişkeni, `$_SERVER['REQUEST_URI']` değişkeninden doğrudan URL yolunu içeriyordu ve bu, yanlış eşleşmelere yol açabilecek son eklenen çizgileri içerebilirdi.

###### Sonra:
```php
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = rtrim($request, '/');
```
- `rtrim($request, '/')` eklenerek istek yolundaki son eklenen çizgiler kaldırıldı.
- Bu değişiklik, kullanıcı URL'ye son eklenen çizgi eklese bile `switch` ifadesinde daha tutarlı eşleşmeler sağlar.

#### 2. Yönlendirme İçin Switch Durumlarının İyileştirilmesi
##### Önce:
```php
switch ($rootPath) {
    case $rootPath . '/home':
    // Diğer durumlar...
}
```
- `switch` ifadesi, gelen istek yollarını eşleştirmek için `$rootPath` kullanıyordu, bu da etkili değildi.

##### Sonra:
```php
switch ($request) {
    case '/nutriPT/app/index.php':
    case '/nutriPT':
    case '/nutriPT/home':
        $controller = new HomeController();
        $controller->index();
        break;
    // Diğer durumlar...
}
```
- `switch` ifadesi, doğrudan URL eşleştirme için `$request` kullanacak şekilde değiştirildi.
- Ana sayfanın doğru şekilde işlenmesini sağlamak için `/nutriPT/app/index.php`, `/nutriPT` ve `/nutriPT/home` için yeni durumlar eklendi.
- Bu değişiklikler, hem `/nutriPT` hem de `/nutriPT/app/index.php` adreslerinin ana sayfa için geçerli istekler olarak tanınmasını sağlayarak 404 hatasını önler.

#### 3. URL Yönlendirme Mantığının Konsolidasyonu
- Yönlendirme mantığını basitleştirmek için `switch` ifadesindeki `$rootPath` kullanımı kaldırıldı.
- Farklı olası yolları doğrudan `$request` kullanarak ele alındı, bu da kodun daha okunabilir ve eşleşme hatalarına daha az yatkın olmasını sağladı.

#### 4. İsteğe Bağlı URL Yeniden Yazma Yapılandırması
Kodda yapılan değişikliklere ek olarak, Apache sunucusu kullanılıyorsa doğru URL yeniden yazımını sağlamak için örnek bir `.htaccess` dosyası sağlanmıştır.

##### Örnek `.htaccess`:
```apache
RewriteEngine On
RewriteBase /nutriPT/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```
- Bu `.htaccess` dosyası, istek mevcut bir dosya veya dizin için değilse tüm istekleri `index.php`'ye yönlendirir ve betiğin dinamik olarak yönlendirme yapmasına olanak tanır.