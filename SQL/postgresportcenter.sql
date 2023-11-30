-- PostgreSQL için uygun hale getirilmiş SQL Dump

START TRANSACTION;
SET TIME ZONE 'UTC';

--
-- Veritabanı: `sportcenter`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS "admin" (
  "username" text NOT NULL,
  "password" text NOT NULL
);

--
-- Tablo döküm verisi `admin`
--

INSERT INTO "admin" ("username", "password") VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE IF NOT EXISTS "musteri" (
  "id" serial NOT NULL,
  "name" text NOT NULL,
  "surname" text NOT NULL,
  "enddate" date NOT NULL,
  "type" text NOT NULL
);

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO "musteri" ("name", "surname", "enddate", "type") VALUES
('Akif', 'Yanık', '2023-12-31', 'Gold Üyelik');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE "musteri"
  ADD PRIMARY KEY ("id");

-- AUTO_INCREMENT değeri PostgreSQL'de kullanılmaz.

COMMIT;
