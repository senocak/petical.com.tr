-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Haz 2016, 18:09:58
-- Sunucu sürümü: 5.6.14
-- PHP Sürümü: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `petical`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kullanici_adi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tarih` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yetki_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `ad_soyad`, `kullanici_adi`, `sifre`, `tarih`, `yetki_id`) VALUES
(1, 'anil senocak', 'petical', '666e7c17e364e729a3ae87dad4e4e3d5', '01/01/1994', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `footer` text COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adres` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `title`, `footer`, `site_url`, `eposta`, `telefon`, `logo`, `facebook`, `twitter`, `adres`) VALUES
(1, 'Petical - Mersin Hayvan Hastanesi', 'Petical', 'http://localhost/petical', 'info@petical.com.tr', '444 37 38', 'logo.png', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donanimlarimiz`
--

CREATE TABLE IF NOT EXISTS `donanimlarimiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `donanimlarimiz`
--

INSERT INTO `donanimlarimiz` (`id`, `resim`, `baslik_tr`, `baslik_en`, `url`, `icerik_tr`, `icerik_en`, `siralama`) VALUES
(1, 'crp_test_cihazi.png', 'CRP TEST CİHAZI', 'CRP TEST CİHAZI', 'crp_test_cihazi', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '<p>aaLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 0),
(2, 'yogun_bakim.jpg', 'Yoğun Bakım - Hasta Yatış', 'a', 'yogun_bakim', 'Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış Yoğun Bakım - Hasta Yatış ', 'aa', 4),
(3, 'rontgen.jpg', 'Dijital Röntgen', '', 'rontgen', 'Dijital Röntgen Dijital Röntgen Dijital Röntgen Dijital Röntgen Dijital Röntgen Dijital Röntgen Dijital Röntgen Dijital Röntgen ', '', 3),
(4, 'misafir.jpg', 'Misafirhane', '', 'misafir', 'Misafirhane Misafirhane Misafirhane Misafirhane Misafirhane Misafirhane Misafirhane Misafirhane ', '', 1),
(5, 'koruyucu.jpg', 'Koruyucu Hekimlik', '', 'koruyucu', 'Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik Koruyucu Hekimlik ', '', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekibimiz`
--

CREATE TABLE IF NOT EXISTS `ekibimiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gorevi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `ekibimiz`
--

INSERT INTO `ekibimiz` (`id`, `ad_soyad`, `gorevi`, `resim`, `icerik`, `url`, `siralama`) VALUES
(1, 'Mehtap Akkaya', 'Yardımcı Personel\n', 'mehtap-akkaya.jpg', ' 1984 yılında Diyarbakır''da doğdu. Mersin İbrahim Karaoğlu İlköğretim Okulundan mezun oldu. 2014 yılı nisan ayından itibaren Petical Hayvan Hastanesi mutfağında görev yapan Mehtap Akkaya, evli ve bir kız çocuğu annesidir.\n', 'mehtap-akkaya', 0),
(2, 'Eda Can', 'Veteriner Hekim', 'eda_can_1.jpg', '<p>-1985 yılında Mersin&rsquo;de doğdu. Lise &ouml;ğrenimini Tarsus Cengiz Topel Lisesi&rsquo;nde tamamladı ve 2010 yılında Sel&ccedil;uk &Uuml;niversitesi Veteriner Fak&uuml;ltesi&rsquo;nden mezun oldu. 2008-2009 yılları yaz aylarında Mersin &Ouml;zvet Veteriner Polikliniğinde staj yaptı. 2009 yılında 4 ay boyunca İtalya Torino &Uuml;niversitesi K&uuml;&ccedil;&uuml;k Hayvan Hastanesi ve yine Torino&rsquo; da Anubi K&uuml;&ccedil;&uuml;k Hayvan Hastanesi&rsquo;nde stajyer &ouml;ğrenci olarak &ccedil;alıştı. 2011 yılı şubat ayında Sel&ccedil;uk &Uuml;niversitesi Veteriner Fak&uuml;ltesi Dahiliye Anabilim Dalında y&uuml;ksek lisans &ouml;ğrenimine başladı. Orta seviyede İngilizce ve başlangı&ccedil; seviyesinde İtalyanca bilmektedir.</p>\r\n', 'eda_can', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `galeri_id` int(11) NOT NULL,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`id`, `resim`, `galeri_id`, `baslik_tr`, `baslik_en`) VALUES
(1, 'galeri1.png', 1, 'Anıl Şenocak', ''),
(2, 'galeri2.png', 1, 'Anıl Şenocak', ''),
(3, 'galeri3.png', 2, 'Servet Taş1', 'Servet Taş2'),
(5, 'Adsz.png', 2, 'Anıl Şenocak', 'Anıl Şenocak'),
(6, 'bilgi_medyaa.png', 1, 'Bilgi Medyaa', 'Bilgi Medyaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri_kategori`
--

CREATE TABLE IF NOT EXISTS `galeri_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `galeri_kategori`
--

INSERT INTO `galeri_kategori` (`id`, `baslik_tr`, `baslik_en`, `url`) VALUES
(1, 'Anıl', 'Şenocak', 'anil_senocak'),
(2, 'SERVETT', 'TAŞŞ', 'servett');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetlerimiz`
--

CREATE TABLE IF NOT EXISTS `hizmetlerimiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tarih` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `hizmetlerimiz`
--

INSERT INTO `hizmetlerimiz` (`id`, `baslik_tr`, `baslik_en`, `resim`, `icerik_tr`, `icerik_en`, `url`, `kategori_id`, `tarih`, `siralama`) VALUES
(1, 'Ortopedi', 'Ortopedia', 'ortopedi.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 'ortopedi', 1, '01/01/1990', 1),
(2, 'Cerrahi', 'Surgery', 'cerrahi.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 'cerrahi', 1, '01/01/1999', 2),
(3, 'İç Hastalıkları', 'internal diseases', 'İç Hastalıkları.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 'ic_hastaliklari', 1, '', 3),
(4, 'Doğum ve Jinekoloji', 'Birth', 'Doğum ve Jinekoloji.jpg', 'Doğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve JinekolojiDoğum ve Jinekoloji', '', 'dogum_ve_jinekoloji', 1, '', 0),
(5, 'Pet Kuaför', 'Pet Kuaforr', 'Pet Kuaför.jpg', 'Pet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet KuaförPet Kuaför', '', 'pet_kuafor', 2, '', 1),
(6, 'Temel ve İleri Görüntüleme', 'Basic and Advanced Viewer', 'Temel ve İleri Görüntüleme.jpg', 'Temel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri GörüntülemeTemel ve İleri Görüntüleme', '', 'temel_ve_ileri_goruntuleme', 2, '', 0),
(7, 'Yoğun Bakım ve Hasta Yatış', 'Emergency', 'Yoğun Bakım ve Hasta Yatış.jpg', 'Yoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpgYoğun Bakım ve Hasta Yatış.jpg', '', 'yogun_bakim_ve_hasta_yagis', 2, '', 2),
(8, 'Servis', 'Service', 'Servis.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', 'servis', 3, '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetlerimiz_kategori`
--

CREATE TABLE IF NOT EXISTS `hizmetlerimiz_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_ismi_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_ismi_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `hizmetlerimiz_kategori`
--

INSERT INTO `hizmetlerimiz_kategori` (`id`, `kategori_ismi_tr`, `kategori_ismi_en`, `url`, `siralama`) VALUES
(1, 'Acil Servis', 'a', 'acil_servis', 1),
(2, 'Fizik Tedavi ve Rehabilitasyon', 'b', 'fizik_tedavi_ve_rehabilitasyon', 0),
(3, 'Diğer Servis', 'c', 'diger_servis', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurumsal`
--

CREATE TABLE IF NOT EXISTS `kurumsal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kurumsal`
--

INSERT INTO `kurumsal` (`id`, `baslik_tr`, `baslik_en`, `resim`, `icerik_tr`, `icerik_en`, `url`, `siralama`) VALUES
(1, 'Biz Kimiz', 'Who Are We?', 'biz_kimiz.jpg', 'Petical Hayvan hastanesi bir Özvet Group kuruluşudur.Özvet Group Yönetim Kurulu Başkanı olan Orhan Özbaba 1981 yılında Ankara Üniversitesi Veteriner Fakültesinden mezun oldu. 1998-2006 yılları arasında Mersin Veteriner Hekimler Odası Başkanlığı yaptı ve bu dönemde ‘Türkiye Serbest Veteriner Hekimler Kongresi’ni gerçekleştirdi. Orhan Özbaba halen Mersin Ticaret ve Sanayi Odası meclis üyeliği ve Türkiye Odalar ve Borsalar Birliği delegeliğini sürdürmektedir.30 yıllık meslek hayatına büyükbaş hayvan hekimliği ile başlayan Özbaba o yıllarda 3.000''e yakın inek operasyonu yaptı. 1998 yılında mesleki hayatını küçük hayvan hekimliği yaparak sürdürme kararı aldı. Ultrason ve röntgen cihazlarını Mersin’e ilk getiren veteriner hekim oldu ve küçük dostlarımız için hizmete sundu. Tüm bu çalışmalarla birlikte onlarca stajyer Veteriner Hekim yetiştirdi ve mesleğe hazırladı.Yine Özvet Group kuruluşları olan ‘Alibaba Kennels Köpek Eğitim ve Üretim Merkezi’ ve Forum Mersin Alışveriş Merkezi’nde yer alan ‘Petstore'' mağazasını bu süreçlerde faaliyete geçirerek kendi sektöründe birden çok alanda hizmet vermeyi sürdürmektedir. 2011 yılında, Özvet Group Yönetim Kurulu Üyeleri olan kızı Veteriner Hekim Merve Özbaba ve Ekonomist oğlu Eren Özbaba’nın desteği ve işbirliği ile 13 yıl boyunca birlikte çalışma fırsatı bulduğu meslektaşları ve stajyerlerini de bünyesine katarak Petical Hayvan Hastanesini kurdu. Bir Özvet Group kuruluşu olan Petical Hayvan Hastanesi, uzman kadrosu ve çağın tıbbi gelişmelerine uygun donanımı ile küçük dostlarımıza ve sizlere hizmet vermeyi sürdürüyor.\n', 'En Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget justo sed nisl lobortis ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ac mi non lacus molestie ultricies quis sed arcu. Donec et auctor lectus. Suspendisse potenti. Maecenas iaculis venenatis leo, non euismod sapien feugiat sed. Aenean nec gravida diam, vitae convallis justo. Etiam lectus justo, vehicula et accumsan non, congue sed magna. Donec ut nulla fermentum, congue nisl at, finibus nibh. In pulvinar luctus congue. Suspendisse potenti. Aenean consequat lorem vitae elit maximus, in malesuada erat lobortis. Quisque volutpat ultrices dolor, at facilisis libero eleifend sit amet.  Aenean ultricies pulvinar enim. Donec quis justo vel arcu tempus consectetur. Nunc ac sem ac nisi dictum tempor. Vivamus gravida ligula a mattis imperdiet. Donec sagittis, nulla at sagittis pharetra, dolor nisl semper velit, in vulputate risus eros sed orci. Praesent sit amet malesuada ante, vel rutrum libero. Mauris vulputate iaculis turpis. Cras ullamcorper suscipit justo, nec imperdiet arcu vulputate nec. Mauris tristique felis in dapibus cursus. Donec dignissim eros tristique metus tristique, vel semper ipsum vehicula. Nunc non ante sed erat posuere cursus a eu diam. Nam dapibus, eros nec hendrerit fermentum, quam velit tincidunt massa, eget venenatis dolor elit quis nisl. Vestibulum sapien massa, fermentum non orci vestibulum, pulvinar varius purus. Ut ornare, risus vitae facilisis lobortis, odio ligula rutrum tellus, sit amet rutrum arcu nisi in diam.  Aenean ut turpis sit amet ipsum varius iaculis. Nam dapibus elementum lectus. Ut hendrerit lacus ac nulla egestas, quis ultricies lacus vulputate. Morbi vestibulum non mi a sodales. Sed in mauris in metus posuere elementum at eu leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin neque nulla, tempus eu nibh id, auctor scelerisque lorem.  Sed eu dignissim nulla. Aenean sed elit ultrices, ultrices velit vitae, auctor arcu. Nunc massa ante, dapibus a ornare id, bibendum accumsan metus. Maecenas nec viverra mauris. Ut consectetur aliquam elit fermentum convallis. Vivamus sit amet ornare dolor, sed mattis dui. Fusce auctor est ac quam porta, nec mattis risus porta. Pellentesque sit amet augue semper, egestas erat at, placerat enim. Nunc hendrerit metus quis ante luctus ullamcorper.  Praesent luctus sed ex quis viverra. Cras condimentum, velit sed venenatis elementum, eros enim laoreet felis, a pulvinar nibh sem vitae magna. Donec quis erat quam. Suspendisse at dui vitae odio porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris venenatis viverra lectus ac dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam pretium tempor laoreet. Integer sollicitudin sem molestie lectus tempus vehicula. Vivamus in pretium enim, ut iaculis mi. Pellentesque elementum mi odio, id posuere neque eleifend sed. Suspendisse dictum mattis nisl sit amet eleifend. Duis vehicula odio ligula, non euismod lectus ultricies vitae.', 'biz_kimiz', 0),
(3, 'KURUMSAL', 'KURUMSAL', 'kurumsal_1.jpg', '<p>kurumsal</p>\r\n', '<p>kurumsal</p>\r\n', 'kurumsal', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler`
--

CREATE TABLE IF NOT EXISTS `makaleler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yazar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tarih` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `makaleler`
--

INSERT INTO `makaleler` (`id`, `baslik_tr`, `baslik_en`, `resim`, `icerik_tr`, `icerik_en`, `kategori`, `yazar`, `tarih`, `url`) VALUES
(1, 'KEDİ VE KÖPEKLERDE İDRAR TAŞI OLUŞUMU', 'KEDİ VE KÖPEKLERDE İDRAR TAŞI OLUŞUMU', 'kedi_ve_kopeklerde_idrar_tasi_olusumu.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget justo sed nisl lobortis ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ac mi non lacus molestie ultricies quis sed arcu. Donec et auctor lectus. Suspendisse potenti. Maecenas iaculis venenatis leo, non euismod sapien feugiat sed. Aenean nec gravida diam, vitae convallis justo. Etiam lectus justo, vehicula et accumsan non, congue sed magna. Donec ut nulla fermentum, congue nisl at, finibus nibh. In pulvinar luctus congue. Suspendisse potenti. Aenean consequat lorem vitae elit maximus, in malesuada erat lobortis. Quisque volutpat ultrices dolor, at facilisis libero eleifend sit amet. Aenean ultricies pulvinar enim. Donec quis justo vel arcu tempus consectetur. Nunc ac sem ac nisi dictum tempor. Vivamus gravida ligula a mattis imperdiet. Donec sagittis, nulla at sagittis pharetra, dolor nisl semper velit, in vulputate risus eros sed orci. Praesent sit amet malesuada ante, vel rutrum libero. Mauris vulputate iaculis turpis. Cras ullamcorper suscipit justo, nec imperdiet arcu vulputate nec. Mauris tristique felis in dapibus cursus. Donec dignissim eros tristique metus tristique, vel semper ipsum vehicula. Nunc non ante sed erat posuere cursus a eu diam. Nam dapibus, eros nec hendrerit fermentum, quam velit tincidunt massa, eget venenatis dolor elit quis nisl. Vestibulum sapien massa, fermentum non orci vestibulum, pulvinar varius purus. Ut ornare, risus vitae facilisis lobortis, odio ligula rutrum tellus, sit amet rutrum arcu nisi in diam. Aenean ut turpis sit amet ipsum varius iaculis. Nam dapibus elementum lectus. Ut hendrerit lacus ac nulla egestas, quis ultricies lacus vulputate. Morbi vestibulum non mi a sodales. Sed in mauris in metus posuere elementum at eu leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin neque nulla, tempus eu nibh id, auctor scelerisque lorem. Sed eu dignissim nulla. Aenean sed elit ultrices, ultrices velit vitae, auctor arcu. Nunc massa ante, dapibus a ornare id, bibendum accumsan metus. Maecenas nec viverra mauris. Ut consectetur aliquam elit fermentum convallis. Vivamus sit amet ornare dolor, sed mattis dui. Fusce auctor est ac quam porta, nec mattis risus porta. Pellentesque sit amet augue semper, egestas erat at, placerat enim. Nunc hendrerit metus quis ante luctus ullamcorper. Praesent luctus sed ex quis viverra. Cras condimentum, velit sed venenatis elementum, eros enim laoreet felis, a pulvinar nibh sem vitae magna. Donec quis erat quam. Suspendisse at dui vitae odio porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris venenatis viverra lectus ac dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam pretium tempor laoreet. Integer sollicitudin sem molestie lectus tempus vehicula. Vivamus in pretium enim, ut iaculis mi. Pellentesque elementum mi odio, id posuere neque eleifend sed. Suspendisse dictum mattis nisl sit amet eleifend. Duis vehicula odio ligula, non euismod lectus ultricies vitae.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget justo sed nisl lobortis ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ac mi non lacus molestie ultricies quis sed arcu. Donec et auctor lectus. Suspendisse potenti. Maecenas iaculis venenatis leo, non euismod sapien feugiat sed. Aenean nec gravida diam, vitae convallis justo. Etiam lectus justo, vehicula et accumsan non, congue sed magna. Donec ut nulla fermentum, congue nisl at, finibus nibh. In pulvinar luctus congue. Suspendisse potenti. Aenean consequat lorem vitae elit maximus, in malesuada erat lobortis. Quisque volutpat ultrices dolor, at facilisis libero eleifend sit amet. Aenean ultricies pulvinar enim. Donec quis justo vel arcu tempus consectetur. Nunc ac sem ac nisi dictum tempor. Vivamus gravida ligula a mattis imperdiet. Donec sagittis, nulla at sagittis pharetra, dolor nisl semper velit, in vulputate risus eros sed orci. Praesent sit amet malesuada ante, vel rutrum libero. Mauris vulputate iaculis turpis. Cras ullamcorper suscipit justo, nec imperdiet arcu vulputate nec. Mauris tristique felis in dapibus cursus. Donec dignissim eros tristique metus tristique, vel semper ipsum vehicula. Nunc non ante sed erat posuere cursus a eu diam. Nam dapibus, eros nec hendrerit fermentum, quam velit tincidunt massa, eget venenatis dolor elit quis nisl. Vestibulum sapien massa, fermentum non orci vestibulum, pulvinar varius purus. Ut ornare, risus vitae facilisis lobortis, odio ligula rutrum tellus, sit amet rutrum arcu nisi in diam. Aenean ut turpis sit amet ipsum varius iaculis. Nam dapibus elementum lectus. Ut hendrerit lacus ac nulla egestas, quis ultricies lacus vulputate. Morbi vestibulum non mi a sodales. Sed in mauris in metus posuere elementum at eu leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin neque nulla, tempus eu nibh id, auctor scelerisque lorem. Sed eu dignissim nulla. Aenean sed elit ultrices, ultrices velit vitae, auctor arcu. Nunc massa ante, dapibus a ornare id, bibendum accumsan metus. Maecenas nec viverra mauris. Ut consectetur aliquam elit fermentum convallis. Vivamus sit amet ornare dolor, sed mattis dui. Fusce auctor est ac quam porta, nec mattis risus porta. Pellentesque sit amet augue semper, egestas erat at, placerat enim. Nunc hendrerit metus quis ante luctus ullamcorper. Praesent luctus sed ex quis viverra. Cras condimentum, velit sed venenatis elementum, eros enim laoreet felis, a pulvinar nibh sem vitae magna. Donec quis erat quam. Suspendisse at dui vitae odio porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris venenatis viverra lectus ac dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam pretium tempor laoreet. Integer sollicitudin sem molestie lectus tempus vehicula. Vivamus in pretium enim, ut iaculis mi. Pellentesque elementum mi odio, id posuere neque eleifend sed. Suspendisse dictum mattis nisl sit amet eleifend. Duis vehicula odio ligula, non euismod lectus ultricies vitae.</p>\r\n', 'evcil_hayvanlar', 'petical', '14/02/2016', 'kedi_ve_kopeklerde_idrar_tasi_olusumu'),
(2, 'KÖPEKLERDE TUVALET EĞİTİMİ', 'DOG', 'kopeklerde_tuvalet_egitimi.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget justo sed nisl lobortis ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ac mi non lacus molestie ultricies quis sed arcu. Donec et auctor lectus. Suspendisse potenti. Maecenas iaculis venenatis leo, non euismod sapien feugiat sed. Aenean nec gravida diam, vitae convallis justo. Etiam lectus justo, vehicula et accumsan non, congue sed magna. Donec ut nulla fermentum, congue nisl at, finibus nibh. In pulvinar luctus congue. Suspendisse potenti. Aenean consequat lorem vitae elit maximus, in malesuada erat lobortis. Quisque volutpat ultrices dolor, at facilisis libero eleifend sit amet. Aenean ultricies pulvinar enim. Donec quis justo vel arcu tempus consectetur. Nunc ac sem ac nisi dictum tempor. Vivamus gravida ligula a mattis imperdiet. Donec sagittis, nulla at sagittis pharetra, dolor nisl semper velit, in vulputate risus eros sed orci. Praesent sit amet malesuada ante, vel rutrum libero. Mauris vulputate iaculis turpis. Cras ullamcorper suscipit justo, nec imperdiet arcu vulputate nec. Mauris tristique felis in dapibus cursus. Donec dignissim eros tristique metus tristique, vel semper ipsum vehicula. Nunc non ante sed erat posuere cursus a eu diam. Nam dapibus, eros nec hendrerit fermentum, quam velit tincidunt massa, eget venenatis dolor elit quis nisl. Vestibulum sapien massa, fermentum non orci vestibulum, pulvinar varius purus. Ut ornare, risus vitae facilisis lobortis, odio ligula rutrum tellus, sit amet rutrum arcu nisi in diam. Aenean ut turpis sit amet ipsum varius iaculis. Nam dapibus elementum lectus. Ut hendrerit lacus ac nulla egestas, quis ultricies lacus vulputate. Morbi vestibulum non mi a sodales. Sed in mauris in metus posuere elementum at eu leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin neque nulla, tempus eu nibh id, auctor scelerisque lorem. Sed eu dignissim nulla. Aenean sed elit ultrices, ultrices velit vitae, auctor arcu. Nunc massa ante, dapibus a ornare id, bibendum accumsan metus. Maecenas nec viverra mauris. Ut consectetur aliquam elit fermentum convallis. Vivamus sit amet ornare dolor, sed mattis dui. Fusce auctor est ac quam porta, nec mattis risus porta. Pellentesque sit amet augue semper, egestas erat at, placerat enim. Nunc hendrerit metus quis ante luctus ullamcorper. Praesent luctus sed ex quis viverra. Cras condimentum, velit sed venenatis elementum, eros enim laoreet felis, a pulvinar nibh sem vitae magna. Donec quis erat quam. Suspendisse at dui vitae odio porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris venenatis viverra lectus ac dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam pretium tempor laoreet. Integer sollicitudin sem molestie lectus tempus vehicula. Vivamus in pretium enim, ut iaculis mi. Pellentesque elementum mi odio, id posuere neque eleifend sed. Suspendisse dictum mattis nisl sit amet eleifend. Duis vehicula odio ligula, non euismod lectus ultricies vitae.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eget justo sed nisl lobortis ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ac mi non lacus molestie ultricies quis sed arcu. Donec et auctor lectus. Suspendisse potenti. Maecenas iaculis venenatis leo, non euismod sapien feugiat sed. Aenean nec gravida diam, vitae convallis justo. Etiam lectus justo, vehicula et accumsan non, congue sed magna. Donec ut nulla fermentum, congue nisl at, finibus nibh. In pulvinar luctus congue. Suspendisse potenti. Aenean consequat lorem vitae elit maximus, in malesuada erat lobortis. Quisque volutpat ultrices dolor, at facilisis libero eleifend sit amet. Aenean ultricies pulvinar enim. Donec quis justo vel arcu tempus consectetur. Nunc ac sem ac nisi dictum tempor. Vivamus gravida ligula a mattis imperdiet. Donec sagittis, nulla at sagittis pharetra, dolor nisl semper velit, in vulputate risus eros sed orci. Praesent sit amet malesuada ante, vel rutrum libero. Mauris vulputate iaculis turpis. Cras ullamcorper suscipit justo, nec imperdiet arcu vulputate nec. Mauris tristique felis in dapibus cursus. Donec dignissim eros tristique metus tristique, vel semper ipsum vehicula. Nunc non ante sed erat posuere cursus a eu diam. Nam dapibus, eros nec hendrerit fermentum, quam velit tincidunt massa, eget venenatis dolor elit quis nisl. Vestibulum sapien massa, fermentum non orci vestibulum, pulvinar varius purus. Ut ornare, risus vitae facilisis lobortis, odio ligula rutrum tellus, sit amet rutrum arcu nisi in diam. Aenean ut turpis sit amet ipsum varius iaculis. Nam dapibus elementum lectus. Ut hendrerit lacus ac nulla egestas, quis ultricies lacus vulputate. Morbi vestibulum non mi a sodales. Sed in mauris in metus posuere elementum at eu leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin neque nulla, tempus eu nibh id, auctor scelerisque lorem. Sed eu dignissim nulla. Aenean sed elit ultrices, ultrices velit vitae, auctor arcu. Nunc massa ante, dapibus a ornare id, bibendum accumsan metus. Maecenas nec viverra mauris. Ut consectetur aliquam elit fermentum convallis. Vivamus sit amet ornare dolor, sed mattis dui. Fusce auctor est ac quam porta, nec mattis risus porta. Pellentesque sit amet augue semper, egestas erat at, placerat enim. Nunc hendrerit metus quis ante luctus ullamcorper. Praesent luctus sed ex quis viverra. Cras condimentum, velit sed venenatis elementum, eros enim laoreet felis, a pulvinar nibh sem vitae magna. Donec quis erat quam. Suspendisse at dui vitae odio porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris venenatis viverra lectus ac dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam pretium tempor laoreet. Integer sollicitudin sem molestie lectus tempus vehicula. Vivamus in pretium enim, ut iaculis mi. Pellentesque elementum mi odio, id posuere neque eleifend sed. Suspendisse dictum mattis nisl sit amet eleifend. Duis vehicula odio ligula, non euismod lectus ultricies vitae.</p>\r\n', 'evcil_hayvanlar', 'petical', '14/02/2016', 'kopeklerde_tuvalet_egitimi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makaleler_kategori`
--

CREATE TABLE IF NOT EXISTS `makaleler_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `makaleler_kategori`
--

INSERT INTO `makaleler_kategori` (`id`, `baslik_tr`, `baslik_en`, `url`) VALUES
(1, 'Genel', 'General', 'genel'),
(2, 'EVCİL HAYVANLAR', 'PET', 'evcil_hayvanlar'),
(5, 'ANIL ŞENOCAKASDASDASDADASD', 'ANIL ŞENOCAK', 'anil_senocakasdasdasdadasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE IF NOT EXISTS `mesaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `tarih` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `okundu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`id`, `name`, `email`, `subject`, `message`, `tarih`, `okundu`) VALUES
(1, 'anil', 'anilsenocak_27@hotmail.com', 'senocak', 'asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd ', '16/01/2016', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `operasyonlar`
--

CREATE TABLE IF NOT EXISTS `operasyonlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tarih` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `operasyonlar`
--

INSERT INTO `operasyonlar` (`id`, `baslik_tr`, `baslik_en`, `url`, `icerik_tr`, `icerik_en`, `resim`, `tarih`, `siralama`) VALUES
(1, 'MİDEDE YABANCI CİSİM OPERASYONU', 'asd', 'midede_yabanci_cisim_operasyonu', 'Altı aylık Golden Retriwer köpek Hastanemize kusma şikayeti ile geldi.Yapılan muayene ve Endoskopi tetkikleri sonucu mideyi terketmemiş halde lastik bir top tespit edildi. Hemen operasyona alınarak yabancı cisim uzaklaştırıldı 1 haftalık kontrollü bakım sonrası taburcu edildi.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1dc482625bf140cd24cd36fe77c3f665.jpg', '06/02/2016', 0),
(2, 'MEME EKSTİRPASYONU', 's', 'meme_ekstirpasyonu', '9 yaşında terrier cinsi bir köpek olan Şans, uzun zamandır tedavi olamadığı şikayeti ile hastanemize getirilmiştir. Yapılan kontrollerde  sol meme lobunda enfekte olmuş irinli bir tümoral oluşuma bağlı genel durum bozukluğu tespit edilmiş ve enfekte dokunun uzaklaştırılmasına karar verilmiştir. Üç gün yoğun antibiyotik ve destekleyici tedaviden sonra kan tablosu kontrol edilerek inhalasyon anestezisi ile tümorlü meme lobu  ve predispoze olan diğer meme lobları uzaklaştırılmıştır. Şans, operasyondan sonra 7 gün daha hastanemizde yatılı olarak kontrol altında tutulmuş ve sonrasında sağlığına kavuşarak taburcu edilmiştir. Özellikle kısırlaştırılmamış kedi ve köpeklerde bu tür vakalara sıkça rastlamaktayız ve hastanemizde operasyonlarını yapmaktayız.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n \n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'meme_ekstirpasyonu.jpg', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_tr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `baslik_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `satir_1_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `satir_1_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `satir_2_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `satir_2_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icerik_tr` text COLLATE utf8_unicode_ci NOT NULL,
  `icerik_en` text COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `resim`, `baslik_tr`, `baslik_en`, `satir_1_tr`, `satir_1_en`, `satir_2_tr`, `satir_2_en`, `icerik_tr`, `icerik_en`, `siralama`, `url`) VALUES
(1, 'slide2.jpg', 'PETİCAL', '', 'HAYVAN HASTANESİ', '', '35 yıllık bir tecrübenin eseri olarak kurulmuştur. Şimdiye kadar 10.000 in üzerinde operasyon gerçekleştirmiştir', '', '35 yıllık bir tecrübenin eseri olarak kurulmuştur. Şimdiye kadar 10.000 in üzerinde operasyon gerçekleştirmiştir. 35 yıllık bir tecrübenin eseri olarak kurulmuştur. Şimdiye kadar 10.000 in üzerinde operasyon gerçekleştirmiştir. 35 yıllık bir tecrübenin eseri olarak kurulmuştur. Şimdiye kadar 10.000 in üzerinde operasyon gerçekleştirmiştir. 35 yıllık bir tecrübenin eseri olarak kurulmuştur. Şimdiye kadar 10.000 in üzerinde operasyon gerçekleştirmiştir. ', '', 1, 'asasasas'),
(2, 'petcal_1.jpg', 'PETİCAL', 'PETİCAL PETİCAL', 'Kesintisiz 7/24 hizmet ', 'Kesintisiz 7/24 hizmet      Kesintisiz 7/24 hizmet', 'Petical tıbbi açıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi Ünitesi ve Digital Röntgenine kadar tüm ekipmanı mevcuttur.', 'Petical tıbbi açıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi Ünitesi ve Dig', '<p>Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur.</p>\r\n', '<p>Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur. Petical tıbbi a&ccedil;ıdan tam donanımlıdır. Endoskopi, Lazer, Renkli Doppler, Fizik Tedavi &Uuml;nitesi ve Digital R&ouml;ntgenine kadar t&uuml;m ekipmanı mevcuttur.</p>\r\n', 2, 'pet'),
(3, 'a.png', 'a', 'a', 'a', 'a', 'a', 'a', '<p>a</p>\r\n', '<p>a</p>\r\n', 2, 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_thumb`
--

CREATE TABLE IF NOT EXISTS `slider_thumb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `slider_thumb`
--

INSERT INTO `slider_thumb` (`id`, `resim`, `siralama`, `slider_id`) VALUES
(1, '214X330.jpg', 0, 2),
(2, '303X163.jpg', 1, 2),
(3, '316X227.jpg', 2, 2),
(7, 'js.png', 0, 1),
(9, 'got.png', 1, 1),
(10, '942594_1101884669821616_1798254191770259376_n.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_yazi`
--

CREATE TABLE IF NOT EXISTS `slider_yazi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `siralama` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `slider_yazi`
--

INSERT INTO `slider_yazi` (`id`, `resim`, `kategori`, `kategori_id`, `siralama`) VALUES
(1, '1.png', 'kurumsal', 1, 0),
(2, '2.png', 'kurumsal', 1, 1),
(3, 'ortopedi2.jpg', 'hizmetlerimiz', 1, 0),
(4, 'ortopedi1.jpg', 'hizmetlerimiz', 1, 1),
(6, '12507318_481421748711487_379617135417738146_n.jpg', 'kurumsal', 3, 0),
(7, 'grammer.png', 'kurumsal', 3, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetki`
--

CREATE TABLE IF NOT EXISTS `yetki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yetki_ismi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `derece` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `yetki`
--

INSERT INTO `yetki` (`id`, `yetki_ismi`, `derece`) VALUES
(1, 'Admin', 5),
(2, 'Editor', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
