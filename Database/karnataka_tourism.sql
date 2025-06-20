-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 01:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `karnataka_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Shailendra S', 'shailendtauig@gmail.com', 'I Liked your Project', '2024-07-21 10:45:37'),
(2, 'Jay ram', 'Jayyram@gmail.com', 'Add belagavi package', '2024-07-21 10:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', NULL, '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` varchar(255) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(31, '29', 'Admin', 'travelkar', 'travelkar', 'travelkar', 9986104199, 'travelkar@gmail.com', 1, 'avatar15.jpg', 'fcc82f20dbb92a11180442835fa5e558', '2024-06-30 11:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(19, 6, 'kumar@gmail.com', '2024-07-01', '2024-07-04', 'I want this pakage', '2024-07-01 05:51:39', 1, NULL, '2024-07-01 05:53:56'),
(20, 6, 'kumar@gmail.com', '2024-07-01', '2024-07-04', 'I want this pakage', '2024-07-01 05:54:06', 2, 'a', '2024-07-01 05:54:51'),
(21, 7, 'pant@gmail.com', '2024-07-03', '2024-07-10', 'I want to book this package', '2024-07-01 08:48:35', 1, NULL, '2024-07-01 08:48:51'),
(22, 10, 'niranjancb2035@gmail.com', '2024-07-10', '2024-07-31', 'sdcascsd', '2024-07-01 08:56:45', 1, NULL, '2024-07-01 08:57:19'),
(23, 9, 'pant@gmail.com', '2024-06-12', '2024-06-27', 'i am interested', '2024-07-01 09:50:14', 1, NULL, '2024-07-01 14:54:26'),
(24, 5, 'pant@gmail.com', '2024-07-18', '2024-07-25', 'i need this today itself', '2024-07-17 06:27:55', 1, NULL, '2024-07-17 11:49:55'),
(25, 5, 'pant@gmail.com', '2024-07-18', '2024-07-25', 'i need this today itself', '2024-07-17 06:28:49', 2, 'a', '2024-07-17 11:50:07'),
(26, 9, 'pant@gmail.com', '2024-07-18', '2024-07-19', 'i want to visit this place', '2024-07-17 06:51:38', 1, NULL, '2024-07-17 11:50:25'),
(27, 9, 'pant@gmail.com', '2024-07-24', '2024-07-30', 'I want this p[ackage', '2024-07-21 10:30:10', 2, 'a', '2024-07-21 10:47:30'),
(28, 10, 'pant@gmail.com', '2024-08-01', '2024-08-10', 'I litreally want this  package', '2024-07-21 10:46:23', 1, NULL, '2024-07-21 10:47:39'),
(29, 8, 'pant@gmail.com', '2024-08-07', '2024-08-14', 'i want this package', '2024-08-06 13:55:39', 1, NULL, '2024-08-06 13:56:57'),
(30, 8, NULL, '2024-08-07', '2024-08-14', 'i want this package', '2024-08-06 13:57:58', 0, NULL, NULL),
(31, 8, NULL, '2024-08-07', '2024-08-14', 'i want this package', '2024-08-06 13:58:13', 0, NULL, NULL);

-- --------------------------------------------------------

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Bengaluru', 'Urban tourism, business tourism, cultural tourism.', 'Bengaluru', 9000, 'Bangalore is Karnataka\'s capital known for its modern amenities and historical landmarks, making it a hub for tech-savvy tourists and culture enthusiasts alike.', 'Bangalore, now officially known as Bengaluru, is Karnataka\'s bustling capital city and India\'s technological hub. It seamlessly blends the old and the new, boasting a rich history alongside modern developments. Bangalore is renowned for its pleasant climate, vibrant nightlife, lush greenery, and a thriving cosmopolitan culture. The city is dotted with beautiful gardens like Lalbagh Botanical Garden and Cubbon Park, architectural marvels such as Vidhana Soudha and Bangalore Palace, and a plethora of shopping malls, restaurants, and cafes.', 'bangaluru.jpg', '2017-05-13 14:23:44', '2024-07-01 05:02:51'),
(2, 'Mysuru', 'Heritage tourism, cultural tourism, festival tourism.', 'Southern Karnataka', 9000, ' Mysore Palace, Chamundi Hill, Dasara festival, silk sarees, traditional crafts.', 'Known for its royal heritage, Mysore is a cultural gem with its grand palace, vibrant festivals, and rich traditions. It attracts history buffs, festival-goers, and those interested in traditional arts.Known for its royal heritage, Mysore is a cultural gem with its grand palace, vibrant festivals, and rich traditions. It attracts history buffs, festival-goers, and those interested in traditional arts.Known for its royal heritage, Mysore is a cultural gem with its grand palace, vibrant festivals, and rich traditions. It attracts history buffs, festival-goers, and those interested in traditional arts.', 'mysuru.jpg', '2017-05-13 15:24:26', '2024-07-01 09:31:32'),
(3, ' Coorg (Kodagu)', 'Ecotourism, nature tourism, adventure tourism.', 'Eastern Karnataka (Western Ghats)', 9000, 'Coffee plantations, misty hills, Abbey Falls, wildlife sanctuaries.', 'Coorg, or Kodagu, offers serene landscapes, lush coffee estates, and opportunities for trekking, birdwatching, and wildlife spotting. It\'s a haven for nature lovers and adventure enthusiasts.Coorg, or Kodagu, offers serene landscapes, lush coffee estates, and opportunities for trekking, birdwatching, and wildlife spotting. It\'s a haven for nature lovers and adventure enthusiasts.Coorg, or Kodagu, offers serene landscapes, lush coffee estates, and opportunities for trekking, birdwatching, and wildlife spotting. It\'s a haven for nature lovers and adventure enthusiasts.Coorg, or Kodagu, offers serene landscapes, lush coffee estates, and opportunities for trekking, birdwatching, and wildlife spotting. It\'s a haven for nature lovers and adventure enthusiasts.', 'coorg.jpg', '2017-05-13 16:00:58', '2024-07-01 09:31:50'),
(4, 'Hampi', 'Northern Karnataka', 'Heritage tourism, archaeological tourism.', 9000, 'UNESCO World Heritage Site, Hampi ruins, Virupaksha Temple, boulder-strewn landscapes.', 'Hampi is an ancient city known for its splendid ruins, majestic temples, and unique boulder-strewn landscapes. It\'s a paradise for history buffs and photographers alike. Hampi is an ancient city known for its splendid ruins, majestic temples, and unique boulder-strewn landscapes. It\'s a paradise for history buffs and photographers alike.lla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proide Hampi is an ancient city known for its splendid ruins, majestic temples, and unique boulder-strewn landscapes. It\'s a paradise for history buffs and photographers alike. ', 'hampi.jpg', '2017-05-13 22:39:37', '2024-07-01 09:32:05'),
(5, 'Gokarna', 'Beach tourism, pilgrimage tourism, leisure tourism.', 'Central Karnataka.', 9000, 'Pristine beaches (Om Beach, Kudle Beach), Mahabaleshwar Temple, laid-back vibe.', 'Gokarna is renowned for its pristine beaches with golden sands and crystal-clear waters. Some of the popular beaches include Om Beach, Kudle Beach, Half Moon Beach, and Paradise Beach. Each beach offers its own charm, from serene sunsets to opportunities for water sports and yoga retreats. roident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\" velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat Gokarna is renowned for its pristine beaches with golden sands and crystal-clear waters. Some of the popular beaches include Om Beach, Kudle Beach, Half Moon Beach, and Paradise Beach. Each beach offers its own charm, from serene sunsets to opportunities for water sports and yoga retreats.', 'gokarna.jpg', '2017-05-13 22:42:10', '2024-07-01 09:32:22'),
(6, 'Chikmagalur', 'Ecotourism, adventure tourism, nature tourism.', ' Western Karnataka (Western Ghats)', 9000, 'Coffee plantations, Mullayanagiri Peak, Baba Budangiri Hills, Kudremukh National Park.', 'Chikmagalur is a picturesque hill station known for its coffee estates, trekking trails, and biodiversity. It offers stunning views, adventure activities, and a tranquil retreat in nature\'s lap. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Chikmagalur is a picturesque hill station known for its coffee estates, trekking trails, and biodiversity. It offers stunning views, adventure activities, and a tranquil retreat in nature\'s lap.Chikmagalur is a picturesque hill station known for its coffee estates, trekking trails, and biodiversity. It offers stunning views, adventure activities, and a tranquil retreat in nature\'s lap.', 'chickmagaluru.jpg', '2017-05-14 08:01:08', '2024-07-01 09:32:37'),
(7, 'Udupi', 'Pilgrimage tourism, beach tourism, culinary tourism.', 'Coastal Karnataka', 9000, ' Udupi Sri Krishna Temple, Malpe Beach, traditional cuisine (Udupi cuisine).', 'Udupi is famous for its Krishna Temple, pristine beaches, and unique vegetarian cuisine. It\'s a spiritual center, beach destination, and foodie\'s paradise rolled into one.Udupi is famous for its Krishna Temple, pristine beaches, and unique vegetarian cuisine. It\'s a spiritual center, beach destination, and foodie\'s paradise rolled into one.Udupi is famous for its Krishna Temple, pristine beaches, and unique vegetarian cuisine. It\'s a spiritual center, beach destination, and foodie\'s paradise rolled into one.Udupi is famous for its Krishna Temple, pristine beaches, and unique vegetarian cuisine. It\'s a spiritual center, beach destination, and foodie\'s paradise rolled into one.', 'udupi.jpg', '2024-07-01 05:20:10', '2024-07-01 09:32:55'),
(8, 'Belur and Halebid', 'Heritage tourism, architectural tourism', 'Eastern Karnataka (Western Ghats)', 9000, ': Hoysala temples (Chennakesava Temple in Belur, Hoysaleswara Temple in Halebid), intricate stone carvings, historical significance.', 'Belur and Halebid are famous for their exquisite Hoysala architecture, characterized by detailed craftsmanship and intricate sculptures depicting mythological scenes.Belur and Halebid are famous for their exquisite Hoysala architecture, characterized by detailed craftsmanship and intricate sculptures depicting mythological scenes.Belur and Halebid are famous for their exquisite Hoysala architecture, characterized by detailed craftsmanship and intricate sculptures depicting mythological scenes.Belur and Halebid are famous for their exquisite Hoysala architecture, characterized by detailed craftsmanship and intricate sculptures depicting mythological scenes.', 'halebedu.jpg', '2024-07-01 05:24:22', '2024-07-01 09:33:10'),
(9, 'Bandipur National Park', 'Wildlife Safari Tourism', 'Located in the southern part of Karnataka', 9000, 'Bandipur is celebrated for its rich biodiversity, housing a variety of flora and fauna. It is particularly famous for its population of tigers, making it an important sanctuary.', 'Bandipur plays a crucial role in the conservation of endangered species and the preservation of their natural habitats. It is part of the Project Tiger initiative and also houses the Bandipur Tiger Reserve. The park\'s landscape is characterized by open dry deciduous forests, grassy plains, and riverine habitats. The scenic beauty of the Nilgiri Hills adds to the park\'s charm, offering breathtaking views and a serene environment.Bandipur is easily accessible by road from major cities like Bangalore and Mysore. The nearest airport is in Bangalore, from where tourists can travel by road to reach the park.', 'bandi.jpg', '2024-07-01 05:32:12', '2024-07-01 09:33:27'),
(10, 'Jog Falls', 'Heritage tourism, cultural tourism,Hill station.', 'Situated in the Shimoga district ', 9000, 'Jog Falls is the second-highest plunge waterfall in India, cascading from a height of approximately 830 feet (253 meters).', 'The beauty of Jog Falls lies not only in its impressive height but also in the lush green surroundings and the rugged landscape of the Western Ghats. The area around the falls offers panoramic views and is a popular spot for nature lovers and photographers.The flow of Jog Falls varies significantly with the seasons. It is most spectacular during the monsoon months (July to October), when the Sharavathi River swells with rainfall, creating a powerful cascade that captivates visitors with its thundering sound and misty spray.', 'joggfalls.jpg', '2024-07-01 05:35:41', '2024-07-01 09:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(14, 'Gerald Brain', '0770546590', 'gerald@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-01-15 14:00:35', '2021-07-24 09:49:44'),
(16, 'John Simith', '0770546590', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-24 08:34:08', NULL),
(17, 'kumar', '7894561237', 'kumar@gmail.com', '79cfac6387e0d582f83a29a04d0bcdc4', '2024-07-01 05:49:02', NULL),
(18, 'ram', '9865214478', 'ram@gmail.com', '4641999a7679fcaef2df0e26d11e3c72', '2024-07-01 05:56:22', NULL),
(19, 'pant', '7894561238', 'pant@gmail.com', '886b4234d8b36f85238d8b25b2488267', '2024-07-01 06:03:57', NULL),
(20, 'Niranjan', '8792262852', 'niranjancb2035@gmail.com', '540c759ba5e2041940fff626d60009d1', '2024-07-01 08:54:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
