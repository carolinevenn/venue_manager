--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(255) NOT NULL,
  PRIMARY KEY (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `resources` text DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` varchar(30) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `price_agreed` float DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `revenue_split` float DEFAULT NULL,
  `booking_status` varchar(255) NOT NULL,
  `requirements` text DEFAULT NULL,
  `ticket_sales` float DEFAULT NULL,
  `get_in` varchar(30) DEFAULT NULL,
  `get_out` varchar(30) DEFAULT NULL,
  `misc_terms` text DEFAULT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`contract_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  PRIMARY KEY (`booking_id`),
  FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `running_time` int(11) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `guidance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `event_instance`
--

CREATE TABLE `event_instance` (
  `instance_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `show_time` varchar(30) NOT NULL,
  `standard` float DEFAULT NULL,
  `concession` float DEFAULT NULL,
  `student` float DEFAULT NULL,
  PRIMARY KEY (`instance_id`),
  FOREIGN KEY (`event_id`) REFERENCES `event_details` (`event_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




--
-- Create venue
--

INSERT INTO `venue` (`venue_id`, `venue_name`) VALUES
(1, 'Example venue');


--
-- Create user
--

INSERT INTO `staff` (`venue_id`, `name`, `email`, `password`, `access_level`, `role`, `phone`) VALUES
(1, 'Administrator', 'admin@email.com', '$2y$10$4z3xw3elxvHZZpOMgC6y3.5xPJ7DzClxsZZe3R.1yPL5CACHoAnlW', 'Administrator', '', '');



