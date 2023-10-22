-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Paź 2023, 15:46
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `login-form`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `destination` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`id`, `content`, `destination`, `sender`, `timestamp`) VALUES
(1, 'Test message 1', 1, 2, '2023-10-21 00:10:57'),
(3, 'Test message 3', 3, 1, '2023-10-21 22:48:36'),
(4, 'Test message 4', 4, 1, '2023-10-21 22:48:36'),
(5, 'Test message 5', 5, 1, '2023-10-21 22:48:36'),
(6, 'Test message 6', 3, 1, '2023-10-21 22:48:36'),
(7, 'Hello', 2, 1, '2023-10-22 15:03:39'),
(8, 'Wassup', 1, 2, '2023-10-22 15:04:22'),
(9, 'My Hello message', 2, 3, '2023-10-22 15:08:06'),
(10, 'hi', 3, 2, '2023-10-22 15:08:27'),
(11, 'This is test', 3, 2, '2023-10-22 15:09:34'),
(12, 'Hi', 2, 3, '2023-10-22 15:26:30'),
(13, 'Another test message', 3, 2, '2023-10-22 15:26:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'User1', '$2y$10$wqobdTP/8yHOfhbA0LrIB.nXTAxWixQTvVBqQKwQC6383iqSJoOGq'),
(2, 'User2', '$2y$10$wqobdTP/8yHOfhbA0LrIB.nXTAxWixQTvVBqQKwQC6383iqSJoOGq'),
(3, 'User3', '$2y$10$wqobdTP/8yHOfhbA0LrIB.nXTAxWixQTvVBqQKwQC6383iqSJoOGq'),
(4, 'User4', '$2y$10$wqobdTP/8yHOfhbA0LrIB.nXTAxWixQTvVBqQKwQC6383iqSJoOGq');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
