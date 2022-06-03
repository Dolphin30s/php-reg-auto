-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 29 2021 г., 22:32
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `back_image`
--

CREATE TABLE `back_image` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `back_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `back_image`
--

INSERT INTO `back_image` (`id`, `id_user`, `back_image`) VALUES
(21, 26, 'background/1632675362F6kiF4azL4A.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `registration`
--

CREATE TABLE `registration` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `registration`
--

INSERT INTO `registration` (`id`, `name`, `login`, `email`, `password`, `image`) VALUES
(23, 'Кирилл', 'user', 'kir4ick@mail.ru', '202cb962ac59075b964b07152d234b70', 'users_photo/1632674503Cyberpunk 2077 Screenshot 2021.02.10 - 19.51.02.30.png'),
(26, 'Кирилл', 'Kir4ick', 'ulia23-30@mail.ru', '202cb962ac59075b964b07152d234b70', 'users_photo/1632674247photomode_27012021_210334.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users_blog`
--

CREATE TABLE `users_blog` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users_blog`
--

INSERT INTO `users_blog` (`id`, `id_user`, `date`, `text`) VALUES
(38, 23, '2021-09-25', 'Привет'),
(43, 26, '2021-09-26', 'Скоро сделаю аудиозаписи на сайте!'),
(44, 26, '2021-09-26', 'аааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа'),
(45, 26, '2021-09-26', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg\r\n');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `back_image`
--
ALTER TABLE `back_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_blog`
--
ALTER TABLE `users_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `back_image`
--
ALTER TABLE `back_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users_blog`
--
ALTER TABLE `users_blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `back_image`
--
ALTER TABLE `back_image`
  ADD CONSTRAINT `back_image_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users_blog`
--
ALTER TABLE `users_blog`
  ADD CONSTRAINT `users_blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
