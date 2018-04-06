-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 26 2018 г., 17:12
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Author_One(1)', '2018-03-20 14:52:44', '2018-03-20 14:52:44'),
(2, 'Author_Two(2)', '2018-03-20 14:52:44', '2018-03-20 14:52:44'),
(3, 'Author_Three(3)', '2018-03-24 20:53:37', '2018-03-24 20:53:37'),
(4, 'Author_Four(4)', '2018-03-24 21:01:28', '2018-03-24 21:01:28'),
(5, 'Author_Five(5)', '2018-03-24 21:52:46', '2018-03-24 21:52:46'),
(6, 'Author_Six(6)', '2018-03-25 13:04:55', '2018-03-25 13:04:55'),
(7, 'Author_Seven(7)', '2018-03-25 13:05:10', '2018-03-25 13:05:10'),
(8, 'Author_Eight(8)', '2018-03-25 13:05:33', '2018-03-25 13:05:33'),
(9, 'Author_Nine(9)', '2018-03-25 13:05:49', '2018-03-25 13:05:49'),
(10, 'Author_Ten(10)', '2018-03-25 13:06:02', '2018-03-25 13:06:02');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Book_One(1)', '                                                                                                                                                Desc first book Desc first book Desc first book Desc first book Desc first book Desc first bookDesc first book Desc first                                                                                                                                             ', 777, '2018-03-05 14:51:40', '2018-03-20 14:51:40'),
(2, 'Book_Two(2)', 'Desc second book Desc second book Desc second book Desc second book Desc second book Desc second book Desc second book Desc second book', 222, '2018-03-20 14:51:40', '2018-03-20 14:51:40'),
(3, 'Book_Three(3)', 'Third Book Third Book Third Book Third BookThird Book Third Book Third Book Third Book', 333, '2018-03-21 16:35:26', '2018-03-21 16:35:26'),
(4, 'Book_Four(4)', 'Fourth book Fourth book Fourth book Fourth book Fourth book Fourth book Fourth book', 444, '2018-03-21 16:35:26', '2018-03-21 16:35:26'),
(5, 'Book_Five(5)', 'Some description...', 999, '2018-03-26 12:05:43', '2018-03-26 12:05:43'),
(6, 'Book_Six(6)', 'Some sesc for book_six', 777, '2018-03-26 13:37:43', '2018-03-26 13:37:43');

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 7),
(5, 10),
(6, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `book_genre`
--

CREATE TABLE `book_genre` (
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book_genre`
--

INSERT INTO `book_genre` (`book_id`, `genre_id`) VALUES
(1, 4),
(1, 5),
(2, 4),
(2, 5),
(3, 4),
(3, 7),
(4, 4),
(4, 8),
(5, 4),
(5, 5),
(5, 9),
(6, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'Genre_One(1)', '2018-03-24 16:50:34', '2018-03-24 16:50:34'),
(5, 'Genre_Two(2)', '2018-03-24 16:50:52', '2018-03-24 16:50:52'),
(6, 'Genre_Three(3)', '2018-03-24 16:51:08', '2018-03-24 16:51:08'),
(7, 'Genre_Four(4)', '2018-03-24 16:51:26', '2018-03-24 16:51:26'),
(8, 'Genre_Five(5)', '2018-03-24 16:51:42', '2018-03-24 16:51:42'),
(9, 'Genre_Six(6)', '2018-03-24 16:51:55', '2018-03-24 16:51:55'),
(10, 'Genre_Seven(7)', '2018-03-24 16:52:06', '2018-03-24 16:52:06'),
(11, 'Gere_Eight(8)', '2018-03-24 19:16:39', '2018-03-24 19:16:39'),
(12, 'Genre_Nine(9)', '2018-03-24 20:03:12', '2018-03-24 20:03:12'),
(13, 'Genre_Ten(10)', '2018-03-24 20:13:52', '2018-03-24 20:13:52');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `is_admin`) VALUES
(1, 'Admin', '777777', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_id`,`author_id`);

--
-- Индексы таблицы `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`book_id`,`genre_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
