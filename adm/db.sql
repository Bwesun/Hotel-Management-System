CREATE TABLE `admin` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin'),
(2, 'innocent', 'innocent');

-- --------------------------------------------------------

-- 
-- Table structure for table `reservations`
-- 

CREATE TABLE `reservations` (
  `id` int(5) NOT NULL auto_increment,
  `user_id` varchar(4) NOT NULL,
  `reserve_name` varchar(25) NOT NULL,
  `reserve_type` varchar(10) NOT NULL,
  `duration` varchar(3) NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `reserve_code` varchar(13) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `date` varchar(15) NOT NULL,
  `price` varchar(9) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- 
-- Dumping data for table `reservations`
-- 

INSERT INTO `reservations` (`id`, `user_id`, `reserve_name`, `reserve_type`, `duration`, `start_date`, `end_date`, `purpose`, `reserve_code`, `status`, `datetime`, `date`, `price`, `invoice`) VALUES 
(57, '4', 'Joshua Micheal', 'Plan B', '3', '2021-09-26', '2021-09-28', 'For Chilling', 'E44025790H', 'Ended', '2021-09-28 16:05:55', '28/09/2021', '19200', '#9559'),
(58, '1', 'Matur Innoecnt Joshua', 'Plan D', '2', '2021-09-27', '2021-09-28', 'Relaxing', 'E035784662H', 'Approved', '2021-09-28 16:07:18', '28/09/2021', '68000', '#4880'),
(59, '1', 'Matur Innoecnt Joshua', 'Plan D', '2', '2021-09-27', '2021-09-28', 'Relaxing', 'E500305552H', 'Ended', '2021-09-28 16:07:59', '28/09/2021', '68000', '#47616'),
(60, '7', 'Joel Etsubenya', 'Plan A', '3', '2021-10-05', '2021-10-07', 'Meeting', 'E04767482H', 'Cancelled', '2021-10-04 11:50:16', '04/10/2021', '38700', '#58149'),
(61, '7', 'Godiya Yakubu', 'Plan D', '2', '2021-10-05', '2021-10-06', 'Chilling', 'E962431129H', 'Ended', '2021-10-04 11:59:39', '04/10/2021', '68000', '#5526');

-- --------------------------------------------------------

-- 
-- Table structure for table `reserve_type`
-- 

CREATE TABLE `reserve_type` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(16) NOT NULL,
  `description` varchar(225) NOT NULL,
  `amount` varchar(7) NOT NULL COMMENT 'Amount per night',
  `available_no` int(3) NOT NULL,
  `total_no` varchar(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `reserve_type`
-- 

INSERT INTO `reserve_type` (`id`, `name`, `description`, `amount`, `available_no`, `total_no`) VALUES 
(2, 'Plan B', 'Two Rooms Self-Contain', '6400', 3, '5'),
(6, 'Plan D', 'Four Bedroom Self Contain', '34000', 1, '4'),
(7, 'Plan A', 'One Bedroom Self Contain', '12900', 3, '3');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `age` varchar(3) NOT NULL,
  `address` varchar(225) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `gender`, `age`, `address`, `username`, `password`, `role`) VALUES 
(1, 'Matur Innocent Joshua', '08144529253', 'maturinnocent@gmail.com', 'male', '18', 'Jushi Waje, Sabon Gari, Zaria', 'innocent', 'innocent', 'user'),
(2, 'Matur Grace Joshua', '09078336627', 'grace@gmail.com', 'female', '18', 'jushi waje near Gidean sarkin Noma, S/Gari Zaria', 'grace', 'grace', 'user'),
(4, 'Joshua Micaal', '09078336628', 'joshua@gmail.com', 'male', '25', 'manguna, Zaria', 'joshua', 'joshua', 'user'),
(5, 'Admin', '08144529253', 'admin@gmail.com', 'Male', '999', 'nil', 'admin', 'admin', 'admin'),
(6, 'Godiya Yakubu', '09863266356', 'godiya@gmail.com', 'female', '12', 'nilest, Samru, ZAria', 'godiya', 'godiya', 'admin'),
(7, 'Michael Godiya', '0980798767', 'godi@gmail.com', 'female', '12', 'Samaru, Zaria, NILEST', 'godi', 'godi', 'user');
