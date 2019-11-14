-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-11-14 14:53:28
-- 服务器版本： 8.0.17
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `db`
--

-- --------------------------------------------------------

--
-- 表的结构 `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `customer_id` int(11) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `accounts`
--

INSERT INTO `accounts` (`customer_id`, `balance`) VALUES
(4001, 105),
(4002, 30),
(4003, 300),
(4004, 20),
(4005, 264),
(4006, 2),
(4007, 90),
(4008, 150),
(4009, 725),
(4010, 185),
(4011, 210),
(4012, 88),
(4013, 797),
(4014, 1115),
(4015, 2230),
(4016, 1064),
(4017, 700),
(4018, 190),
(4019, 55),
(4020, 72),
(4021, 95),
(4022, 380),
(4023, 380),
(4024, 45),
(4025, 0),
(4026, 0),
(4027, 0),
(4028, 0),
(4029, 0),
(4030, 0),
(4031, 0),
(4032, 0),
(4033, 0),
(4034, 0),
(4035, 0),
(4036, 0),
(4037, 10),
(4038, 300),
(4039, 430),
(4040, 164),
(4041, 25),
(4042, 670),
(4043, 0),
(4044, 0),
(4045, 0),
(4046, 455),
(4047, 520),
(4048, 600),
(4049, 280),
(4050, 0);

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `customer_address_street` char(50) DEFAULT NULL,
  `customer_address_city` char(30) DEFAULT NULL,
  `customer_address_state` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `customer_address_zip` char(10) DEFAULT NULL,
  `customer_type` char(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address_street`, `customer_address_city`, `customer_address_state`, `customer_address_zip`, `customer_type`) VALUES
(4001, 'Stannis Baratheon', '226 Bates', 'Tampa', 'FL', '25556', 'Home'),
(4002, 'Tormund Giantsbane', '2 Semple', 'Tampa', 'FL', '25556', 'Home'),
(4003, 'Viserys Targaryen', '226 McKee', 'Tampa', 'FL', '25556', 'Home'),
(4004, 'Khal Drogo', '6 Halket', 'Boston', 'MA', '18998', 'Home'),
(4005, 'Eddard Stark', '2 Meyran', 'Boston', 'MA', '18998', 'Home'),
(4006, 'Meryn Trant', '2666 York', 'Boston', 'MA', '18998', 'Home'),
(4007, 'Podrick Payne', '5 Atwood', 'New York', 'NY', '10010', 'Home'),
(4008, 'Jaqen Hghar', '55655 Pier', 'New York', 'NY', '10010', 'Home'),
(4009, 'Lommy Greenhands', '555 Louisa', 'New York', 'NY', '10010', 'Home'),
(4010, 'Syrio Forel', '5 Lothrop', 'New York', 'NY', '10010', 'Home'),
(4011, 'Lysa Arryn', '23 Coltart', 'San Francisco', 'CA', '63256', 'Home'),
(4012, 'Salladhor Saan', '568 Eular', 'San Francisco', 'CA', '63256', 'Home'),
(4013, 'Ellaria Sand', '55 Melba', 'San Francisco', 'CA', '63256', 'Home'),
(4014, 'Meera Reed', '5 Dawson', 'San Diego', 'CA', '65332', 'Home'),
(4015, 'Rodrik Cassel', '454 Bayard', 'San Diego', 'CA', '65332', 'Home'),
(4016, 'Grey Worm', '84 Darragh', 'San Diego', 'CA', '65332', 'Home'),
(4017, 'Edmure Tully', '898 Bouquet', 'Los Angeles', 'CA', '32665', 'Home'),
(4018, 'Olenna Redwyne', '6 Schenley', 'Los Angeles', 'CA', '32665', 'Home'),
(4019, 'Alliser Thorne', '54 Bigelow', 'Portland', 'OR', '36559', 'Home'),
(4020, 'Tycho Nestoris', '564 Thackeray', 'Portland', 'OR', '36559', 'Home'),
(4021, 'Pyat Pree', '5 Ohara', 'Seattle', 'WA', '65658', 'Home'),
(4022, 'Mirri MazDuur', '6546 Lytton', 'Seattle', 'WA', '65658', 'Home'),
(4023, 'Sandor Clegane', '65 Ruskin', 'Birmingham', 'AL', '44456', 'Home'),
(4024, 'Jojen Reed', '987 Dithridge', 'Birmingham', 'AL', '44456', 'Home'),
(4025, 'Rhaegar Targaryen', '85 Craig', 'Birmingham', 'AL', '44456', 'Home'),
(4026, 'Gerold Hightower', '987 Neville', 'Philadelphia', 'PA', '32666', 'Home'),
(4027, 'Alester Florent', '98 Centre', 'Philadelphia', 'PA', '32666', 'Home'),
(4028, 'Walder Frey', '78 Devonshire', 'Philadelphia', 'PA', '32666', 'Home'),
(4029, 'Jeyne Westerling', '798 Dawson', 'Philadelphia', 'PA', '32666', 'Home'),
(4030, 'Beric Dondarrion', '789 Bayard', 'Philadelphia', 'PA', '32666', 'Home'),
(4031, 'Donal Noye', '5646 Darragh', 'Philadelphia', 'PA', '32666', 'Home'),
(4032, 'Ilyn Payne', '87 Ohara', 'Atlanta', 'GA', '35666', 'Home'),
(4033, 'Addam Marbrand', '98 Lytton', 'Atlanta', 'GA', '35666', 'Home'),
(4034, 'Vargo Hoat', '897 Ruskin', 'Atlanta', 'GA', '35666', 'Home'),
(4035, 'Daario Naharis', '89 Dithridge', 'Atlanta', 'GA', '35666', 'Home'),
(4036, 'Balon Greyjoy', '79 Meyran', 'Phoenix', 'AZ', '74774', 'Home'),
(4037, 'Golden Company', '564 York', 'Phoenix', 'AZ', '74774', 'Business'),
(4038, 'Rainbow Guard', '546 Atwood', 'Phoenix', 'AZ', '74774', 'Business'),
(4039, 'Faceless Men', '564 Bates', 'Phoenix', 'AZ', '74774', 'Business'),
(4040, 'Kingsguard', '8 Semple', 'Miami', 'FL', '23665', 'Business'),
(4041, 'Iron Bank', '498 McKee', 'Miami', 'FL', '23665', 'Business'),
(4042, 'Brave Companions', '56 Lytton', 'Miami', 'FL', '23665', 'Business'),
(4043, 'Stormcrows', '456 Ruskin', 'Seattle', 'WA', '65658', 'Business'),
(4044, 'Windblown', '1 Dithridge', 'Seattle', 'WA', '65658', 'Business'),
(4045, 'Second Sons', '21 Craig', 'seattle', 'WA', '65658', 'Business'),
(4046, 'Nights Watch', '321 Neville', 'New York', 'NY', '10010', 'Business'),
(4047, 'Poor Fellows', '54 Centre', 'New York', 'NY', '10010', 'Business'),
(4048, 'Iron Fleet', '668 Meyran', 'New York', 'NY', '10010', 'Business'),
(4049, 'Spicers', '89 York', 'New York', 'NY', '10010', 'Business'),
(4050, 'Kingswood Brotherhood', '8 Atwood', 'New York', 'NY', '10010', 'Business');

-- --------------------------------------------------------

--
-- 表的结构 `customer_business`
--

DROP TABLE IF EXISTS `customer_business`;
CREATE TABLE IF NOT EXISTS `customer_business` (
  `customer_id` int(11) NOT NULL,
  `customer_type` char(10) DEFAULT NULL,
  `business_category` char(20) DEFAULT NULL,
  `business_income` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `customer_business`
--

INSERT INTO `customer_business` (`customer_id`, `customer_type`, `business_category`, `business_income`) VALUES
(4037, 'Business', 'Academic', 50000),
(4038, 'Business', 'Academic', 750000),
(4039, 'Business', 'Pro Sports', 300000),
(4040, 'Business', 'Pro Sports', 10000),
(4041, 'Business', 'Banking', 350000000),
(4042, 'Business', 'Amateur Sports', 15000),
(4043, 'Business', 'Amateur Sports', 125000),
(4044, 'Business', 'College Sports', 80000),
(4045, 'Business', 'College Sports', 254000),
(4046, 'Business', 'College Sports', 25000),
(4047, 'Business', 'Academic', 5000),
(4048, 'Business', 'Recreational Resort', 475000),
(4049, 'Business', 'Recreational Resort', 968000),
(4050, 'Business', 'Recreational Resort', 5000000);

-- --------------------------------------------------------

--
-- 表的结构 `customer_home`
--

DROP TABLE IF EXISTS `customer_home`;
CREATE TABLE IF NOT EXISTS `customer_home` (
  `customer_id` int(11) NOT NULL,
  `customer_type` char(20) DEFAULT NULL,
  `marriage_status` char(10) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `home_income` double DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `customer_home`
--

INSERT INTO `customer_home` (`customer_id`, `customer_type`, `marriage_status`, `gender`, `age`, `home_income`) VALUES
(4001, 'Home', 'Married', 'M', 45, 10000),
(4002, 'Home', 'Single', 'M', 50, 65000),
(4003, 'Home', 'Single', 'M', 22, 33000),
(4004, 'Home', 'Married', 'M', 30, 22000),
(4005, 'Home', 'Married', 'M', 40, 56000),
(4006, 'Home', 'Married', 'M', 60, 150000),
(4007, 'Home', 'Single', 'M', 16, 125000),
(4008, 'Home', 'Single', 'M', 28, 135000),
(4009, 'Home', 'Single', 'M', 12, 250000),
(4010, 'Home', 'Single', 'M', 45, 35000),
(4011, 'Home', 'Married', 'F', 50, 65000),
(4012, 'Home', 'Single', 'M', 60, 75000),
(4013, 'Home', 'Single', 'F', 18, 85000),
(4014, 'Home', 'Single', 'F', 14, 90000),
(4015, 'Home', 'Married', 'M', 36, 100000),
(4016, 'Home', 'Single', 'M', 23, 20000),
(4017, 'Home', 'Married', 'M', 38, 35000),
(4018, 'Home', 'Married', 'F', 73, 35000),
(4019, 'Home', 'Single', 'M', 51, 40000),
(4020, 'Home', 'Single', 'M', 23, 60000),
(4021, 'Home', 'Single', 'M', 47, 80000),
(4022, 'Home', 'Single', 'F', 53, 90000),
(4023, 'Home', 'Single', 'M', 39, 41000),
(4024, 'Home', 'Single', 'M', 12, 42000),
(4025, 'Home', 'Married', 'M', 32, 43000),
(4026, 'Home', 'Married', 'M', 51, 65000),
(4027, 'Home', 'Single', 'M', 57, 89000),
(4028, 'Home', 'Married', 'M', 83, 99000),
(4029, 'Home', 'Married', 'F', 17, 100000),
(4030, 'Home', 'Single', 'M', 47, 82000),
(4031, 'Home', 'Single', 'M', 43, 76000),
(4032, 'Home', 'Single', 'M', 51, 84000),
(4033, 'Home', 'Single', 'M', 63, 85000),
(4034, 'Home', 'Single', 'M', 33, 15000),
(4035, 'Home', 'Single', 'M', 28, 45000),
(4036, 'Home', 'Single', 'M', 52, 44000);

-- --------------------------------------------------------

--
-- 表的结构 `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emp_address_street` char(50) DEFAULT NULL,
  `emp_address_city` char(30) DEFAULT NULL,
  `emp_address_state` char(20) DEFAULT NULL,
  `emp_address_zip` char(10) DEFAULT NULL,
  `email` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_address_street`, `emp_address_city`, `emp_address_state`, `emp_address_zip`, `email`) VALUES
(3001, 'Arya Stark', '5 McFarland', 'Portland', 'OR', '36559', 'AryaStark@ricks.com'),
(3002, 'Arys Oakheart', '226 Washington', 'Portland', 'OR', '36559', 'ArysOakheart@ricks.com'),
(3003, 'Barriston Selmy', '55 Banksville', 'Portland', 'OR', '36559', 'BarristonSelmy@ricks.com'),
(3004, 'Bowen Marsh', '5 Williamsburg', 'Seattle', 'WA', '65658', 'BowenMarsh@ricks.com'),
(3005, 'Bran Stark', '2 Longuevue', 'Seattle', 'WA', '65658', 'BranStark@ricks.com'),
(3006, 'Brienne Tarth', '6546 Seminole', 'San Francisco', 'CA', '63256', 'BrienneTarth@ricks.com'),
(3007, 'Catelyn Stark', '65 Ordale', 'New York', 'NY', '10010', 'CatelynStark@ricks.com'),
(3008, 'Cotter Pyke', '226 Mayview', 'New York', 'NY', '10010', 'CotterPyke@ricks.com'),
(3009, 'Jaime Lannister', '6 Cedar', 'New York', 'NY', '10010', 'JaimeLannister@ricks.com'),
(3010, 'Janos Slynt', '454 Cochran', 'Boston', 'MA', '18998', 'JanosSlynt@ricks.com'),
(3011, 'Jon Connington', '987 Beverly', 'Montpellier', 'VT', '78878', 'JonConnington@ricks.com'),
(3012, 'Jorah Mormont', '2 Orchard', 'Concord', 'NH', '98865', 'JorahMormont@ricks.com'),
(3013, 'Mace Tyrell', '84 Cedarhurst', 'Tampa', 'FL', '25556', 'MaceTyrell@ricks.com'),
(3014, 'Margery Tyrell', '898 Folkstone', 'Birmingham', 'AL', '45125', 'MargeryTyrell@ricks.com'),
(3015, 'Nymeria Sand', '2666 Greenhurst', 'New Orleans', 'LA', '15642', 'NymeriaSand@ricks.com'),
(3016, 'Petyr Balish', '85 Shady', 'Charleston', 'SC', '15213', 'PetyrBalish@ricks.com'),
(3017, 'Quenten Martell', '798 Hillview', 'Philadelphia', 'PA', '32666', 'QuentenMartell@ricks.com'),
(3018, 'Ramsey Snow', '789 Lindendale', 'Tampa', 'FL', '25556', 'RamseySnow@ricks.com'),
(3019, 'Roose Bolton', '555 Hazel', 'Orlando', 'FL', '25584', 'RooseBolton@ricks.com'),
(3020, 'Sam Tarly', '5 Aldine', 'Birmingham', 'AL', '44456', 'SamTarly@ricks.com'),
(3021, 'Sansa Stark', '6 Diversey', 'San Francisco', 'CA', '63256', 'SansaStark@ricks.com'),
(3022, 'Theon Greyjoy', '5646 Halstead', 'Los Angeles', 'CA', '32665', 'TheonGreyjoy@ricks.com'),
(3023, 'Tywin Lannister', '23 Southport', 'Los Angeles', 'CA', '32665', 'TywinLannister@ricks.com'),
(3024, 'Victarion Greyjoy', '54 Addison', 'Oakland', 'CA', '65325', 'VictarionGreyjoy@ricks.com'),
(3025, 'Robert Baratheon', '564 Clark', 'Hartford', 'CT', '54885', 'RobertBaratheon@ricks.com'),
(3026, 'Joanna Lannister', '568 Lakeview', 'New York', 'NY', '10010', 'JoannaLannister@ricks.com'),
(3027, 'Loras Tyrell', '87 Wolfram', 'New York', 'NY', '10010', 'LorasTyrell@ricks.com'),
(3028, 'Aegon Targaryen', '987 Polk', 'Los Angeles', 'CA', '32665', 'AegonTargaryen@ricks.com'),
(3029, 'Elia Martell', '98 Harrison', 'San Diego', 'CA', '65332', 'EliaMartell@ricks.com'),
(3030, 'Areo Hotah', '78 Independence', 'San Diego', 'CA', '65332', 'AreoHotah@ricks.com'),
(3031, 'Hugor Hill', '5 Dupont', 'San Diego', 'CA', '65332', 'HugorHill@ricks.com'),
(3032, 'Azor Ahai', '55655 Maple', 'San Francisco', 'CA', '63256', 'AzorAhai@ricks.com'),
(3033, 'Jon Snow', '75 Broadway', 'New York', 'NY', '10001', 'JonSnow@ricks.com'),
(3034, 'Cersei Lannister', '400 Palm', 'Miami', 'FL', '65993', 'CerseiLannister@ricks.com'),
(3035, 'Robb Stark', '1800 Liberty', 'Philadelphia', 'PA', '22888', 'RobbStark@ricks.com'),
(3036, 'Dany Targaryen', '97 Bay', 'San Francisco', 'CA', '65488', 'DanyTargaryen@ricks.com'),
(3037, 'Mance Rayder', '500 38th', 'New York', 'NY', '10001', 'ManceRayder@ricks.com'),
(3038, 'Oberyn Martell', '12 Brady', 'Boston', 'MA', '15663', 'OberynMartell@ricks.com'),
(3039, 'Gregor Clegane', '642 Sunset', 'Miami', 'FL', '65993', 'GregorClegane@ricks.com'),
(3040, 'Joffrey Baratheon', '1200 Peach', 'Atlanta', 'GA', '14455', 'JoffreyBaratheon@ricks.com'),
(3041, 'Eddard Stark', '35 Spring', 'Philadelphia', 'PA', '22888', 'EddardStark@ricks.com'),
(3042, 'Asha Greyjoy', '977 Hill', 'San Francisco', 'CA', '65488', 'AshaGreyjoy@ricks.com'),
(3043, 'Tyrion Lannister', '64 Oak', 'Portland', 'OR', '66535', 'TyrionLannister@ricks.com'),
(3044, 'Davos Seaworth', '3700 Horseshoe', 'Las Vegas', 'NV', '56698', 'DavosSeaworth@ricks.com');

-- --------------------------------------------------------

--
-- 表的结构 `metadata`
--

DROP TABLE IF EXISTS `metadata`;
CREATE TABLE IF NOT EXISTS `metadata` (
  `table_id` int(11) NOT NULL,
  `TABLE_NAME` char(30) DEFAULT NULL,
  `number_of_fields` int(11) DEFAULT NULL,
  `number_of_primary_keys` int(11) DEFAULT NULL,
  `number_of_foreign_keys` int(11) DEFAULT NULL,
  `number_of_indexes` int(11) DEFAULT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `metadata`
--

INSERT INTO `metadata` (`table_id`, `TABLE_NAME`, `number_of_fields`, `number_of_primary_keys`, `number_of_foreign_keys`, `number_of_indexes`) VALUES
(9001, 'Customer', 7, 1, 0, 1),
(9002, 'Customer_Business', 4, 1, 1, 0),
(9003, 'Customer_Home', 6, 1, 1, 0),
(9004, 'Product', 6, 1, 0, 1),
(9005, 'Region', 3, 1, 0, 0),
(9006, 'Salesperson', 10, 1, 1, 2),
(9007, 'Store', 9, 1, 1, 1),
(9008, 'Transaction', 7, 1, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `product_name` char(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `product_type` char(20) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `quantity`, `price`, `unit_cost`, `product_type`) VALUES
(7001, 'soccer ball', 3, 10, 5, 'soccer'),
(7002, 'football', 6, 11, 6, 'football'),
(7003, 'basketball', 9, 12, 7, 'basketball'),
(7004, 'volleyball', 8, 13, 8, 'volleyball'),
(7005, 'baseball', 7, 5, 2, 'baseball'),
(7006, 'bike', 4, 670, 400, 'cycling'),
(7007, 'bike helmet', 5, 25, 13, 'cycling'),
(7008, 'ski helmet', 2, 50, 25, 'skiing'),
(7009, 'football helmet', 5, 80, 50, 'football'),
(7010, 'soccer shoes', 8, 60, 50, 'soccer'),
(7011, 'football shoes', 9, 60, 50, 'football'),
(7012, 'bicycle shoes', 6, 75, 60, 'cycling'),
(7013, 'ski boots', 3, 150, 100, 'skiing'),
(7014, 'bike tires', 1, 20, 15, 'cycling'),
(7015, 'hockey stick', 2, 66, 56, 'hockey'),
(7016, 'hockey puck', 5, 2, 1, 'hockey'),
(7017, 'hockey skates', 4, 45, 30, 'hockey'),
(7018, 'hockey helmet', 8, 30, 20, 'hockey'),
(7019, 'tennis racquet', 9, 145, 110, 'tennis'),
(7020, 'tennis ball', 6, 2, 1, 'tennis'),
(7021, 'hockey gloves', 58, 55, 30, 'hockey'),
(7022, 'soccer shin guards', 2, 14, 8, 'soccer'),
(7023, 'football gloves', 1, 12, 8, 'football'),
(7024, 'basketball hoop', 4, 250, 150, 'basketball'),
(7025, 'hockey goal', 3, 65, 35, 'hockey'),
(7026, 'soccer goal', 3, 60, 30, 'soccer'),
(7027, 'volleyball net', 2, 30, 28, 'volleyball'),
(7028, 'baseball bat', 4, 95, 90, 'baseball'),
(7029, 'baseball glove', 4, 55, 50, 'baseball'),
(7030, 'batting helmet', 2, 72, 60, 'baseball');

-- --------------------------------------------------------

--
-- 表的结构 `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(11) NOT NULL,
  `region_name` char(30) DEFAULT NULL,
  `region_manager` char(50) DEFAULT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `region`
--

INSERT INTO `region` (`region_id`, `region_name`, `region_manager`) VALUES
(1001, 'North', '3033'),
(1002, 'South', '3034'),
(1003, 'East', '3035'),
(1004, 'West', '3036');

-- --------------------------------------------------------

--
-- 表的结构 `salesperson`
--

DROP TABLE IF EXISTS `salesperson`;
CREATE TABLE IF NOT EXISTS `salesperson` (
  `emp_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `title` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `salesperson`
--

INSERT INTO `salesperson` (`emp_id`, `store_id`, `title`, `salary`) VALUES
(3001, 2008, 'Senior Sales Associate', 60000),
(3002, 2008, 'Junior Sales Associate', 45000),
(3003, 2008, 'Sales Trainee', 25000),
(3004, 2008, 'Sales Trainee', 26000),
(3005, 2008, 'Junior Sales Associate', 47000),
(3006, 2008, 'Senior Sales Associate', 65000),
(3007, 2002, 'Senior Sales Associate', 70000),
(3008, 2002, 'Junior Sales Associate', 55000),
(3009, 2002, 'Junior Sales Associate', 37000),
(3010, 2002, 'Sales Trainee', 27000),
(3011, 2002, 'Senior Sales Associate', 75000),
(3012, 2002, 'Junior Sales Associate', 50000),
(3013, 2004, 'Sales Trainee', 26500),
(3014, 2004, 'Sales Trainee', 23000),
(3015, 2004, 'Junior Sales Associate', 51000),
(3016, 2004, 'Senior Sales Associate', 77000),
(3017, 2005, 'Senior Sales Associate', 62000),
(3018, 2003, 'Senior Sales Associate', 63500),
(3019, 2003, 'Junior Sales Associate', 53000),
(3020, 2003, 'Junior Sales Associate', 45500),
(3021, 2007, 'Sales Trainee', 22000),
(3022, 2007, 'Senior Sales Associate', 74500),
(3023, 2007, 'Junior Sales Associate', 43500),
(3024, 2007, 'Sales Trainee', 23500),
(3025, 2001, 'Sales Trainee', 22500),
(3026, 2001, 'Junior Sales Associate', 42500),
(3027, 2001, 'Senior Sales Associate', 72000),
(3028, 2006, 'Senior Sales Associate', 85600),
(3029, 2006, 'Senior Sales Associate', 93500),
(3030, 2006, 'Senior Sales Associate', 65500),
(3031, 2006, 'Junior Sales Associate', 52000),
(3032, 2006, 'Junior Sales Associate', 52500);

-- --------------------------------------------------------

--
-- 表的结构 `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL,
  `store_name` char(20) DEFAULT NULL,
  `store_address_street` char(50) DEFAULT NULL,
  `store_address_city` char(30) DEFAULT NULL,
  `store_address_state` char(20) DEFAULT NULL,
  `store_address_zip` char(10) DEFAULT NULL,
  `store_manager` char(50) DEFAULT NULL,
  `number_of_salespersons` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`store_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_address_street`, `store_address_city`, `store_address_state`, `store_address_zip`, `store_manager`, `number_of_salespersons`, `region_id`) VALUES
(2001, 'Westeros', '87 Markham', 'New York', 'NY', '10001', '3037', 3, 1001),
(2002, 'Essos', '65 Inglewood', 'Boston', 'MA', '15663', '3038', 6, 1001),
(2003, 'Sothoryos', '87 Seneca', 'Miami', 'FL', '65993', '3039', 3, 1002),
(2004, 'Iron Islands', '65 Woodhaven', 'Atlanta', 'GA', '14455', '3040', 4, 1002),
(2005, 'Riverlands', '32 Crescent', 'Philadelphia', 'PA', '22888', '3041', 1, 1003),
(2006, 'Qarth', '12 McConnell', 'San Francisco', 'CA', '65488', '3042', 5, 1004),
(2007, 'Stormlands', '65 James', 'Portland', 'OR', '66535', '3043', 4, 1004),
(2008, 'Dorne', '65 Altadena', 'Las Vegas', 'NV', '56698', '3044', 6, 1004);

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `emp_id` (`emp_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`order_id`, `order_date`, `emp_id`, `product_id`, `customer_id`, `product_quantity`, `price`) VALUES
(8001, '2014-11-01', 3002, 7001, 4037, 1, 10),
(8002, '2014-09-21', 3005, 7002, 4038, 2, 11),
(8003, '2014-01-01', 3008, 7001, 4039, 3, 10),
(8004, '2014-02-05', 3009, 7002, 4040, 4, 11),
(8005, '2014-03-08', 3012, 7005, 4041, 5, 5),
(8006, '2014-04-15', 3015, 7006, 4042, 1, 670),
(8007, '2014-05-21', 3031, 7007, 4046, 1, 25),
(8008, '2014-06-25', 3032, 7008, 4047, 2, 50),
(8009, '2014-07-28', 3019, 7009, 4048, 5, 80),
(8010, '2014-08-15', 3020, 7010, 4049, 2, 60),
(8011, '2014-09-10', 3023, 7001, 4001, 3, 10),
(8012, '2014-10-25', 3026, 7001, 4002, 3, 10),
(8013, '2014-11-02', 3003, 7013, 4003, 2, 150),
(8014, '2014-12-05', 3004, 7014, 4004, 1, 20),
(8015, '2014-01-09', 3010, 7015, 4005, 4, 66),
(8016, '2014-01-15', 3013, 7016, 4006, 1, 2),
(8017, '2014-01-13', 3014, 7017, 4007, 2, 45),
(8018, '2014-07-25', 3021, 7018, 4008, 5, 30),
(8019, '2014-07-15', 3024, 7019, 4009, 5, 145),
(8020, '2014-07-14', 3025, 7020, 4010, 5, 2),
(8021, '2014-08-14', 3001, 7021, 4011, 3, 55),
(8022, '2014-08-14', 3006, 7022, 4012, 2, 14),
(8023, '2014-08-14', 3007, 7023, 4013, 1, 12),
(8024, '2014-08-14', 3011, 7001, 4014, 2, 10),
(8025, '2014-10-25', 3016, 7021, 4015, 1, 55),
(8026, '2014-10-25', 3028, 7022, 4016, 1, 14),
(8027, '2014-10-25', 3029, 7027, 4017, 1, 30),
(8028, '2014-07-24', 3030, 7028, 4018, 2, 95),
(8029, '2014-04-25', 3017, 7029, 4019, 1, 55),
(8030, '2014-03-25', 3018, 7030, 4020, 1, 72),
(8031, '2014-06-25', 3022, 7028, 4021, 1, 95),
(8032, '2014-01-01', 3027, 7028, 4022, 4, 95),
(8033, '2014-01-01', 3002, 7028, 4023, 4, 95),
(8034, '2014-09-30', 3005, 7017, 4024, 1, 45),
(8035, '2014-02-28', 3008, 7018, 4013, 2, 30),
(8036, '2014-03-05', 3009, 7019, 4014, 2, 145),
(8037, '2014-04-04', 3002, 7006, 4015, 3, 670),
(8038, '2014-01-18', 3005, 7007, 4016, 5, 25),
(8039, '2014-12-22', 3008, 7006, 4017, 1, 670),
(8040, '2014-04-27', 3009, 7007, 4010, 7, 25),
(8041, '2014-04-27', 3002, 7017, 4011, 1, 45),
(8042, '2014-04-27', 3005, 7018, 4012, 2, 30),
(8043, '2014-05-06', 3008, 7019, 4013, 5, 145),
(8044, '2014-01-19', 3009, 7017, 4014, 9, 45),
(8045, '2014-11-25', 3013, 7018, 4015, 3, 30),
(8046, '2014-05-18', 3014, 7019, 4016, 5, 145),
(8047, '2014-05-19', 3021, 7008, 4046, 4, 50),
(8048, '2014-04-25', 3013, 7009, 4047, 4, 80),
(8049, '2014-06-13', 3014, 7008, 4048, 4, 50),
(8050, '2014-05-20', 3021, 7009, 4049, 2, 80),
(8051, '2014-09-20', 3030, 7007, 4001, 3, 25),
(8052, '2014-11-20', 3017, 7008, 4038, 6, 50),
(8053, '2014-11-25', 3018, 7009, 4039, 5, 80),
(8054, '2014-12-12', 3022, 7010, 4040, 2, 60),
(8055, '2014-12-13', 3030, 7008, 4042, 1, 50),
(8056, '2014-12-24', 3017, 7009, 4046, 1, 80),
(8057, '2014-12-13', 3018, 7008, 4047, 2, 50),
(8058, '2014-12-05', 3022, 7009, 4014, 5, 80),
(8059, '2014-12-09', 3030, 7007, 4015, 3, 25),
(8060, '2014-12-08', 3017, 7008, 4016, 4, 50),
(8061, '2014-12-24', 3018, 7008, 4046, 1, 50),
(8062, '2014-12-21', 3022, 7008, 4046, 2, 50);

--
-- 限制导出的表
--

--
-- 限制表 `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- 限制表 `customer_business`
--
ALTER TABLE `customer_business`
  ADD CONSTRAINT `customer_business_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- 限制表 `customer_home`
--
ALTER TABLE `customer_home`
  ADD CONSTRAINT `customer_home_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- 限制表 `salesperson`
--
ALTER TABLE `salesperson`
  ADD CONSTRAINT `salesperson_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- 限制表 `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`);

--
-- 限制表 `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `salesperson` (`emp_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
