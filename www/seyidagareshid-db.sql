-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 17 2019 г., 22:34
-- Версия сервера: 5.5.64-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `seyidagareshid-db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `emails` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `emails`) VALUES
(1, 'quliyev', 'b7ace8ee08963ff599917d0d5ade5bca', 'wsdl', ''),
(2, 'miri', 'ec64688bbb80cb0efc6bacb510fad32d', 'wsdl', 'miri.abdullayev@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `audio`
--

INSERT INTO `audio` (`id`, `cat`, `name`, `audio`) VALUES
(2, 4, '“Bismillahir Rəhmanir Rəhim“ ayəsi haqqında qısa məlumat.', '58be11799468c67238acf60244d4a820.mp3'),
(3, 4, 'Bir insanın Quranı öz rəyinə əsasən təfsir etməsi qadağandır.', '00d22eb0ce03026d905ca55949f9cd58.mp3'),
(4, 4, 'İnsan kəlamında ziddiyyət ola bilər, amma Allah kəlamında, Quranda əsla.', '3dcc8a627e9ad08a9290f11012460ffd.mp3'),
(5, 4, 'Quranı hədislərlə təfsir etmək icazəlidirmi?', '5b98d474bb602e3a0760020243dff475.mp3'),
(6, 4, 'Quranın təfsirə, izaha ehtiyacı varmı?', 'ced77fd8cd4d4bf37d35fb5b20b0f02a.mp3'),
(7, 4, 'Əlimizdə olan Quran hz.Muhəmmədə (s.a.v.v) nazil olan Qurandırmı?', '6ae308dc054e55f21188eb2708d6ef17.mp3'),
(8, 4, 'Ərəb dili digər dillər kimi şərti dil deyildir.', '3685042ece85ffd94445e270a7ada374.mp3'),
(9, 4, 'Fatihə surəsi və onun fəziləti barədə qısa məlumat.', 'e3b2ec8a14a319ead6d40eb5b0d2c0d3.mp3'),
(10, 4, 'Quran təhrif olunmayıb. Quranda ləfzi təhrif yoxdur və ola da bilməz.', 'a5f68314a072c3f800440317b1c9f291.mp3'),
(11, 4, 'Quran və Quran oxumağın fəziləti barədə qısa məlumat.', '7e3e8770c2f921ddeab27f09af8b1fca.mp3'),
(13, 4, 'Qurani-Kərimin elmi təfsiri barədə qısa məlumat.', '2adcb5289be18ea7c25805f79368128f.mp3'),
(14, 4, 'Quranın Quranla təfsiri barədə qısa məlumat.', 'e4c5e02ed94d85baa7798c7388a572e1.mp3'),
(15, 4, 'Quranda “Tədəbbür“. Müsəlmanlar Quran oxumaqla kifayətlənməməlidirlər.', '8edbd0e3c78705c7e1cfd691824e69eb.mp3'),
(16, 4, 'Qurani-Kərim nə zaman və kim tərəfindən cəm olunmuşdur?', '20209d8450fa244d81487be49cbb2b0b.mp3'),
(19, 4, '"Fatihə" -surəsi Quranın anasıdır(Ummul Kitabdır)', '8eb95810dc34da3e13cf3cfa5b5f59cd.mp3'),
(20, 4, 'Quran nə üçün "Bismillahir Rəhmanir Rəhim" ayəsi ilə başlayır?', 'a59b759e4c24d3fcd16368536d1c8470.mp3'),
(21, 4, 'Quranın və "Tövbə" surəsindən başqa bütün surələrin "Bismillahla" başlama fəlsəfəsi', '8ab18e9332e1ac0814bf0da4f7fb8ca0.mp3'),
(22, 4, 'Quranın tərifi. Surə -sözünün mənası. Quran nə üçün surələrə bölünmüşdür?', '89b36408d94810caeec97f80d33f1564.mp3'),
(23, 4, 'Allahın "Rəhman" və "Rəhim" sifətləri barədə qısa məlumat.', '0bc9db752f9ade9ec0f09770c9861604.mp3'),
(24, 4, 'Allahın "Rəhman" və "Rəhim" sifətləri arasında fərq nədən ibarətdir.', 'd8fc5b0b8b55e3e0d6edbafbf5cc9fd2.mp3'),
(25, 4, 'Rəhman və Rəhim sifətləri Allahın feli, yoxsa zati sifətləridir?', '6a46b41322231f8caf390b9e95df9a1e.mp3'),
(26, 4, 'Allahın bəndələrlə rəftarı rəhmət əsasındadır.', 'dcde77d00a004bf3f2e691dd3ccffd4f.mp3'),
(27, 4, '"Allah" -kəlməsi barədə qısa məlumat.', 'a116cca6445a9bb96a8becfbe24c43ed.mp3'),
(28, 4, '"Allah" -adının Allahın digər adlarından fərqi nədir?', '48bad3ccc70c6182e986025f54ed28a7.mp3'),
(29, 4, 'Hər hansı bir işdə(əməldə) Allahın adı zikr olunmazsa, o iş səmərəsiz olar.', 'e2cba22ca886432a5c8f5052554d4963.mp3'),
(31, 4, '"Həmd" kəlməsinin mənası. Şükr, mədh və həmd fərqli mənaları bildirirlər.', 'dcac36a3dbaf4f2a64253db60505ef69.mp3'),
(32, 4, '"Həmd" yalnız aləmlərin Rəbbi olan Allaha məxsusdur.', '587a4fd8050ac51036eea12d4f66719e.mp3'),
(33, 4, '"Əl-həmdu" kəlməsinin təfsiri. Həmd Allaha məxsusdur.', 'e5f34ae4054c2e7d0d410d04081f01a4.mp3'),
(34, 8, 'İmam Həsən Əskəri (ə) möminin 5 əlaməti barədə buyurur...', '2519c08e9a0db63f190ef9e5b13e477f.mp3'),
(35, 4, 'Quranda "Həmd". Allah müsəlmanları üstün qərar vermişdir.', '076eedf0deb977152ab9d6af6c8ca2f6.mp3'),
(36, 4, 'Fatihə surəsi iki hissədən ibarətdir. Allah Rəsulunun (s) kəlamında "Fatihə".', '9961edc96d780a2418e31a783e2c4953.mp3'),
(37, 4, 'Fatihə surəsi bizi mərhəmətli olmaqa səsləyir.', '94a170d648d9f412951f540775cbcfa5.mp3'),
(38, 4, 'Fatihə surəsinin təfsiri. "Rəbb" kəlməsinin izahı.', '2f315a8fcafde5411718145dc6528c72.mp3'),
(39, 4, '"Əlhəmdu lillahi Rəbbil aləmin" -ayəsi. "Aləmin" kəlməsinin izahı.', '1eee474db51338c0847c85cea74a29be.mp3'),
(40, 4, '"Maliki yəumid-din" ayəsi. "Maliki" kəlməsinin mənası.', 'c6194424bcf8af595a4588b18095bdd5.mp3'),
(41, 4, '"Maliki yəumid-din" ayəsi. "Din" kəlməsinin izahı.', '2d359c608eab427c6b106df38a5de1ee.mp3'),
(42, 4, '"Məliki yəumid-din" ayəsi. Allah qiyamət gününün sahibidir.', '4a0060689cdb32faf823144b20767db0.mp3'),
(43, 8, '"İsraf" nədir. İnsan hansı hallarda israf etmiş sayılır?', 'f037b29db5409f37e9893abebfa77f60.mp3'),
(44, 8, '"Oruc" sözünün mənası. Əsl "Oruc" böyük əxlaq dərsidir.', 'c76da7800a822e8343cd9b068d085515.mp3'),
(45, 8, 'Biraz qoz(toz) orucu batil etməz. Məzəli Ramazan əhvalatı:)', 'd6d6f1b96df9d01dafe1ea16dd51c771.mp3');

-- --------------------------------------------------------

--
-- Структура таблицы `audiocats`
--

CREATE TABLE IF NOT EXISTS `audiocats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `audiocats`
--

INSERT INTO `audiocats` (`id`, `name`) VALUES
(3, 'Cümə moizələri'),
(4, 'Quran təfsiri'),
(5, 'Dərslər'),
(6, 'Muhərrəm moizələri'),
(7, 'Əyyami Fatimiyyə'),
(8, 'Müxtəlif');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `thumb`) VALUES
(15, '7b6073fc1a4d02d512c67ad758433e69.jpg', '7b6073fc1a4d02d512c67ad758433e69_thumb.jpg'),
(16, '4fdc417665efcf557f860a52a1049134.jpg', '4fdc417665efcf557f860a52a1049134_thumb.jpg'),
(17, 'e77b934e3c64a191fcded5f0012883f8.jpg', 'e77b934e3c64a191fcded5f0012883f8_thumb.jpg'),
(18, 'b27717de4ad42adb202ee8d6e6a150e5.jpg', 'b27717de4ad42adb202ee8d6e6a150e5_thumb.jpg'),
(20, '8e2fc65a79f550208c8c347601af68e8.jpg', '8e2fc65a79f550208c8c347601af68e8_thumb.jpg'),
(21, '9cab012300fe89fe119c3ff49f0bb6a4.jpg', '9cab012300fe89fe119c3ff49f0bb6a4_thumb.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(10) DEFAULT NULL,
  `default` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `language`, `default`) VALUES
(1, 'en', 1),
(2, 'az', 0),
(3, 'ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `content_name` varchar(255) DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `lang` varchar(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `modules`
--

INSERT INTO `modules` (`id`, `name`, `type`, `content_name`, `content`, `lang`) VALUES
(1, 'services', 'text', 'header', 'Services', 'en'),
(2, 'services', 'text', 'header', 'XİDMƏTLƏR', 'az'),
(3, 'services', 'text', 'header', 'Услуги', 'ru'),
(5, 'partners', 'text', 'header', 'CLIENTS & PARTNERS', 'en'),
(6, 'partners', 'text', 'header', 'MÜŞTƏRİLƏR VƏ PARTNYORLAR', 'az'),
(7, 'partners', 'text', 'header', 'КЛИЕНТЫ И ПАРТНЕРЫ', 'ru'),
(35, 'media', 'text', 'header', 'OUR LATEST WORKS', 'en'),
(36, 'media', 'text', 'header', 'ƏN SON İŞLƏRİMİZ', 'az'),
(37, 'media', 'text', 'header', 'НАШИ ПОСЛЕДНИЕ РАБОТЫ', 'ru'),
(39, 'about', 'text', 'header', 'WHO WE ARE?', 'en'),
(40, 'about', 'text', 'header', 'BİZ KİMİK?', 'az'),
(41, 'about', 'text', 'header', 'КТО МЫ?', 'ru'),
(42, 'about', 'html', 'welcome', '<p>The main principle of &ldquo;NM SERVICES&rdquo; is meeting the constant increasing demands of clients and carrying out the wishes of customers to ensure their satisfaction. The company is one of the most successful companies in the market with its professional staff and material-technical resources, high quality work</p>\n\n<p>&ldquo;NM SERVICES&rdquo; is providing various services in various areas. The quality of the services is under control by the company&#39;s management. Due to specialization of the staff the company provides trainings with the participation of highly qualified specialists invited from abroad. Using quality and modern equipment is one of the keys to our success. The correct choice allows us to get the successful results in our works. The managers and agents of the company are in constant contact with the customers and control the accuracy and quality of the services. Execution of works at the level of European standards, quality and safety is our priority.</p>', 'en'),
(43, 'about', 'html', 'welcome', '<p>&laquo;NM SERVİCES&raquo; şirkətinin iş prinsipi daimi artmaqda olan tələblərin &ouml;hdəsindən gələ bilmək və ən son texnologiyalardan istifadə etməklə m&uuml;ştərilərimizin istəklərini həyata ke&ccedil;irmək və onların məmnuniyyətini təmin etməkdir. Şirkət g&uuml;cl&uuml; kadr potensialı, maddi-texniki bazası və g&ouml;rd&uuml;y&uuml; işlərin səviyyəsinə g&ouml;rə bazarda irəlidə olan və &ouml;z s&ouml;z&uuml;n&uuml; demiş şirkətlərdən biridir.</p>\n\n<p>&ldquo;NM SERVİCES&rdquo; şirkəti m&uuml;xtəlif istiqamətlərdə fəaliyyət g&ouml;stərir və g&ouml;r&uuml;lən işlərin keyfiyyəti m&uuml;təmadi olaraq şirkət rəhbərliyi tərəfindən nəzarətdə saxlanılır. İş&ccedil;i heyətinin daha da ixtisaslaşması &uuml;&ccedil;&uuml;n şirkət xaricdən dəvət olunmuş m&uuml;təxəsislərin iştirakı ilə təlimlər təşkil edir. Şirkətimizin istifadə etdiyi d&uuml;zg&uuml;n se&ccedil;ilmiş, keyfiyyətli və m&uuml;asir avadanlıqlar işimizdə ən uğurlu nəticəni əldə etməyə imkan verir. Şirkətin menecer və agentləri m&uuml;ştərilər ilə daim əlaqə saxlayır g&ouml;stərilən xidmətlərin dəqiq və keyfiyyətli yerinə yetirilməsinə nəzarət edirlər. İstehlak&ccedil;ılarımızın tələblərinin Avropa standartlarına uyğun, keyfiyyətli və təhl&uuml;kəsiz həyata ke&ccedil;irmək işlərimizdə &ouml;nəm verdiyimiz məqamdır.</p>\n', 'az'),
(44, 'about', 'html', 'welcome', '<p>Главным принципом &ldquo;NM SERVİCES&rdquo; является с растущими требованиями клиентов и с использованием новых технологий получить их удовлетворительный отзыв. Концерн со своими сильными кадровым потенциалом и материально-технической базой и высококачественно выполненной работой является впереди идущей и сказавшей свое веское слово на рынке предприятием.</p>\n\n<p>&ldquo;NM SERVİCES&rdquo; действует в разных направлениях и качество выполненных работ регулярно находится под контролем руководства. Для повышения уровня квалификации рабочего состава регулярно проводятся тренинги с участием высококвалифицированных специалистов приглашенных из-за рубежа. Используемы предприятием во время выполнения работ правильно подобранные современные оборудования является залогом нашего успеха. Агенты и менеджеры держат постоянную связь с клиентами и проверяют своевременность и качество выполняемых работ. Выполнение работ на уровне Европейских стандартов, качественно и безопасно является одним из основных и руководящих принципов предприятия.</p>\n', 'ru'),
(80, 'about', 'image', 'about_logo', 'about.png', 'en'),
(81, 'about', 'image', 'about_logo', 'about.png', 'az'),
(82, 'about', 'image', 'about_logo', 'about.png', 'ru'),
(83, 'services', 'text', 'services_view', 'View details', 'en'),
(84, 'services', 'text', 'services_view', 'ƏTRAFLI OXU', 'az'),
(85, 'services', 'text', 'services_view', 'Подробнее', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `cpu` varchar(350) NOT NULL,
  `name` varchar(350) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `full_review` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `main` int(1) NOT NULL DEFAULT '0',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `cpu`, `name`, `content`, `full_review`, `image`, `thumb`, `main`, `added`, `lang`) VALUES
(41, 'aqilin-all-insann-yatma-cahilin-nadann-ibadtindn-stndr', 'Aqilin (ağıllı insanın) yatmağı, cahilin (nadanın) ibadətindən üstündür.', 'Sonuncu Peyğəmbərimiz, bütün bəşəriyyətə səadət yolunu nişan verən Rəhbərimiz Məhəmməd ibni Abdullah (s.ə.a.s) buyurmuşdur:-"Aqilin (ağıllı insanın) yatmağı, cahilin (nadanın) ibadətindən üstündür".', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif">Sonuncu Peyğəmbərimiz , b&uuml;t&uuml;n bəşəriyyətə səadət yolunu nişan verən Rəhbərimiz Məhəmməd ibni Abdullah (s.ə.a.s) buyurmuşdur:-&quot;Aqilin (ağıllı insanın) yatmağı, cahilin (nadanın) ibadətindən &uuml;st&uuml;nd&uuml;r&quot;. (Usulul-Kafi, kitab əl-əql vəl-cəhl, hədis 11).<br />\nBu m&uuml;barək hədisi şərh və izah etməzdən &ouml;ncə bir m&uuml;h&uuml;m m&uuml;qəddiməyə işarə etmək lazımdır. Ağıl nədir? Və ağıllı insan kimə deyilir?<br />\nAğıl nədir? sualına m&uuml;xtəlif elmlər , &ccedil;eşidli cavablar veriblər.&nbsp;<br />\n1.Fəlsəfə elmində &quot;ağılın&quot; tərifi belədir. Ağıl-zatən və felən qeyri-maddi bir c&ouml;vhərdir. Filosoflar &quot;ağıl&quot; dedikdə , tamamilə maddə və maddi x&uuml;susiyyətlərdən uzaq olan bir varlığ aləmini qəsd edirlər. Bu bəhsimizdən kənardır.<br />\n2.&quot;Ağıldan&quot; məqsəd &quot;ruhdur&quot;, sadəcə olaraq m&uuml;xtəlif prizmalardan baxıb, insan həqiqətinə m&uuml;xtəlif ad qoyulub. İnsan ruhunda Xaliqimiz sevmək və nifrət etmək duyğusu qərar verib, bu prizmadan ruh &quot;qəlb&quot; adlanır. Eyni zamanda insanın həqiqətində &quot;istəklər&quot; var, bu prizmadan baxıb &quot;nəfs&quot; deyirik. Eyni zamanda Allah insana dərk etmə qabiliyyəti verib, &uuml;&ccedil;&uuml;nc&uuml; prizma və cəhətdən, bu həqiqət &quot;ağıl&quot; adlanır. Deməli &quot;ruh&quot;, &quot;qəlb&quot;, &quot;nəfs&quot; və &quot;ağıl&quot; bir həqiqətdir, lakin m&uuml;xtəlif baxışlardan və prizmalardan m&uuml;xtəlif adlarla adlanır. Başqa ifadə ilə desək, insanın həqiqəti malik olduğu funksiyalara g&ouml;rə , m&uuml;xtəlif adlara malik olur.<br />\n&quot;Ağıl&quot; bu mənada b&uuml;t&uuml;n insanlarda eynidir, bu izaha əsasən insanları &quot;ağıllı&quot; və &quot;cahil&quot; b&ouml;l&uuml;mlərinə b&ouml;lmək olmaz.<br />\n3.M&uuml;barək hədislərdə &quot;ağılın&quot; tərifi. İmam Sadiq (ə)-dan soruşdular:-&quot;Ağıl nədir&', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-26 09:34:45', 'en'),
(42, 'oruc-tutann-iki-sevinci-olar-biri-iftarda-digri-qiyamt-gn', 'Oruc tutanın iki sevinci olar, biri iftarda, digəri isə Qiyamət günü.', 'Ağamız, Mövlamız İmam Rza (ə) buyurmuşdur:-"Oruc tutanın iki sevinci olar, biri iftarda, digəri isə Qiyamət günü".\n"Sevinc" və "kədər" biri-digərinə zidd kəlmələrdir. Tərifi nədir? "Sevinc"-insanın xoşuna gələn hadisələrdən sonra baş verən nəfsi haldır. "Kədər"-insanın xoşuna gəlməyən hadisələrdən sonra baş verən nəfsi haldır. ', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Ağamız, M&ouml;vlamız İmam Rza (ə) buyurmuşdur:-&quot;Oruc tutanın iki sevinci olar, biri iftarda, digəri isə Qiyamət g&uuml;n&uuml;&quot;.<br />\n&quot;Sevinc&quot; və &quot;kədər&quot; biri-digərinə zidd kəlmələrdir. Tərifi nədir? &quot;Sevinc&quot;-insanın xoşuna gələn hadisələrdən sonra baş verən nəfsi haldır. &quot;Kədər&quot;-insanın xoşuna gəlməyən hadisələrdən sonra baş verən nəfsi haldır.&nbsp;<br />\nHər ikisi 2 qismə b&ouml;l&uuml;n&uuml;r. Maddi və mənəvi sevinc. Maddi və mənəvi kədər.&nbsp;<br />\n&quot;Maddi sevinc&quot;-insanın təbiət və məzacına m&uuml;vafiq və uyğun olan hadisələrdən sonra yaranır. Məsələn, hər bir insanın susuz olan anında i&ccedil;diyi su, onun cismani tələbatını &ouml;dədiyinə g&ouml;rə, təbiət və məzacına uyğundur.&nbsp;<br />\n&quot;Mənəvi sevinc&quot;-insanın ağlına və ruhuna m&uuml;vafiq və uyğun olan hadisələrdən sonra yaranır. Məsələn, Arximedin suya batarkən &quot;Arximed qanununu&quot; kəşf etmə hadisəsi və o zaman &quot;evrika&quot; (tapdım) qışqırması, onun ağlının və ruhunun ehtiyaclarını &ouml;dəməsindən irəli gəlmişdir. Bu sevinc &quot;mənəvi sevincdir&quot;.<br />\n&quot;Maddi kədər&quot; &quot;maddi sevincin&quot;, &quot;mənəvi kədər&quot; də &quot;mənəvi sevincin&quot; tamamilə ziddidir. Yuxarıdakı izahdan sonra aydın olduğuna g&ouml;rə, şərhə və tərifə ehtiyac duymuram.&nbsp;<br />\nDeməli əziz və istəkli İmamımız Həzrəti Əli ibni Musər-Rza (ə) ağamız, bu m&uuml;barək hədisi ilə , sevincin hər iki qisminə işarə etmişdir. Oruc tutmada həm &quot;maddi sevinc&quot; , həm&ccedil;inin &quot;mənəvi sevinc&quot; vardır. &quot;Maddi sevinc&quot; iftar vaxtı, &quot;mənəvi sevinc&quot; isə Qiyamət g&uuml;n&uuml; olacaqdır.&nbsp;<br />\nOrucun 3 qismi vardır.&nbsp;<br />\n1.&quot;Sovmul-am&quot; (&uuml;mumi oruc).&nbsp;<br />\n2.&quot;Sovmul-xas&quot; (x&uuml;susi oruc)&nbsp;<br />\n3.&quot;Sovmul-əxəs&quot; (daha x&uuml;susi oruc).<br />\n&quot;&Uuml;mumi oruc&quot;-şəriətimizdə qeyd ', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-26 09:41:30', 'en'),
(43, 'hzrti-li--hicrtdn-23-il-qabaq-rcb-aynn-13-milad-tqvimi-599-cu-ilin-martn-17si-mkk-hrind-dnyaya-gz-amdr', 'Həzrəti Əli (ə) Hicrətdən 23 il qabaq, Rəcəb ayının 13-ü (Milad təqvimi ilə 599 -cu ilin Martın 17-si ) Məkkə şəhərində dünyaya göz açmışdır. ', 'Həzrəti Əli (ə) Hicrətdən 23 il qabaq, Rəcəb ayının 13-ü (Milad təqvimi ilə 599 -cu ilin Martın 17-si ) Məkkə şəhərində dünyaya göz açmışdır. ', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Həzrəti Əli (ə) Hicrətdən 23 il qabaq, Rəcəb ayının 13-&uuml; (Milad təqvimi ilə 599 -cu ilin Martın 17-si ) Məkkə şəhərində d&uuml;nyaya g&ouml;z a&ccedil;mışdır. Hicrətin 40-cı ili m&uuml;barək Ramazan ayının 19-u (Milad təqvimi ilə 661-ci ilin Noyabr ayının 25-i ) Kufə şəhərində məscidin mehrabında namaz qılarkən qılıncla yaralanmış , iki g&uuml;n sonra evində aldığı yaradan şəhid olmuşdur. &Ouml;vladları tərəfindən indiki Nəcəful-əşrəf şəhərində dəfn olunmuşdur.<br />\nTarix və hədis alimlərinin şahidliyinə əsasən o Həzrətin (ə) d&uuml;nyaya gəlişi m&uuml;qəddəs qibləmiz Kəbə evində olmuşdur. Bu məlumatı təsdiqləyən bir ne&ccedil;ə kitabın adları aşağıdakılardır.<br />\n1. Murucuz-zəhəb , Əbul-Həsən əl-Məsudi.<br />\n2. Təzkirətul-xəvas, Sibt ibnil-Cəvzi əl-hənəfi.<br />\n3. Əl-fusulul-muhimmə , İbni Səbbağ Maliki.<br />\n4. Əs-sirətun-nəbəviyyə, Nuruddin Əli əl-Hələbi əş-Şafii.<br />\n5. Şərhuş-Şifa , Əli əl-Qari əl-Hənəfi.<br />\n6. Əl-Mustədrək , Hakim Nişapuri və sairə...<br />\nAtası Əbu Talib , əziz Peyğəmbərimizin (s.ə.a.s) əmisi və hamisidir (himayə edib, qoruyan). Belə ki, o d&uuml;nyasını dəyişəndən sonra Cəbrail nazil olub buyurdu;&nbsp;<br />\n-أخرج منها فقد مات ناصرك<br />\n-Ey Allahın Rəsulu , Məkkədən &ccedil;ıx, artıq sənin k&ouml;mək&ccedil;in &ouml;ld&uuml;.<br />\n(Nəhcul-bəlağənin şərhi, İbni Əbil-Hədid, 14-c&uuml; cild , 70-ci səhifə).<br />\nAnası Fatimə binti Əsəd isə Hicrətdən qabaq Məkkədə Peyğəmbərimizə (s.ə.a.s) ilk iman gətirən xanımlardan biridir.&nbsp;<br />\nHəyat yoldaşı Allah Rəsulunun qızı Xanım Fatimədir (ə). Həzrəti Fatimənin (ə) yaşadığı m&uuml;ddətdə he&ccedil; bir xanımla evlənməmiş , Xanımın (ə) şəhadətindən sonra bir ne&ccedil;ə qadınla ailə həyatı qurmuşdur.&nbsp;<br />\nİmam Əli (ə) İslam Peyğəmbəri Məhəmməd ibni Abdullaha (s.ə.a.s) ilk iman gətirən şəxsdir. Və eyni zamanda Peyğəmbərimizin (s.ə.a.s) d&ouml;vr&uuml;ndə baş verən 83 d&ouml;y&uuml;ş&uuml;n (Təbuk d&ouml;y&uuml;ş&uuml;ndə', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-26 09:51:44', 'en'),
(44, 'onlarn-allahdan-baqa-ardqlar-fat-malik-deyillr-mgr-ki--bilrk-haqq-olaraq-hadt-vernlr-zuxruf-sursi-86', '"Onların Allahdan başqa çağırdıqları şəfaətə malik deyillər, məgər ki , bilərək haqq olaraq şəhadət verənlər". (Zuxruf surəsi /86).', '"Onların Allahdan başqa çağırdıqları şəfaətə malik deyillər, məgər ki , bilərək haqq olaraq şəhadət verənlər". (Zuxruf surəsi /86).\n', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>&quot;Onların Allahdan başqa &ccedil;ağırdıqları şəfaətə malik deyillər, məgər ki , bilərək haqq olaraq şəhadət verənlər&quot;. (Zuxruf surəsi /86).<br />\nBaşqa ifadə ilə desək, &quot;elmi olan halda haqq olaraq şəhadət verənlərdən savayı , Allahdan başqa &ccedil;ağırdıqları şəfaətə malik (sahib) deyillər&quot;.<br />\nBu ayədə ardıcıl olaraq bir ne&ccedil;ə mətləblərə işarə edək.<br />\n1.Quranda şəfaətin mənası nədir ?<br />\nQuranda şəfaətin mənası -insana və yaxud hər hansı bir məxluqa mənfəəti və xeyri cəlb etmək və ondan zərəri uzaqlaşdırmaqdır.<br />\n&quot;Allahdan başqa ibadət etdikləri nə onlara zərər verə bilər, nə də onlara xeyr verə bilər. Və deyirlər ki, bunlar bizim Allah yanında şəfaət&ccedil;ilərimizdir&quot;. (Yunus surəsi /18).<br />\nNəzərə alsaq ki, m&uuml;şr&uuml;klər axirətə inanmırlar, o zaman onların şəfaət&ccedil;i bildikləri bu d&uuml;nyaya aiddir.&nbsp;<br />\n&quot;Məgər &ouml;l&uuml;b , torpaq olandan sonra , bu uzaq bir qayıdışdır&quot;. (Qaf surəsi /3).<br />\nBu ayədən g&ouml;r&uuml;r&uuml;k ki, şəfaətin mənası xeyrə &ccedil;atmaq və yaxud zərəri dəf etməkdir. Məsələn, insanın sağalması &uuml;&ccedil;&uuml;n dərman və həkim şəfaət&ccedil;idir. İnsanın susuzluğunun aradan getməsi &uuml;&ccedil;&uuml;n su şəfaət&ccedil;idir. İnsanın &ouml;l&uuml;m&uuml; &uuml;&ccedil;&uuml;n &ouml;l&uuml;m mələyi şəfaət&ccedil;idir və sairə....<br />\nDeməli, İlahi əmrlərin və feyzin məxluqata yetişməsində vasitə&ccedil;i olanlara şəfaət&ccedil;i deyilir.<br />\n2.Qeyd olunan ayədə istisnadan qabaq deyilən kəlamın mənası odur ki, Allahdan başqa kimi &ccedil;ağırsanız , o, xeyrə &ccedil;atmaq &uuml;&ccedil;&uuml;n və zərəri sizdən dəf etmək &uuml;&ccedil;&uuml;n vasitə&ccedil;i ola bilməz , &ccedil;&uuml;nki şəfaətə malik deyillər.&nbsp;<br />\nAmma istisnadan sonra olanlar isə a&ccedil;ıq-aşkar şəfaətə malikdirlər. Deməli, onları &ccedil;ağırsanız , onlar xeyrə yetişmək və zərəri dəf etmək &uuml;&ccedil;&uuml;n A', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-26 09:54:56', 'en'),
(45, 'br-vladnn-dnya-v-axirt-sadtini-lindn-alan--sas-rzil-sift-vardr-tkbbr-tamah-paxllq', 'Bəşər övladının dünya və axirət səadətini əlindən alan üç əsas rəzil sifət vardır.  Təkəbbür, tamah və paxıllıq.', 'Bəşər övladının dünya və axirət səadətini əlindən alan üç əsas rəzil sifət vardır. \nTəkəbbür, tamah və paxıllıq.', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Bəşər &ouml;vladının d&uuml;nya və axirət səadətini əlindən alan &uuml;&ccedil; əsas rəzil sifət vardır.&nbsp;<br />\nTəkəbb&uuml;r, tamah və paxıllıq.<br />\nBunların hər biri təklikdə insanın cinayətkar olmasına kifayət edir. Və bu cinayət vasitəsilə də bədbəxt olur. Mən indi cəhənnəm əzabından danışmıram. Bu deyilən &uuml;&ccedil; sifətin hər hansı biri kimdə olarsa, cəhənnəm əzabından əvvəl onu bu d&uuml;nyada rəzil və r&uuml;svay edir, rahatlığını alır, mənəvi əzab i&ccedil;ində yanır, lakin &ouml;z cəhalət və nadanlığından &ouml;z&uuml;n&uuml; &quot;adam&quot; hesab edir. Əslində o İblisdir.&nbsp;<br />\n&Uuml;st&uuml;nl&uuml;y&uuml; olanı &uuml;st&uuml;n hesab etmək təkəbb&uuml;r&uuml; rədd edib, təvaz&ouml; əlamətidir.<br />\n&Uuml;st&uuml;nl&uuml;y&uuml; olanı &ouml;nə &ccedil;əkib , ona xidmət&ccedil;i olmaq tamahın ziddinədir.<br />\n&Uuml;st&uuml;nl&uuml;y&uuml; olanı &uuml;st&uuml;n bilib , onun m&uuml;vəffəqiyyətinə sevinmək isə paxıllığın d&uuml;şmənidir, insanlıq nişanəsidir.<br />\nBudur İblislə mələyin , şeytanla insanın fərqi.&nbsp;<br />\nH&uuml;ccət tamamlanandan sonra Allahın Rəbb olmasını inkar etməklə , Məhəmmədin (s.ə.a.s) xeyrul-bəşər olmasını rədd etməklə və İmam Əlinin m&ouml;vlalığına ş&uuml;bhə ilə yanaşma arasında he&ccedil; bir fərq yoxdur. Bu eynilə İblisin Adəmin &uuml;st&uuml;nl&uuml;y&uuml;n&uuml; qəbul etməməsinə bərabərdir.<br />\nTəkkəbb&uuml;r insanı Allaha qul olmağdan, tamah insanı Peyğəmbər (s.ə.a.s) şəriətindən və paxıllıq insanı Həzrəti Əliyə (ə) məhəbbətdən ayrı salar. Əli (ə) mərhəmətindən aralı d&uuml;şən, qəlbi qəsavətli qəddar cəllad olar.&nbsp;<br />\nMəhz İblis sifəti olan bu &uuml;&ccedil; sifət bir insanda cəmlənəndə o, tərədd&uuml;d etmədən g&uuml;nahsız k&ouml;rpəni qətl edir. İnsanlara və insanlığa z&uuml;lm edir.&nbsp;<br />\nMəni tanıyanlar tanıyır, tanımayanlara da deyim. Mən uşaq dəfnində iştirak edə bilmirəm. Bir dəfə iştirak etmişəm , amma Allah eləməsin ki, birdə ', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 12:06:18', 'en'),
(46, 'allah-quranda-buyurur-n-varsa-onun-xzinlri-yalnz-bizim-yanmzdadr-v-biz-z-yanmzdan-myyn-ld-nazil-edirik', 'Allah Quranda buyurur :"Nə varsa onun xəzinələri yalnız bizim yanımızdadır və biz öz yanımızdan müəyyən ölçüdə nazil edirik ".', 'Allah Quranda buyurur :"Nə varsa onun xəzinələri yalnız bizim yanımızdadır və biz öz yanımızdan müəyyən ölçüdə nazil edirik ".', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>1. Allah Quranda buyurur :&quot;Nə varsa onun xəzinələri yalnız bizim yanımızdadır və biz &ouml;z yanımızdan m&uuml;əyyən &ouml;l&ccedil;&uuml;də nazil edirik &quot;.<br />\nŞəksiz və ş&uuml;bhəsiz bu ayədə &quot;Nə varsa&quot; b&uuml;t&uuml;n canlı və cansız hər bir m&ouml;vcuda aiddir. Deməli b&uuml;t&uuml;n m&ouml;vcudatın xəzinələri Allah yanındadır və ordan nazil olub. Hər bir insanın ruhu və həqiqəti Allah yanındandır.&nbsp;<br />\n2. İnsanın Allah yanında olan ruhu, alim və pakdır. Bu d&uuml;nyaya gələndən sonra ruhumuz ,&nbsp;bədən qəfəsinə daxil olub, nəfsi istəklərlə zəncirlənəndən sonra qəflət ona yol tapıb. Әgər insan dediyimiz &quot;Zəncirləri&quot; qırıb, &quot;qəfəsdən&quot; azad olsa qəflətdən ayılır. Həzrəti Rəsulullah (s.ə.a.s) buyuran kimi,&quot;Insanlar yatıblar , elə ki, &ouml;ld&uuml;lər ayılırlar&quot;.<br />\nQəflət cisim və nəfsdəndir.<br />\n3. Yenə Rəsulullah (s.ə.a.s) buyurur: &quot;G&ouml;z&uuml;m yatır ,amma qəlbim yatmır&quot;. (Yeri gəlmişkən bu hədisə əsasən b&uuml;t&uuml;n İslam alimləri buyurub ki, əziz Peyğəmbərimizin (s.ə.a.s) yuxusu onun dəstəmazını batil etmir. Yəni-məsələ icmadır b&uuml;t&uuml;n İslam aləmində).<br />\nHəzrəti ƏӘli (ə) buyurur: &quot;mən doğularkən &ouml;ld&uuml;m&quot;. Yəni- qəflət mənə he&ccedil; zaman yol tapmadı.&nbsp;<br />\n4. Yuxarıda deyilən (1,2,3) cəmləyərkən bu nəticəyə gəlirik. Bu d&uuml;nyada nəfsi istəklərlə zəncirlənməyən və bədən qəfəsinə daxil olub, g&uuml;nah bataqlığına batmayan Peyğəmbər (s) və onun Әhli beyti (ə) , Allah yanında olan əsl həqiqətlərini və paklıqlarını qoruyub saxlamışlar. Diqqətlə d&uuml;ş&uuml;n&uuml;n&nbsp;...!<br />\nOnu da qeyd edim ki, bu mətləbləri rəqəmlərlə sadalamağımızın səbəbi, riyazi ardıcıllığı g&ouml;zləməkdir. Nəinki təkcə riyaziyyat elmində, hətta şer və yazıda, s&ouml;zdə və x&uuml;tbədə də riyazi ardıcıllıq g&ouml;zlənilməlidir.&nbsp;<br />\nBu yazıdan sonra , nə qədər suallara cavab tapırıq.&nbsp;<br />\n1.Həddi b', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 12:20:07', 'en'),
(47, 'hqiqtn-biz-sn-zfr-akar-bir-bx-etdik-ki-allah-snin-kemi-v-glck-gnahlarn-balasn-nemtini-tamamlasn-sni-doru-yola-hidayt-etsin-fth-sursi-12', '"Həqiqətən biz sənə zəfər, aşkar bir zəfər bəxş etdik ki, Allah sənin keçmiş və gələcək günahlarını bağışlasın, sənə nemətini tamamlasın, səni doğru yola hidayət etsin". (Fəth surəsi /1-2).', '"Həqiqətən biz sənə zəfər, aşkar bir zəfər bəxş etdik ki, Allah sənin keçmiş və gələcək günahlarını bağışlasın, sənə nemətini tamamlasın, səni doğru yola hidayət etsin". (Fəth surəsi /1-2).', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Qurani Kərimdə, Fəth surəsinin bir və ikinci ayələrində Rəbbimiz buyurur:-&quot;Həqiqətən biz sənə zəfər, aşkar bir zəfər bəxş etdik ki, Allah sənin ke&ccedil;miş və gələcək g&uuml;nahlarını bağışlasın, sənə nemətini tamamlasın, səni doğru yola hidayət etsin&quot;. (Fəth surəsi /1-2).<br />\nQurana səthi yanaşan, Quran elmlərinə malik olmayan , Quran ayələrinin həqiqi muradını dərk etməyənlər bu ayələrə istinadən, əziz Peyğəmbərimizin (s.ə.a.s) g&uuml;nahı olmasını iddia edirlər.&nbsp;<br />\nBu iddia d&uuml;z deyildir.<br />\n1.B&uuml;t&uuml;n əqli və məntiqi dəlillər Peyğəmbərimizin (s.ə.a.s) g&uuml;nahsız olmasını s&uuml;but edir.<br />\n2.A&ccedil;ıq-aşkar g&ouml;r&uuml;r&uuml;k ki, ikinci ayə, birinci ayənin nəticəsidir, yəni-Məkkə zəfəri Peyğəmbərimizin (s.ə.a.s) &quot;g&uuml;nahlarının&quot; bağışlanması &uuml;&ccedil;&uuml;n bir səbəbdir. Məkkə fəthi və zəfəri ilə g&uuml;nahın bağışlanması arasında nə əlaqə ???!!!!!!.<br />\n3.İslam dinində və şəriətimizdə &ouml;ncədən olan g&uuml;nahların bağışlanması vardır, amma İslam dinində, bundan sonra olacaq g&uuml;nahların bağışlanması adında bir məfhum varmı ????!!!!!.Deməli, ayədə s&ouml;hbət , bizim bildiyimiz g&uuml;nahlardan getmir.<br />\n4.Şəksiz və ş&uuml;bhəsiz g&uuml;nah , eyb və xəta şeytandandır. Şeytan (Allahın lənəti olsun ona) &ouml;z&uuml; etiraf edib ki, mən se&ccedil;ilmiş və paklanmış bəndələrə toxuna bilmərəm. Allah təbarəkə və təala Quranda buyurur:-&quot;(İblis) dedi, izzətinə and olsun ki, onların hamısını aldadıb , doğru yoldan &ccedil;ıxaracağam. Onların arasından xalis və se&ccedil;ilmiş bəndələrin istisna olmaqla&quot; .(Sad surəsi /82-83). Təəss&uuml;flər olsun ki, şeytan şeytanlığıyla etiraf edir ki, Allahın se&ccedil;ilmiş bəndələrinə toxunmayacam, amma bəziləri niyə israr edir bilmirəm ???!!!!<br />\n5.Bəs o zaman bu m&uuml;barək ayələrdən əsas məqsəd nədir ?&nbsp;<br />\nCavab:-Eyni ilə bu sualı Məmun, Ağamız İmam Rza (ə)-dan soruşdu. 8-ci İma', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 12:37:06', 'en'),
(48, 'sdi-irazi-glstan-srind-yazr-ki-bir-gn-tirli-gil-rast-glindi-v-ondan-soruulduey-sn-n-bel-tirlisn', 'Sədi Şirazi Gülüstan əsərində yazır ki, bir gün ətirli bir "gilə" rast gəlindi və ondan soruşuldu:-"ey gil, sən nə üçün belə ətirlisən?"', 'Sədi Şirazi Gülüstan əsərində yazır ki, bir gün ətirli bir "gilə" rast gəlindi və ondan soruşuldu:-"ey gil, sən nə üçün belə ətirlisən?"', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Sədi Şirazi G&uuml;l&uuml;stan əsərində yazır ki, bir g&uuml;n ətirli bir &quot;gilə&quot; rast gəlindi və ondan soruşuldu:-&quot;ey gil, sən nə &uuml;&ccedil;&uuml;n belə ətirlisən?&quot;. &quot;Gil&quot; cavab verdi:<br />\n-Mən bir m&uuml;ddət g&uuml;l ilə yoldaşlıq etmişəm. G&uuml;l&uuml;n ətri mənə təsir edib...<br />\n&quot;G&uuml;l&uuml;stan&quot; əsərindən bu hissəni &ccedil;oxları eşidib və yaxud oxuyub.&nbsp;<br />\nSual budur.<br />\nG&ouml;rəsən nə &uuml;&ccedil;&uuml;n &quot;gil&quot; &quot;g&uuml;ldən&quot; təsir g&ouml;t&uuml;rd&uuml;y&uuml; halda , &quot;g&uuml;l&quot; &quot;gildən&quot; təsir g&ouml;t&uuml;rm&uuml;r ??!!! Başqa ifadə ilə desək, &quot;gil&quot; &quot;g&uuml;ldən&quot; təsir g&ouml;t&uuml;r&uuml;b , ətirlənib, bəs niyə &quot;g&uuml;l&quot; &quot;gildən&quot; təsir g&ouml;t&uuml;r&uuml;b torpaqlaşmır ??!!!! Axı &quot;yoldaşlıq&quot; qarşılıqlı bir məfhumdur. &quot;A&quot; &quot;B&quot; ilə yoldaşdırsa , avtomatik olaraq &quot;B&quot; də &quot;A&quot; ilə yoldaş olmalıdlr.&nbsp;<br />\nVarlıq aləmində m&ouml;vcudatların kamillik mərtəbələri arasında &quot;şaquli&quot; və &quot;&uuml;f&uuml;qi&quot; şəkildə fərq vardır. Məsələn, nəbatat cəmadatdan (daş, torpaq və sairə) , heyvanat nəbatatdan , insan heyvanatdan daha kamildir. Cəmadatın kamilliyi yalnız var olmasındadırsa, nəbatat varlıqla yanaşı b&ouml;y&uuml;y&uuml;b və inkişaf etmək kamilliyinə də malikdir. Nəbatatın kamilliyi &quot;varlıq +b&ouml;y&uuml;məkdirsə&quot; , heyvanatın kamilliyi &quot;varlıq+b&ouml;y&uuml;mək+hərəkət&quot; dir. İnsanın isə kamilliyi &quot;varlıq+b&ouml;y&uuml;mək+hərəkət+dərk etmə&quot;dir. Deməli, varlıq mərtəbələrində hər bir sonrakı mərtəbə &ouml;z&uuml;ndən qabaqkı mərtəbənin kamilliyinə və &uuml;stəgəl artıq kamala malikdir. Daha aydın olsun deyə varlıq mərtəbələrini və onların malik olduğu kamalı rəqəmləyək.<br />\n1.Cəmadat-var olma (daş , torpaq, libas bə sairə).<br />\n2.Nəbatat-var olma+b&ouml;y&uuml;mək', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:01:47', 'en'),
(49, 'qayda-v-qanun-arasnda-frq-varm-dyiilmyn-istisnas-olmayan-hkmdr-msln-iki-zidd-olan-sift-bir-yada-eyni-zamanda-mkanda-cm-ola-bilmz', '“Qayda” və “qanun” arasında fərq varmı?  “Qayda”- dəyişilməyən və istisnası olmayan hökmdür. Məsələn, iki zidd olan sifət bir əşyada eyni zamanda və eyni məkanda cəm ola bilməz', '“Qayda” və “qanun” arasında fərq varmı? \n“Qayda”- dəyişilməyən və istisnası olmayan hökmdür. Məsələn, iki zidd olan sifət bir əşyada eyni zamanda və eyni məkanda cəm ola bilməz', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>&ldquo;Qayda&rdquo; və &ldquo;qanun&rdquo; arasında fərq varmı?&nbsp;<br />\n&ldquo;Qayda&rdquo;- dəyişilməyən və istisnası olmayan h&ouml;kmd&uuml;r. Məsələn, iki zidd olan sifət bir əşyada eyni zamanda və eyni məkanda cəm ola bilməz .Bir kağızın tərəfi eyni zamanda həm qara , həm&ccedil;inin də ağ ola bilməz. Və yaxud , sıfra b&ouml;lmək olmaz. Bunlardan biri əqli, digəri isə riyazi qaydadır. G&ouml;rd&uuml;y&uuml;m&uuml;z kimi, bunlar və bunlara bənzər qaydalar he&ccedil; vaxt dəyişmir, və he&ccedil; zaman istisna qəbul etmir. Əgər hər hansı bir &ldquo;qayda&rdquo; da istisna olarsa, deməli o , bizim zənnimizcə qaydaymış. Əslində isə &ldquo;qayda&rdquo; deyilmiş.<br />\nAmma &ldquo;qanun&rdquo; &ndash;dəyişilə bilən və istisnası olan h&ouml;kmd&uuml;r. Məsələn , yalan haramdır. Lakin insan həyatını xilas etmək &uuml;&ccedil;&uuml;n və yaxud d&ouml;y&uuml;ş meydanında d&uuml;şmənə qələbə &ccedil;almaqdan &ouml;tr&uuml; deyilən yalan haram deyil.<br />\nNə &uuml;&ccedil;&uuml;n &ldquo;qayda&rdquo; dəyişilmir və istisnası olmur, lakin &ldquo;qanun&rdquo; dəyişilir və istisnası olur?<br />\n&Ccedil;&uuml;nki &ldquo;qayda&rdquo; hikmətə , &ldquo;qanun&rdquo; isə məsləhətə tabedir. Hikmət sabitdir və həmişə hikmətdir. Məsləhət isə zaman və məkandan asılıdır. Məsləhət dəyişdikcə &ldquo;qanun&rdquo; da dəyişilir, və yaxud məsləhət olmayan yerdə istisna meydana gəlir.&nbsp;<br />\nBu fərqi biləndən sonra h&ouml;kmlərlə d&uuml;zg&uuml;n rəftar etmək olur. B&uuml;t&uuml;n şəri, siyasi və ictimai h&ouml;kmlər &ldquo;qanundur&rdquo;, &ldquo;qayda&rdquo; deyildir. Allahın şəriətlə bağlı h&ouml;kmləri &ldquo;qanundur&rdquo;, yaradılış və xilqətlə bağlı h&ouml;kmləri isə&rdquo; qaydadır&rdquo;. Təşrii h&ouml;kmlər &ldquo;qanun&rdquo;, təkvini h&ouml;kmlər isə &ldquo;qaydadır&rdquo;. Allah Qurani Kərimdə buyurur:-&ldquo;Allah s&uuml;nnəsində dəyişiklik olmaz&rdquo;.&nbsp;<br />\nG&uuml;nlərin birində, b&uuml;t&uuml;n İslam &ouml;lkələri', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:03:51', 'en'),
(50, 'rbbimiz-v-xaliqimiz-insan-yaratd-nsan-ictimai-varlqdr-cmiyytl-yaamaldlr-hr-bir-frdinin-biri-digrin-ehtiyac-vardr-slind-insanlarn-olmasa-da--insanlar-birin-hrmt-qoymaldr', 'Rəbbimiz və Xaliqimiz insanı yaratdı. İnsan ictimai varlıqdır. Cəmiyyətlə yaşamalıdlr. Hər bir insan fərdinin biri digərinə ehtiyacı vardır. Əslində insanların biri digərinə ehtiyacı olmasa da , insanlar bir birinə hörmət qoymalıdır.', 'Rəbbimiz və Xaliqimiz insanı yaratdı. İnsan ictimai varlıqdır. Cəmiyyətlə yaşamalıdlr. Hər bir insan fərdinin biri digərinə ehtiyacı vardır. Əslində insanların biri digərinə ehtiyacı olmasa da , insanlar bir birinə hörmət qoymalıdır.', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Rəbbimiz və Xaliqimiz insanı yaratdı. İnsan ictimai varlıqdır. Cəmiyyətlə yaşamalıdlr. Hər bir insan fərdinin biri digərinə ehtiyacı vardır. Əslində insanların biri digərinə ehtiyacı olmasa da , insanlar bir birinə h&ouml;rmət qoymalıdır. Axı eyni mahiyyətə və eyni həqiqətə malikdirlər. &Ouml;z həqiqətinə h&ouml;rmət qoymayan , başqa həqiqətə h&ouml;rmət qoyarmı ? Və yaxud başqa həqiqətdən h&ouml;rmət g&ouml;zləyə bilərmi? Məhz ona g&ouml;rə də m&uuml;qəddəs Quranımız, bir insanın &ouml;l&uuml;m&uuml;n&uuml; b&uuml;t&uuml;n insanların &ouml;l&uuml;m&uuml;nə bərabər tutur.<br />\n&Ouml;z həqiqətinə h&ouml;rmət qoymayan insan, he&ccedil; olmasa &ouml;z&uuml;nə h&ouml;rmət qoymalıdır. Daha aydın ifadə ilə deyim.,,,,,,<br />\nHe&ccedil; kəsə ehtiyacı olmayan insan (əgər varsa) digər insanlara ona g&ouml;rə h&ouml;rmət qoymalıdır ki, &ccedil;&uuml;nki onunla bir həqiqətə malikdirlər. Başqasına m&ouml;htac olan kəs , digərlərinə insanlığa g&ouml;rə h&ouml;rmət qoymursa , he&ccedil; olmasa onlara ehtiyaclı olduğuna g&ouml;rə h&ouml;rmətlə yanaşsın.&nbsp;<br />\nMəsələn, bir insan səxavət g&ouml;stərir sırf Allaha g&ouml;rə.&nbsp;<br />\nDigəri isə başqalarına k&ouml;mək edir ki, g&uuml;nlərin birində onun da ehtiyacı olanda ona k&ouml;mək etsinlər.&nbsp;<br />\nD&uuml;zd&uuml;r ikincinin Allah yanında dərəcəsi yoxdur, amma bu d&uuml;nyada qarşılıqlı h&ouml;rmət &uuml;&ccedil;&uuml;n lazımlı işdir.&nbsp;<br />\nQayıdıram bəhsə.&nbsp;<br />\n1. İnsan olduğuma g&ouml;rə insanlara (&ouml;z n&ouml;v&uuml;mə) h&ouml;rmət qoyuram.&nbsp;<br />\n2. İnsanlara m&ouml;htac olduğuma g&ouml;rə insanlara h&ouml;rmət qoyuram.&nbsp;<br />\nHər halda , insanlar arasında nizam intizam &uuml;&ccedil;&uuml;n bunların ikisi də lazımdır.&nbsp;<br />\nBu g&uuml;n Birmada m&uuml;səlmanlar &ouml;ld&uuml;r&uuml;l&uuml;rsə, şəksiz və ş&uuml;bhəsiz bir insan kimi bu bizi ağrıdır.&nbsp;<br />\nLakin, mən inanmıram bu vəhşiliyin m&uuml;qabilində məzhəb ayrıse&ccedi', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:10:25', 'en'),
(51, 'gr-hr-hans-bir-insan--batil-qidy-malik-olarsa-v-yaxud-dzgn-inanca-inam-olmazsa-snin-onu-thqir-etmyin-ona-sy-msxrlrin-sni-ondan-da-aa-edir-xbrin-varm', 'Əgər hər hansı bir insan , batil əqidəyə malik olarsa və yaxud düzgün bir inanca inamı olmazsa , sənin onu təhqir etməyin, ona söyüş və məsxərələrin , səni ondan da aşağı edir. Xəbərin varmı ?! ', 'Əgər hər hansı bir insan , batil əqidəyə malik olarsa və yaxud düzgün bir inanca inamı olmazsa , sənin onu təhqir etməyin, ona söyüş və məsxərələrin , səni ondan da aşağı edir. Xəbərin varmı ?!\n', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Əgər hər hansı bir insan , batil əqidəyə malik olarsa və yaxud d&uuml;zg&uuml;n bir inanca inamı olmazsa&nbsp;, sənin onu təhqir etməyin, ona s&ouml;y&uuml;ş və məsxərələrin , səni ondan da aşağı edir. Xəbərin varmı ?!<br />\nBir nəfər g&uuml;nah və xəta edirsə, sənin onu insanlar i&ccedil;ində aşağılamağın , ona nalayiq s&ouml;zlər deməyin , sənin dəyər və qiymətini &ccedil;ox ucuzlaşdırır. Xəbərin varmı ?!<br />\nAxı Rəbbimiz , məsxərə və lağa qoymanı təkcə məsxərə olunanın h&ouml;rmətdən d&uuml;şəcəyi &uuml;&ccedil;&uuml;n yasaq etməyib. Məsxərə edəni də h&ouml;rmətdən salır. Onun ciddiyyətini alır. Xəbərin varmı ?!<br />\nX&uuml;susilə də dini məsələlərdə. Axı din İlahi qanundur , sənin onu məsxərə, lağa qoyma , təhqir və s&ouml;y&uuml;şlərlə təbliğatın , İlahi qanunların ciddi olmasına zərər verir. Xəbərin varmı ?!<br />\nTəhqir və s&ouml;y&uuml;ş haramdır, lağa qoyma və məsxərə haramdır. Haramla haramdan &ccedil;əkindirməkmi olar? Batil ilə batildən yayındırmaqmı olar ? G&uuml;nah z&uuml;lmətdir , qaranlıqdır, haqq nurdur, işıqdır. Z&uuml;lmət və qaranlıqla nura yetişmək olmaz. Xəbərin varmı ?!<br />\nSonda, b&uuml;t&uuml;n m&uuml;səlmanların yekdilliklə qəbul etdiyi Peyğəmbər s ə a s kəlamına diqqətlə bax ! &quot;Hər kəs Quranı &ouml;z rəyi ilə təfsir etsə, gəldiyi nəticə həqiqət olsa da , o səhf edib&quot;.&nbsp;<br />\nNə &uuml;&ccedil;&uuml;n ? ! &Ccedil;&uuml;nki dəlilsiz danışıb , dəlilsiz qərar veribdir. Reallığa &ccedil;atarkən belə, dəlilsiz danışmağa icazə verməyən dinimizə g&ouml;rə q&uuml;drətli Rəbbimizə saysız ş&uuml;k&uuml;rlər olsun.&nbsp;</p>\n', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:13:18', 'en'),
(52, 'sliddin-ndir-hr-eydn-qabaq-onu-qeyd-etmk-lazmdr-ki-bu-termin-srf-slam-alimlri-trfindn-yaradlm-bir-termindir-n-mqdds-quranda--d-mbark-snnd-rast-glmirik', 'Üsüliddin nədir?  Hər şeydən qabaq onu qeyd etmək lazımdır ki, bu termin sırf İslam alimləri tərəfindən yaradılmış bir termindir. Nə müqəddəs Quranda , nə də mübarək Sünnədə bu terminə rast gəlmirik', 'Üsüliddin nədir? \nHər şeydən qabaq onu qeyd etmək lazımdır ki, bu termin sırf İslam alimləri tərəfindən yaradılmış bir termindir. Nə müqəddəs Quranda , nə də mübarək Sünnədə bu terminə rast gəlmirik', '<p>İslam ideologiyası və onun əsasları (2).</p>\n\n<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Ke&ccedil;ən yazımızda İslam ideologiyasının əhəmiyyəti və onun &ouml;yrənməsinin lab&uuml;dl&uuml;y&uuml;ndən s&ouml;hbət a&ccedil;dıq. Bir&nbsp;c&uuml;mlə ilə s&ouml;z&uuml;m&uuml;z&uuml; tamamladıq. O da bundan ibarət idi. B&uuml;t&uuml;n İslam ideologiyası və inancları &uuml;s&uuml;liddin deyildir. Bəzi ideoloji məsələlər &uuml;s&uuml;liddindir. Məntiq istilahı ilə desək , İslam ideologiyası ilə &uuml;s&uuml;liddin arasında nisbət &quot;umum və xusus mutləqdir&quot; , yəni &quot;tabeli məfhumlardır&quot;. Məsələn, b&uuml;t&uuml;n alimlər insandır , lakin bəzi insanlar alimdirlər.&nbsp;<br />\n&Uuml;s&uuml;liddin nədir?&nbsp;<br />\nHər şeydən qabaq onu qeyd etmək lazımdır ki, bu termin sırf İslam alimləri tərəfindən yaradılmış bir termindir. Nə m&uuml;qəddəs Quranda , nə də m&uuml;barək S&uuml;nnədə bu terminə rast gəlmirik. Usul elminin istilahı ilə desək, bu termin &quot;həqiqə mutəşərriədir&quot; , amma &quot;həqiqə şəriyyə&quot; deyildir. İkinci terminin mənası odur ki, bu termini Allah Quranda və yaxud Məsumlar (ə) hədislərində adlandırıbdır. Birinci terminin mənası isə odur ki, bu termin alimlər və iman əhli tərəfindən sonra yaradılıbdır. Madam ki , bu termin İslam alimləri tərəfindən yaradılıb , o zaman bu termindən məqsəd nədir?<br />\n1.&Uuml;s&uuml;liddinin l&uuml;ğəti mənası;<br />\nİki kəlmədən ibarət bu m&uuml;rəkkəb s&ouml;z &quot;&Uuml;s&uuml;l&quot; və &quot;din&quot; s&ouml;z&uuml;ndən təşkil tapıb.&nbsp;<br />\n&Uuml;s&uuml;l- əsas, fundament , b&uuml;n&ouml;vrə deməkdir.&nbsp;<br />\nDin isə-kainatın və insanın Xaliqinə iman gətirmək və o imana uyğun vəzifə və təkliflərə deyilir.&nbsp;<br />\nDeməli, &Uuml;s&uuml;liddin o İslam inanclarına deyilir ki, onlara iman gətirməklə insan dinə daxil olur. Onlara iman gətirməməklə insan dindən xaric olur.&nbsp;<br />\nDeməli, İslam alimləri Quran və m&uuml;barək s&uuml;nnəni araşdırıb &Uuml;s&uuml;liddini tərtib e', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:16:41', 'en'),
(53, 'hr-bir-insann-hyatnda-ideologiya-mhm-yer-tutur-nki-sasnda-xsiyyt-v-kimliyi--xlaq-mllri-formalar', 'Hər bir insanın həyatında ideologiya mühüm yer tutur. Çünki ideologiya əsasında insanın şəxsiyyət və kimliyi , əxlaq və əməlləri formalaşır.', 'Hər bir insanın həyatında ideologiya mühüm yer tutur. Çünki ideologiya əsasında insanın şəxsiyyət və kimliyi , əxlaq və əməlləri formalaşır.', '<p>İslam ideologiyası ve onun esasları (1).&nbsp;</p>\n\n<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Hər bir insanın həyatında ideologiya m&uuml;h&uuml;m yer tutur. &Ccedil;&uuml;nki ideologiya əsasında insanın şəxsiyyət və kimliyi , əxlaq və əməlləri formalaşır. Buna g&ouml;re də&nbsp;, digər inanclarda olduğu kimi , İslam dini də ideologiyaya m&uuml;h&uuml;m yer verir. M&uuml;qəddəs Qurani Kərim bir ne&ccedil;ə ayədə insanlara əmr edir ki, Allahın sifətləri barəsində elm və yəqinə &ccedil;atın. (Bəqərə surəsi 194,196, 203 , 209 , 244, Maidə surəsi 98 və sairə..).&nbsp;<br />\nİslam Peyğəmbəri Məhəmməd ibni Abdullah (s ə a s) isə , ona elmin əsası nədir , soruşulduqda cavab vermişdir;-Allahı haqq olaraq tanımaqdır.<br />\nM&ouml;minlərin əmiri Әli ibni Әbu Talib (ə) buyurmuşdur;-&quot;Dinin əvvəli Allah tanımaqdır&quot;.<br />\nB&uuml;t&uuml;n bunlardan bizə aydın olur ki , İslam ideologiyasını &ouml;yrənmək ən başlıca məsələlərdəndir.&nbsp;<br />\nİslami dəlillərdən -Quran və S&uuml;nnədən- əlavə , İslam inanclarını &ouml;yrənməyin lab&uuml;dl&uuml;y&uuml; əqli və məntiqli dəlillərlə də deyə bilərik.<br />\n1.G&ouml;zlənilən zərəri dəf etmək.<br />\nAğıllı və d&uuml;ş&uuml;ncəli hər bir insan , qarşıda bir zərər və təhl&uuml;kənin olmasına ehtimal belə versə , o zaman o ehtimalı dəf etmək və yaxud təhl&uuml;kə ehtimalından yayınmağa &ccedil;alışacaqdır. Bu insanlarda fitri və qeyri-ixtiyaridir. G&ouml;rm&uuml;rs&uuml;n&uuml;zm&uuml; ki, yol polisi olan yoldan insanlar məcbur qalanda istifadə edir ?<br />\nElə isə, dini ideologiyanı araşdırmamaq və bu barədə səhlənkarlıq etmək , dini inanclara d&uuml;zg&uuml;n yiyələnməmək insana gələcək bir zərərdən xəbər verir. Bu ehtimal da olsa, ağıllı insan bu g&ouml;zlənilən zərəri &ouml;z&uuml;ndən dəf etməyə &ccedil;alışır. İmam Sadiqin (ə) bir dini inanca malik olmayan şəxsə dediyi kimi;- Әgər sənin dediyin kimi olsa, əlbəttə elə deyildir , o zaman biz he&ccedil; nə itirmirik. Amma əgər bizim dediyimiz kimi olsa, əlbəttə eləd', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:28:18', 'en'),
(54, 'Urekleri-kinle-ve-nifretle-dolu-olan-dushmenlerimiz-bolmekde-davam-edir-ve-nehayet-bir-mektebin-icerisinde-olan-muselmanlari-', 'Ürəkləri kinlə və nifrətlə dolu olan düşmənlərimiz bölməkdə davam edir və nəhayət bir məktəbin içərisində olan müsəlmanları ', 'Ürəkləri kin və nifrətlə dolu olan düşmənlərimiz bölməkdə davam edir və nəhayət bir məktəbin içərisində olan müsəlmanları "vilayət" və "ziddi-vilayətə" bölməyə başladılar.', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>&Uuml;mumiyyətlə İslamın, x&uuml;susilə Əhli-beyt məktəbinin d&uuml;şmənləri bizi əvvəl məzhəblərə, sonra millətlərə, sonra sərhədlərə və sonda b&ouml;lgə və zonalara b&ouml;ld&uuml;lər. &Uuml;rəkləri kinlə və nifrətlə dolu olan d&uuml;şmənlərimiz b&ouml;lməkdə davam edir və nəhayət bir məktəbin i&ccedil;ərisində olan m&uuml;səlmanları &quot;vilayət&quot; və &quot;ziddi-vilayətə&quot; b&ouml;lməyə başladılar. Nə qədər boynumuzdan atmağa &ccedil;alışsaq da , m&uuml;əyyən qədər d&uuml;şmənin mənfur hiyləsi , biz Azərbaycan m&ouml;minlərindən də yan ke&ccedil;mədi. Bu g&uuml;n doğma Vətənimiz Azərbaycanda, bu məsələyə g&ouml;rə m&ouml;minlər arasında olan soyuqluqlar buna əyani s&uuml;butdur. Qardaşlarım və əzizlərim , sizi and verirəm anamız Həzrəti Zəhraya (ə) , bu yazını diqqətlə oxuyub, bu soyuqlaqları &quot;dəfn&quot; edək. Mən Allaha sığınıb, yazıma başlayıram.<br />\nŞəksiz və ş&uuml;bhəsiz b&uuml;t&uuml;n m&uuml;səlmanlar Məsum (ə) hazır olmayan zamanda, din alimlərinə (M&uuml;ctehidlər və M&uuml;ft&uuml;lər) m&uuml;raciət edirlər. Sadə insan ağlı dərk edir ki, hər bir insan Quran və hədislərdən İlahi h&ouml;kmləri istinbat etmək q&uuml;drətində deyildir. X&uuml;susilə də İmam Zaman ağanın (əc) Qeybət&uuml;l-Suğra da (ki&ccedil;ik qeybə &ccedil;əkilmə d&ouml;vr&uuml;) 4 x&uuml;susi naib təyin etməsi, biz m&uuml;səlmanlar &uuml;&ccedil;&uuml;n aydın dəlildir ki, Ağamız (əc) qeybdə olan m&uuml;ddətdə İslam &uuml;mməti başsız qalmamalıdır. Qeybət&uuml;l-Suğrada, bu barədə bizim &uuml;&ccedil;&uuml;n problem yoxdur, ona g&ouml;rə ki, o d&ouml;nəmdə İmam Mehdi (əc) x&uuml;susi naibini adı və b&uuml;t&uuml;n x&uuml;susiyyəti ilə təyin etmişdir. Amma Qeybət&uuml;l-Kubra da (b&ouml;y&uuml;k və uzun qeybə &ccedil;əkilmə d&ouml;vr&uuml;) necə ??!! İndiki zamanımızda m&uuml;səlman &uuml;mməti kimə m&uuml;raciət etməlidir ??<br />\nBu suala cavab verməzdən &ouml;ncə &quot;h&ouml;km&quot; və &quot;fətva&quot;nı diqqətinizə &cc', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:31:47', 'en'),
(55, 'btn-almlr-rhmt-olan-ziz-peymbrimiz-sas-buyurmudurallah-tbark-vtala-buyurduoruc-mnimdir-v-onun-mkafatn-mn-vercm', 'Bütün aləmlərə rəhmət olan əziz Peyğəmbərimiz (s.ə.a.s) buyurmuşdur:-Allah təbarəkə və təala buyurdu:-"Oruc mənimdir və onun mükafatını mən verəcəm".', 'Bütün aləmlərə rəhmət olan əziz Peyğəmbərimiz (s.ə.a.s) buyurmuşdur:-Allah təbarəkə və təala buyurdu:-"Oruc mənimdir və onun mükafatını mən verəcəm".', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>B&uuml;t&uuml;n aləmlərə rəhmət olan əziz Peyğəmbərimiz (s.ə.a.s) buyurmuşdur:-Allah təbarəkə və&nbsp;təala buyurdu:-&quot;Oruc mənimdir və onun m&uuml;kafatını mən verəcəm&quot;.<br />\nİslami əsərlərdə m&uuml;barək hədislərimizə m&uuml;raciət etdikdə, m&uuml;h&uuml;m bir məsələyə rast gəlirik. Bəzi hədislərdə , namazın ən &uuml;st&uuml;n ibadət olduğunu g&ouml;r&uuml;r&uuml;k. Məsələn, Həzrəti Məhəmməd ibni Abdullah (s.ə.a.s) buyurmuşdur:-&quot;Əgər namaz Allah yanında qəbul olarsa, digər əməllər qəbul olar, yox əgər qəbul olunmazsa, digər əməllər də qəbul olunmaz&quot;. A&ccedil;ıq-aşkar başa d&uuml;ş&uuml;l&uuml;r ki, namaz digər ibadətlərdən &uuml;st&uuml;nd&uuml;r.&nbsp;<br />\nBaşqa hədislərə m&uuml;raciət etdikdə isə, Həcc və Zəkatın daha &uuml;st&uuml;n əməl olduğunu g&ouml;r&uuml;r&uuml;k. Məsələn, hər kəs &ouml;lsə, boynunda bir zərrə zəkat qalarsa və yaxud hər kəs d&uuml;nyasını dəyişsə, imkanı ola-ola Həcc ziyarətini yerinə yetirməzsə, &ouml;ləndə ya yəhudi , ya da xristian kimi &ouml;lər.<br />\nBu m&uuml;barək Məsum (ə) kəlamından isə ilk baxışda, Həcc və Zəkatın daha &uuml;st&uuml;n əməl olması başa d&uuml;ş&uuml;l&uuml;r. &Ccedil;&uuml;nki, bu c&uuml;r ağır məzəmmət yalnız Zəkatı və Həcci imkanı ola-ola tərk edənlər &uuml;&ccedil;&uuml;n varid olubdur.<br />\nYuxarıda zikr olunan m&uuml;barək kəlam isə, orucun daha əhəmiyyətli olmasını g&ouml;stərir. Allah buyurur:- &quot;Oruc mənimdir&quot;.&nbsp;<br />\nBu ziddiyyətdirmi??? Təzaddırmı??? Əsla yox....Məsum (ə) kəlamında ziddiyyət və təzad ola bilməz. İlk baxışda bizə təzad kimi g&ouml;rsənir. Amma bu hədislərdə təzadın olmamasını izah etmək &uuml;&ccedil;&uuml;n, m&uuml;qəddimə olaraq bir qaydanın şərhinə ehtiyac vardır.&nbsp;<br />\n&quot;Bir cəhətdən &uuml;st&uuml;nl&uuml;yə dəlalət edən s&ouml;z, b&uuml;t&uuml;n cəhətlərdən &uuml;st&uuml;nl&uuml;yə dəlalət etmir&quot;.<br />\nŞƏRHİ: Məsələn, bir insan digərinə deyir, mənim tayfam sənin tayfandan &uuml;s', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:39:36', 'en'),
(56, 'Ilahi-eger-mene-verdiyin-ezab-senin-mulkuvu-artiracaqsa-o-zaman-men-senden-ezabin-ucun-sebr-isteyerem-lakin-bilirem-ki,-ne-itaet-edenlerin-itaeti-ne-de-usyan-edenlerin-usyani-senin-mulkune-hec-ne-artirmaz-ve-azaltmaz', '-İlahi, әgәr mәnә verdiyin әzab sәnin mülküvü artıracaqsa, o zaman mәn sәndәn әzabın üçün sәbr istәyәrәm, lakin bilirәm ki, nә itaәt edәnlәrin itaәti, nә dә üsyan edәnlәrin üsyanı sәnin mülkünә heç nә artırmaz vә azaltmaz', '-İlahi, әgәr mәnә verdiyin әzab sәnin mülküvü artıracaqsa, o zaman mәn sәndәn әzabın üçün sәbr istәyәrәm, lakin bilirәm ki, nә itaәt edәnlәrin itaәti, nә dә üsyan edәnlәrin üsyanı sәnin mülkünә heç nә artırmaz vә azaltmaz".', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>İmam Sәccad (ә) buyurmuşdur;<br />\n-İlahi, әgәr mәnә verdiyin әzab sәnin m&uuml;lk&uuml;v&uuml; artıracaqsa, o zaman mәn sәndәn әzabın &uuml;&ccedil;&uuml;n sәbr istәyәrәm, lakin bilirәm ki, nә itaәt edәnlәrin itaәti, nә dә &uuml;syan edәnlәrin &uuml;syanı sәnin m&uuml;lk&uuml;nә he&ccedil; nә artırmaz vә azaltmaz&quot;.<br />\nD&uuml;zg&uuml;n mәrifәtullahın vә әsl irfanın a&ccedil;arıdır bu kәlam. Necә dә olmasın ? Tamamilә &quot;mәnin&quot; (әnaniyyәtin) dәfn olunmasıdır. Xaliqlә mәxluq arasında әn b&ouml;y&uuml;k hicabın (&quot;mәn&quot;) әrimәsidir , yanıb k&uuml;l olmasıdır. Rәhmәtlik Raci bu mәqam &uuml;&ccedil;&uuml;n demişdir:<br />\nAşiqi mәşuq ma beynindә hail cism olur<br />\nBәzli can canan yolunda Raciya bu qism olur<br />\nİsmi rәsmi tәrk edәn alәmdә sahib ism olur<br />\n&Ccedil;әk mәniyyәtdәn әl ki, zahir olmuş ondan hәr bәla .<br />\nMa- beynindә-arasında<br />\nHail-mane vә pәrdә<br />\nBәzl-sәrf etmәk , fәda etmәk<br />\nMәniyyәt -mәnәm mәnәmlik.<br />\n&quot;Aşiqlә mәşuq arasında әsl pәrdә cismdir, amma bundan fәrqli olaraq Raci, &ouml;z hәqiqi cananı &uuml;&ccedil;&uuml;n canın qurban vermәk istәyir, &ouml;z rәsmi adını tәrk edәn d&uuml;nyada ad sahibi olur , mәnәm mәnәmlikdәn әl &ccedil;әk ki, b&uuml;t&uuml;n bәlalar ondan aşkar olub vә başlayıbdır&quot;.<br />\nDildә Allahı sevirәm deyәn, onun izzәtinә and i&ccedil;әn vә ona ibadәt edәn İblisin yeganә problemi , o pәrdәni yarmaması oldu. Mәnәm mәnәmlik &ccedil;irkabına bulaşan birisi , Mәşuqun ona tәqdim etdiyi saf bulağın suyu ilә paklana bilmir. Eşq aynasında &quot;mәni&quot; g&ouml;rәnlәr , &quot;O&quot;nun g&ouml;zәlliyindәn mәhrum olurlar. Әnaniyyәt bataqlığında &ouml;zlәrin d&uuml;ş&uuml;nәnlәr , Yarın uzatdığı әli belә g&ouml;rm&uuml;rlәr. Әsl bәla budur.&nbsp;<br />\nİmam H&uuml;seyn (ә) buyurur:<br />\n-Kor olsun o g&ouml;zlәr ki, onlar &uuml;zәrindә nәzarәt&ccedil;i olan Sәni g&ouml;rm&uuml;r.<br />\nİlahi , bizi ,valideynlәrimizi vә iman әhlini b', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:44:49', 'en'),
(57, 'mzhbilik-v-onun-msbt-mnfi-chtlri-son-dvrd-mhur-bir-ar-var-baa-dn-d-dmyn-mnasn-anlayan-da-anlamayan-mzhbiliy-qar-aqressiv-mvqed-x-edirlr', 'Mәzhәbçilik vә onun müsbәt vә mәnfi cәhәtlәri.  Son dövrdә mәşhur bir şüar var. Başa düşәn dә, düşmәyәn dә, mәnasını anlayan da, anlamayan da mәzhәbçiliyә qarşı aqressiv mövqedә çıxış edirlәr. ', 'Mәzhәbçilik vә onun müsbәt vә mәnfi cәhәtlәri. \nSon dövrdә mәşhur bir şüar var. Başa düşәn dә, düşmәyәn dә, mәnasını anlayan da, anlamayan da mәzhәbçiliyә qarşı aqressiv mövqedә çıxış edirlәr. ', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Mәzhәb&ccedil;ilik vә onun m&uuml;sbәt vә mәnfi cәhәtlәri.&nbsp;<br />\nSon d&ouml;vrdә mәşhur bir ş&uuml;ar var. Başa d&uuml;şәn dә, d&uuml;şmәyәn dә, mәnasını anlayan da, anlamayan da mәzhәb&ccedil;iliyә qarşı aqressiv m&ouml;vqedә &ccedil;ıxış edirlәr. Ona g&ouml;rә bu barәdә qısa da olsa, yazı yazmağı &ouml;z&uuml;mә borc bildim.&nbsp;<br />\nAmma hәr şeydәn әvvәl, onu qeyd etmәk lazımdır ki, eyni bir m&ouml;vcuda m&uuml;xtәlif prizmalardan baxıb , onu m&uuml;xtәlif adlarla adlandırmaq olar. Bu Quranda Rәbbimizin bizә &ouml;yrәtdiyi bir mәsәlәdir. Mәsәlәn, Quran bir varlıq olan Hәzrәti Rәsulullahı (s ә a s) 5 adla adlandırır.Әhmәd, Muhәmmәd, Ən-nәbiyy, Әr-rәsul vә Taha. Vә yaxud insanlara bir dәfә Bәni Adәm, ikinci dәfә isә &quot;әyyuhәn-nas&quot; deyә xitab edir. Qurani Kәrim Peyğәmbәrimizi (s ә a s) 5 adla adlandırması , şәksiz ve ş&uuml;bhәsiz onu 5 yerә b&ouml;lmәk &uuml;&ccedil;&uuml;n yox, әksinә onda olan 5 m&uuml;h&uuml;m x&uuml;susiyyәti vә sifәti insanlara &ccedil;atdırmaqdır. Elәcә dә biz &ouml;z&uuml;m&uuml;z , mәsәlәn Adәm &ouml;vladıyıq, m&uuml;sәlmanıq vә Azәrbaycanlıyıq deyәrkәn, şәksiz vә ş&uuml;bhәsiz &ouml;z&uuml;m&uuml;zdә par&ccedil;alanma aparmırıq. Sadәcә 3 prizmadan baxıb , 3 x&uuml;susiyyәt vә sifәti qarşımızda olanı &ccedil;atdırırıq. Adәm &ouml;vladıyam -yәni cin ve yaxud mәlәk deyilәm. M&uuml;sәlmanam- yәni odpәrәst -atәşpәrәst deyilәm. Azerbaycanlıyam-yәni mәn , bu Vәtәn torpağında doğulmuşam vә bu &ccedil;oğrafiyaya mәnsubam. Sizi and verirәm Allaha, burda ayrıntıdan s&ouml;hbәt gedә bilәrmi ??!!. İndi gәlәk mәzhәb vә mәzhәb&ccedil;iliyә. Mәzhәb -әrәb s&ouml;z&uuml;d&uuml;r &quot;gedilәn yol&quot; demәkdir. Rәbbimiz tәk olan Allahdır vә qayıdış yalnız onadır. Sonuncu vә &uuml;mumbәşәri İlahi qanun ve şәriәt İslam şәriәtidir. Yer &uuml;zәrinә nazil olmuş sonuncu İlahi kitab Qurandır. Nәhayәt , b&uuml;t&uuml;n alәmlәrә rәhmәt olaraq g&ouml;ndәrilmiş sonuncu Peyğәmbәr Mәhәmmәd ibni Abdull', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:48:31', 'en'),
(58, 'heqiqeten,-biz-musani-oz-nishane-ve-mocuzelerimizle-gonderdik-ki:-Oz-qovmunu-zulmetlerden-nura-teref-cixart.-ve-allahin-gunlerini-onlarin-yadlarina-sal-ki,-heqiqeten-bunda-(bu-xatirlatmada)-her-bir-sebr-ve-shukr-eden-ucun-nishaneler-vardir.-(Ibrahim-sures', '"Həqiqətən, biz Musanı öz nişanə və möcüzələrimizlə göndərdik ki: Öz qövmünü zülmətlərdən nura tərəf çıxart. Və Allahın günlərini onların yadlarına sal ki, həqiqətən bunda (bu xatırlatmada) hər bir səbr və şükr edən üçün nişanələr vardır". (İbrahim suresi', '"Həqiqətən, biz Musanı öz nişanə və möcüzələrimizlə göndərdik ki: Öz qövmünü zülmətlərdən nura tərəf çıxart. Və Allahın günlərini onların yadlarına sal ki, həqiqətən bunda (bu xatırlatmada) hər bir səbr və şükr edən üçün nişanələr vardır". (İbrahim suresi /5). ', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>urandan m&ouml;vludlara x&uuml;susi dəlil;<br />\n&quot;Həqiqətən, biz Musanı &ouml;z nişanə və m&ouml;c&uuml;zələrimizlə g&ouml;ndərdik ki: &Ouml;z q&ouml;vm&uuml;n&uuml; z&uuml;lmətlərdən nura tərəf &ccedil;ıxart. Və Allahın g&uuml;nlərini onların yadlarına sal ki, həqiqətən bunda (bu xatırlatmada) hər bir səbr və ş&uuml;kr edən &uuml;&ccedil;&uuml;n nişanələr vardır&quot;. (İbrahim suresi /5).&nbsp;<br />\nEziz ve deyerli dostlar, qeyd olunan ayede &quot;Allah g&uuml;nlerini onların yadına sal&quot; emri İlahi emrdir. Şeksiz ve ş&uuml;bhesiz İlahi emr olan yerde , s&ouml;hbet Allah yanında&nbsp;beyenilen ve g&ouml;zel emellerden gedir. Eger bir emel Allah yanında beyenilen olmasa , o zaman he&ccedil; vaxt Allah o emele emr etmez. Demeli, İlahi emr varsa, emel ya vacib , ya m&uuml;steheb ve yaxud da en azından mubahdır (icazelidir). Başqa ifade ile desek , Allah terefinden emr olunan emel haram ve mekruh ola bilmez.<br />\nBu m&uuml;qeddimeden sonra qayıdırıq m&uuml;barek ayenin qısa izahına ve deyirik;<br />\n-Allah g&uuml;nlerini onların yadına sal ! Yer, g&ouml;yler ve onlarda olanlar Allaha mexsus olduğuna g&ouml;re , demeli bu ayede &quot;Allah g&uuml;nleri&quot;nden meqsed , ilin her g&uuml;nleri deyil, bir zamanda ve yaxud zamanlarda m&uuml;eyyen hadiselerin baş verdiyi mexsus g&uuml;nlerdir. B&uuml;t&uuml;n tefsir&ccedil;ilerin fikrine esasen &quot;Allah g&uuml;nlerinden&quot; meqsed , Allahın Musanın (e) q&ouml;vm&uuml;ne eta etdiyi x&uuml;susi nemetlerin nazil olan g&uuml;nleridir.<br />\nDemeli, Allahın bu d&uuml;nyada x&uuml;susi nemet verdiyi g&uuml;nler &quot;Allah g&uuml;nleridir&quot; ve o g&uuml;nleri yada salmaq ve insanlara xatırlatmaq , hemen g&uuml;nleri qeyd etmek ve yaşatmaq Allahın emridir.&nbsp;<br />\nMehemmed ve ali Mehemmedden b&ouml;y&uuml;k x&uuml;susi nemet varmı ?! Onların d&uuml;nyaya geldiyi g&uuml;nler , d&uuml;nyaya İlahi nemetin nazil olduğu g&uuml;nler deyilmi ?! Musanın (e) q&ouml;v', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:53:05', 'en'),
(59, 'sevgi-ve-mehebbetin-elamet-ve-meyari-nedir-bildiyimiz-kimi-varliq-aleminde-her-bir-mefhumun-meyar-ve-olcusu-vardir.-rebbimiz-muqeddes-kitabinda-buyurur', 'Sevgi vә mәhәbbәtin әlamәt vә meyarı nәdir ?  Bildiyimiz kimi varlıq alәmindә hәr bir mәfhumun meyar vә ölçüsü vardır. Rәbbimiz müqәddәs kitabında buyurur;-', 'Sevgi vә mәhәbbәtin әlamәt vә meyarı nәdir ? \nBildiyimiz kimi varlıq alәmindә hәr bir mәfhumun meyar vә ölçüsü vardır. Rәbbimiz müqәddәs kitabında buyurur;-"Hәr bir şeyin onun yanında miqdarı vardr". (Rәd surәsi 8) .', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Sevgi vә mәhәbbәtin әlamәt vә meyarı nәdir ?&nbsp;<br />\nBildiyimiz kimi varlıq alәmindә hәr bir mәfhumun meyar vә &ouml;l&ccedil;&uuml;s&uuml; vardır. Rәbbimiz m&uuml;qәddәs kitabında buyurur;-&quot;Hәr bir şeyin onun yanında miqdarı vardr&quot;. (Rәd surәsi 8) .&nbsp;<br />\nYaşadığımız hәyatda da bunun şahidi oluruq. K&uuml;tlәnin meyarı &quot;kiloqram&quot;, uzunluğun &quot;metr&quot; , tezliyin &quot;hers&quot; , yaddaşın &quot;bayt&quot; vә sairә vә ilaxır.&nbsp;<br />\nDini mәfhumlar vә İlahi dәyәrlәr dә bu c&uuml;rd&uuml;r. İmanın әlamәt vә &ouml;l&ccedil;&uuml;s&uuml; &quot;yalan danışmamaq, әmanәtә xәyanәt etmәmәk vә vәdәyә xilaf olmamaqdır&quot;. M&uuml;sәlmanın әlamәt vә meyarı &quot;onun dilindәn vә әlindәn he&ccedil; kәsin ziyan g&ouml;rmәmәsidir&quot;. Vә sairә vә ilaxır .....&nbsp;<br />\nBelә olan halda &quot;sevgi vә mәhәbbәtin&quot; meyarı nәdir ?<br />\nBu suala cavab vermәkdәn &ouml;tr&uuml; , bәşәriyyәtin әn &uuml;st&uuml;n&uuml; , peyğәmbәrlik &uuml;z&uuml;y&uuml;n&uuml;n qaşı Hәzrәti Resulullah (s ә a s)-dәn bir m&uuml;barәk kәlamı siz әzizlәrә &ccedil;atdırım. Qeyd etdiyimiz hәdis b&uuml;t&uuml;n İslam alimlәri tәrәfindәn yekdilliklә qәbul olunmuşdur. (Xәbәrsiz olanlar irad etmәsinlәr , &ccedil;&uuml;nki bu c&uuml;r mәsәlәlәrdә hәssas olan sәlәfilәrin dә әn b&ouml;y&uuml;k alimi , daha dәqiq desәk sәlәfi mәktәbinin s&uuml;tunlarından sayılan İbni Qәyyim Әl-cevziyyә &quot;Medaricus-salikin beynә iyyakә nәubudu vә iyyakә nәstәin&quot; kitabının 5-ci cildindeә , sәhifә 3447 -dә bu hәdisi qәbul etmәklә yanaşı , hәm&ccedil;inin geniş şәrh edir).<br />\nYuxarıda qeyd olunan hәdis budur;-&quot;Allah buyurdu , mәnim bәndәm mәnә vacibatları yerinә yetirmeәklә yaxınlaşır vә eyni zamanda bәndәm mәnә nafilәlәrlә (m&uuml;stәhәbbatlarla) yaxınlaşarsa , mәn onu sevәcәyәm. Elә ki , bәndәmi sevdim , mәn onun eşidәn qulağı, g&ouml;rәn g&ouml;z&uuml; , yeriyәn ayağı, kәsb edәn әli , danışan dili vә d&uuml;ş&uuml;nәn', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 13:58:07', 'en');
INSERT INTO `posts` (`id`, `cpu`, `name`, `content`, `full_review`, `image`, `thumb`, `main`, `added`, `lang`) VALUES
(60, 'Insan-niye-yaranib-yaxud-insanin-yaradilish-felsefesi.-Insan-yaranandan-beri-bir-sual-adem-ovladini-dushundurur', 'İnsan niyə yaranıb? Yaxud insanın yaradılış fəlsəfəsi. İnsan yaranandan bəri bir sual Adəm övladını düşündürür. ', 'İnsan niyə yaranıb? Yaxud insanın yaradılış fəlsəfəsi. İnsan yaranandan bəri bir sual Adəm övladını düşündürür. "Allah məni niyə yaradıb"?(Əgər ilahi dünyagörüşünə malikdirsə). Və yaxud "mən niyə yaranmışam?', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>İnsan niyə yaranıb? Yaxud insanın yaradılış fəlsəfəsi. İnsan yaranandan bəri bir sual Adəm &ouml;vladını d&uuml;ş&uuml;nd&uuml;r&uuml;r. &quot;Allah məni niyə yaradıb&quot;?(Əgər ilahi d&uuml;nyag&ouml;r&uuml;ş&uuml;nə malikdirsə). Və yaxud &quot;mən niyə yaranmışam?&quot;(Əgər materialist d&uuml;nyag&ouml;r&uuml;ş&uuml;nə malikdirsə). Bu suala m&uuml;xtəlif alimlər &ccedil;eşidli cavablar vermişlər. Uca Rəbbimizin k&ouml;məyi ilə bu suala m&uuml;xtəlif baxışlardan cavab vermək istərdim. M&uuml;xtəlif baxışlar deyəndə məqsədim Quran , m&uuml;barək hədislər və fəlsəfi cəhətdən olan baxışlardır. Ona g&ouml;rə də bu yazımı &uuml;&ccedil; hissəyə b&ouml;lmək istəyirəm. 1. İnsanın yaradılış fəlsəfəsi Quranda. 2. İnsanın yaradılış hikməti m&uuml;barək hədislərdə. 3. İnsanın yaradılış hikməti fəlsəfədə. 1. İnsanın yaradılış fəlsəfəsi Quranda. M&uuml;qəddəs Quranımıza m&uuml;raciət edərkən, bu m&ouml;vzu ilə bağlı bir ne&ccedil;ə ayələrə rast gəlirik. &quot;Ey insanlar! Sizi və sizdən əvvəlkiləri yaradan Rəbbinizə ibadət edin, bəlkə təqvalı olasınız&quot; (Bəqərə surəsi/21). &quot;Mən cinləri və insanları mənə ibadət etmək &uuml;&ccedil;&uuml;n yaratmışam&quot; (Zariyat/56). &quot;Yəqinə &ccedil;atana qədər Rəbbinə ibadət et&quot;(Hicr/99). Zariyat surəsinin 56-cı ayəsi a&ccedil;ıq-aşkar m&ouml;hkəm ayədir. &quot;Allah bizi ona ibadət etmək &uuml;&ccedil;&uuml;n yaratmışdır&quot;. Lakin biz hər hansı bir m&ouml;vzu barəsində təhqiqat və araşdırma aparırıqsa , o zaman həmən m&ouml;vzuda olan b&uuml;t&uuml;n ayələri toplamaq lazımdır. &Ccedil;&uuml;nki Quran ayələri biri digərini təfsir edir. Bu s&ouml;z natiqi-Quran Həzrəti Əlinin (ə) s&ouml;z&uuml;d&uuml;r. Bəqərə surəsinin 21-ci ayəsinə, Hicr surəsinin 99-cu ayəsinə isə nəzər saldıqda , hədəf barəsində yeni bir məna ortaya &ccedil;ıxır. Hədəf iki qismdir. 1. Vasitəvi hədəf. 2. Sonuncu hədəf. Vasitəvi hədəf- o hədəfə deyilir ki, onun vasitəsi ilə digər bir y&uuml;ksəkliyə uc', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 14:02:09', 'en'),
(61, 'sefer-ay-baresinde-esasen-insanlar-iki-qisme-blnr-1-bu-ar-ve-nehs-kimi-hesab-edenler-2-ayn-olmasn-la-edib--fikri-xrafat-mvhumat-teqdim', 'Sefer ayı baresinde esasen insanlar iki qisme bölünür.  1. Bu ayı ağır ve nehs ay kimi hesab edenler. 2. Bu ayın ağır ve nehs ay olmasını lağ edib , bu fikri xürafat ve mövhumat kimi teqdim edenler.', 'Sefer ayı baresinde esasen insanlar iki qisme bölünür. \n1. Bu ayı ağır ve nehs ay kimi hesab edenler.\n2. Bu ayın ağır ve nehs ay olmasını lağ edib , bu fikri xürafat ve mövhumat kimi teqdim edenler.', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>&Ccedil;&uuml;nki Sefer ayı ele bir aydır ki, bu ay baresinde dedi-qodu hemişe olub ve olur. Sefer ayı baresinde esasen insanlar iki qisme b&ouml;l&uuml;n&uuml;r.&nbsp;<br />\n1. Bu ayı ağır ve nehs ay kimi hesab edenler.<br />\n2. Bu ayın ağır ve nehs ay olmasını lağ edib , bu fikri x&uuml;rafat ve m&ouml;vhumat kimi teqdim edenler.<br />\nBirinci qismden olan insanlar ise , &ouml;z fikirlerini esaslandırmaqdan &ouml;tr&uuml; bu ayda olan şehadet ve vefatları &ouml;ne &ccedil;ekib, Peyğember (s e a s) ve onun ailesinden he&ccedil; kimin bu ayda d&uuml;nyaya gelmemesini esas g&ouml;t&uuml;r&uuml;rler. Bu esaslandırma tamamile yanlışdır. Ona g&ouml;re ki, eziz Peyğemberimiz Muhemmed (s e a s) buyurub ki, &quot;bu ayın &ccedil;ıxmasını kim mene m&uuml;jde verse, men ona Cenneti m&uuml;jde vererem&quot;. Axı o zamanda he&ccedil; bir vefat ve şehadet olmamışdı.&nbsp;<br />\nDemeli, mesele bu ayda olan vefat ve şehadetlerle bağlı deyildir. Bes onda nedir ??!!<br />\nBirinci onu qeyd etmeliyem ki, bu ayın ağır ve nehs olması baresinde aşkar delilimiz yoxdur. Yalnız iki m&uuml;barek hedisden birbaşa olmasa da , dolayısıyla Sefer ayının diger aylardan ferqlenmesi başa d&uuml;ş&uuml;l&uuml;r. (Mentiq dili ile desek, &quot;delaletul-mutabiqiyye ile yox, delaletul-iltizamiyye ile). Hezreti Resulullah (s e a s) buyurmuşdur;<br />\n1. &quot;Kim Sefer ayının &ccedil;ıxmasını mene m&uuml;jde verse, men ona Cenneti m&uuml;jde vererem&quot;.<br />\n2. &quot;Sefer ayının evvelinde sedeqe verin ki, bela ve &ccedil;etinlikler sizden uzaq olsun&quot;.<br />\nBu iki m&uuml;barek kelam delalet edir ki, Sefer ayı diger aylardan ferqlenir.<br />\nBunu izah etmekden &ouml;tr&uuml; bir ne&ccedil;e m&uuml;qeddimeye işare etmek lazımdır.&nbsp;<br />\na). Bildiyimiz kimi yaşadığımız qalaktikada planetlerin ve eşyaların nizamlı olmasına sebeb , Allahın yaratdığı cazibe q&uuml;vvesidir. Bu q&uuml;vve b&uuml;t&uuml;n maddi aleme tesir etdiyine g&ouml;re , aya', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-27 14:06:33', 'en'),
(66, 'cunki-firon-ve-onun-adamlari-zinadan-dunyaya-gelmemishdiler-amma-sen-ve-senin-yanindakilar-zinadan-dunyaya-gelmisiniz.peygemberlere-(e)-ve-onlarin-ovladlarina-yalniz-zinadan-olanlar-el-qaldirarlar', '-Çünki Firon və onun adamları zinadan dünyaya gəlməmişdilər, amma sən və sənin yanındakılar zinadan dünyaya gəlmisiniz. Peyğəmbərlərə (ə) və onların övladlarına yalnız zinadan olanlar əl qaldırarlar !!!', '-Çünki Firon və onun adamları zinadan dünyaya gəlməmişdilər, amma sən və sənin yanındakılar zinadan dünyaya gəlmisiniz. Peyğəmbərlərə (ə) və onların övladlarına yalnız zinadan olanlar əl qaldırarlar !!!', '<p>Allahın adıyla.<br />\nKərbəla əsirləri Yezidin sarayında... Həzrəti Zeynəbin (ə) baş&ccedil;ılığı ilə qadınlar, uşaqlar, xəstə və yaralılar zəncirlənib d&uuml;nyanın ən iyrənc məxluqu olan Yezidin (l) qarşısında...O əsirlərin i&ccedil;ərisində 5 yaşlı , həcmcə &quot;ki&ccedil;ik&quot; qəlbi b&ouml;y&uuml;k elmlə dolu olan İmam Məhəmməd Baqir (ə)da&nbsp;var...Yezid (l) &ouml;z yezidliyini g&ouml;stərib, yanındakılarla m&uuml;şavirə etdi:<br />\n-Bu əsirləri nə edək ?<br />\nYanında olanların hamısı bir səslə cavab verdi :<br />\n-Bunları da &ouml;ld&uuml;r !!<br />\nBu zaman 5 yaşlı , lakin qəlbli imanla, ağlı Quranla, &uuml;rəyi cəsarətlə dolu olan İmam Baqir (ə) irəli &ccedil;ıxdı və dedi :<br />\n-Ey Yezid !!! Sən və sənin yanında olanlar, Firon və onun adamlarından daha pisdir. &Ccedil;&uuml;nki Allah Qurani Kərimdə buyurur ki, Fironun m&uuml;şavirləri Musa&nbsp;və Harun peyğəmbərləri (ə) &ouml;ld&uuml;rməyə razı olmadılar və&nbsp;Firona dedilər ki, bunları azad elə&nbsp;getsinlər. Amma sən və sənin adamların qadınları, uşaqları da &ouml;ld&uuml;rtmək tələb edirlər.</p>\n\n<p>Yezid danışmaq istərkən, İmam (ə) onun s&ouml;z&uuml;n&uuml; kəsdi:<br />\n-Bunun da səbəbi var, Yezid !!!, s&ouml;ylədi Peyğəmbər balası (ə).<br />\nYezid təəcc&uuml;blə soruşdu :- Nə səbəbi ??!!<br />\nİmam Məhəmməd Baqir (ə) cavab verdi:<br />\n-&Ccedil;&uuml;nki Firon və onun adamları zinadan d&uuml;nyaya gəlməmişdilər, amma sən və sənin yanındakılar zinadan d&uuml;nyaya gəlmisiniz.&nbsp;Peyğəmbərlərə (ə) və onların &ouml;vladlarına yalnız zinadan olanlar əl qaldırarlar !!!<br />\n(O zaman 5-ci İmamımızın (ə) bu dərin məntiqi ilə əsirlər Yezidin yırtıcı pəncəsindən xilas oldular, amma uzun illərdən sonra Hişam ibni ƏӘbd&uuml;lməlikin xəlifəlik zamanında , Ağamız (ə) onun əmri ilə zəhərlənib, şəhadətə qovuşdu).</p>\n', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-28 09:21:45', 'en'),
(67, 'peygember-ve-ali-peygemberin-(s.e.a.s)-musibetinde-sine-vurmaq,-ozunu-doymek,-yaralamaq,-ozune-eziyyet-vermek-heddine-catmamalidir.-bu-remzi-menada-musibet-qarshisinda-insanin-teeccubunu-bildiren-meseledir-ve-eza-elametidir.', 'Peyğəmbər və ali Peyğəmbərin (s.ə.a.s) müsibətində sinə vurmaq, özünü döymək, yaralamaq, özünə əziyyət vermək həddinə çatmamalıdır. Bu rəmzi mənada müsibət qarşısında insanın təəccübünü bildirən məsələdir və əza əlamətidir.', 'Peyğəmbər və ali Peyğəmbərin (s.ə.a.s) müsibətində sinə vurmaq, özünü döymək, yaralamaq, özünə əziyyət vermək həddinə çatmamalıdır. Bu rəmzi mənada müsibət qarşısında insanın təəccübünü bildirən məsələdir və əza əlamətidir.', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Bilirəm, bu yazımı g&ouml;r&uuml;b bəzi &quot;elm adamları&quot; rişxənd etməyə başlayacaqlar ki, əcnəbilər planetlər kəşf ediblər, m&uuml;səlmanlar isə hələ də bəsit və primitiv məsələlərdə qalıblar. Amma qoy olsun, mənim məqsədim odur ki, Əhli-beyt məktəbi yalan&ccedil;ı deyil, bu məktəbin alimləri nə deyirsə, dəlillərə s&ouml;ykənib deyirlər. Bizim kimi m&uuml;səlmanlar da, b&ouml;y&uuml;k alimlərimizin dəlillərinə əsasən danışırıq.<br />\nD&uuml;nən bir tədbirdə Mədinə əhlinin sinə vurmasından danışmışdım, bəzi qardaşlar haqlı olaraq dəlil istəmişdilər (Allah onlardan razı olsun, &ccedil;&uuml;nki Quran bizə &ouml;yrədib ki, əgər doğru danışırsızsa dəlilinizi g&ouml;stərin). Bəziləri isə qərəzli şəkildə danışdığımızın əsassız olduğunu demişdilər.&nbsp;<br />\nƏlbəttə Peyğəmbər və ali Peyğəmbərin (s.ə.a.s) m&uuml;sibətində sinə vurmaq, &ouml;z&uuml;n&uuml; d&ouml;ymək, yaralamaq, &ouml;z&uuml;nə əziyyət vermək həddinə &ccedil;atmamalıdır. Bu rəmzi mənada m&uuml;sibət qarşısında insanın təəcc&uuml;b&uuml;n&uuml; bildirən məsələdir və əza əlamətidir.<br />\nAşağıda g&ouml;rd&uuml;y&uuml;n&uuml;z şəkili &ouml;z&uuml;m &ccedil;əkmişəm, &ouml;z kitabımdan. Kitabın adı M&uuml;snəd Əhməd ibni Hənbəl. Məkkədən almışam. (İranın və Azərbaycanın Ruhani idarəsi &ccedil;ap etməyib). Hədisin rəqəmi aydın g&ouml;rsənir.<br />\nHədis belədir:<br />\n-Əhməd ibni Hənbəl Yəqubdan, o da atasından, o da Əbi İshaqdan, o da Yəhya ibni Ubbad ibni Abdullah ibni Z&uuml;beyrdən , o da atası Ubbaddan , o da Aişədən nəql edir:<br />\n-Aişədən eşitdim deyirdi:- Allahın Rəsulu mənim evimdə , mənim qucağımda d&uuml;nyasını dəyişdi. Mən orda he&ccedil; kəsə z&uuml;lm etmədim. Səfehliyimdən və yaşımın azlığından Allah Rəsulu qucağımda can verəndən sonra onun başını balışın &uuml;st&uuml;nə qoydum. Sonra qadınlarla birgə sinəmə və &uuml;z&uuml;mə vurmağa başladım..</p>\n\n<p>Aişə xanımın nəql etdiyi bu hədisi bəzi b&ouml;y&uuml;k alimlər (İbni Həbban kimi ', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-28 09:35:49', 'en'),
(68, 'bir-gun-meryem-oglu-Isa-(e)-Israil-ovladlarina-dedi:-hikmeti-cahil-ve-nadanlara-oyretmeyin-ki,-hikmete-zulm-etmish-olarsiniz.-hikmeti-hikmet-ehlinden-de-mehrum-etmeyin-ki,-onlara-zulm-etmish-olarsiniz.', '"Bir gün Məryəm oğlu İsa (ə) İsrail övladlarına dedi:-Hikməti cahil və nadanlara öyrətməyin ki, hikmətə zülm etmiş olarsınız. Hikməti hikmət əhlindən də məhrum etməyin ki, onlara zülm etmiş olarsınız".', '"Bir gün Məryəm oğlu İsa (ə) İsrail övladlarına dedi:-Hikməti cahil və nadanlara öyrətməyin ki, hikmətə zülm etmiş olarsınız. Hikməti hikmət əhlindən də məhrum etməyin ki, onlara zülm etmiş olarsınız".', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Vilayət səmasının 6-cı g&uuml;nəşi, İslam və elm məktəbinin banisi İmam Sadiq (ə) buyurmuşdur:-&quot;Bir g&uuml;n Məryəm oğlu İsa (ə) İsrail &ouml;vladlarına dedi:-Hikməti cahil və nadanlara &ouml;yrətməyin ki, hikmətə z&uuml;lm etmiş olarsınız. Hikməti hikmət əhlindən də məhrum etməyin ki, onlara z&uuml;lm etmiş olarsınız&quot;.<br />\n&quot;Kafi&quot; kitabının birinci cildində m&ouml;vcud olan bu m&uuml;barək hədis, diqqətimi cəlb etdi. &Ccedil;ox maraqlı və qiymətlidir. Ona g&ouml;rə də bu qiymətli kəlamı sizinlə paylaşmaq istədim. Amma şərhə ehtiyac duydum.<br />\n&quot;Hikmət&quot; və &quot;elm&quot; s&ouml;zlərinin mənaları arasında fərq var. Onların arasında nisbət &quot;&uuml;mum və x&uuml;sus m&uuml;tləqdir&quot; (tabeli məfhumlar). Yəni-onlar arasında bir tərəfdən fərqli və digər tərəfdən ortaq n&ouml;qtələr m&ouml;vcuddur. Bəzi hikmətli işlər elmdəndir , bəziləri isə elmi məsələ deyildir. B&uuml;t&uuml;n elmi məsələlər isə hikmətdir. Bəzi hikmətlər elmi məsələ sayılmadığı halda, b&uuml;t&uuml;n elmi məslələr hikmət hesab olunur. Məsələn, bir k&ouml;rpənin ayaq a&ccedil;masında hikmət vardır. O , dəfələrlə yıxılır, amma yenə qalxır. Bir ne&ccedil;ə dəfə bu c&uuml;r davam edəndən sonra , uşaq yerimək &ouml;yrənir. Bu işdə b&ouml;y&uuml;k hikmət vardır. &Ccedil;&uuml;nki əxlaq elmində biz insanlar yıxılandan sonra durmağa cəhd etməliyik. Və bu iş dəfələrlə təkrarlanandan sonra , &quot;İlahi qarşısında yeriməyi&quot; &ouml;yrənirik. Bu hikmətdir, amma elmi məsələ deyildir.&nbsp;<br />\nAmma səma cisimlərinin nizamlı hərəkəti həm hikmətli , həm&ccedil;inin də elmi məsələdir. B&uuml;t&uuml;n elmi məsələlərin hikmətli olmasına misal deməyə l&uuml;zum bilmirəm. &Ccedil;&uuml;nki bu, g&uuml;n kimi aydın məsələdir.<br />\nBura qədər hikmətlə elmin fərqi aydın oldu.<br />\nElmi b&uuml;t&uuml;n insanlara &ouml;yrətmək lazımdır. istər cahil və nadan olsun, istərsə də elm əhli olsun. &Ccedil;&uuml;nki cahili cəhalətdən, nad', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-28 10:06:07', 'en'),
(69, 'allah-tebareke-ve-teala-qurani--kerimde-buyurur', 'Allah təbarəkə və təala Qurani -kərimdə buyurur:-"Peyğəmbər möminlərin canlarından onlara daha layiqdir (o, möminlərin mövlasıdır) və onun zövcələri onların analarıdır". (Əhzab surəsi/6).', 'Allah təbarəkə və təala Qurani -kərimdə buyurur:-"Peyğəmbər möminlərin canlarından onlara daha layiqdir (o, möminlərin mövlasıdır) və onun zövcələri onların analarıdır". (Əhzab surəsi/6).', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>Allah təbarəkə və təala Qurani -kərimdə buyurur:-&quot;Peyğəmbər m&ouml;minlərin canlarından onlara daha layiqdir (o, m&ouml;minlərin m&ouml;vlasıdır) və onun z&ouml;vcələri onların analarıdır&quot;. (Əhzab surəsi/6).<br />\nƏhzab surəsinin 6-cı ayəsinin qeyd olunan hissəsi , iki m&uuml;h&uuml;m məsələyə dəlalət edir.<br />\n1.Peyğəmbərimiz (s.ə.a.s) m&ouml;minlərin m&ouml;vlasıdır, yəni-Allah əziz Peyğəmbərimizə (s.ə.a.s) biz m&uuml;səlmanların malından və canından təsərr&uuml;f etmək (istifadə) haqqı vermişdir. Bu hissədə he&ccedil; bir gizlin və qaranlıq hissə yoxdur.<br />\n2. Peyğəmbərimizin (s.ə.a.s) xanımları m&ouml;minlərin anasıdır. Ayənin bu hissəsi d&uuml;zg&uuml;n &ouml;yrənilməli və təhqiqat olunmalı məsələdir. (Bu yazıdan da məqsəd, məhz bu hissədir).<br />\nBir &ccedil;ox m&uuml;səlmanlar m&uuml;barək ayənin bu hissəsindən istifadə edib, Peyğəmbərimizin (s.ə.a.s) b&uuml;t&uuml;n xanımlarına , &uuml;st&uuml;nl&uuml;k vermişlər.<br />\nSuallar:&nbsp;<br />\n1.Bu ayə Peyğəmbərimizin (s.ə.a.s) b&uuml;t&uuml;n z&ouml;vcələrinə aiddirmi???2. Əgər b&uuml;t&uuml;n xanımlara aiddirsə, o zaman ayədə deyilən &quot;analıq&quot;dan məqsəd nədir???&nbsp;<br />\n3.Bu &quot;m&ouml;minlərə ana olma&quot; x&uuml;susiyyəti , Peyğəmbərimizin (s.ə.a.s) xanımlarının b&uuml;t&uuml;n həyatları boyu etdiklərinə (səhf yaxud d&uuml;z) bəraət qazandırırmı???&nbsp;<br />\nCavab: Birinci sualın cavabı aydındır. Bu h&ouml;km Peyğəmbərimizin (s.ə.a.s) b&uuml;t&uuml;n xanımlarına aiddir. &Ccedil;&uuml;nki ayədə zikr olunan &quot;onun z&ouml;vcələri&quot; kəlməsi m&uuml;tləqdir (qeydsiz və şərtsiz). Hər bir kəlamda s&ouml;z sahibi &ouml;z&uuml; qeyd qoymayıbsa, o zaman həmən kəlamdan &uuml;mumilik və m&uuml;tləqlik başa d&uuml;ş&uuml;l&uuml;r. Məsələn, Allah Qurani-Kərimdə &quot;namaz qılın&quot; əmrini verirsə, və bu fərmanı he&ccedil; bir şəxslə, zamanla və məkanla qeydləşdirməyibsə, deməli namazın vacibliyi b&uuml;t&uuml;n şəxslərə hər zama', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-28 10:09:54', 'en'),
(70, 'ey-iman-getirenler-sizden-oncekilere-vacib-oldugu-kimi-size-de-oruc-vacib-oldu-teqvali-olasiniz-deye', '"Ey iman gətirənlər , sizdən öncəkilərə vacib olduğu kimi, sizə də oruc vacib oldu, təqvalı olasınız deyə".(Bəqərə surəsi /183). ', '"Ey iman gətirənlər , sizdən öncəkilərə vacib olduğu kimi, sizə də oruc vacib oldu, təqvalı olasınız deyə".(Bəqərə surəsi /183). \n', '<p>Bağışlayan və mehriban Allahın adı ilə</p>\n\n<p>M&uuml;barək Ramazan ayı.<br />\n&quot;Ey iman gətirənlər , sizdən &ouml;ncəkilərə vacib olduğu kimi, sizə də oruc vacib oldu, təqvalı olasınız deyə&quot;.(Bəqərə surəsi /183).&nbsp;<br />\nBu m&uuml;barək ayədə &quot;vasitə&quot; və &quot;hədəf&quot;, &quot;səbəb&quot; və &quot;nəticə&quot; vardır. &quot;Vasitə&quot; və &quot;səbəb&quot; -orucluq, &quot;hədəf&quot; və &quot;nəticə&quot; isə- təqvadır. Hədəfə &ccedil;atdırmayan vasitə mənasızdır, nəticəyə qovuşdurmyan səbəb faydasızdır. Deməli bizi təqvaya &ccedil;atdıran orucluq faydalı və mənalıdır.<br />\nAmma burda bir sual meydana gəlir. Necə edək ki, aclıq və susuzluğu mənalı və faydalı oruca &ccedil;evirək ???<br />\nAclıq və susuzluğa təfəkk&uuml;r və tədəbb&uuml;r əlavə edək. D&uuml;nyanın ən g&ouml;zəl yeməyi duzsuz olarkən dadsız olduğu kimi, təfəkk&uuml;r və tədəbb&uuml;rs&uuml;z də ibadət dadsızdır. Məhz ona g&ouml;rə də əziz İslam Peyğəmbəri Məhəmməd ibni Abdullah (s.ə.a.s) buyurur:-Oruc tutarkən aclıq və susuzluğunuzla, Qiyamət g&uuml;n&uuml;n&uuml;n aclıq və susuzluğunu yad edin ! Aclıq və susuzluğa d&uuml;ş&uuml;nmək əlavə olduqda , Qiyamət yada d&uuml;ş&uuml;r və bununla da insan, Allahın qəzəbindən qorxub, İlahi təqvaya yetişir.&nbsp;<br />\nYenə m&uuml;qəddəs Peyğəmbərimizin (s.ə.a.s) m&uuml;barək kəlamından :-Siz , Ramazan ayında Allah ziyafətinə dəvət olunmusunuz.<br />\nBiz insanların nəzərində ziyafət-yemək və i&ccedil;məkdən ibarət olur. Amma aclıq və susuzluqla ziyafət olarmı ?<br />\nİnsanın həqiqəti və batini ruh olduğuna g&ouml;rə, nəfsi istəklərdən uzaqlaşmaq yolu ilə ruh &quot;b&ouml;y&uuml;y&uuml;r&quot; və &quot;inkişaf &quot; edir. Deməli, m&uuml;barək Ramazan ayında bizim batinimiz və həqiqətimiz olan ruhumuz ziyafətdədir.<br />\nİlahi, bu ayda bizi və b&uuml;t&uuml;n m&uuml;səlmanları bağışla !!!&nbsp;</p>\n', '947282e8d6509a2f91b755030ab49557.jpg', '', 1, '2019-04-28 10:32:56', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answered` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `name`, `email`, `subject`, `question`, `added`, `answered`, `question_id`) VALUES
(2, 'Ağarəşid Talıbov', '', '', 'Cavab olaraq bildirim ki mesele bashqa curdu', '2019-01-03 15:21:44', 0, 1),
(4, 'Ağarəşid Talıbov', '', '', 'asdasdasdasdasdasd', '2019-01-05 05:15:29', 0, 3),
(9, 'Ağarəşid Talıbov', '', '', 'asas asas a sa sa sa', '2019-04-21 12:46:38', 0, 6),
(10, 'Ağarəşid Talıbov', '', '', 'You can use the layout API to start the header loader and stop it on demand. It is better to be used when the header is also set to fixed, so it is always visible. You can start or stop the header loader with JavaScript at any time by using', '2019-04-21 12:47:03', 0, 7),
(12, 'Ağarəşid Talıbov', '', '', 'Heshbirsey kef ele', '2019-04-22 19:26:22', 0, 11),
(14, 'Ağarəşid Talıbov', '', '', 'Insheallah Ramazan ayi may ayinin 5 inde daxil olacaqdir.', '2019-04-25 13:44:02', 0, 13),
(17, 'Ağarəşid Talıbov', '', '', 'dfghdfghdfghdfg', '2019-04-25 13:51:21', 0, 16),
(18, 'Quliyev Əli', 'ceferiler@inbox.ru', 'Saytınız xeyirli olsun!', 'Rəsmi saytınızın açılması münasibətilə sizi təbrik edirəm. Allah uğurlarınızı bol etsin. Amin!', '2019-04-25 13:51:44', 1, 0),
(20, 'Ağarəşid Talıbov', '', '', 'Allah razı olsun, minnətdaram. Allah sizi də bütün işlərinizdə müvəffəq etsin.', '2019-04-25 13:53:23', 0, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'text',
  `menu` int(1) NOT NULL DEFAULT '0',
  `content` varchar(1000) NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `code`, `type`, `menu`, `content`, `lang`) VALUES
(1, 'bashliq', 'text', 0, 'Seyid AğaRəşid Talıbov', 'en'),
(4, 'melumat', 'text', 0, 'Seyid AğaRəşid Talıbovun rəsmi veb səhifəsi', 'en'),
(27, 'copyrights', 'text', 0, 'Seyid AğaRəşid Talıbov © 2019 / Bütün hüquqlar qorunur.', 'en'),
(47, 'ana_sehife', 'text', 1, 'Ana səhifə', 'en'),
(50, 'haqqinda', 'text', 1, 'Haqqında', 'en'),
(53, 'meqaleler', 'text', 1, 'Məqalələr', 'en'),
(56, 'video', 'text', 1, 'Video', 'en'),
(59, 'audio', 'text', 1, 'Audio', 'en'),
(96, 'email', 'text', 0, 'mail@Seyidagareshid.az', 'en'),
(97, 'facebook', 'text', 0, 'https://www.facebook.com/seyyidagarashid/', 'en'),
(98, 'instagram', 'text', 0, 'https://www.instagram.com/', 'en'),
(99, 'youtube', 'text', 0, 'https://www.youtube.com/channel/UCroBohYSZQARdzdZyqH1DGg?view_as=subscriber', 'en'),
(100, 'questions', 'text', 1, 'Sual-cavab', 'en'),
(101, 'gallery', 'text', 1, 'Qalereya', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `videocats`
--

CREATE TABLE IF NOT EXISTS `videocats` (
  `id` int(11) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `videocats`
--

INSERT INTO `videocats` (`id`, `cpu`, `name`, `lang`) VALUES
(3, '', 'Cümə moizələri', 'en'),
(4, '', 'Quran təfsiri', 'en'),
(5, '', 'Dərslər', 'en'),
(6, '', 'Muhərrəm moizələri', 'en'),
(7, '', 'Əyyami Fatimiyyə', 'en'),
(8, '', 'Müxtəlif', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat` varchar(255) NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `cpu`, `content`, `image`, `name`, `cat`, `lang`) VALUES
(1, 'seyid-aarid-talbov-rb-dili-digr-dillr-kimi-rti-dil-deyildir', 'https://www.youtube.com/watch?v=wBu-VJWXRtA', '', 'Ərəb dili digər dillər kimi şərti dil deyildir.', '4', 'en'),
(3, 'qurani-krim-n-zaman-v-kim-trfindn-cm-olunmudur', 'https://www.youtube.com/watch?v=UFESHzMfwIs', '', 'Qurani Kərim nə zaman və kim tərəfindən cəm olunmuşdur?', '4', 'en'),
(4, 'qurann-tfsir-izaha-ehtiyac-varm', 'https://www.youtube.com/watch?v=j1Tcq9rI88M', '', 'Quranın təfsirə, izaha ehtiyacı varmı?', '4', 'en'),
(5, 'quran-hdislrl-tfsir-etmk-icazlidirmi', 'https://www.youtube.com/watch?v=CmlgtMW1z-A', '', 'Quranı hədislərlə təfsir etmək icazəlidirmi?', '4', 'en'),
(6, 'limizd-olan-quran-hzmuhmmd-savv-nazil-qurandrm', 'https://www.youtube.com/watch?v=jsU1gT8WsZY', '', 'Əlimizdə olan Quran hz.Muhəmmədə (s.a.v.v) nazil olan Qurandırmı?', '4', 'en'),
(7, 'quran-thrif-olunmayb-quranda-lfzi-yoxdur-v-ola-da-bilmz', 'https://www.youtube.com/watch?v=ceTUStvokW4', '', 'Quran təhrif olunmayıb. Quranda ləfzi təhrif yoxdur və ola da bilməz.', '4', 'en'),
(8, 'quranikrimin-elmi-tfsiri-bard-qsa-mlumat', 'https://www.youtube.com/watch?v=AWbGzKsdIgE', '', 'Qurani-Kərimin elmi təfsiri barədə qısa məlumat.', '4', 'en'),
(9, 'nsan-klamnda-ziddiyyt-ola-bilr-amma-allah-quranda-sla', 'https://www.youtube.com/watch?v=TqQaMOkfwHA', '', 'İnsan kəlamında ziddiyyət ola bilər, amma Allah kəlamında, Quranda əsla.', '4', 'en'),
(10, 'bir-insann-quran-z-ryin-sasn-tfsir-etmsi-qadaandr', 'https://www.youtube.com/watch?v=9EP6Dp9gTHg', '', 'Bir insanın Quranı öz rəyinə əsasən təfsir etməsi qadağandır.', '4', 'en'),
(11, 'qurann-quranla-tfsiri-bard-qsa-mlumat', 'https://www.youtube.com/watch?v=CR44crItjfs', '', 'Quranın Quranla təfsiri barədə qısa məlumat.', '4', 'en'),
(12, 'quranda-tdbbr-mslmanlar-quran-oxumaqla-kifaytlnmmlidirlr', 'https://www.youtube.com/watch?v=33xGhiNL_e4', '', 'Quranda "Tədəbbür". Müsəlmanlar Quran oxumaqla kifayətlənməməlidirlər.', '4', 'en'),
(13, 'quran-v-oxuman-fzilti-bard-qsa-mlumat', 'https://www.youtube.com/watch?v=Zi5AX4LNAgI', '', 'Quran və Quran oxumağın fəziləti barədə qısa məlumat.', '4', 'en'),
(14, 'bismillahir-rhmanir-rhim-aysi-haqqnda-qsa-mlumat', 'https://www.youtube.com/watch?v=rh3Wseqn6RQ', '', '"Bismillahir Rəhmanir Rəhim" ayəsi haqqında qısa məlumat.', '4', 'en'),
(15, 'fatih-sursi-v-onun-fzilti-bard-qsa-mlumat', 'https://www.youtube.com/watch?v=PlJQZJKmGJw', '', 'Fatihə surəsi və onun fəziləti barədə qısa məlumat.', '4', 'en'),
(20, '', 'https://www.youtube.com/watch?v=jxHlW38zdNI', '', 'Seyid AğaRəşid Talıbov -"Fatihə" -surəsi Quranın anasıdır(Ummul Kitabdır)', '4', 'en'),
(21, '', 'https://www.youtube.com/watch?v=EC6Ro8w_u_I', '', '"Həmd" -yalnız aləmlərin rəbbi olan Allaha məxsusdur', '4', 'en'),
(22, '', 'https://www.youtube.com/watch?v=69G01_PMFtU', '', 'Quranın tərifi. Surə -sözünün mənası. Quran nə üçün surələrə bölünmüşdür?', '4', 'en'),
(23, '', 'https://www.youtube.com/watch?v=gzSCtAP32xg', '', 'Quranın və "Tövbə" surəsindən başqa bütün surələrin "Bismillahla" başlama fəlsəfəsi', '4', 'en'),
(24, '', 'https://www.youtube.com/watch?v=9JAuhZOJ3iA', '', 'Quran nə üçün "Bismillahir Rəhmanir Rəhim" ayəsi ilə başlayır.', '4', 'en'),
(25, '', 'https://www.youtube.com/watch?v=T_ZhUNpieAM', '', 'Allahın "Rəhman" və "Rəhim" sifətləri barədə qısa məlumat.', '4', 'en'),
(26, '', 'https://www.youtube.com/watch?v=3MCtlhZcaHM', '', 'Allahın "Rəhman" və "Rəhim" sifətləri arasında fərq nədən ibarətdir.', '4', 'en'),
(27, '', 'https://www.youtube.com/watch?v=TnT61VDRbj4', '', 'Rəhman və Rəhim sifətləri Allahın feli, yoxsa zati sifətləridir?', '4', 'en'),
(28, '', 'https://www.youtube.com/watch?v=zIoCNC_JTTU', '', 'Allahın bəndələrlə rəftarı rəhmət əsasındadır.', '4', 'en'),
(29, '', 'https://www.youtube.com/watch?v=FbG6bi8AgIc', '', 'Allah kəlməsi barədə qısa məlumat.', '4', 'en'),
(30, '', 'https://www.youtube.com/watch?v=GoOgLwD_EaQ', '', 'Allah -adının Allahın digər adlarından fərqi nədir?', '4', 'en'),
(31, '', 'https://www.youtube.com/watch?v=vFG1-DhrXQ0', '', 'Hər hansı bir işdə(əməldə) Allahın adı zikr olunmazsa, o iş səmərəsiz olar.', '4', 'en'),
(32, '', 'https://www.youtube.com/watch?v=MVkXqDdC6bg', '', 'İmam Həsən Əskəri əleyhissalam möminin 5 əlaməti barədə buyurur...', '8', 'en'),
(33, '', 'https://www.youtube.com/watch?v=f4vW2E3u3Z4', '', '"Həmd" kəlməsinin mənası. Şükr, mədh və həmd fərqli mənaları bildirirlər.', '4', 'en'),
(34, '', 'https://www.youtube.com/watch?v=5HkBCWT_L0U', '', '"Əl-həmdu" kəlməsinin təfsiri. Həmd Allaha məxsusdur.', '4', 'en'),
(35, '', 'https://www.youtube.com/watch?v=-j0-pcGZBYg', '', ' Fatihə surəsi iki hissədən ibarətdir. Allah Rəsulunun (s) kəlamında "Fatihə".', '4', 'en'),
(36, '', 'https://www.youtube.com/watch?v=MpULvzUkvGc', '', 'Quranda "Həmd". Allah müsəlmanları üstün qərar vermişdir.', '4', 'en'),
(37, '', 'https://www.youtube.com/watch?v=3wQVwZM6vdo', '', 'Fatihə surəsi bizi mərhəmətli olmaqa səsləyir.', '4', 'en'),
(38, '', 'https://www.youtube.com/watch?v=G8bPOsQBMbw', '', 'Fatihə surəsinin təfsiri. "Rəbb" kəlməsinin izahı.', '4', 'en'),
(39, '', 'https://www.youtube.com/watch?v=8SmsMlm8mE4', '', '"Əlhəmdu lillahi Rəbbil aləmin" -ayəsi. "Aləmin" kəlməsinin izahı.', '4', 'en'),
(40, '', 'https://www.youtube.com/watch?v=MV0Ao__V_8Q', '', '"Maliki yəumid-din" ayəsi. "Maliki" kəlməsinin mənası.', '4', 'en'),
(41, '', 'https://www.youtube.com/watch?v=YYrxICscuRs', '', '"Maliki yəumid-din" ayəsi. "Din" kəlməsinin izahı.', '4', 'en'),
(42, '', 'https://www.youtube.com/watch?v=_tKsAf9mbJk', '', '"Məliki yəumid-din" ayəsi. Allah qiyamət gününün sahibidir.', '4', 'en'),
(43, '', 'https://www.youtube.com/watch?v=GGR7jHMyTj0', '', '"İsraf" nədir. İnsan hansı hallarda israf etmiş sayılır?', '8', 'en'),
(44, '', 'https://www.youtube.com/watch?v=hwKSsIDR0WY', '', 'Oruc" sözünün mənası. Əsl "Oruc" böyük əxlaq dərsidir.', '8', 'en'),
(45, '', 'https://www.youtube.com/watch?v=yLk1Nho4Am4', '', 'Biraz qoz(toz) orucu batil etməz. Məzəli Ramazan əhvalatı:)', '8', 'en'),
(46, '', 'https://www.youtube.com/watch?v=CvfvCdZRrIc', '', 'Hişam ibni Həkəmin Bəsrəli alimə cavabı.', '8', 'en'),
(47, '', 'https://www.youtube.com/watch?v=9U5fPyTL0Q8', '', '"İyyakə nəbudu və iyyakə nəstəin". Nə üçün ayədə xitab "O"dan "Sən"ə dəyişir?', '4', 'en'),
(48, '', 'https://www.youtube.com/watch?v=FVYhGhuccYo', '', '"İyyakə nəbudu və iyyakə nəstəin" ayəsi.Tövhidin mərtəbələri.İbadətdə tövhid', '4', 'en'),
(49, '', 'https://www.youtube.com/watch?v=5Kx14zyrk80', '', 'Fatihə surəsinin bəndəyə aid olan hissəsi. Ən böyük nemət Allahdan hidayət istəməkdir', '4', 'en'),
(50, '', 'https://www.youtube.com/watch?v=8xiPU0GLX_M', '', 'Fatihə surəsində olan ayələrin ardıcıllıqı bizə nəyi izah edir?', '4', 'en'),
(51, '', 'https://www.youtube.com/watch?v=8cI4Anygf_U', '', 'Bəziləri nə üçün qiyaməti inkar edirlər?Əbədi olmayan günahın müqabilində əbədi cəhənnəm?', '4', 'en'),
(52, '', 'https://www.youtube.com/watch?v=s5d-jgMIAeA', '', '"İhdinəs siratəl mustaqim" ayəsi."İhdinəs(hidayət)" kəlməsinin mənası.', '4', 'en'),
(53, '', 'https://www.youtube.com/watch?v=QgofapF6fcc', '', '"Siratəl mustəqim(doğru yol)" Quran və hədislərdə.', '4', 'en'),
(54, '', 'https://www.youtube.com/watch?v=BuMU5xg-JCI', '', '"İhdinəs siratəl mustəqim" ayəsi. Hidayətin növləri. Quranda hidayət.', '4', 'en'),
(55, '', 'https://www.youtube.com/watch?v=nEoWURDsFR4', '', '"İhdinəs siratəl mustəqim" ayəsi. "Sirat(doğru yol)" kəlməsi Quranda', '4', 'en'),
(56, '', 'https://www.youtube.com/watch?v=IDmjMNEWimA', '', '"İhdinəs siratəl mustəqim" ayəsi. "Sirat(doğru yol)" kəlməsinin mənası.', '4', 'en'),
(57, '', 'https://www.youtube.com/watch?v=LLWY9_EiK2k', '', 'Siddiq -sözünün mənası. Kimlərə "Siddiq" deyilir?', '4', 'en'),
(58, '', 'https://www.youtube.com/watch?v=MFQgfw__mVI', '', 'Şəhid -sözünün mənası. Kimlərə "Şəhid" deyilir?', '4', 'en'),
(59, '', 'https://www.youtube.com/watch?v=iG90WPasOBc', '', 'Fatihə surəsinin sonuncu ayəsinin təfsiri.', '4', 'en'),
(60, '', 'https://www.youtube.com/watch?v=YGuiGSN3Qs0', '', 'Ərəb dilinin qramatikası nə zaman və kim tərəfindən hazırlanmışdır?', '4', 'en'),
(61, '', 'https://www.youtube.com/watch?v=ChkVsIa7kS0', '', 'Bütün gözəlliklər Allahdan, pisliklər bizdəndir. İblisin "İblis" olma səbəbi', '4', 'en'),
(62, '', 'https://www.youtube.com/watch?v=po6E3Axrfhs', '', 'Allahın nemət verdiyi kəslər kimlərdir? Quran buyurur...', '4', 'en'),
(63, '', 'https://www.youtube.com/watch?v=8TQxQ4xcPwY', '', 'Qədr gecəsi mübarək Ramazan ayının neçənci gecəsidir?', '4', 'en'),
(64, '', 'https://www.youtube.com/watch?v=1hnRsR6dF1A', '', 'Fatihə surəsinin 7 ci ayəsinin təfsiri. Ayədə olan kəlmələrin tək tək izahı.', '4', 'en'),
(65, '', 'https://www.youtube.com/watch?v=mIuOQVW2sAw', '', 'Qədr gecəsi 3 gecədir 19, 21 və 23 cü gecələr.', '4', 'en');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `audiocats`
--
ALTER TABLE `audiocats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `videocats`
--
ALTER TABLE `videocats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `audiocats`
--
ALTER TABLE `audiocats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT для таблицы `videocats`
--
ALTER TABLE `videocats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
