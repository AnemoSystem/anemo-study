-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 09:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `grade_id`, `period_id`) VALUES
(4, 2, 7),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`user_id`, `item_id`, `type`) VALUES
(8, 0, 'S'),
(8, 1, 'S'),
(8, 0, 'T'),
(8, 1, 'T'),
(8, 0, 'H'),
(8, 1, 'H'),
(8, 0, 'L'),
(8, 1, 'L'),
(8, 2, 'T'),
(8, 2, 'H'),
(8, 3, 'T'),
(8, 3, 'H'),
(15, 0, 'S'),
(15, 0, 'T'),
(15, 0, 'H'),
(15, 0, 'L'),
(15, 1, 'S'),
(15, 1, 'T'),
(15, 1, 'H'),
(15, 1, 'L'),
(16, 0, 'S'),
(16, 0, 'T'),
(16, 0, 'H'),
(16, 0, 'L'),
(16, 1, 'S'),
(16, 1, 'T'),
(16, 1, 'H'),
(16, 1, 'L'),
(17, 0, 'S'),
(17, 0, 'T'),
(17, 0, 'H'),
(17, 0, 'L'),
(17, 1, 'S'),
(17, 1, 'T'),
(17, 1, 'H'),
(17, 1, 'L'),
(18, 0, 'S'),
(18, 0, 'T'),
(18, 0, 'H'),
(18, 0, 'L'),
(18, 1, 'S'),
(18, 1, 'T'),
(18, 1, 'H'),
(18, 1, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `function_id` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`id`, `name`) VALUES
(15, 'Professor'),
(16, 'poxa');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, '2 ano'),
(2, '3 ano');

-- --------------------------------------------------------

--
-- Table structure for table `grades_attendance`
--

CREATE TABLE `grades_attendance` (
  `subject_teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_value` decimal(3,1) NOT NULL,
  `id` int(11) NOT NULL,
  `school_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades_attendance`
--

INSERT INTO `grades_attendance` (`subject_teacher_id`, `student_id`, `grade_value`, `id`, `school_month`) VALUES
(6, 2, '4.0', 8, 1),
(5, 2, '2.0', 9, 1),
(5, 2, '2.0', 10, 2),
(7, 5, '-1.0', 13, 1),
(8, 5, '-1.0', 14, 1),
(9, 5, '-1.0', 15, 1),
(10, 5, '-1.0', 16, 1),
(5, 5, '-1.0', 17, 1),
(6, 5, '-1.0', 18, 1),
(7, 7, '-1.0', 25, 1),
(8, 7, '-1.0', 26, 1),
(9, 7, '-1.0', 27, 1),
(10, 7, '-1.0', 28, 1),
(5, 7, '-1.0', 29, 1),
(6, 7, '-1.0', 30, 1),
(8, 10, '-1.0', 61, 1),
(8, 10, '-1.0', 62, 2),
(8, 10, '-1.0', 63, 3),
(8, 10, '-1.0', 64, 4),
(9, 10, '-1.0', 65, 1),
(9, 10, '-1.0', 66, 2),
(9, 10, '-1.0', 67, 3),
(9, 10, '-1.0', 68, 4),
(10, 10, '-1.0', 69, 1),
(10, 10, '-1.0', 70, 2),
(10, 10, '-1.0', 71, 3),
(10, 10, '-1.0', 72, 4),
(5, 10, '-1.0', 73, 1),
(5, 10, '-1.0', 74, 2),
(5, 10, '-1.0', 75, 3),
(5, 10, '-1.0', 76, 4),
(6, 10, '-1.0', 77, 1),
(6, 10, '-1.0', 78, 2),
(6, 10, '-1.0', 79, 3),
(6, 10, '-1.0', 80, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `type` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `type`, `status`, `from_user`, `to_user`, `send_date`) VALUES
(1, 'testefdsfsdf', 'teste', 'P', 'R', 1, 8, '2022-10-06'),
(2, 'nbmbnmbnmb', 'bnmnmbnmbnmbmbnm', 'M', 'N', 1, 8, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `number_players`
--

CREATE TABLE `number_players` (
  `id` int(11) NOT NULL,
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `number_players`
--

INSERT INTO `number_players` (`id`, `A`, `B`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `name`, `start_time`, `end_time`) VALUES
(6, 'Noite', '09:41:00', '09:39:00'),
(7, 'aksdkasd', '19:59:00', '15:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `cpf`, `rg`, `email`, `password`, `classroom_id`, `phone`) VALUES
(1, 'aa', '555.555.555-55', '66.666.666-6', 'aaa@aa', '7283', 4, '(55) 55555-5555'),
(2, 'Guilherme', '555.555.555-55', '66.666.666-6', 'aaa@aa', '5456', 4, '(56) 66666-6666'),
(3, 'aas', '555.555.555-55', '66.666.666-6', 'aaa@aa', '2513', 4, '(56) 66666-6666'),
(5, 'João', '456.455.646-56', '54.464.564-6', 'j@gmail.com', '5831', 4, '(11) 46131-6516'),
(7, 'eee', '543.534.534-53', '34.534.534-5', 'ee@ee', '9097', 4, '(43) 53453-4534'),
(10, 'fdks', '434.938.942-38', '84.932.849-0', 'oao2gsjd@fsdklj', '2832', 4, '(93) 48204-8238');

-- --------------------------------------------------------

--
-- Table structure for table `student_absence`
--

CREATE TABLE `student_absence` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `state` char(1) NOT NULL,
  `subject_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_absence`
--

INSERT INTO `student_absence` (`id`, `student_id`, `day`, `state`, `subject_teacher_id`) VALUES
(1, 2, '2022-07-07', 'A', 5),
(2, 2, '2022-07-04', 'A', 5),
(3, 2, '2022-07-01', 'P', 5),
(4, 5, '2022-07-13', 'P', 5),
(5, 5, '2022-07-15', 'P', 5),
(6, 5, '2022-07-17', 'A', 5),
(7, 1, '2022-08-19', 'P', 8),
(8, 2, '2022-08-19', 'P', 8),
(9, 3, '2022-08-19', 'P', 8),
(10, 5, '2022-08-19', 'P', 8),
(11, 7, '2022-08-19', 'P', 8),
(12, 10, '2022-08-19', 'P', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(2, 'Matemática'),
(3, 'Português'),
(4, 'Biologia'),
(7, 'Geografia'),
(8, 'História'),
(11, 'Inglês');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `teacher_id`, `subject_id`) VALUES
(5, 7, 2),
(6, 8, 8),
(7, 9, 3),
(8, 10, 4),
(9, 12, 11),
(10, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `cpf`, `rg`, `email`, `password`, `phone`, `salary`) VALUES
(7, 'João da Silva', '555.555.555-55', '55.555.555-5', 'joaoprof@gmail.com', 'teste1', '(55) 55555-5553', '5000.00'),
(8, 'Pedro Santos', '898.989.898-98', '98.989.898-9', 'psantos@gmail.com', 'teste2', '(89) 89898-9898', '6000.00'),
(9, 'Mariana Carvalho', '884.844.564-56', '54.564.564-6', 'mcarva234@outlook.co', 'teste3', '(16) 51231-3165', '8000.00'),
(10, 'Ana Beatriz de Sousa', '885.631.168-51', '13.216.516-5', 'anabsouza@gmail.com', 'teste4', '(23) 15413-0303', '5000.00'),
(11, 'Diego Augusto', '586.156.156-48', '46.541.784-1', 'diegusto@hotmail.com', 'teste5', '(15) 64154-6165', '3000.00'),
(12, 'Maria Eduarda Pereira', '548.416.484-16', '18.184.616-5', 'meduardape23@outlook', 'teste6', '(16) 51616-5156', '8900.00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classroom`
--

CREATE TABLE `teacher_classroom` (
  `subject_teacher_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_classroom`
--

INSERT INTO `teacher_classroom` (`subject_teacher_id`, `classroom_id`, `id`) VALUES
(8, 4, 2),
(9, 4, 3),
(10, 4, 4),
(5, 4, 5),
(6, 4, 6),
(7, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_nickname` varchar(30) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_logged` bit(1) NOT NULL,
  `id_skin` int(11) NOT NULL,
  `id_torso` int(11) NOT NULL,
  `id_legs` int(11) NOT NULL,
  `id_hair` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `vkey` varchar(60) DEFAULT NULL,
  `number_visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_nickname`, `user_password`, `student_id`, `is_logged`, `id_skin`, `id_torso`, `id_legs`, `id_hair`, `coins`, `points`, `id`, `vkey`, `number_visits`) VALUES
('guisamuel', 'desenhando', 2, b'0', 0, 0, 0, 0, 100, 0, 1, NULL, 0),
('capivara12', 'pote1', 2, b'0', 0, 0, 0, 0, 100, 0, 3, NULL, 0),
('ZegarekD', 'zeg', 2, b'0', 0, 0, 0, 0, 100, 0, 4, NULL, 0),
('primo', 'primo', 2, b'0', 1, 0, 0, 0, 100, 0, 5, NULL, 2),
('a', 'a', 2, b'0', 0, 0, 0, 0, 100, 0, 6, NULL, 0),
('e', 'e', 2, b'0', 1, 0, 0, 0, 100, 0, 7, NULL, 0),
('jooj', 'jooj', 5, b'0', 1, 2, 0, 0, 18, 0, 8, NULL, 27),
('aaaa', 'aaaa', 5, b'0', 1, 1, 0, 0, 0, 0, 15, 'd09cd26e65d9be35845cc09e976af4cb', 4),
('bbbb', 'bbbb', 5, b'1', 0, 0, 0, 0, 0, 0, 16, '9180e3a4e8d1416f0ab4c2c6c5acce0a', 0),
('cccc', 'cccc', 1, b'1', 0, 0, 0, 0, 0, 0, 17, 'e6542f2e18e19025fd4a9e4f2d2c3a73', 0),
('dddd', 'dddd', 1, b'0', 0, 0, 0, 0, 0, 0, 18, 'ff3c7dc41e8319f312bb798b84b299d5', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodo_id` (`period_id`),
  ADD KEY `ano_id` (`grade_id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcao_id` (`function_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_1` (`user_1`),
  ADD KEY `user_2` (`user_2`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades_attendance`
--
ALTER TABLE `grades_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `number_players`
--
ALTER TABLE `number_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_id` (`classroom_id`);

--
-- Indexes for table `student_absence`
--
ALTER TABLE `student_absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_teacher_id` (`subject_teacher_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`teacher_id`),
  ADD KEY `materia_id` (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_id` (`subject_teacher_id`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades_attendance`
--
ALTER TABLE `grades_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `number_players`
--
ALTER TABLE `number_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_absence`
--
ALTER TABLE `student_absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`period_id`) REFERENCES `period` (`id`),
  ADD CONSTRAINT `classroom_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`);

--
-- Constraints for table `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
