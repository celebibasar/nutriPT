# Security Policy

Bu belgedeki yönergeler, projemizde olası güvenlik açıklarını tanımlamak ve güvenlik araştırmacılarına açıkların raporlanması sürecini açıklamak için hazırlanmıştır. Projemizin güvenliğini artırmak için katkıda bulunmak isteyen herkese teşekkür ederiz.

## Supported Versions

Aşağıdaki proje sürümleri için güvenlik güncellemeleri ve destek sağlanmaktadır:

| Version   | Supported          |
|-----------|---------------------|
| 1.x       | :white_check_mark:  |
| 0.x       | :x:                |

## Reporting a Vulnerability

### Adım 1: Güvenlik Açığı Bildirimi
Güvenlik açıklarını **açık bir forumda bildirmeyin**. Güvenlik hassasiyetleri için gizli bir raporlama süreci izlemekteyiz. Güvenlik açığı bildirimleri için aşağıdaki yöntemleri izleyin:

1. **E-posta**: Güvenlik ekibimize `mail@uaytug.dev` adresinden ulaşarak güvenlik açıklarını bildirebilirsiniz. Bildiriminizi yaparken lütfen açık, anlaşılır ve detaylı bir açıklama sunun.

### Adım 2: Bildirimde Bulunulacak Bilgiler
Bildirim yaparken aşağıdaki bilgileri eklemeyi unutmayın:

- Güvenlik açığının kısa açıklaması.
- Açığın detaylı açıklaması ve mümkünse nasıl tetiklendiğine dair bilgiler.
- Açığın etkilendiği proje sürümü ya da bileşenler.
- Etki derecesini açıklayan bilgiler (örn. kullanıcıya ait verilerin açığa çıkması, yönetici yetkilerinin elde edilmesi).
- Açığı doğrudan tetikleyen örnek bir kod veya PoC (Proof of Concept).

### Adım 3: Raporlama Süreci
Güvenlik ekibimiz raporunuzu aldıktan sonra aşağıdaki süreci izleyecektir:

1. **İlk Yanıt**: Güvenlik ekibimiz, bildiriminizi aldıktan sonra en geç 72 saat içinde size bir yanıt sağlayacaktır.
2. **Değerlendirme ve Doğrulama**: Bildirilen açıkları araştırır ve doğrularız. Ek bilgiye ihtiyaç duyulursa sizden daha fazla detay istenebilir.
3. **Düzeltme Süreci**: Doğrulanan açık için bir çözüm geliştirilir. Kritik güvenlik açıkları en hızlı şekilde çözülmeye çalışılır.
4. **Sürüm Yayınlama**: Gerekli düzeltmeleri içeren bir sürüm yayımlanır ve değişiklikler hakkında sizi bilgilendiririz.

## Security Best Practices

- **Güncellemeler**: Her zaman en güncel sürümü kullanın. Eski sürümlerde düzeltmeler yapılmayabilir.
- **Veri Güvenliği**: Kişisel bilgileri asla kaynak kodda paylaşmayın.
- **Kod İncelemesi**: Kod katkılarınızı göndermeden önce güvenlik açısından gözden geçirin.
- **Şifre Yönetimi**: Hard-coded şifrelerden ve API anahtarlarından kaçının. Bunları çevresel değişkenlerle yöneterek `config.env` gibi dosyalarla yönetin.

## Acknowledgments

Güvenlik ekibimize katkıda bulunan ve projemizi daha güvenli hale getiren tüm güvenlik araştırmacılarına teşekkür ederiz.
