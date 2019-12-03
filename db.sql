-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-12-03 05:19:31
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `accounts`
--

INSERT INTO `accounts` (`customer_id`, `balance`) VALUES
(4001, 80042),
(4002, 30057),
(4003, 9007),
(4004, 15000),
(4005, 96544),
(4006, 55412),
(4007, 90000),
(4008, 90099),
(4009, 66500),
(4010, 90054),
(4011, 130000),
(4012, 54896),
(4013, 96400),
(4014, 41200),
(4015, 66000),
(4016, 54136),
(4017, 340561),
(4018, 1933),
(4019, 90477),
(4020, 69551),
(4021, 900),
(4022, 785),
(4023, 91561),
(4024, 90561),
(4025, 44125),
(4026, 90000),
(4027, 50000),
(4028, 61811),
(4029, 48181),
(4030, 21112),
(4031, 98983),
(4032, 84711),
(4033, 33515),
(4034, 98177),
(4035, 68498),
(4036, 56652),
(4037, 44896),
(4038, 41423),
(4039, 90000),
(4040, 23115),
(4041, 98498),
(4042, 65165),
(4043, 36115),
(4044, 19889),
(4045, 69166),
(4046, 65489),
(4047, 33641),
(4048, 20114),
(4049, 90630),
(4050, 84400),
(4051, 74457),
(4052, 90221),
(4053, 0),
(4054, 0),
(4055, 0),
(4056, 0);

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_address_street` char(50) DEFAULT NULL,
  `customer_address_city` char(30) DEFAULT NULL,
  `customer_address_state` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_address_zip` char(10) DEFAULT NULL,
  `customer_type` char(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address_street`, `customer_address_city`, `customer_address_state`, `customer_address_zip`, `customer_type`) VALUES
(4001, 'Stan Bara', '2262 Bates ST', 'Tampa', 'FL', '25556', 'Home'),
(4002, 'Tormund Giants', '2 Semple RD', 'Tampa', 'FL', '25556', 'Home'),
(4003, 'Viserys Targaryen', '226 McKee ST', 'Tampa', 'FL', '25556', 'home'),
(4004, 'Khal Drogo', '6 Halket RD', 'Boston', 'MA', '18998', 'Home'),
(4005, 'Eddard Stark', '2 Meyran Walk', 'Boston', 'MA', '18998', 'Home'),
(4006, 'Meryn Trant', '2666 York ST', 'Boston', 'MA', '18998', 'Home'),
(4007, 'Podrick Payne', '52 Atwood ST', 'New York', 'NY', '10010', 'Home'),
(4008, 'Jaqen Hghar', '55655 Pier ST', 'New York', 'NY', '10010', 'Home'),
(4009, 'Lommy Greenhands', ' 5587 Hobart ST', 'New York', 'NY', '10010', 'Home'),
(4010, 'Syrio Forel', '5 Lothrop RD', 'New York', 'NY', '10010', 'Home'),
(4011, 'Lysa Arryn', '23 Coltart RD', 'San Francisco', 'CA', '63256', 'Home'),
(4012, 'Salladhor Saan', '568 Eular RD', 'San Francisco', 'CA', '63256', 'Home'),
(4013, 'Ellaria Sand', '553 Melba ST', 'San Francisco', 'CA', '63256', 'Home'),
(4014, 'Meera Reed', '57 Dawson', 'San Diego', 'CA', '65332', 'Home'),
(4015, 'Rodrik Cassel', '454 Bayard ST', 'San Diego', 'CA', '65332', 'Home'),
(4016, 'Grey Worm', '841 Darragh', 'San Diego', 'CA', '65332', 'Home'),
(4017, 'Edmure Tully', '898 Bouquet ST', 'Los Angeles', 'CA', '32665', 'Home'),
(4018, 'Olenna Redwyne', '677 Schenley', 'Los Angeles', 'CA', '32665', 'Home'),
(4019, 'Alliser Thorne', '54 Bigelow', 'Portland', 'OR', '36559', 'Home'),
(4020, 'Tycho Nestoris', '564 Thackeray', 'Portland', 'OR', '36559', 'Home'),
(4021, 'Pyat Pree', '5 Ohara RD', 'Seattle', 'WA', '65658', 'Home'),
(4022, 'Mirri MazDuur', '6546 Lytton Walk', 'Seattle', 'WA', '65658', 'Home'),
(4023, 'Sandor Clegane', '65 South Ruskin', 'Birmingham', 'AL', '44456', 'Home'),
(4024, 'Jojen Reed', '987 Dithridge RD', 'Birmingham', 'AL', '44456', 'Home'),
(4025, 'Rhaegar Targaryen', '85 Craig Walk', 'Birmingham', 'AL', '44456', 'Home'),
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
(4050, 'Kingswood Brotherhood', '8 Atwood', 'New York', 'NY', '10010', 'Business'),
(4051, 'Dixie Wayne', '5562 Hoabrt ST', 'Pittsburgh', 'PA', '15217', 'Home'),
(4052, 'How Roach', '5524 Becon ST', 'Pittsburgh', 'CA', '15222', 'Home'),
(4053, 'Jiki Joe', '5890 Hoabrt ST', 'Pittsburgh', 'PA', '15217', 'Business'),
(4054, 'kiki', '5532 White', 'Pittsburgh', 'PA', '15217', 'Business'),
(4055, 'Omega Quake', '61 North Baker RD', 'Riverside', 'CA', '92511', 'Business'),
(4056, 'Neko Yun', '87 Everton DR', 'Riverside', 'CA', '92503', 'Business');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `customer_business`
--

INSERT INTO `customer_business` (`customer_id`, `customer_type`, `business_category`, `business_income`) VALUES
(4037, 'Business', 'Academic Govern', 50000),
(4038, 'Business', 'Academic Research', 750000),
(4039, 'Business', 'Racer', 300000),
(4040, 'Business', 'Racer', 10000),
(4041, 'Business', 'Banking', 3500000),
(4042, 'Business', 'Water', 15000),
(4043, 'Business', 'Water', 125000),
(4044, 'Business', 'College', 80000),
(4045, 'Business', 'College', 254000),
(4046, 'Business', 'College', 25000),
(4047, 'Business', 'Academic Govern', 5000),
(4048, 'Business', 'Recreational Resort', 475000),
(4049, 'Business', 'Recreational Resort', 968000),
(4050, 'Business', 'Recreational Resort', 5000000),
(4055, 'Business', 'Government', 200000),
(4056, 'Business', 'Government', 112345);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4007, 'Home', 'Single', 'M', 19, 125000),
(4008, 'Home', 'Single', 'M', 24, 135000),
(4009, 'Home', 'Single', 'M', 19, 250000),
(4010, 'Home', 'Single', 'M', 45, 35000),
(4011, 'Home', 'Married', 'F', 50, 65000),
(4012, 'Home', 'Single', 'M', 60, 75000),
(4013, 'Home', 'Single', 'F', 19, 85000),
(4014, 'Home', 'Single', 'F', 25, 90000),
(4015, 'Home', 'Married', 'M', 39, 100000),
(4016, 'Home', 'Single', 'M', 23, 20000),
(4017, 'Home', 'Married', 'M', 38, 35000),
(4018, 'Home', 'Married', 'F', 73, 35000),
(4019, 'Home', 'Single', 'M', 51, 40000),
(4020, 'Home', 'Single', 'M', 23, 60000),
(4021, 'Home', 'Single', 'M', 47, 80000),
(4022, 'Home', 'Single', 'F', 53, 90000),
(4023, 'Home', 'Single', 'M', 41, 41000),
(4024, 'Home', 'Single', 'M', 31, 42000),
(4025, 'Home', 'Married', 'M', 33, 43000),
(4026, 'Home', 'Married', 'M', 51, 65000),
(4027, 'Home', 'Single', 'M', 57, 89000),
(4028, 'Home', 'Married', 'M', 83, 99000),
(4029, 'Home', 'Married', 'F', 19, 100000),
(4030, 'Home', 'Single', 'M', 47, 82000),
(4031, 'Home', 'Single', 'M', 43, 76000),
(4032, 'Home', 'Single', 'M', 51, 84000),
(4033, 'Home', 'Single', 'M', 63, 85000),
(4034, 'Home', 'Single', 'M', 33, 15000),
(4035, 'Home', 'Single', 'M', 28, 45000),
(4036, 'Home', 'Single', 'M', 52, 44000),
(4052, 'Home', 'Single', 'M', 22, 30000);

-- --------------------------------------------------------

--
-- 表的结构 `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emp_address_street` char(50) DEFAULT NULL,
  `emp_address_city` char(30) DEFAULT NULL,
  `emp_address_state` char(20) DEFAULT NULL,
  `emp_address_zip` char(10) DEFAULT NULL,
  `email` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_address_street`, `emp_address_city`, `emp_address_state`, `emp_address_zip`, `email`) VALUES
(3001, 'Arya Stark', '5 McFarland RD', 'Portland', 'OR', '36559', 'AryaStark@cars.com'),
(3002, 'Arys Oakheart', '226 Washington', 'Portland', 'OR', '36559', 'ArysOakheart@cars.com'),
(3003, 'Barriston Selmy', '55 Banksville RD', 'Portland', 'OR', '36559', 'BarristonSelmy@cars.com'),
(3004, 'Bowen Marsh', '5 Williamsburg', 'Seattle', 'WA', '65658', 'BowenMarsh@cars.com'),
(3005, 'Bran Stark', '2 Longuevue', 'Seattle', 'WA', '65658', 'BranStark@cars.com'),
(3006, 'Brienne Tarth', '654 Seminole ST', 'San Francisco', 'CA', '63256', 'BrienneTarth@cars.com'),
(3007, 'Catelyn Stark', '65 Ordale', 'New York', 'NY', '10010', 'CatelynStark@cars.com'),
(3008, 'Cotter Pyke', '226 Mayview', 'New York', 'NY', '10010', 'CotterPyke@cars.com'),
(3009, 'Jaime Lannister', '6 Cedar Point', 'New York', 'NY', '10010', 'JaimeLannister@cars.com'),
(3010, 'Janos Slynt', '454 Cochran', 'Boston', 'MA', '18998', 'JanosSlynt@cars.com'),
(3011, 'Jon Connington', '987 Beverly', 'Montpellier', 'VT', '78878', 'JonConnington@cars.com'),
(3012, 'Jorah Mormont', '2 Orchard RD', 'Concord', 'NH', '98865', 'JorahMormont@cars.com'),
(3013, 'Mace Tyrell', '84 Cedarhurst RD', 'Tampa', 'FL', '25556', 'MaceTyrell@cars.com'),
(3014, 'Margery Tyrell', '898 Folkstone', 'Birmingham', 'AL', '45125', 'MargeryTyrell@cars.com'),
(3015, 'Nymeria Sand', '2666 Greenhurst', 'New Orleans', 'LA', '15642', 'NymeriaSand@cars.com'),
(3016, 'Petyr Balish', '85 Shadyside', 'Charleston', 'SC', '15213', 'PetyrBalish@cars.com'),
(3017, 'Quenten Martell', '798 Hillview South', 'Philadelphia', 'PA', '32666', 'QuentenMartell@cars.com'),
(3018, 'Ramsey Snow', '789 Lindendale', 'Tampa', 'FL', '25556', 'RamseySnow@cars.com'),
(3019, 'Roose Bolton', '555 Hazel', 'Orlando', 'FL', '25584', 'RooseBolton@cars.com'),
(3020, 'Sam Tarly', '53 Aldine', 'Birmingham', 'AL', '44456', 'SamTarly@cars.com'),
(3021, 'Sansa Stark', '6 Diversey Center', 'San Francisco', 'CA', '63256', 'SansaStark@cars.com'),
(3022, 'Theon Greyjoy', '5646 Halstead', 'Los Angeles', 'CA', '32665', 'TheonGreyjoy@cars.com'),
(3023, 'Tywin Lannister', '233 Southport', 'Los Angeles', 'CA', '32665', 'TywinLannister@cars.com'),
(3024, 'Victarion Greyjoy', '54 Addison East', 'Oakland', 'CA', '65325', 'VictarionGreyjoy@cars.com'),
(3025, 'Robert Baratheon', '564 Clark', 'Hartford', 'CT', '54885', 'RobertBaratheon@cars.com'),
(3026, 'Joanna Lannister', '568 Lakeview ST', 'New York', 'NY', '10010', 'JoannaLannister@cars.com'),
(3027, 'Loras Tyrell', '87 Wolfram ST', 'New York', 'NY', '10010', 'LorasTyrell@cars.com'),
(3028, 'Aegon Targaryen', '987 Polk ST', 'Los Angeles', 'CA', '32665', 'AegonTargaryen@cars.com'),
(3029, 'Elia Martell', '98 Harrison ST', 'San Diego', 'CA', '65332', 'EliaMartell@cars.com'),
(3030, 'Areo Hotah', '78 Independence ST', 'San Diego', 'CA', '65332', 'AreoHotah@cars.com'),
(3031, 'Hugor Hill', '53 Dupont ST', 'San Diego', 'CA', '65332', 'HugorHill@cars.com'),
(3032, 'Azor Ahai', '5355 Maple ST', 'San Francisco', 'CA', '63256', 'AzorAhai@cars.com'),
(3033, 'Jon Snow', '75 Broadway', 'New York', 'NY', '10001', 'JonSnow@cars.m.com'),
(3034, 'Cersei Lannister', '400 Palm', 'Miami', 'FL', '65993', 'CerseiLannister@cars.m.com'),
(3035, 'Robb Stark', '180 Liberty ST', 'Philadelphia', 'PA', '22888', 'RobbStark@cars.m.com'),
(3036, 'Dany Targaryen', '97 Bay ST', 'San Francisco', 'CA', '65488', 'DanyTargaryen@cars.m.com');

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `emp_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `title` char(40) NOT NULL,
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `manager_ibfk_1` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`emp_id`, `store_id`, `title`, `salary`) VALUES
(3033, 2001, 'Manager', 61000),
(3034, 2004, 'Senior Manager', 90000),
(3035, 2005, 'Senior Manager', 95000),
(3036, 2008, 'Manager', 66000);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `car_brand` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `car_model` varchar(40) DEFAULT NULL,
  `car_model_year` int(11) DEFAULT NULL,
  `car_color` char(20) DEFAULT NULL,
  `vin` varchar(20) DEFAULT NULL,
  `car_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `car_brand`, `car_model`, `car_model_year`, `car_color`, `vin`, `car_price`) VALUES
(7004, 'Mercedes-Benz', 'S-Class', 2006, 'Aquamarine', '19XFA1E59BE198640', '96544.00'),
(7005, 'Dodge', 'Ram Wagon B250', 1992, 'Yellow', '4T1BF3EK6BU121433', '61090.00'),
(7007, 'Scion', 'xB', 2006, 'Mauv', 'WP0AB2A80CU340776', '65119.00'),
(7008, 'Ford', 'Fusion', 2008, 'Indigo', 'KMHTC6AD4DU976771', '42910.00'),
(7009, 'Infiniti', 'EX', 2011, 'Maroon', '2T1BU4EE7DC244314', '34125.00'),
(7010, 'Toyota', 'Celica', 1999, 'Goldenrod', 'WP0CA2A84ES536083', '43493.00'),
(7011, 'GMC', 'Rally Wagon G3500', 1995, 'Green', '2G61U5S39D9330389', '84368.00'),
(7012, 'Chevrolet', 'Sportvan G30', 1992, 'Blue', '1GYUCDEF6AR711979', '23248.00'),
(7013, 'Oldsmobile', 'Bravada', 2004, 'Crimson', 'WA1LFBFP8BA320413', '41537.00'),
(7014, 'Volkswagen', 'GTI', 1998, 'Goldenrod', '1GKS1HE07ER020945', '41429.00'),
(7015, 'Ford', 'Mustang', 1994, 'Fuscia', 'WBA3B5C59EF886199', '70430.00'),
(7016, 'Chrysler', 'New Yorker', 1995, 'Mauv', '5GADX33L35D229665', '24166.00'),
(7017, 'Audi', 'Allroad', 2001, 'Khaki', 'WAUJGAFD6FN609361', '79047.00'),
(7018, 'GMC', 'Rally Wagon 1500', 1992, 'Maroon', 'JTEBU5JR7A5847248', '28641.00'),
(7019, 'Toyota', 'Tacoma', 2006, 'Teal', '3G5DB03E22S523350', '67269.00'),
(7020, 'Ford', 'Explorer', 2010, 'Puce', '1C6RD7MT6CS498763', '39133.00'),
(7021, 'GMC', 'Suburban 1500', 1998, 'Goldenrod', 'WVWAA7AJXCW000039', '35123.00'),
(7022, 'Honda', 'Accord', 1996, 'Indigo', 'WA1EV74L58D464646', '79809.00'),
(7023, 'Pontiac', 'Grand Am', 1986, 'Violet', '1GKKRNED5FJ771763', '93682.00'),
(7024, 'Chrysler', 'Cirrus', 1996, 'Orange', '2G4WE537551035917', '99330.00'),
(7025, 'Mercury', 'Tracer', 1992, 'Teal', 'JM1NC2LF1F0173138', '92895.00'),
(7026, 'Mazda', 'Miata MX-5', 2008, 'Khaki', 'JN1BY1AR1EM500708', '34322.00'),
(7027, 'GMC', 'Rally Wagon 3500', 1994, 'Mauv', '5UXZV4C55D0298542', '52891.00'),
(7028, 'Ford', 'F250', 2007, 'Blue', 'WVWAA7AH6AV962130', '37122.00'),
(7029, 'Hyundai', 'Veracruz', 2009, 'Crimson', 'WAUNF98P97A429035', '86861.00'),
(7030, 'Acura', 'RL', 2000, 'Orange', 'WP0AB2A86CU024069', '85541.00'),
(7031, 'Ford', 'Econoline E150', 2001, 'Yellow', '1N6AD0CU1CC426853', '96557.00'),
(7032, 'Mazda', 'Mazda6', 2012, 'Orange', 'ZFBCFABH7EZ869494', '69483.00'),
(7033, 'Ford', 'EXP', 1987, 'Puce', '1GYFK16269R116289', '60628.00'),
(7034, 'Mazda', 'Familia', 1985, 'Crimson', '1D7CW2GKXAS608652', '33277.00'),
(7035, 'Lincoln', 'Navigator', 1998, 'Red', '1G6DE8E50D0279786', '77773.00'),
(7036, 'Ford', 'Econoline E150', 1996, 'Fuscia', '19UUA65586A132062', '69589.00'),
(7037, 'Ford', 'Ranger', 1995, 'Red', 'WAUDL74F16N043173', '49836.00'),
(7038, 'GMC', 'Vandura 2500', 1994, 'Puce', '5J6TF1H53EL864056', '32663.00'),
(7039, 'Dodge', 'Dakota', 2009, 'Green', '1G6YX36D565626023', '21802.00'),
(7040, 'Dodge', 'Viper', 2010, 'Yellow', 'SAJWJ0FF7F8204843', '62171.00'),
(7041, 'Porsche', '944', 1984, 'Mauv', '5TFBW5F11AX277687', '24934.00'),
(7042, 'Ford', 'F-Series Super Duty', 2011, 'Crimson', '3GTU2YEJ8CG931874', '24479.00'),
(7043, 'Mitsubishi', 'Raider', 2009, 'Goldenrod', '5TDBKRFH4ES401981', '99043.00'),
(7044, 'Toyota', 'Highlander', 2004, 'Green', '1FTSW3A5XAE506259', '50175.00'),
(7045, 'Nissan', 'Rogue', 2010, 'Teal', 'WBAUU33529A122202', '67529.00'),
(7046, 'Volvo', 'V70', 2005, 'Turquoise', '1FTSX2B50AE562975', '35482.00'),
(7047, 'Ford', 'Tempo', 1991, 'Aquamarine', '1FMEU6DE6AU160695', '70427.00'),
(7048, 'Mitsubishi', 'Diamante', 1992, 'Blue', 'SCFFDAAE1BG363529', '85948.00'),
(7049, 'Hyundai', 'Genesis', 2012, 'Pink', '1G4GD5G33EF374683', '39194.00'),
(7050, 'Dodge', 'D350', 1993, 'Purple', 'SCBZB25E52C873300', '42361.00'),
(7051, 'Ford', 'E250', 2009, 'Violet', 'JM3TB2MA0A0658528', '28723.00'),
(7052, 'Infiniti', 'Q', 1998, 'Khaki', 'JM1CW2BL1D0349480', '84836.00'),
(7053, 'Mercedes-Benz', 'G55 AMG', 2006, 'Mauv', '1C3CCBAB8DN693011', '34250.00'),
(7054, 'BMW', 'M3', 1999, 'Purple', 'WP0AA2A89EK050523', '77269.00'),
(7055, 'Subaru', 'Baja', 2003, 'Maroon', '2G61V5S34D9812328', '29018.00'),
(7056, 'BMW', '5 Series', 2009, 'Purple', '19XFA1F32AE463720', '95395.00'),
(7057, 'Chevrolet', 'Corvette', 2004, 'Green', 'WDDLJ7DB8EA023872', '21856.00'),
(7058, 'Dodge', 'Viper', 2002, 'Maroon', 'YV4952CYXC1467508', '41938.00'),
(7059, 'Mercedes-Benz', 'SLK-Class', 2009, 'Mauv', 'KL4CJFSB5EB919669', '99196.00'),
(7060, 'Pontiac', 'Firefly', 1987, 'Green', 'WBAPH7C59AA994289', '95080.00'),
(7061, 'Toyota', 'Tundra', 2007, 'Goldenrod', 'NM0KS9BN0AT202477', '56616.00'),
(7062, 'Alfa Romeo', '164', 1995, 'Red', '5GAKRCKD4DJ179418', '47209.00'),
(7063, 'Suzuki', 'SJ', 1992, 'Blue', 'TRUVD38J991575901', '44803.00'),
(7064, 'Hyundai', 'Elantra', 1998, 'Crimson', '4T1BF1FK3DU688852', '74735.00'),
(7065, 'Jeep', 'Compass', 2012, 'Teal', 'JTHDU1EFXA5575279', '71534.00'),
(7066, 'Volvo', 'C30', 2012, 'Fuscia', '1FBNE3BL0AD610332', '43228.00'),
(7067, 'Volvo', 'C70', 2004, 'Red', '1G6KS54Y93U944105', '78806.00'),
(7068, 'Porsche', 'Boxster', 2002, 'Puce', '1C3BCBFG1CN550514', '45486.00'),
(7069, 'Saab', '900', 1995, 'Aquamarine', 'JTHHP5BC7F5612824', '79451.00'),
(7070, 'Buick', 'Century', 2003, 'Pink', 'JN1CV6AP4AM910485', '27317.00'),
(7071, 'Mazda', 'Mazda6 5-Door', 2006, 'Yellow', '5N1AN0NU6EN632945', '63688.00'),
(7072, 'Mercedes-Benz', 'S-Class', 2010, 'Aquamarine', '1HGCP2E32AA931071', '92663.00'),
(7073, 'BMW', 'X3', 2005, 'Fuscia', '1FAHP3ENXAW020815', '72392.00'),
(7074, 'Mercedes-Benz', 'W201', 1993, 'Goldenrod', 'WAUMV94E98N297469', '49382.00'),
(7075, 'Ford', 'F150', 2000, 'Aquamarine', '5NPE24AF6FH477361', '90625.00'),
(7076, 'Dodge', 'Challenger', 2008, 'Green', '5NPDH4AE8BH517564', '51498.00'),
(7077, 'Toyota', 'Tacoma Xtra', 1995, 'Red', '1G6DJ1E30D0132000', '94327.00'),
(7078, 'Alfa Romeo', '164', 1994, 'Yellow', 'WBSKG9C50DJ916556', '33458.00'),
(7079, 'GMC', 'Safari', 1994, 'Puce', '1D7RE3BK1BS879790', '85604.00'),
(7080, 'Saab', '900', 1998, 'Crimson', '2T3BF4DV4AW477659', '77498.00'),
(7081, 'Ford', 'Escort', 1994, 'Yellow', 'KMHCT4AEXCU450785', '56262.00'),
(7082, 'Nissan', 'GT-R', 2011, 'Pink', '1G6DK67V390472211', '55230.00'),
(7083, 'GMC', 'Savana 3500', 1999, 'Fuscia', 'WBA4A7C51FG933482', '26908.00'),
(7084, 'Dodge', 'Ram 2500 Club', 1998, 'Violet', '1C4RDJAG4FC802541', '75900.00'),
(7085, 'Jaguar', 'XJ', 2011, 'Purple', '1G4GC5ER7DF691925', '94659.00'),
(7086, 'Dodge', 'D150', 1992, 'Violet', 'JTJBC1BA9D2702613', '54736.00'),
(7087, 'Audi', 'R8', 2010, 'Blue', 'WAUSG78E66A587950', '35266.00'),
(7088, 'Mercedes-Benz', 'C-Class', 1999, 'Crimson', 'WAUWKAFR9AA080147', '76911.00'),
(7089, 'Mercedes-Benz', 'G-Class', 2006, 'Puce', 'WAUEFAFL6CN081179', '66007.00'),
(7090, 'Chevrolet', 'Express 1500', 2012, 'Teal', 'WAUDF78E87A316093', '89028.00'),
(7091, 'Ford', 'Econoline E150', 2002, 'Teal', '5TDBW5G15ES771190', '77061.00'),
(7092, 'Honda', 'Prelude', 1996, 'Turquoise', '1N6AA0EC3EN665602', '84573.00'),
(7093, 'Mazda', 'CX-7', 2011, 'Red', '1N6AD0CU5FN076183', '23171.00'),
(7094, 'GMC', 'Sonoma Club Coupe', 1996, 'Aquamarine', '1GYS3EEJ1DR010711', '65391.00'),
(7095, 'Lexus', 'LX', 2009, 'Goldenrod', '4A4AP3AU2FE899399', '71627.00'),
(7096, 'Mazda', '626', 1983, 'Mauv', 'WAUBF78E88A462700', '76466.00'),
(7097, 'Mercury', 'Sable', 2003, 'Indigo', '1FADP3E26EL317544', '88668.00'),
(7098, 'Lincoln', 'Navigator', 2012, 'Goldenrod', '1GD12ZCGXBF071844', '79588.00'),
(7099, 'Jeep', 'Grand Cherokee', 1993, 'Green', 'WAUEH48H97K395565', '27339.00'),
(7100, 'Mercury', 'Topaz', 1987, 'Aquamarine', '3VW8S7AT5FM174423', '63665.00'),
(7101, 'Mercury', 'Topaz', 1986, 'Yellow', 'JM1NC2LF3C0243668', '81128.00'),
(7102, 'Nissan', '200SX', 1995, 'Aquamarine', 'WDCGG0EB0EG779235', '24899.00'),
(7103, 'Mitsubishi', 'Mirage', 1989, 'Khaki', 'WBAVC73588A364568', '53048.00'),
(7104, 'Chevrolet', 'Camaro', 1967, 'Crimson', 'JM1CR2W32A0175402', '46215.00'),
(7105, 'Dodge', 'Ram Van B250', 1992, 'Teal', 'KMHTC6AD5CU574787', '85001.00'),
(7106, 'Lexus', 'SC', 1995, 'Turquoise', '19UUA65596A983206', '54158.00'),
(7107, 'Toyota', 'Tercel', 1994, 'Crimson', 'WBALL5C54EP276816', '88970.00'),
(7108, 'Mercedes-Benz', 'G55 AMG', 2006, 'Pink', '1GYS4CEF9DR977354', '28338.00'),
(7109, 'Nissan', 'Altima', 2009, 'Crimson', '1G6DD67V890882495', '72228.00'),
(7110, 'Ford', 'F350', 2011, 'Violet', '2B3CA3CV1AH440195', '74765.00'),
(7111, 'Bentley', 'Arnage', 2007, 'Green', '2C3CCAKT6CH295353', '25454.00'),
(7112, 'Subaru', 'XT', 1991, 'Red', 'WBAYE4C55ED580989', '43710.00'),
(7113, 'Audi', 'S8', 2006, 'Violet', 'KNDPB3A28D7850028', '55580.00'),
(7114, 'Chrysler', 'Voyager', 2001, 'Goldenrod', '3LNDL2L3XCR418897', '68277.00'),
(7115, 'Land Rover', 'Discovery', 2001, 'Pink', 'JTHBL5EF1B5956148', '53691.00'),
(7116, 'Oldsmobile', 'Custom Cruiser', 1992, 'Blue', '5UXFG43508L503895', '39293.00'),
(7117, 'Ford', 'Festiva', 1989, 'Yellow', 'JTEBU4BF7AK826366', '72152.00'),
(7118, 'Honda', 'S2000', 2002, 'Green', '1G6DL8EV8A0622961', '43052.00'),
(7119, 'Hyundai', 'Elantra', 2009, 'Aquamarine', 'WBAEW53483P970784', '45785.00'),
(7120, 'Pontiac', 'Grand Prix', 2007, 'Maroon', 'WBADT63441C326651', '43020.00'),
(7121, 'Mitsubishi', 'Challenger', 2003, 'Red', '4T1BF1FK8CU722783', '63877.00'),
(7122, 'Cadillac', 'XLR', 2009, 'Goldenrod', 'JM1CW2BL7E0565027', '64546.00'),
(7123, 'Mercedes-Benz', 'E-Class', 2009, 'Purple', '4T1BF1FK8EU598842', '23103.00'),
(7124, 'Land Rover', 'Discovery', 2005, 'Maroon', '3GYFNBE36ES131311', '53394.00'),
(7125, 'Mitsubishi', 'Lancer Evolution', 2008, 'Blue', 'WAUHGAFC9DN171017', '95771.00'),
(7126, 'Chrysler', 'Town & Country', 2003, 'Crimson', 'JH4NA21694T377379', '85782.00'),
(7127, 'BMW', 'M5', 2003, 'Fuscia', 'WBSDE93461B811029', '92573.00'),
(7128, 'Mercury', 'Capri', 1993, 'Indigo', 'WAULT68EX5A009116', '50805.00'),
(7129, 'Chevrolet', 'Camaro', 1974, 'Teal', '3D73Y3CL2BG131478', '50622.00'),
(7130, 'Volkswagen', 'Phaeton', 2004, 'Crimson', 'JN8AS1MU6BM519460', '94173.00'),
(7131, 'GMC', 'Acadia', 2012, 'Orange', '2G4GL5EX4E9780439', '44569.00'),
(7132, 'Kia', 'Amanti', 2008, 'Crimson', '1FMJU1G50AE724557', '34814.00'),
(7133, 'Hyundai', 'Santa Fe', 2004, 'Red', 'WA1LFBFP2CA670010', '79377.00'),
(7134, 'Scion', 'xD', 2010, 'Puce', 'JH4KA96683C202060', '50273.00'),
(7135, 'Volkswagen', 'Passat', 2002, 'Khaki', '3VW1K7AJ7FM295177', '45142.00'),
(7136, 'Suzuki', 'SJ', 1988, 'Red', '1G6DP8E39D0427085', '99851.00'),
(7137, 'Dodge', 'Ram Van 1500', 1995, 'Mauv', 'YV1902AH3B1232770', '43673.00'),
(7138, 'Mazda', 'CX-7', 2010, 'Indigo', 'JN8AE2KP2E9863837', '59896.00'),
(7139, 'Buick', 'LeSabre', 2002, 'Fuscia', 'SAJWA1CB4CL146044', '99994.00'),
(7140, 'Pontiac', 'Grand Prix', 2002, 'Teal', 'WAUAFAFL5EN010055', '66407.00'),
(7141, 'Lexus', 'SC', 1998, 'Puce', 'WA1MMAFE2AD510109', '24602.00'),
(7142, 'Scion', 'xB', 2008, 'Mauv', '1G6DX67D280665893', '85095.00'),
(7143, 'Scion', 'tC', 2005, 'Goldenrod', '5N1AR2MM6EC404747', '88374.00'),
(7144, 'Toyota', 'TundraMax', 2010, 'Blue', 'WBA1F5C51EV602646', '28938.00'),
(7145, 'Chevrolet', 'Corvette', 1964, 'Turquoise', '1N4AL3AP5DC892782', '60145.00'),
(7146, 'Chevrolet', 'S10', 1997, 'Maroon', 'WBABD33464J866246', '98536.00'),
(7147, 'Mazda', '626', 1992, 'Khaki', 'WAUEV94F18N575049', '90484.00'),
(7148, 'Oldsmobile', 'Cutlass Supreme', 1992, 'Indigo', '2HNYD2H21DH787187', '39714.00'),
(7149, 'Lamborghini', 'Gallardo', 2004, 'Mauv', 'WVWBB7AJXDW310856', '46680.00'),
(7150, 'Honda', 'CR-V', 2005, 'Blue', '1G4HR54K81U761074', '70421.00'),
(7151, 'Plymouth', 'Prowler', 1997, 'Mauv', '1G6DP577350159926', '99138.00'),
(7152, 'GMC', 'Canyon', 2012, 'Turquoise', '2T2BC1BA9FC325963', '57442.00'),
(7153, 'Lexus', 'RX Hybrid', 2012, 'Teal', 'WVGAV7AX6BW201584', '69404.00'),
(7154, 'Ford', 'Expedition', 2005, 'Violet', '1C6RD7FP7CS842035', '66061.00'),
(7155, 'Mercedes-Benz', 'SL-Class', 1991, 'Mauv', '1N4AA5AP2AC224922', '45042.00'),
(7156, 'Toyota', 'Prius', 2010, 'Indigo', 'WBAUL7C56BV948284', '97635.00'),
(7157, 'Volkswagen', 'Eurovan', 1999, 'Green', 'JTEBU4BF8CK094137', '96915.00'),
(7158, 'Chevrolet', 'Tahoe', 2001, 'Aquamarine', '19UUA662X5A326157', '60930.00'),
(7159, 'Chevrolet', 'Aveo', 2010, 'Maroon', 'WAUAH74F16N155945', '51702.00'),
(7160, 'Volkswagen', 'Passat', 2001, 'Aquamarine', '5J8TB3H35FL635313', '80432.00'),
(7161, 'Mitsubishi', 'Eclipse', 2011, 'Indigo', '1C4RDJEG9FC355022', '69637.00'),
(7162, 'Toyota', '4Runner', 2009, 'Maroon', 'WA1CFBFP4CA903062', '73722.00'),
(7163, 'BMW', 'X5 M', 2011, 'Orange', '3GYFNFE34ES834381', '78839.00'),
(7164, 'Mazda', 'Mazdaspeed 3', 2011, 'Yellow', 'WBY2Z2C54EV565376', '82737.00'),
(7165, 'Kia', 'Optima', 2002, 'Orange', 'WAUDFAFC0DN607917', '24113.00'),
(7166, 'Chevrolet', 'Tahoe', 2001, 'Khaki', 'SALFR2BG3DH943828', '23706.00'),
(7167, 'Volkswagen', 'Touareg', 2010, 'Indigo', '1G4PP5SK1F4999859', '50308.00'),
(7168, 'Dodge', 'Ram 1500 Club', 1996, 'Aquamarine', '5N1BA0ND7FN470647', '92760.00'),
(7169, 'Nissan', 'Xterra', 2006, 'Blue', 'KNDJT2A14A7439354', '58840.00'),
(7170, 'Ford', 'Ranger', 1990, 'Purple', '2C3CDXCT8EH952588', '62290.00'),
(7171, 'Lincoln', 'Navigator', 2010, 'Indigo', '3C4PDCEG1FT287628', '80460.00'),
(7172, 'Honda', 'Civic', 1997, 'Green', '1C3BC6EV2AN674781', '89349.00'),
(7173, 'Cadillac', 'CTS', 2010, 'Mauv', 'WBAPK7C51BF344202', '75416.00'),
(7174, 'Ford', 'Econoline E150', 2001, 'Pink', '1G6AT5S39E0110104', '94144.00'),
(7175, 'Kia', 'Sportage', 1996, 'Violet', 'WBAUP9C57CV354188', '84467.00'),
(7176, 'Jeep', 'Grand Cherokee', 2009, 'Mauv', 'WDCGG0EB2DG810225', '68874.00'),
(7177, 'BMW', 'Z4 M', 2006, 'Green', '3VWF17AT0FM715856', '67127.00'),
(7178, 'Mercury', 'Cougar', 1997, 'Blue', '5N1AA0NE7FN703494', '79758.00'),
(7179, 'Volkswagen', 'Jetta III', 1995, 'Crimson', '3C3CFFER3ET781309', '29194.00'),
(7180, 'GMC', 'Sonoma', 1992, 'Khaki', 'WAUEFBFL6BN769686', '54637.00'),
(7181, 'Mitsubishi', 'Lancer', 2005, 'Teal', '1G6DP1EDXB0209539', '45315.00'),
(7182, 'Volvo', 'V70', 2007, 'Turquoise', '1D4PU4GK5AW332907', '38526.00'),
(7183, 'Dodge', 'Ram 3500', 2009, 'Aquamarine', 'WA1WMAFE2CD489600', '34747.00'),
(7184, 'Jaguar', 'XK Series', 1997, 'Puce', '1G6DN56S550533013', '65740.00'),
(7185, 'Suzuki', 'Forenza', 2008, 'Maroon', '19XFA1E69BE288072', '31836.00'),
(7186, 'Lexus', 'ES', 1989, 'Turquoise', 'WBSWD93578P195455', '94439.00'),
(7187, 'Mazda', 'B-Series Plus', 1999, 'Mauv', 'WAUEG94F16N981579', '59503.00'),
(7188, 'Ford', 'Excursion', 2002, 'Pink', 'WBAPK5C56BA984617', '24977.00'),
(7189, 'Mazda', 'Mazda6', 2003, 'Purple', '5J6TF3H52FL961195', '24833.00'),
(7190, 'Suzuki', 'Equator', 2010, 'Purple', 'KMHFG4JG2DA950784', '33892.00'),
(7191, 'Oldsmobile', 'Toronado', 1992, 'Blue', 'JN8AZ2KR9CT766673', '97886.00'),
(7192, 'BMW', 'M3', 2002, 'Green', '3VWKX8AJ4BM333826', '21911.00'),
(7193, 'Ford', 'Ranger', 2002, 'Pink', 'WA1UFAFL5FA114354', '30694.00'),
(7194, 'Hyundai', 'Elantra', 2008, 'Turquoise', 'WAUKG78E75A636412', '87624.00'),
(7195, 'Fairthorpe', 'Rockette', 1960, 'Blue', '1HGCR6F3XEA957472', '31668.00'),
(7196, 'Lincoln', 'Blackwood', 2003, 'Fuscia', '3C4PDDEG1ET004259', '69177.00'),
(7197, 'Toyota', 'Ipsum', 2000, 'Puce', 'WAUFEAFM9DA179955', '48760.00'),
(7198, 'Bentley', 'Continental GT', 2012, 'Pink', 'JHMGE8G22AC946637', '51218.00'),
(7199, 'Acura', 'NSX', 2001, 'Maroon', '5GAEV13788J459774', '55393.00'),
(7200, 'Hyundai', 'XG350', 2002, 'Yellow', '3GYFK12229G923494', '53556.00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `title` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `salesperson`
--

INSERT INTO `salesperson` (`emp_id`, `store_id`, `title`, `salary`) VALUES
(3001, 2008, 'Senior Sales Associate', 30000),
(3002, 2008, 'Junior Sales Associate', 45000),
(3003, 2008, 'Sales Trainee', 25000),
(3004, 2008, 'Sales Trainee', 26000),
(3005, 2008, 'Junior Sales Associate', 27000),
(3006, 2008, 'Senior Sales Associate', 55000),
(3007, 2002, 'Senior Sales Associate', 50000),
(3008, 2002, 'Junior Sales Associate', 55000),
(3009, 2002, 'Junior Sales Associate', 37000),
(3010, 2002, 'Sales Trainee', 27000),
(3011, 2002, 'Senior Sales Associate', 75000),
(3012, 2002, 'Junior Sales Associate', 30000),
(3013, 2004, 'Sales Trainee', 26500),
(3014, 2004, 'Sales Trainee', 23000),
(3015, 2004, 'Junior Sales Associate', 31000),
(3016, 2004, 'Senior Sales Associate', 77000),
(3017, 2005, 'Senior Sales Associate', 62000),
(3018, 2003, 'Senior Sales Associate', 63500),
(3019, 2003, 'Junior Sales Associate', 33000),
(3020, 2003, 'Junior Sales Associate', 35500),
(3021, 2007, 'Sales Trainee', 22000),
(3022, 2007, 'Senior Sales Associate', 74500),
(3023, 2007, 'Junior Sales Associate', 40000),
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
  `number_of_salespersons` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`store_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_address_street`, `store_address_city`, `store_address_state`, `store_address_zip`, `number_of_salespersons`, `region_id`) VALUES
(2001, 'Westocul', '87 Markham DR', 'New York', 'NY', '10001', 3, 1001),
(2002, 'Essos Moss', '65 Inglewood', 'Boston', 'MA', '15663', 6, 1001),
(2003, 'Sothoryos', '87 Seneca ST', 'Miami', 'FL', '65993', 3, 1002),
(2004, 'Iron Islands', '65 Woodhaven ST', 'Atlanta', 'GA', '14455', 4, 1002),
(2005, 'Riverlands', '32 Crescent RD', 'Philadelphia', 'PA', '22888', 1, 1003),
(2006, 'Qarth Dire', '12 McConnell', 'San Francisco', 'CA', '65488', 5, 1004),
(2007, 'Stormlands', '65 James ST', 'Portland', 'OR', '66535', 4, 1004),
(2008, 'Dorne Cars', '65 Altadena DR', 'Las Vegas', 'NV', '56698', 6, 1004);

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
  `car_price` double DEFAULT NULL,
  `car_brand` char(40) DEFAULT NULL,
  `car_model` varchar(20) DEFAULT NULL,
  `car_model_year` int(11) DEFAULT NULL,
  `vin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `emp_id` (`emp_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`order_id`, `order_date`, `emp_id`, `product_id`, `customer_id`, `car_price`, `car_brand`, `car_model`, `car_model_year`, `vin`) VALUES
(8001, '2019-11-01', 3002, 7000, 4037, 40000, 'Toyota', 'Tacoma', 2001, '1A2B3C4D5F6G7H8I9J'),
(8004, '2019-11-24', 3033, 7006, 4001, 37056, 'Pontiac', 'Grand Am', 1996, 'JTHBK1GG7F2072272'),
(8005, '2019-11-24', 3033, 7201, 4001, 30000, 'Toyota', 'Celia', 1999, '123456789ABCDEFG'),
(8006, '2019-11-24', 3033, 7202, 4001, 30000, 'Toyota', 'Celia', 1999, '123456789ABCDEF'),
(8007, '2019-11-24', 3033, 7203, 4001, 30000, 'Toyota', 'Celia', 1999, '123456789ABCDEF');

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
-- 限制表 `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

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
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
