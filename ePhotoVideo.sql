-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 09 2019 р., 19:55
-- Версія сервера: 5.5.41-log
-- Версія PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `ePhotoVideo`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talking_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `Comments`
--

INSERT INTO `Comments` (`id`, `talking_id`, `id_user`, `text`) VALUES
(2, 3, 1, 'Як то кажуть клієнт - завжди правий, но не завжди)'),
(4, 3, 1, 'dsfsd'),
(5, 1, 7, 'Рахуй, тут то важко сказати, дивлячись на те яку саме техніку хочеш купити, але пам''ятаю ті часи коли купував мій перший апарт, і це був panasonic))'),
(6, 1, 2, 'Сонькаа the beeeest!!!)'),
(7, 4, 9, 'Тема 2'),
(8, 3, 11, 'Ну такі ми, шо робити))'),
(9, 2, 14, 'Для відеомейкерів краще візьми зум)');

-- --------------------------------------------------------

--
-- Структура таблиці `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_create` int(11) NOT NULL,
  `user_check` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(30) NOT NULL,
  `price_product` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `Products`
--

INSERT INTO `Products` (`id`, `name_product`, `price_product`, `id_user`) VALUES
(1, 'Весілля', '1000', 1),
(2, 'Хрестини', '1000', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `Raiting`
--

CREATE TABLE IF NOT EXISTS `Raiting` (
  `id` int(11) NOT NULL,
  `id_user_set` int(11) NOT NULL,
  `id_user_get` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `Talking`
--

CREATE TABLE IF NOT EXISTS `Talking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_create` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп даних таблиці `Talking`
--

INSERT INTO `Talking` (`id`, `user_create`, `title`, `text`) VALUES
(1, 1, 'Sony vs Panasonic', 'Вічтне протистояня, кому давати перевагу?'),
(2, 1, 'Допоможіть вибрати об''єктив', 'Який об''єктив краще підійде для відеомейкера, зум(16-85) чи фікси?'),
(3, 2, 'Отношение к клиентам', 'Что делать когда клиент задолбал?)'),
(4, 1, 'Тема1', ''),
(5, 11, 'Допоможіть знайти фотографа', 'Хтось знає дешевого і толокового фотографа в Харькові'),
(6, 14, 'Заголовок 1', 'Опис');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `isAdmin` int(2) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Filming_cities` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `telegram` varchar(20) NOT NULL,
  `viber` varchar(20) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `status`, `username`, `isAdmin`, `type`, `email`, `password`, `price`, `City`, `Filming_cities`, `phone`, `telegram`, `viber`, `facebook`, `rating`, `instagram`, `description`, `img`) VALUES
(1, 1, 'Kostya_Duda', 0, 'Відеограф', 'izmets733@gmail.com', '32313231p', 100, 'Хмельницький', 'Хмельницький, Чернівці, Тернопіль, Вінниця', '380677191506', '380677191506', '380677191506', 'https://www.facebook.com/profile.php?id=100017129264642', '8', '@vp_studio__', 'Привет пострижись, короче  цей я тіпа знімаю відоси там)))', 'a0e562ef931052b9ad179457984f22b3.jpg'),
(2, 1, 'Brunov_producrtiom', 0, 'Відеограф', 'brunov@gmail.com', '1111', 400, 'Київ', 'Вся Україна', '38098434313', '38098434313', '38098434313', '', '10', '@brunov_andrey', '', '43a3f51a1bc6fce2ba7a33abbf6184db.jpg'),
(5, 0, 'Vlad', 0, 'Користувач', 'vlad@gmail.com', '321', 0, 'Хмельницький', '', '3809856432', '3809856432', '3809856432', '', '0', '_vlados11_', '', 'db78d1362793c69069618f9ca46b77d1.jpg'),
(6, 0, 'Maks', 0, 'Користувач', 'mar@gmai.com', '4321', 0, '', '', '', '', '', '', '0', '', '', 'no-image.jpg'),
(7, 1, 'Maks Tverdoxlib', 0, 'Фотограф', 'maks@gmail.com', '123', 200, 'Хмельницький', 'Київ, Львів, Хмельницький', '3809756432', '3809756432', '3809756432', '', '0', '@alextverdokhlib', '', 'd38f455d2d47dfe5bdf04aee0756fdb6.jpg'),
(9, 1, 'Artur Matviev', 0, 'Фотограф', 'matv@gmail.com', '123', 259, 'Харків', 'Харків, Київ, Львів', '(097) 886-40-83', '(097) 886-40-83', '(097) 886-40-83', '', '0', '@matviev', 'Робити те, що любиш - це найбільше щастя. Бачити любов, зберігати її у фотографіях. З радістю стану колекціонером Ваших спогадів! instagram: matveiev.art ', '93453db13fe8fdf2a88d69c422084664.jpg'),
(10, 1, 'Galay Vlad', 0, 'Відеограф', 'vald_g@gmail.com', '321', 370, 'Вінниця', 'Вся Україна', '(097) 252-90-82', '(097) 252-90-82', '(097) 252-90-82', '', '0', '@galay', 'Свадебная фото и видеосъёмка !!Снимаем на полнокадравые камеры Sony A7M3+топовая оптика Sony+электронный стабилизатор Shiyun crane 2+квадракоптер mavic 2 pro.4K ИЛИ 120P Full HD.Изготавливаем фотокниги.Индивидуальный подход к каждому клиенту.талантливый коллектив команды!!', '6e49e61f5f9db31a32b8a08f519a4ce3.jpg'),
(11, 0, 'Oleksa', 0, 'Користувач', 'ol@gmail.com', '123', 0, 'Харків', '', '(097) 252-90-82', '(097) 252-90-82', '(097) 252-90-82', '', '0', '@oleksa', '', 'no-image.jpg'),
(13, 0, 'test', 0, 'Відеограф', 'admin@gmail.com', '123', 0, '', '', '', '', '', '', '0', '', '', 'no-image.jpg'),
(14, 1, 'Kostya_', 0, 'Відеограф', 'izmets211@gmail.com', '123', 200, 'Хмельницький', 'Вся Україна', '3454534545', '3454534545', '3454534545', '', '0', '@vp_studio', 'Опис', '430ebcb8ddeb5046bd2977370bc20656.jpg'),
(15, 0, 'User1', 0, 'Користувач', 'u@gmail.com', '1', 0, 'Хмельницький', '', '54353453534', '54353453534', '54353453534', '', '0', '', '', 'no-image.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `User_content`
--

CREATE TABLE IF NOT EXISTS `User_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Дамп даних таблиці `User_content`
--

INSERT INTO `User_content` (`id`, `type`, `user_id`, `content`) VALUES
(14, 'фото', 1, 'b543f9b4f3a1e4c4fd828d17152c4645.png'),
(15, 'фото', 1, 'c21d2341a7e124b55d7159fffe1b21a2.jpg'),
(16, 'фото', 1, 'd493a0927f8466a115c765671011054a.jpg'),
(17, 'фото', 1, 'd007440fbd3538531a2bee73157df502.jpg'),
(18, 'відео', 2, '5WsbG3flIwM'),
(19, 'відео', 2, 'Brnrk_5kDPw'),
(20, 'фото', 8, 'e15842ea9a01d084ed6770817aa9277c.png'),
(21, 'відео', 8, '5rlsHH_pTHM'),
(22, 'фото', 7, '7031733e5002f83464007261ed01ea5e.jpg'),
(23, 'фото', 7, 'e3abac9d66eef4ebaab540056f744f95.jpg'),
(24, 'фото', 7, 'a19ea4d48df7df867f1d2807068dca33.jpg'),
(25, 'фото', 7, 'b546086c36a864a5bd01296282423679.jpg'),
(26, 'фото', 9, 'f4a120d237bdccb2dbb03655e9e6a881.jpg'),
(27, 'фото', 9, 'aae79dc6b07a300db3a15259e41826cc.jpg'),
(28, 'відео', 10, 'mn7OXaqUABk'),
(29, 'відео', 10, 'ngK_djsAnDA'),
(30, 'відео', 14, 'BTvADk41yAY'),
(32, 'відео', 1, '5rlsHH_pTHM');

-- --------------------------------------------------------

--
-- Структура таблиці `Vacncy`
--

CREATE TABLE IF NOT EXISTS `Vacncy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `location` varchar(25) NOT NULL,
  `desciption` text NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп даних таблиці `Vacncy`
--

INSERT INTO `Vacncy` (`id`, `id_user`, `title`, `location`, `desciption`, `price`) VALUES
(1, 16, 'Шукаю фотографа на  весілля', 'Хмельницький', 'івіфвів', '300'),
(3, 5, 'Шукаю відеомейкера', 'Хмельницький', 'Шукаєм відеомейкера для зйомок відеопривітання', '40'),
(4, 5, 'Шукаю фотографа', 'Київ', 'Шукаю фотографа на випуск Київ', '20'),
(5, 11, 'Шкаю фотографа для індивідуальної фотосе', 'Харків', 'Потрібен креативний фотограф, який знає добре свою справу для зйомок індивідуальної фотосесії', '40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
