-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 15 日 16:26
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `05phpwork`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `approval_table`
--

CREATE TABLE `approval_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `doc_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `approval_table`
--

INSERT INTO `approval_table` (`id`, `user_id`, `doc_id`, `created_at`) VALUES
(5, 2, 1, '2021-07-15 22:52:39'),
(6, 2, 2, '2021-07-15 22:52:41'),
(7, 2, 4, '2021-07-15 22:53:12'),
(11, 1, 6, '2021-07-15 23:05:15'),
(12, 1, 4, '2021-07-15 23:05:18'),
(13, 1, 3, '2021-07-15 23:05:18'),
(15, 1, 2, '2021-07-15 23:05:34'),
(18, 1, 1, '2021-07-15 23:22:42'),
(19, 2, 7, '2021-07-15 23:22:58'),
(20, 2, 8, '2021-07-15 23:22:59'),
(21, 3, 1, '2021-07-15 23:23:06'),
(22, 3, 2, '2021-07-15 23:23:07'),
(23, 3, 3, '2021-07-15 23:23:08'),
(24, 3, 4, '2021-07-15 23:23:09'),
(25, 3, 6, '2021-07-15 23:23:09'),
(26, 3, 7, '2021-07-15 23:23:10'),
(27, 3, 8, '2021-07-15 23:23:11'),
(28, 4, 1, '2021-07-15 23:23:19'),
(29, 4, 2, '2021-07-15 23:23:19'),
(30, 4, 3, '2021-07-15 23:23:20'),
(31, 4, 4, '2021-07-15 23:23:21'),
(32, 4, 6, '2021-07-15 23:23:22'),
(33, 4, 7, '2021-07-15 23:23:23'),
(37, 5, 1, '2021-07-15 23:23:37'),
(38, 5, 2, '2021-07-15 23:23:37'),
(39, 5, 3, '2021-07-15 23:23:38'),
(40, 6, 1, '2021-07-15 23:23:55'),
(41, 6, 2, '2021-07-15 23:23:55'),
(42, 6, 3, '2021-07-15 23:23:57'),
(43, 6, 4, '2021-07-15 23:23:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `document_table`
--

CREATE TABLE `document_table` (
  `id` int(12) NOT NULL,
  `doc_title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_contents` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(12) NOT NULL,
  `updated_by` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `document_table`
--

INSERT INTO `document_table` (`id`, `doc_title`, `doc_contents`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '園芸農業総合支援事業の交付決定について', 'このことについて、下記の事業主体より申請があったので交付決定いたしたい。', '2021-07-14 23:50:45', '2021-07-15 22:44:57', 2, 1),
(2, '畜産総合対策事業の承認申請について', 'このことについて、別紙のとおり県知事あて承認申請いたしたい。', '2021-07-14 23:51:53', '2021-07-15 22:13:11', 1, 2),
(3, '園芸農業補助金交付要綱の改正について', 'このことについて、県要綱の一部改正に基づき、別紙のとおり改正いたしたい。', '2021-07-14 23:56:27', '2021-07-15 22:27:41', 2, 3),
(4, '豚熱の県内発生状況について', 'このことについて、農林事務所より通知があったので回覧いたしたい。', '2021-07-15 00:00:56', '2021-07-15 22:28:19', 1, 1),
(6, '農業振興協議会の開催について', '標記協議会について、別紙のとおり出席いたしたい。', '2021-07-15 22:24:05', '2021-07-15 22:24:05', 2, 2),
(7, 'test1', 'test1', '2021-07-15 22:24:59', '2021-07-15 22:45:21', 2, 1),
(8, 'test2', 'test2', '2021-07-15 22:45:10', '2021-07-15 22:45:10', 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `position`, `password`, `is_admin`, `is_deleted`, `created_at`) VALUES
(1, 'shige', 'Staff', '11', 0, 0, '2021-07-14 23:26:44'),
(2, 'rei', 'SeniorStaff', '22', 0, 0, '2021-07-14 23:27:21'),
(3, 'mika', 'AssistantManager', '33', 0, 0, '2021-07-14 23:29:43'),
(4, 'kimu', 'Manager', '44', 0, 0, '2021-07-14 23:31:53'),
(5, 'tatsu', 'AssistantDirector', '55', 0, 0, '2021-07-14 23:35:59'),
(6, 'hino', 'Director', '66', 0, 0, '2021-07-14 23:36:14'),
(7, 'kuma', 'DeputyDirector', '77', 0, 0, '2021-07-14 23:38:12'),
(8, 'jicho', 'DeputyDirectorGeneral', '88', 0, 0, '2021-07-14 23:40:20'),
(9, 'boo', 'DirectorGeneral', '99', 0, 0, '2021-07-14 23:44:45'),
(10, 'tom', 'Mayer', '00', 0, 0, '2021-07-15 22:34:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `approval_table`
--
ALTER TABLE `approval_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `document_table`
--
ALTER TABLE `document_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `approval_table`
--
ALTER TABLE `approval_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- テーブルの AUTO_INCREMENT `document_table`
--
ALTER TABLE `document_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
