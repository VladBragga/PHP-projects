-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2021 г., 13:37
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guitar_abc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `combo`
--

CREATE TABLE `combo` (
  `c_id` int(11) NOT NULL,
  `id_vid` tinyint(6) NOT NULL,
  `c_name` text NOT NULL,
  `c_photo` text NOT NULL,
  `c_kol_d` int(10) NOT NULL,
  `c_vhod` text NOT NULL,
  `c_vihod` text NOT NULL,
  `c_size` varchar(255) NOT NULL,
  `c_diam` float(9,3) NOT NULL,
  `c_country` varchar(255) NOT NULL,
  `c_firm` varchar(255) NOT NULL,
  `c_imp` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `c_descripton` text NOT NULL,
  `power` int(11) NOT NULL,
  `weight` float(10,3) NOT NULL,
  `c_site` text NOT NULL,
  `target` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `combo`
--

INSERT INTO `combo` (`c_id`, `id_vid`, `c_name`, `c_photo`, `c_kol_d`, `c_vhod`, `c_vihod`, `c_size`, `c_diam`, `c_country`, `c_firm`, `c_imp`, `type_id`, `c_descripton`, `power`, `weight`, `c_site`, `target`) VALUES
(1, 3, 'FENDER CHAMPION 20', '/images/combo/1.jpg', 1, ' 1 х 1/4\", 1 х 1/8\" стерео', '1 х 1/8\" стерео', '190 х 350 х 325', 8.000, 'США', 'Fender', 8, 1, 'Простий у використанні і досить універсальний для будь-якого стилю гри, цей Champion підсилювач ідеально підходить як для професійних гітаристів, так і для початківців. Champion 20 - 20 Вт підсилювач, який характеризується одним 8 \"динаміком з чудовим звуком і ефектами, які допоможуть Вам створити тільки правильний і потрібний звук від джазу до кантрі, від блюзу до металу і т.д. Підсилювач має знаменитий по всьому світу Fender тон clean / overdrive плюс British / сучасне звучання і дісторшін. Різноманітна палітра ефектів, включаючи дилей і тремоло, легко встановлюється за допомогою ручки ТАР відповідно до темпом пісні. Champion 20 обладнаний додатковим входом для гри разом з медіа плеєром, а вихід для навушників дозволяє безшумно репетирувати.', 20, 5.400, 'https://muzdrive.com.ua/fender-champion-20/3581/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8Al24DRgD36AbyG3cO02R5yGQkRohvpWhL_owT082tVCME3WoNwcnmkaAvM_EALw_wcB', 'Для практикуючих'),
(3, 4, 'IBANEZ IBZ10BV2', 'images/combo/3.jpg', 1, 'Bass, AUX', 'На навушники', '255 x 275 x 174', 6.500, 'Японія', 'IBANEZ', 4, 1, 'Це транзисторний комбік, оснащений одним динаміком діаметром 6,5\" Power Jam. Завдяки закритій задній стінці IBZ10BV2 звучить дуже щільно і абсолютно чітко відтворює весь діапазон тембру бас-гітари.\r\nДля репетицій з акустичною ударною установкою цей комбо буде відверто слабенький і підійде лише для дуже спокійної та тихої музики. З іншого боку це дозволить уникнути розбіжностей із сусідам, які можуть не оцінити Ваших копітких домашніх занять на бас-гітарі. Компактний Ibanez IBZ10BV2 відмінно підійде на роль комбопідсилювача для домашніх репетицій. За його допомогою можна без зайвого шуму і клопоту розвивати свої навички, розучувати пісні, придумувати власну музику і навіть записувати непогані демо.', 10, 3.600, 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjblrG3zpHtAhXM57IKHbiZCt4YABAHGgJscg&ae=2&ohost=www.google.com&cid=CAESQOD2zDHwcox0TgZlVcy_ShueZBArRXFtHE6iWDlSnzk54nS6mT_FBTdkpClptMWpIgJooyT4pBYrhpaBqnYuQYU&sig=AOD64_0PGHFTI9Q0dg0HnhEGVIglZLYDSw&ctype=5&q=&ved=2ahUKEwj-06S3zpHtAhXJ-yoKHasWAr4Q9aACegQICxBW&dct=1&adurl=', 'Для початковців'),
(26, 3, 'MARSHALL DSL40CR', 'images/combo/16062270382.jpg', 1, '1 x Jack (1/4\") - інструментальний; 1 x Jack (1/8\") - Audio In; 1 x Jack (1/4\") - футсвіч; 1 x Jack (1/4\") - Return, MIDI In', '1 x Jack (1/4\") - Send; 5 x Jack (1/4\") - для підключення додаткових кабінетів; 1 x Jack (1/8\") - Emulated Out', '621 x 490 x 252', 12.000, 'Англія', 'Marshall', 16, 2, 'Цей комбік являє собой двоканальний комбопідсилювач з 12-дюймовим динаміком Celestion V-Type, який видає чудовий звук і вирізняється гнучкістю налаштувань. Багатий функціонал цієї моделі включає можливість перемикання між двома типами звучання на кожному каналі, ревербератор і петлю ефектів. Це надає широкі можливості для формування власного унікального звучання, експериментів і самовираження.\r\n', 40, 22.900, 'https://colorsoundshop.com/marshall-dsl40cr.html?utm_source=googleads&utm_medium=cpc&utm_campaign=merchant&utm_source=googleads&utm_campaign=Media_Google-Merchant_Kiev&gclid=CjwKCAiA7939BRBMEiwA-hX5J2xrUrTWzdN0PptW_qfLax3GpOCjdp1gt7q5P1XlOsmV-NRFePXPjBoCJ3IQAvD_BwE', 'Для концертів'),
(30, 3, 'Marshall CODE 50', 'images/combo/160630083612.jpg', 1, '1 x Jack (1/4\") - Input; 1 x Jack (1/8\") - Aux In; 1 x Jack (1/4\") - футсвич; USB', '1 x Jack (1/8\") - выход для наушников; USB', '530 х 440 х 280', 12.000, 'Англія', 'Marshall', 16, 2, 'Цифровий комбопідсилювач, потужність 50 Вт, спікер 12 \", 14 варіантів преампа і 4 варіанти оконечника, 100 пресетів, 8 варіантів звучання кабінету, 3-смуговий еквалайзер, 24 ефекту.\r\nMARSHALL CODE50 - Повністю програмованій цифровий гітарній комбопідсілювач Code 50 поєднує в Собі справжнє моделювання класичну и СУЧАСНИХ тонів Marshall з професійнімі FX. Моделі передпідсілювачів, підсілювачів и кабінетів розробляліся у СПІВПРАЦІ з піонерамі програмного забезпечення Softube для создания Marshall -Softube (MST) моделювання - вісокоточная відтворення класичну и СУЧАСНИХ Marshall продуктів.', 50, 13.000, 'https://7not.pro/kombousilitel-marshall-code-50', 'Для концертів'),
(31, 2, 'CORT AF30', 'images/combo/160630160813.jpg', 1, '1 x Jack (1/4\") - Input; 1 x Jack (1/8\") - Aux In; 1 x Jack (1/4\") - футсвич; USB', '1 x Jack (1/4\") - Send; 5 x Jack (1/4\") - для підключення додаткових кабінетів; 1 x Jack (1/8\") - Emulated Out', '392 х 320 х 305', 8.000, 'Індонезія', 'Cort', 8, 1, 'Комбопідсилювачі серії AF створені для музикантів, що грають на акустичних інструментах і потребують потужному, універсальному і по-справжньому якісному звучанні.', 30, 8.000, 'https://musician.ua/ru/shop/product/kombousilitel-dlia-elektroakusticheskoi-gitary-cort-af30', 'Для практикуючих'),
(32, 2, 'FENDER ACOUSTIC SFX', 'images/combo/160630383014.jpg', 3, '2 x Jack (1/4\")/XLR; 1 x Jack (1/4\") - футсвіч; 1 x Jack (1/8\") - Aux', '2 х XLR; 1 x Jack (1/8\") - Headphones', '1621 x 1490 x 600', 8.000, 'США', 'Fender', 4, 1, 'Комбо-підсилювач для акустичних гітар, 200 Ватт, 8 \"спікер + твіттер і 6.5\" бічний спікер, два окремих каналу, вбудовані ефекти, лупер, можливість підключення по Bluetooth, USB-вихід для запису, 3.5 мм вихід на навушники\r\nОсновні Особливості гітарного комбопідсілювача FENDER ACOUSTIC SFX-II: Технологія Stereo Field Expansion (SFX) для відтворення «более-чем-стерео», что Заповнює приміщення; 60-секундний лупер з кнопками Record / Dub, Play / Stop и Undo; Підключення по Bluetooth для потокової передачі аудіо з телефонов и планшетів; Універсальна напряжение для использование у всьому мире.', 160, 35.000, 'https://muztorg.ua/uk/usiliteli--kombiki--kabineti/fender_acoustic_sfx-ii_gitarnij_kombousilitel_230634/', 'Для концертів');

-- --------------------------------------------------------

--
-- Структура таблицы `guitar`
--

CREATE TABLE `guitar` (
  `g_id` smallint(6) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `g_photo` varchar(255) NOT NULL,
  `id_vid` tinyint(3) NOT NULL,
  `g_country` varchar(25) NOT NULL,
  `g_color` varchar(60) NOT NULL,
  `g_type_corpus` varchar(30) NOT NULL,
  `grif` int(7) NOT NULL,
  `n_deka` int(7) NOT NULL,
  `v_deka` int(7) NOT NULL,
  `g_name_firm` varchar(35) NOT NULL,
  `g_kol_s` tinyint(2) NOT NULL,
  `g_zvuk` varchar(255) NOT NULL DEFAULT 'відсутній',
  `g_string` varchar(60) NOT NULL,
  `target` varchar(255) NOT NULL,
  `g_description` text NOT NULL,
  `site` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guitar`
--

INSERT INTO `guitar` (`g_id`, `g_name`, `g_photo`, `id_vid`, `g_country`, `g_color`, `g_type_corpus`, `grif`, `n_deka`, `v_deka`, `g_name_firm`, `g_kol_s`, `g_zvuk`, `g_string`, `target`, `g_description`, `site`) VALUES
(3, 'MARTIN D-15M', 'images/guitar/4.jpg', 2, 'США', 'Натуральний матовий', 'Дредноут', 3, 3, 3, 'The Martin Guitar Company', 6, 'відсутній', 'Martin SP Lifespan Phosphor Bronze Medium Gauge', 'Для концертів', 'Martin D-15M - це це погляд назад на моделі Martin Style 15, розквітом яких стали 1940 роки. На відміну від традиційних гітар Martin з верхньою декою з ялини, дредноут D-15M має конструкцію з цільної верхньої деки з Х-подібними зв\'язками на обечайке і нижній деці також з цілісного червоного дерева. Воістину унікальний інструмент, в якому глибокі обертони ідеально лягають під акомпанемент свого голосу. Якщо ви в пошуку акустичної гітари, що поєднує в собі потужну подачу і багатство звучання, немає нічого кращого Martin D-15M.', 'https://jam.ua/guitar-martin-d15m'),
(5, 'IBANEZ SR370E-SPB', 'images/guitar/5.JPG', 4, 'Японія', 'Синій', 'SR', 6, 1, 1, 'IBANEZ', 4, 'Активний - PowerSpan Dual Coil (H-H), пасивний - PowerSpan Dual Coil', 'D\'ADDARIO EJ45FF PRO-ARTE CARBON HARD', 'Для початковців', 'Ibanez SR300EB CA - це 4-струнна бас-гітара з популярної лінійки SR від знаменитого японського виробника. Модель відрізняється гладким, витонченим, зручним грифом, легковажним компактним корпусом і ідеально підібраною високоякісної електронікою.', 'https://muztorg.ua/uk/gitari/bas-gitari/ibanez_sr370e-spb_bas-gitara_227176/'),
(8, 'Fender CD-60SCE-12 NAT', 'images/guitar/8.jpg', 2, 'США', 'Натуральний глянцевий', 'Дредноут', 10, 10, 9, 'Fender', 12, 'Звукосниматель Fishman CD Preamp с предусилителем, тюнером, индикатором батареи и регуляторами Volume, Treble, Bass', 'Струни Fender® Dura-Tone Coated 80/20 Bronze', 'Для практикуючих', '12-струнна електроакустична гітара в корпусі дредноут оснащена високоякісною електронікою. Матеріал і конструкція гітари дозволяють використовувати її для самостійних занять, навчання і репетицій, камерних виступів для невеликого кола слухачів: будинки, на відкритому повітрі або в кафе.', 'https://muzdrive.com.ua/fender-cd-60sce-12-nat/?gclid=CjwKCAiA7939BRBMEiwA-hX5J804PCVlpqUfDCs3nqYpr57MJNAa81dZHhXYoO4coFN4Q57Wfmx7ghoCUKcQAvD_BwE'),
(9, 'YAMAHA C-40', 'images/guitar/16062150977.jpg', 1, 'Індонезія', 'Натуральний глянцевий', 'Повністю цільний', 5, 3, 9, 'YAMAHA', 6, 'відсутній', 'YAMAHA S10 GRAND CONCERT CLASSIC', 'Для початковців', 'Огляд Класична гітара YAMAHA C40\r\nСерія С гітар Yamaha була запущена ще в далекому 1986 році. Через понад 25 років, популярність серії з кожним роком тільки зростає.\r\nC40 - одна з найбільш недорогих повнорозмірних класичних моделей від Yamaha. На тлі конкурентів інструмент виділяється високою якістю збірки, комфортністю (зручність гри особливо важливо для початківців), прекрасним тембром і приємною ціною.', 'https://z-music.com.ua/p1171419634-gitara-klassicheskaya-yamaha.html?gclid=CjwKCAiAzNj9BRBDEiwAPsL0dznK2PkZe2jFaaod5M5AZMsLvpGtUSGnB5hWKlA3FBMn0DulU3Fh6RoChtwQAvD_BwE'),
(14, 'ESP E-II GB-5', 'images/guitar/16063025696.jpg', 4, 'Японія', 'Чорний', 'GB-5', 1, 2, 2, 'ESP', 5, 'Seymour Duncan SSB-5B (H-H), комплект', 'Elixir Nanoweb Light/Medium', 'Для концертів', 'Ранее называвшиеся «ESP Standard», все инструменты ESP E-II создаются на нашей фабрике ESP в Токио, Япония, и предназначены для профессиональных музыкантов, которые не идут на компромиссы в тоне, ощущении или надежности для своих гитар и басов.\r\nЕсли вы любите высококачественные басы, но по-прежнему хотите инструмент с крутой современной атмосферой, обратите внимание на новые басы GB Series. Доступные в 4-струнном GB-4 и 5-струнном GB-5, серия E-II GB предлагает все звуки для любой музыки, которую вы когда-либо захотите воспроизвести.\r\nОснащенный набором пассивных датчиков Seymour Duncan SSB и 3-полосным эквалайзером Seymour Duncan STC-3M3, вы получаете целый звуковой спектр , а также возможность регулировки громкости (с пуш-пул для «Slap Switch»), баланс и отдельный регулятор тембра для средних частот, а также регуляторы низких/ высоких частот.', 'Товар не продається в Україні'),
(15, 'Admira A20', 'images/guitar/16063029422.jpg', 1, 'Іспанія', 'Натуральний глянцевий', 'Повністю цільний', 3, 5, 7, 'Enrique Keller S.A.', 6, 'відсутній', 'Стандартний набір струн', 'Для практикуючих', 'Нові класичні гітари А серії увібрали в себе багаторічний досвід майстрів компанії Аdmira в створенні інструментів. Поєднання істинно іспанських традицій і сучасних технологій робить ці інструменти ідеальним вибором для просунутих музикантів, студентів музичних училищ і учнів старших класів музичних шкіл.', 'https://jam.ua/admira-classic-guitar-a20'),
(17, 'Yamaha RGX 220DZ DMG', 'images/guitar/160650348715.jpg', 3, 'Китай', 'Dark Metallic Grey', 'Стратокастер', 1, 8, 8, 'YAMAHA', 6, '2 хамбакера Yamaha', 'YAMAHA S10 GRAND CONCERT CLASSIC', 'Для практикуючих', 'Гітара яка грає краще твоєї мамки', 'https://www.citrus.ua/?gclid=CjwKCAiA5IL-BRAzEiwA0lcWYhdn9IiSFoytqxkLyWdqxCQ1IDcwucgvHEBRY7I083_-tol8ocXiTxoCrdUQAvD_BwE&gclsrc=aw.ds');

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id_material` int(50) NOT NULL,
  `mat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id_material`, `mat_name`) VALUES
(1, 'Клен'),
(2, 'Ясень'),
(3, 'Червоне дерево'),
(4, 'Чорне дерево '),
(5, 'Полісандр'),
(6, 'Горіх'),
(7, 'Кедр'),
(8, 'Вільха'),
(9, 'Ялина'),
(10, 'Махагоні');

-- --------------------------------------------------------

--
-- Структура таблицы `pedal`
--

CREATE TABLE `pedal` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `id_vid` tinyint(7) NOT NULL,
  `p_firm` varchar(255) NOT NULL,
  `p_kol_e` int(12) NOT NULL,
  `p_vhod` varchar(255) NOT NULL,
  `p_vihod` varchar(255) NOT NULL,
  `p_giv` varchar(255) NOT NULL,
  `p_size` varchar(100) NOT NULL,
  `p_masa` float(10,3) NOT NULL,
  `p_add` text NOT NULL,
  `p_country` varchar(255) NOT NULL,
  `p_photo` varchar(100) NOT NULL,
  `p_site` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pedal`
--

INSERT INTO `pedal` (`p_id`, `p_name`, `id_vid`, `p_firm`, `p_kol_e`, `p_vhod`, `p_vihod`, `p_giv`, `p_size`, `p_masa`, `p_add`, `p_country`, `p_photo`, `p_site`) VALUES
(1, 'BOSS DS-1 Distortion', 3, 'BOSS', 1, '1 х jack (1/4\")', '1 х jack (1/4\")', 'батарея 9 В (6F22/9 В), адаптер переменного тока', '73 х 129 х 59 ', 0.400, 'Вхідний опір: 470 Ом Номінальний вхідний рівень: -20 дБ Номінальний вихідний рівень: -20 дБ', 'Китай', '/images/pedal/1.jpg', 'https://muzline.ua/boss-ds-1-distortion/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8Al4j1VHWvPsLCnXrq_wqNZnHOHePvhPilPPW3OGiOFy4P5g5vjZDgcaAo_DEALw_wcB'),
(3, 'ZOOM G3Xn', 3, 'ZOOM', 70, 'Стандартный монофонический phone jack\r\nВходной импеданс (line): 470 kOм\r\nAUX: Стерео мини-джек (3,5 мм)\r\nНоминальный входной уровень: -10 dBu\r\nВходной импеданс (line) : 10 кОм\r\n', '2 * Phone jack, USB интерфейс: USB MIDI, USB Micro-B', 'адаптер DC9V (ZOOM AD-16), по шині USB', '181 x 234 x 58', 1.280, 'Zoom G3Xn - процесор гітарних ефектів, оновлена ​​модель, яка прийшла на зміну хітового гітарного процесору Zoom G3X. Тепер у вашому розпорядженні ще більше ефектів (до 7 одночасно), пресетів (включаючи пресети від знаменитих музикантів), 80 секундний лупер, драм-машина, педаль експресії, інтуїтивно зрозумілий інтерфейс зі зручним управлінням, все це в новому корпусі.\r\nГітарний процесор G3Xn включає в себе 70 якісно виконаних DSP-ефектів, плюс 10 реалістичних емуляторів підсилювачів і кабінетів, які коли-небудь створювалися Звуковий лабораторією Zoom. G3Xn запропонує вам свіжий погляд не тільки на такі невід\'ємні гітарні ефекти, як овердрайв, дисторшн, компресія, еквалайзер, дилей, реверберація, Фленжер, фейзер, вібрато і хорус, а й унікальні мульти-ефекти, наприклад, Seq Filter, Gold Drive, Reverse Delay, HD Hall і OSC Echo.', 'Японія', '/images/pedal/3.jpg', 'https://muzdrive.com.ua/gitarnyy-protsessor-effektov-zoom-g3xn/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8Ak3Rb6GWQy90WNIdioN65cZ7Mo4kU5qhIyUy8jjHLxpdHobltafpn4aAkGaEALw_wcB'),
(4, 'BOSS CEB3', 4, 'BOSS', 1, '1 х jack (1/4\")', '2 х jack (1/4\")', 'DC 9V: батарея 6F22 / 9 V, адаптер змінного струму', '73 х 59 х 129', 0.500, '\r\nPedal\' effektov BOSS CEB-3 Bass Chorus obespechivayet khorovoy effekt s razdeleniyem po chastotam dlya sozdaniya teplogo, bogatogo khorusa na vysokikh chastotakh bez zamutneniya nizkikh. Eto ideal\'naya khorus-pedal\' dlya basistov, poskol\'ku v ney yest\' vse neobkhodimoye dlya kachestvennogo effekta Chorus. \r\nPrimenyayetsya khorovoy zvuk s razdelennymi chastotami, rezul\'tiruyushcheye zvuchaniye okrasheno vysoko-chastotnymi elementami s sokhraneniyem nizkochastotnogo basa \r\nRegulirovki Effect Level, Low Filter, Rate i Depth dayut vozmozhnost\' tochnoy nastroyki neobkhodimogo zvuchaniya pedali effektov\r\nПоказати більше\r\n558/5000\r\nПедаль ефектів BOSS CEB-3 Bass Chorus забезпечує хорової ефект з поділом по частотах для створення теплого, багатого хоруса на високих частотах без замутнения низьких. Це ідеальна хорус-педаль для бас-гітаристів, оскільки в ній є все необхідне для якісного ефекту Chorus.\r\nЗастосовується хорової звук з розділеними частотами, результуюче звучання забарвлене високо-частотними елементами зі збереженням низькочастотного баса\r\nРегулювання Effect Level, Low Filter, Rate і Depth дають можливість точного налаштування необхідного звучання педалі ефектів.', 'Китай', '/images/pedal/4.jpg', 'https://intermuzika.com.ua/boss-ceb-3/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8An1itkZNuQpbQ_K6QURf4vsu7Tktp0KrVQnhr8LZzHL7sPpi3JnidMaAtG2EALw_wcB'),
(5, 'Dunlop 105Q', 4, 'Dunlop', 1, '1 х jack (1/4\")', '1 х jack (1/4\")', 'Батарея 9 В\r\nАдаптер Dunlop ECB-003', '254 x 102 x 64', 1.700, 'Включає в себе новий тип потенціометра і виготовлену під замовлення ланцюг еквалізації, спеціально оптимізовану для бас-гітари. Її використовують Flea з Red Hot Chili Peppers, Will Lee, Justin Medal-Johnsen з Beck і багато інших.', 'США', 'images/pedal/5.jpg', 'https://1-m.com.ua/pedal_effektov_dunlop_cbm105q_crybaby_mini_bass_wah/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8AlJVXElMW2ix-CFBaWqv0oinqP2ZY5Foe7iRs3z0LSJ8m67RYo9zcMaAniNEALw_wcB'),
(6, 'BOSS GEB7', 4, 'BOSS', 1, '1/4-дюймовий тип телефону', '1/4-дюймовий тип телефону', 'AC адаптер або 9V батарея', '73 x 129 x 59', 0.500, 'Педаль ефектів BOSS GEB-7 Bass Equalizer є семиполосний еквалайзером, створеним спеціально для низькочастотного діапазону бас-гітар. Так як діапазон частот простягається до 50 Гц, GEB-7 відмінно підходить для настройки глибини і нижньої частини діапазону баса у гітар.\r\nСемиполосний еквалайзер GEB7 спеціально призначений для використання з бас-гітарами, оскільки його частотні настройки оптимізовані саме під басів звучання. Зручне управління кожної частотної смугою дозволяє досягти бажаного звуку з легкістю, а окремий регулятор рівня дозволяє посилювати чи послаблювати сигнал - немов у вас педаль boost або cut. Діапазон зміни equalizer у GEB7 дорівнює +/- 15 дБ, те ж саме стосується і регулярний рівня ефекту педалі-еквалайзера.', 'Китай', 'images/pedal/6.jpg', 'https://rozetka.com.ua/207981991/p207981991/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8AnJ_t8Nw-VtEXud8jbINWVxLVpwiFH1nb7gl5vuuFeXFjgjN9VWCEcaAtbiEALw_wcB'),
(7, 'BOSS AD-10', 2, 'BOSS', 15, 'GUITAR IN', 'LINE OUT L/PHONES, R/MONO, XLR OUT L, R', 'від адаптера мережі змінного струму або шести батарейок формату АА', '217 × 161 × 65', 1.300, 'AD-10 меняет представление о функциональных возможностях акустических предусилителей, выводя их на новый уровень благодаря революционной технологии обработки звука Acoustic Resonance компании BOSS. Этот усовершенствованный подход позволяет воссоздавать сложные резонансные колебания корпуса и струн музыкальных инструментов, которые теряются при использовании большинства звукоснимателей, сохраняя выразительность и естественные вибрации, имеющие огромное значение для звука акустики. Вместе с этими потрясающими возможностями вы получаете еще и не искажающую звук систему подавления обратной связи, память для хранения пресетов, 80-секундный лупер, аудиопорт USB и многое другое. Исключительно мощный и вместе с тем простой в использовании компактный предусилитель AD-10 — это ваш универсальный помощник, позволяющий получать впечатляющий акустический звук при работе в любых условиях.', 'Китай', 'images/pedal/7.jpg', 'https://muzdrive.com.ua/protsessor-effektov-boss-ad10/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8AnnQbtjCv9QzlqYNJr4SM2jS8a_pYT56vidfT2dl3rsIe-_3vX9F1UaAvVEEALw_wcB'),
(15, 'ZOOM G1X', 3, 'ZOOM', 70, 'інструментальний jack 6,3 мм', 'Line/Headphones jack 6,3 мм', 'адаптер живлення або батарейки 4 х AA (LR6)', '156 × 216 × 52', 0.610, 'Zoom G1X FOUR має більше 70 моделей ефектів і підсилювачів, лупер і драм-машину. Крім того, ви можете скористатися додатковою бібліотекою завантажуються ефектів ZOOM Guitar Lab.\r\nПедаль експресії.\r\nДля додаткового контролю G1X FOUR має педаль експресії, яка може регулювати такі ефекти, як гучність, вау-вау, затримку і пітч.\r\nЗвуки, які надихають.\r\nПроцесор має більше 60 традиційних і батькових ефектів, включаючи кільцевої модулятор, затримку з питчем і навіть симуляцію ситара.\r\nВаші улюблені підсилювачі і кабінети.\r\nЗ 13 класичними підсилювачами і кабінетами, такими як Fender, Marshall, Orange, серія G1 приносить великий сценічний звук, куди б ви не пішли. ', 'Японія', 'images/pedal/16062287892.jpg', 'https://muzdrive.com.ua/gitarnyy-protsessor-effektov-zoom-g1x/?gclid=Cj0KCQiAqdP9BRDVARIsAGSZ8AnPMRvSBeOCC64X6vAlT_cvela9nCiVr1r7zKROc9c3g717xPcsaucaAq4xEALw_wcB');

-- --------------------------------------------------------

--
-- Структура таблицы `type_combo`
--

CREATE TABLE `type_combo` (
  `type_id` int(11) NOT NULL,
  `type_c` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_combo`
--

INSERT INTO `type_combo` (`type_id`, `type_c`) VALUES
(1, 'Транзисторний'),
(2, 'Ламповий');

-- --------------------------------------------------------

--
-- Структура таблицы `varification`
--

CREATE TABLE `varification` (
  `user_id` int(11) NOT NULL,
  `useraname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `varification`
--

INSERT INTO `varification` (`user_id`, `useraname`, `password`, `full_name`) VALUES
(1, 'guitar_admin', 'fe8f6f8909e577ec22457ef0d2533e48', 'Брага Владислав'),
(2, 'guitar_admin2', 'c940deb04fd59a0a72cd77af7bee7aff', 'Олексій Вантик');

-- --------------------------------------------------------

--
-- Структура таблицы `vary`
--

CREATE TABLE `vary` (
  `id_vid` tinyint(6) NOT NULL,
  `vary_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vary`
--

INSERT INTO `vary` (`id_vid`, `vary_name`) VALUES
(1, 'класична гітара'),
(2, 'акустична гітара'),
(3, 'електрогітара'),
(4, 'бас гітара');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `id_vid` (`id_vid`);

--
-- Индексы таблицы `guitar`
--
ALTER TABLE `guitar`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `id_vid` (`id_vid`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `grif` (`grif`),
  ADD KEY `n_deka` (`n_deka`),
  ADD KEY `v_deka` (`v_deka`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_material_2` (`id_material`);

--
-- Индексы таблицы `pedal`
--
ALTER TABLE `pedal`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `id_vid` (`id_vid`);

--
-- Индексы таблицы `type_combo`
--
ALTER TABLE `type_combo`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `varification`
--
ALTER TABLE `varification`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `vary`
--
ALTER TABLE `vary`
  ADD PRIMARY KEY (`id_vid`),
  ADD KEY `id_vid` (`id_vid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `combo`
--
ALTER TABLE `combo`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `guitar`
--
ALTER TABLE `guitar`
  MODIFY `g_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `pedal`
--
ALTER TABLE `pedal`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `type_combo`
--
ALTER TABLE `type_combo`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `varification`
--
ALTER TABLE `varification`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `vary`
--
ALTER TABLE `vary`
  MODIFY `id_vid` tinyint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `combo`
--
ALTER TABLE `combo`
  ADD CONSTRAINT `combo_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_combo` (`type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `combo_ibfk_2` FOREIGN KEY (`id_vid`) REFERENCES `vary` (`id_vid`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `guitar`
--
ALTER TABLE `guitar`
  ADD CONSTRAINT `guitar_ibfk_1` FOREIGN KEY (`id_vid`) REFERENCES `vary` (`id_vid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guitar_ibfk_2` FOREIGN KEY (`grif`) REFERENCES `material` (`id_material`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guitar_ibfk_3` FOREIGN KEY (`n_deka`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `guitar_ibfk_4` FOREIGN KEY (`v_deka`) REFERENCES `material` (`id_material`);

--
-- Ограничения внешнего ключа таблицы `pedal`
--
ALTER TABLE `pedal`
  ADD CONSTRAINT `pedal_ibfk_1` FOREIGN KEY (`id_vid`) REFERENCES `vary` (`id_vid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
