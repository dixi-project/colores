-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2021 at 03:58 PM
-- Server version: 10.3.29-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_colores`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `pantone` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `color`, `pantone`, `year`) VALUES
(3, 'Color 2', '#332bd6', '13-1107', 2020),
(4, 'asfasf', '#4c67bf', '13-1106', 2021),
(5, 'asfasdf', '#6c8f66', '13-1106', 2021),
(6, 'Sand Dollar', '#be4ec2', '13-1106', 2021),
(7, 'José Luis Vieyra', '#2e9980', '13-1106', 2021),
(8, 'COLOR 34', '#808765', '13-1106', 2021),
(9, 'color 45', '#664220', '13-1106', 2021),
(10, 'color 67', '#5867a3', '13-1106', 2021),
(11, 'Color 55', '#867eb5', '13-1106', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `conf_field`
--

CREATE TABLE `conf_field` (
  `id` int(11) NOT NULL,
  `conf_field` varchar(255) DEFAULT NULL,
  `conf_field_new` varchar(255) DEFAULT NULL,
  `conf_table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conf_field`
--

INSERT INTO `conf_field` (`id`, `conf_field`, `conf_field_new`, `conf_table_id`) VALUES
(1, 'id', 'Id', 1),
(2, 'name', 'Nombre', 1),
(3, 'color', 'Color', 1),
(4, 'pantone', 'Pantone', 1),
(5, 'year', 'Año', 1),
(6, 'id', 'Id', 2),
(7, 'rol', 'Rol', 2),
(8, 'id', 'Id', 3),
(9, 'status', 'Status', 3),
(10, 'id', 'Id', 4),
(11, 'name', 'Name', 4),
(12, 'email', 'Email', 4),
(13, 'user', 'User', 4),
(14, 'password', 'Password', 4),
(15, 'rol_id', 'Rol', 4),
(16, 'status_id', 'Status', 4);

-- --------------------------------------------------------

--
-- Table structure for table `conf_table`
--

CREATE TABLE `conf_table` (
  `id` int(11) NOT NULL,
  `conf_table` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` tinyint(4) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `files` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conf_table`
--

INSERT INTO `conf_table` (`id`, `conf_table`, `name`, `img`, `pdf`, `files`) VALUES
(1, 'color', 'Colores', NULL, NULL, NULL),
(2, 'rol', 'Rol', NULL, NULL, NULL),
(3, 'status', 'Status', NULL, NULL, NULL),
(4, 'user', 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf_type_view`
--

CREATE TABLE `conf_type_view` (
  `id` int(11) NOT NULL,
  `conf_type_view` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conf_view`
--

CREATE TABLE `conf_view` (
  `id` int(11) NOT NULL,
  `conf_table_id` int(11) NOT NULL,
  `conf_type_view_id` int(11) NOT NULL,
  `conf_field_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) DEFAULT NULL COMMENT '{"name":"Rol"}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL COMMENT '{"name":"Estatus"}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT '{"name":"Nombre"}',
  `email` varchar(45) DEFAULT NULL COMMENT '{"name":"Correo"}',
  `user` varchar(45) DEFAULT NULL COMMENT '{"name":"Usuario"}',
  `password` varchar(45) DEFAULT NULL COMMENT '{"name":"Clave"}',
  `rol_id` int(11) NOT NULL COMMENT '{"name":"Rol"}',
  `status_id` int(11) NOT NULL COMMENT '{"name":"Estatus"}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"structure": {"img": "true"}}';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user`, `password`, `rol_id`, `status_id`) VALUES
(1, 'Alfredo Castillejos', 'alfdixi@gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'José Sánchez', 'alfdixi@live.com.mx', 'Usuario', '202cb962ac59075b964b07152d234b70', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_field`
--
ALTER TABLE `conf_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conf_field_conf_table1_idx` (`conf_table_id`);

--
-- Indexes for table `conf_table`
--
ALTER TABLE `conf_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_type_view`
--
ALTER TABLE `conf_type_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf_view`
--
ALTER TABLE `conf_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conf_view_conf_table1_idx` (`conf_table_id`),
  ADD KEY `fk_conf_view_conf_type_view1_idx` (`conf_type_view_id`),
  ADD KEY `fk_conf_view_conf_field1_idx` (`conf_field_id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_rol_idx` (`rol_id`),
  ADD KEY `fk_user_status1_idx` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conf_field`
--
ALTER TABLE `conf_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `conf_table`
--
ALTER TABLE `conf_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conf_type_view`
--
ALTER TABLE `conf_type_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conf_view`
--
ALTER TABLE `conf_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conf_field`
--
ALTER TABLE `conf_field`
  ADD CONSTRAINT `fk_conf_field_conf_table1` FOREIGN KEY (`conf_table_id`) REFERENCES `conf_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conf_view`
--
ALTER TABLE `conf_view`
  ADD CONSTRAINT `fk_conf_view_conf_field1` FOREIGN KEY (`conf_field_id`) REFERENCES `conf_field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conf_view_conf_table1` FOREIGN KEY (`conf_table_id`) REFERENCES `conf_table` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conf_view_conf_type_view1` FOREIGN KEY (`conf_type_view_id`) REFERENCES `conf_type_view` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
