## GitHub Repo İndirici

### Proje Açıklaması
GitHub Repo İndirici, kullanıcılara GitHub'dan belirli bir repository'yi kolayca indirme imkanı sağlayan basit bir web uygulamasıdır. Kullanıcı, repository URL'sini ve branch ismini girerek zip formatında indirme işlemini gerçekleştirebilir.

### Gereksinimler
- Web sunucusu (Apache, Nginx vb.)
- PHP 5.6 veya üstü
- İnternet bağlantısı

### Kurulum ve Çalıştırma
1. Proje dosyalarını web sunucusunun kök dizinine yükleyin.
2. Tarayıcınızdan `index.php` dosyasını açarak uygulamayı başlatın.

### Dosya Yapısı
- `index.php`: Kullanıcı arayüzünü içeren ana dosya.
- `download.php`: İndirme işlemlerini gerçekleştiren sunucu taraflı dosya.

### Kullanım
1. `index.php` dosyasını tarayıcıda açın.
2. GitHub repository URL'sini ve branch ismini ilgili alanlara girin.
3. "İndir" butonuna tıklayın.
4. Dosyanız hazır olduğunda, indirme linki ekranda görünecektir.

### Çalışma Mantığı
1. Kullanıcı, `index.php` dosyasında bulunan formu doldurarak repository URL'si ve branch ismini girer.
2. Form gönderildiğinde, `download.php` dosyasına POST isteği yapılır.
3. `download.php`, GitHub API'sini kullanarak belirtilen repository ve branch için bir zip dosyası oluşturur.
4. İndirme linki oluşturulur ve kullanıcıya gösterilir.

### Fonksiyonlar
- **index.php**:
  - Kullanıcıdan repository URL'si ve branch ismi alır.
  - jQuery ile form verilerini `download.php` dosyasına gönderir.
  - İndirme linkini kullanıcıya gösterir.
  
- **download.php**:
  - POST isteğini alır ve verileri işler.
  - GitHub API'sini kullanarak zip dosyasını oluşturur.
  - İndirme linkini oluşturur ve döndürür.

### Örnek Kullanım
1. Tarayıcıdan `index.php` dosyasını açın.
2. "GitHub Repo URL'si" alanına `https://github.com/kullaniciadi/repository` yazın.
3. "Branch İsmi" alanına `main` yazın.
4. "İndir" butonuna tıklayın.
5. Dosya indirilmeye hazır olduğunda ekranda indirme linki görünecektir.


### Lisans
Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için `LICENSE` dosyasına bakın.
