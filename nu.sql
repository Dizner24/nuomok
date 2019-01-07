-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Geg 30 d. 20:13
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nu`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admin_data`
--

CREATE TABLE `admin_data` (
  `hello` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `admin_data`
--

INSERT INTO `admin_data` (`hello`, `date`) VALUES
('Visus kvieciame prisijungti', '2017-05-02 17:49:51'),
('Kalvarijuasdasd', '2017-05-02 17:49:51'),
('asodokaspodkas[kd', '2017-05-02 17:49:51'),
('asdasd', '2017-05-02 18:04:48'),
('asdasd', '2017-05-03 18:06:28'),
('asdasd', '2017-05-02 18:07:22'),
('Bandau be datos', '2017-05-02 18:07:31'),
('Dar karta?', '2017-05-02 18:08:02'),
('Dar karta?', '2017-05-02 18:10:45'),
('Orinta sveicia', '2017-05-02 18:10:57'),
('y6uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '2017-05-02 18:19:03'),
('asd bandau su textarea', '2017-05-02 18:24:22'),
('Labas\r\nBandau\r\nIs naujos\r\nEilutes', '2017-05-02 18:25:54'),
('Labas rytas', '2017-05-03 04:33:08');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(20) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_image` varchar(250) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_image`, `owner`) VALUES
(73, 'konsoles', 'XBOX 360', '5', 'near', 'Dainius'),
(72, 'automobiliai', 'Honda Accord 2.2 l 103 kW', '15', 'honda', 'Orinta'),
(74, 'dronai', 'Syma X5', '10', 'symax5', 'Vigaile'),
(69, 'ivairus', 'Asus Notebook', '10', 'asus-laptop', 'admin'),
(70, 'ivairus', 'Samsung Galaxy A3', '2', 'galaxya3', 'Dainius'),
(76, 'automobiliai', 'Volvo ', '20', 'volvo', 'admin'),
(79, 'ivairus', 'Galaxy S8', '12', 'galaxys8', 'test'),
(96, 'irankiai', 'Plaktukas-kirvis', '1', 'plaktukas', 'admin'),
(113, 'dronai', 'jfkdskfslkdfl;kl;ksld', '5', 'Â ', 'admin'),
(95, 'dronai', 'Juodas profesionalus fotografavimui dronas', '15', 'drone1', 'admin'),
(97, 'irankiai', 'Kirvis Truper', '2', 'kirvis', 'admin'),
(98, 'motociklai', 'Motosiklas Honda 125cc', '25', 'hondabike', 'admin'),
(99, 'motociklai', 'Motociklas Yamaha 250cc', '30', 'yamahabike', 'admin'),
(100, 'vaikams', 'VeÅ¾imÄ—lis vaikui', '3', 'vezimelis', 'admin'),
(101, 'sportas', 'Hantelis 9kg, 2 vnt.', '1', 'hantelis', 'admin'),
(102, 'sportas', 'Treniruoklis kojoms', '10', 'treniruoklis', 'admin');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `fname`, `mobile`, `address`, `lname`) VALUES
(1, 'admin', 'admin@admin.lt', '21232f297a57a5a743894a0e4a801fc3', 'admin', 123456789, 'Kalvariju', 'adminas'),
(3, 'dada', 'dada@dada.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(19, 'test', 'test@ass.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(10, 'kiaule', 'kiaule@kiaule.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(6, 'Inesa', 'Inesa@gmail.com', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(13, 'Dainius', 'dainius@gmail.com', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(8, 'Vigaile', 'Vigaile@one.lt', 'b01abf84324066bdb4eed4d5bf20f887', 'dasdas', NULL, NULL, NULL),
(18, 'test', 'test@as.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(12, 'Arnas', 'Arnas@69.lt', '21232f297a57a5a743894a0e4a801fc3', 'Arnas', 8888, 'Didlaukio gatve', 'Samana'),
(14, 'Deividas', 'Deividas@verkter.com', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(21, 'foto', 'foto@foto.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL),
(16, 'Orinta', 'Orestina@inbox.lt', 'b01abf84324066bdb4eed4d5bf20f887', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
