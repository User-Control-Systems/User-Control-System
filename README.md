# Kurulum Kılavuzu


Bu kılavuz, Sport Center adlı websitesinin kurulumu için adım adım talimatlar içermektedir. Lütfen her adımı dikkatlice takip edin.

## Adım 1: Dosyaların İndirilmesi ve Cpanel'e Eklenmesi

1. sayfada İndirin.
2. Repository ana sayfasında bulunan "Code" butonuna tıklayın.
3. "Download ZIP" seçeneğiyle dosyaları bilgisayarınıza indirin.
4. Cpanel hesabınıza giriş yapın.
5. Dosyaları Cpanel'e yüklemek için "File Manager" bölümüne gidin.
6. İndirdiğiniz ZIP dosyasını seçerek "Upload" butonuna tıklayın ve dosyaları yükleyin.

## Adım 2: Phpmyadmin'de SQL Server Oluşturma

1. Cpanel ana sayfasında bulunan "Databases" bölümüne gidin.
2. "Phpmyadmin" seçeneğine tıklayarak Phpmyadmin'e girin.
3. Sol taraftaki menüden "New" sekmesine tıklayarak yeni bir SQL server oluşturun. Kullanıcı adı olarak "root" ve şifre olarak boş bırakın.
4. Oluşturduğunuz SQL server'a tıklayarak içine giriş yapın.

## Adım 3: SQL Dosyasını Import Etme

1. Phpmyadmin ana sayfasında bulunan "Import" sekmesine gidin.
2. "File to import" bölümünden "Browse your computer" seçeneği ile indirdiğiniz dosya dizinine gidin.
3. GitHub'dan indirdiğiniz dosyalar arasında yer alan `/SQL/mysqlsportcenter.sql` dosyasını seçin.
4. "Go" butonuna tıklayarak SQL dosyasını import edin.

## Adım 4: Siteye Giriş Yapma

1. Tarayıcınızı açın ve Sport Center websitesinin adresine gidin (örneğin: `http://www.sportcenter.com`).
2. Ana sayfada "Login" veya "Giriş Yap" seçeneğine tıklayın.

## Adım 5: Admin Girişi

1. Kullanıcı adı ve şifre giriş ekranında, admin kullanıcı adını ve admin şifresini kullanarak giriş yapın.
2. Başarılı giriş sonrasında yönetim paneline erişim sağlayacaksınız.

## Adım 6: Siteyi Kullanıma Hazır Hale Getirme

1. Yönetim panelinden gerekli ayarları yaparak siteyi kişiselleştirin.
2. Gerekli içerikleri ekleyerek Sport Center websitesini kullanıma hazır hale getirin.

Artık Sport Center websitesi başarıyla kurulmuş ve kullanıma hazır durumda. İyi eğlenceler!
