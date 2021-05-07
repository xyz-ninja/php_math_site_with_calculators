-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2021 г., 19:46
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `algebra`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(10) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `date`, `content`) VALUES
(7, 'Округление', '2020-05-10', '<div class=\"content\">\n    <div class=\"field field-name-body field-type-text-with-summary field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\" property=\"content:encoded\"><p>В приближенных вычислениях часто приходится округлять числа как приближенные, так и точные, т. е. отбрасывать одну или несколько последних цифр. Чтобы обеспечить наибольшую близость округленного числа к округляемому, соблюдаются следующие правила.</p>\n<p>Правило 1. Если первая из отбрасываемых цифр больше чем 5, то последняя из сохраняемых<br>цифр усиливается, т. е. увеличивается на единицу. Усиление совершается и тогда, когда первая из отбрасываемых цифр равна 5, а за ней есть одна или несколько значащих цифр. (О случае, когда за отбрасываемой пятеркой нет цифр, см. ниже, правило 3.)</p>\n<p>Пример 1. Округляя число 27,874 до трех значащих цифр, пишем 27,9. Третья цифра 8 усилена<br>до 9, так как первая отбрасываемая цифра 7 больше чем 5. Число 27,9 ближе к данному, чем неусиленное округленное число 27,8.</p>\n<p>Пример 2. Округляя число 36,251 до первого десятичного знака, пишем 36,3. Цифра десятых 2 уси-<br>лена до 3, так как первая отбрасываемая цифра равна 5, а за ней есть значащая цифра 1. Число 36,3 ближе к данному (хотя и незначительно), чем неусиленное число 36,2.</p>\n<p>Правило 2. Если первая из отбрасываемых цифр меньше чем 5, то усиления не делается.</p>\n<p>Пример 3. Округляя число 27,48 до единиц, пишем 27. Это число ближе к данному, чем 28.</p>\n<p>Правило 3. Если отбрасывается цифра 5, а за ней нет значащих цифр, то округление производится<br>на ближайшее четное число, т. е. последняя сохраняемая цифра оставляется неизменной, если она четная, и усиливается, если она нечетная. Почему применяется это правило, сказано ниже (см. замечание).</p>\n<p>Пример 4. Округляя число 0,0465 до третьего десятичного знака, пишем 0,046. Усиления не делаем, так как последняя сохраняемая цифра 6 — четная. Число 0,046 столь же близко к данному, как 0,047.</p>\n<p>Пример 5. Округляя число 0,935 до второго десятичного знака, пишем 0,94. Последняя сохраняемая цифра 3 усиливается, так как она нечетная.</p>\n<p>Пример 6. Округляя числа 6,527; 0,456; 2,195; 1,450; 0,950; 4,851; 0,850; 0,05<br>до первого десятичного знака, получаем:</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6,5; 0,5; 2,2; 1,4; 1,0; 4,9; 0,8; 0,0.</p>\n<p>Замечание. Применяя правило 3 к округлению одного числа, мы не увеличиваем точность округления .Но при многочисленных округлениях избыточные числа будут встречаться<br>примерно столь же часто, как недостаточные. Взаимная компенсация погрешностей обеспечит наибольшую точность результата.</p>\n<p>Правило 3 можно изменить и применять всегда округление на ближайшее нечетное число. Точность будет та же, но четные цифры удобнее, чем нечетные.</p>\n\n</div></div></div>'),
(13, 'Безымянная', '2020-05-11', '<p>При \\(a \\ne 0\\) получается\nдва корня уравнения \\(ax^2+bx+c=0\\), для нахождения которых используют\nформулу $${x}_{1,2}={=b \\pm \\sqrt{b^2-4ac} \\over 2a}.$$</p>'),
(17, 'Статья № 1', '2021-04-14', '<div class=\"content\">\r\n    <div class=\"field field-name-body field-type-text-with-summary field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\" property=\"content:encoded\"><p>В приближенных вычислениях часто приходится округлять числа как приближенные, так и точные, т. е. отбрасывать одну или несколько последних цифр. Чтобы обеспечить наибольшую близость округленного числа к округляемому, соблюдаются следующие правила.</p>\r\n<p>Правило 1. Если первая из отбрасываемых цифр больше чем 5, то последняя из сохраняемых<br>цифр усиливается, т. е. увеличивается на единицу. Усиление совершается и тогда, когда первая из отбрасываемых цифр равна 5, а за ней есть одна или несколько значащих цифр. (О случае, когда за отбрасываемой пятеркой нет цифр, см. ниже, правило 3.)</p>\r\n<p>Пример 1. Округляя число 27,874 до трех значащих цифр, пишем 27,9. Третья цифра 8 усилена<br>до 9, так как первая отбрасываемая цифра 7 больше чем 5. Число 27,9 ближе к данному, чем неусиленное округленное число 27,8.</p>\r\n<p>Пример 2. Округляя число 36,251 до первого десятичного знака, пишем 36,3. Цифра десятых 2 уси-<br>лена до 3, так как первая отбрасываемая цифра равна 5, а за ней есть значащая цифра 1. Число 36,3 ближе к данному (хотя и незначительно), чем неусиленное число 36,2.</p>\r\n<p>Правило 2. Если первая из отбрасываемых цифр меньше чем 5, то усиления не делается.</p>\r\n<p>Пример 3. Округляя число 27,48 до единиц, пишем 27. Это число ближе к данному, чем 28.</p>\r\n<p>Правило 3. Если отбрасывается цифра 5, а за ней нет значащих цифр, то округление производится<br>на ближайшее четное число, т. е. последняя сохраняемая цифра оставляется неизменной, если она четная, и усиливается, если она нечетная. Почему применяется это правило, сказано ниже (см. замечание).</p>\r\n<p>Пример 4. Округляя число 0,0465 до третьего десятичного знака, пишем 0,046. Усиления не делаем, так как последняя сохраняемая цифра 6 — четная. Число 0,046 столь же близко к данному, как 0,047.</p>\r\n<p>Пример 5. Округляя число 0,935 до второго десятичного знака, пишем 0,94. Последняя сохраняемая цифра 3 усиливается, так как она нечетная.</p>\r\n<p>Пример 6. Округляя числа 6,527; 0,456; 2,195; 1,450; 0,950; 4,851; 0,850; 0,05<br>до первого десятичного знака, получаем:</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6,5; 0,5; 2,2; 1,4; 1,0; 4,9; 0,8; 0,0.</p>\r\n<p>Замечание. Применяя правило 3 к округлению одного числа, мы не увеличиваем точность округления .Но при многочисленных округлениях избыточные числа будут встречаться<br>примерно столь же часто, как недостаточные. Взаимная компенсация погрешностей обеспечит наибольшую точность результата.</p>\r\n<p>Правило 3 можно изменить и применять всегда округление на ближайшее нечетное число. Точность будет та же, но четные цифры удобнее, чем нечетные.</p>\r\n\r\n</div></div></div>');

-- --------------------------------------------------------

--
-- Структура таблицы `calc_history`
--

CREATE TABLE `calc_history` (
  `id` int(255) UNSIGNED NOT NULL,
  `user_id` int(255) NOT NULL,
  `text` varchar(80) NOT NULL DEFAULT 'Ошибка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `calc_history`
--

INSERT INTO `calc_history` (`id`, `user_id`, `text`) VALUES
(1, 23, '1000 + 1000 = 2000'),
(2, 23, '1000 - 1000 = 0'),
(3, 23, '[Производная] F(x) = x^2 по переменной x = 2 * x');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `test_score` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `is_admin`, `test_score`) VALUES
(6, 'Ilmi', '02022000', 'Ильми Керимов', 0, 3),
(7, 'King', 'Vova', 'Владимир Пастернак', 0, 5),
(8, 'inteam', 'Vlad', 'Владислав Клочков', 0, 5),
(9, 'check', 'roma', 'Роман Чекрыгин', 0, 2),
(15, 'ZairCR7', 'Zair12', 'Мараджапов Заир', 1, 5),
(22, 'Ivan', 'ivan', 'Ivan Ivanov', 1, 5),
(23, '+797806421', '12345', 'Александр', 0, -1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `calc_history`
--
ALTER TABLE `calc_history`
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
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `calc_history`
--
ALTER TABLE `calc_history`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
