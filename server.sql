-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 18 2019 г., 14:58
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `server`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_name` varchar(225) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_text`, `comment_date`, `comment_post_id`) VALUES
(22, 'светлана', 'мне нравятся ваши статьи', '2019-06-24 15:19:27', 12),
(24, 'Владимир', 'нравятся ваши блоги', '2019-06-25 16:35:38', 12),
(28, 'Вячеслав', 'люблю ваш блог', '2019-06-25 17:14:23', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `connects`
--

CREATE TABLE `connects` (
  `connect_id` int(11) NOT NULL,
  `connect_token` char(32) NOT NULL,
  `connect_session` char(32) NOT NULL,
  `connect_token_time` datetime NOT NULL,
  `connect_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(225) NOT NULL,
  `contact_email` varchar(225) NOT NULL,
  `contact_text` text NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_text`, `contact_date`) VALUES
(5, 'Вячеслав', 'soroca.v@gmail.com', 'Прошу записать меня на прием', '2019-06-25 17:15:12');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(225) NOT NULL,
  `post_categori` varchar(225) NOT NULL,
  `post_text` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_categori`, `post_text`, `post_date`, `post_user_id`) VALUES
(10, 'Анималистичные принты', 'тренды лета 2019', '«Животные» орнаменты не покинут наши гардеробы и летом. Miu Miu делают ставку на узор под кожу питона, Gucci — зебры, Burberry и Saint Laurent — леопарда. Выбор только за вами. В коллекциях весна-лето 2019 с анималистичными принтами представлены и аксессуары, и обувь — это самый яркий тренд. ', '2019-06-20 16:45:48', 0),
(12, 'Съезд стилистов в Сочи', 'лето 2019', 'Всем привет. Недавно я ездила в Сочи на международный съезд стилистов, где выступала в качестве спикера с темой продвижения стилиста. Съезд стилистов в Сочи это:\r\n3 дня обучения\r\n15 спикеров и 10 экспертов\r\n300 девушек-стилистов и всего четверо мужчин\r\nЭто мероприятие включало в себя и обучение у профессионалов своего дела с целью перенятия опыта, и позитивные знакомства с коллегами со всей страны (и не только), и вдохновение, которое витало в воздухе от такого большого количества красивых и стильных людей... А еще это Черное море, пальмы и яхты плюс даты проведения мероприятия была потрясающая погода, дающая позитивное настроение и отличные воспоминания. Кстати, после мероприятия я решила остаться на несколько дней - отдохнуть, ведь дни форума были расписаны с утра до самого вечера, но не прогуляться по Имеретинской набережной, не съездить в Розу Хутор, учитывая, что я  первый раз в Сочи, было бы просто преступлением! Вот так все проходило:', '2019-06-24 11:59:51', 0),
(15, 'Бежевый — это новый белый!', 'лето 2019', 'Хотя Pantone и назвал самым модным цветом этого года коралловый, но главным фаворитом подиумов и главной темой сезона стал безусловно бежевый. И это — одна из главных революционных новинок сезона. Давно не было в моде такого засилья спокойного, умиротворенного и простодушного бежевого. Можно с уверенностью назвать основной модный тренд 2019 года:', '2019-06-25 17:15:54', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(225) NOT NULL,
  `user_password` char(32) NOT NULL,
  `user_is_admin` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_is_admin`) VALUES
(0, 'admin', '12345', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `comment_post_id` (`comment_post_id`);

--
-- Индексы таблицы `connects`
--
ALTER TABLE `connects`
  ADD PRIMARY KEY (`connect_id`),
  ADD KEY `connect_user_id` (`connect_user_id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_id` (`post_user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `connects`
--
ALTER TABLE `connects`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`id`);

--
-- Ограничения внешнего ключа таблицы `connects`
--
ALTER TABLE `connects`
  ADD CONSTRAINT `connects_ibfk_1` FOREIGN KEY (`connect_user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `posts` (`post_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
