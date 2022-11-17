-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 08:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `role`, `password`) VALUES
(22, 'Teodora', 'teodora', 'admin', '$2y$10$rQMTDGl7VDjVedIosG2t8ufAdqAwfRGA/uiq6Wd..rBk6g6PiwVrO'),
(23, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_food` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `id_user`, `id_food`, `qty`) VALUES
(274, 37, 14, 1),
(275, 37, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `image_name`, `active`) VALUES
(10, 'Appetizers', 'Food_Category_272.jpeg', 'Yes'),
(11, 'Burgers', 'Food_Category_764.jpeg', 'Yes'),
(12, 'Desserts', 'Food_Category_842.jpeg', 'Yes'),
(13, 'Drinks', 'Food_Category_460.webp', 'Yes'),
(15, 'Pasta', 'Food_Category_787.jpeg', 'Yes'),
(16, 'Pizza', 'Food_Category_262.jpeg', 'Yes'),
(17, 'Salads', 'Food_Category_845.jpeg', 'Yes'),
(18, 'Soups', 'Food_Category_286.jpeg', 'Yes'),
(19, 'Sushi', 'Food_Category_830.webp', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_details`
--

CREATE TABLE `tbl_details` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_food` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_details`
--

INSERT INTO `tbl_details` (`id_order`, `id_food`, `price`, `qty`) VALUES
(231, 34, '16.00', 1),
(231, 6, '7.00', 3),
(231, 3, '5.00', 1),
(232, 9, '7.00', 1),
(232, 2, '4.00', 1),
(233, 16, '12.00', 1),
(233, 15, '10.00', 2),
(233, 3, '5.00', 1),
(234, 6, '7.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` varchar(10) NOT NULL,
  `add_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `active`, `add_date`) VALUES
(2, 'American pancakes', 'The pancake are made of white flour, eggs, sugar, milk. The top is with honey,  blueberries and strawberries. 5 pieces', '4.00', 'Food-Name-915.Array', 12, 'Yes', '2022-08-01 19:13:17'),
(3, 'Mini tarts', 'They are made of butter, sugar, eggs, flour, almonds, cherry jam and cherries on the top. 8 pieces\r\n', '5.00', 'Food-Name-8972.Array', 12, 'Yes', '2022-08-01 19:15:17'),
(4, 'Butterfly cakes', 'They are made of butter , sugar, eggs, flour, milk, strawberry jam.\r\nFor the buttercream sugar, butter, and vanilla paste. 5 pieces\r\n', '6.00', 'Food-Name-4248.Array', 12, 'Yes', '2022-08-01 19:15:36'),
(5, 'Chocolate peppermint mini rolls', 'They are made of eggs, sugar, flour, cocoa powder, vanilla extract,\r\ndark chocolate. For the filling butter, sugar, milk, peppermint extract. 12 pieces\r\n', '5.00', 'Food-Name-8352.Array', 12, 'Yes', '2022-08-01 19:17:43'),
(6, 'Bites Fan', 'With baguette, salami, melted cheese, lettuce and cherry tomatoes. 10 pieces\r\n', '7.00', 'Food-Name-7327.Array', 10, 'Yes', '2022-08-01 19:17:43'),
(7, 'Ham peach bites', 'Made of peaches, bacon and blue cheese. 10 pieces\r\n', '8.00', 'Food-Name-4814.Array', 10, 'Yes', '2022-08-01 19:17:43'),
(8, 'Bites Caprese', 'Made of pink tomatoes, mozzarella, pesto genovese and basil. 6 pieces\r\n', '6.00', 'Food-Name-3985.Array', 10, 'Yes', '2022-08-02 19:11:43'),
(9, 'Rolls with ham and olives', 'Made of ham, olives, sour cream, red and green peppers and onion. 10 pieces', '7.00', 'Food-Name-5403.jfif', 10, 'Yes', '2022-08-02 19:12:43'),
(10, 'Egg punch', 'Made of milk, eggs, brown sugar, brandy and cinnamon. 250 ml ', '6.00', 'Food-Name-835.Array', 13, 'Yes', '2022-08-02 19:13:43'),
(11, 'Hot fig', 'Made of dark rum, bitter chocolate, fig leaves and cinnamon stick. 250 ml', '5.00', 'Food-Name-9208.Array', 13, 'Yes', '2022-08-02 19:14:43'),
(12, 'Captains tea', 'Made of dark rum, maple syrup, bitter lemon, mursal tea and lemon. 250 ml', '6.00', 'Food-Name-3296.Array', 13, 'Yes', '2022-08-02 19:15:43'),
(13, 'Nargarita', 'Made of golden tequila, orange, pomegranate juice, sugar and lime. 250 ml', '7.00', 'Food-Name-2494.Array', 13, 'Yes', '2022-08-02 19:16:43'),
(14, 'Healthy burger', 'Made of bread, garlic, olive oil, red beet, lettuce, tomatoes, turkey and blue cheese.', '10.00', 'Food-Name-5849.Array', 11, 'Yes', '2022-08-02 19:17:43'),
(15, 'Indian burger', 'Made of minced meat, garlic, ginger, coriander, chilies, tomatoes and onions.', '10.00', 'Food-Name-4371.Array', 11, 'Yes', '2022-08-03 19:11:43'),
(16, 'Classic beef burger', 'Made of mayonnaise, garlic, beef fillet, bacon, cheese and lettuce.', '12.00', 'Food-Name-4455.Array', 11, 'Yes', '2022-08-03 19:12:43'),
(17, 'Bean burger', 'Made of boiled beans, mustard, onions, tomatoes, lettuce, mayonnaise and carrots. ', '11.00', 'Food-Name-7878.Array', 11, 'Yes', '2022-08-03 19:12:56'),
(18, 'Spaghetti carbonara', 'Made of spaghetti, ham, cheese, tomatoes, eggs, cream, mushrooms.', '10.00', 'Food-Name-9880.Array', 15, 'Yes', '2022-08-03 19:13:33'),
(19, 'Spicy spaghetti', 'Made of spaghetti, minced meat, yellow cheese, onion, pickles, olives,  hot pepper.', '11.00', 'Food-Name-9786.Array', 15, 'Yes', '2022-08-03 19:13:43'),
(20, 'Vegetable spaghetti', 'Made of spaghetti, cabbage, red peppers, leeks, mushrooms, carrots, soy sauce.', '10.00', 'Food-Name-7718.Array', 15, 'Yes', '2022-08-03 19:13:53'),
(21, 'Spaghetti of Naples', 'Made of spaghetti, tomatoes, peppers, onions, basil, parmesan, red wine, garlic.', '12.00', 'Food-Name-6588.Array', 15, 'Yes', '2022-08-03 19:14:03'),
(22, 'Pizza Balkani', 'Made of spaghetti, tomatoes, peppers, onions, broth, basil, parmesan, red wine, garlic.', '10.00', 'Food-Name-7267.Array', 16, 'Yes', '2022-08-03 19:14:23'),
(23, 'Italian pizza', 'Made of pizza dough, tomato paste, mozzarella, parmesan, basil, anchovies,olive oil.', '13.00', 'Food-Name-3203.Array', 16, 'Yes', '2022-08-03 19:14:33'),
(24, 'Pizza broccoli', 'Made of broccoli, mozzarella, parmesan, garlic, eggs, salt, yellow cheese, tomato sauce.', '12.00', 'Food-Name-1303.Array', 16, 'Yes', '2022-08-03 19:14:53'),
(25, 'Fruit pizza', 'Made of butter dough, cream cheese, cream, sugar, vanilla, strawberries, peaches, raspberries.', '11.00', 'Food-Name-6700.Array', 16, 'Yes', '2022-08-03 19:15:03'),
(26, 'Salad Kapreze', 'Made of tomatoes, basil, mozzarella, olive oil, vinegar, salt.', '7.00', 'Food-Name-7993.Array', 17, 'Yes', '2022-08-03 19:15:23'),
(27, 'Salad Piazza', 'Made of beans, onions, tomatoes, eggs, peppers, olive oil, salt, olives, parsley.', '8.00', 'Food-Name-6710.Array', 17, 'Yes', '2022-08-03 19:15:43'),
(28, 'Salad Nisoaz', 'Made of beans, onions, tomatoes, eggs, peppers, olive oil, salt, olives, parsley.', '10.00', 'Food-Name-6518.Array', 17, 'Yes', '2022-08-03 19:16:23'),
(29, 'Salad Eros', 'Made of pink tomatoes, eggplants, Danube cheese, basil, salt, olive oil.', '8.00', 'Food-Name-9328.Array', 17, 'Yes', '2022-08-03 19:16:43'),
(30, 'Vitamin soup', 'Made of broccoli, cauliflower, potatoes, asparagus, zucchini, garlic, almonds, broth.', '3.00', 'Food-Name-4088.Array', 18, 'Yes', '2022-08-03 19:17:43'),
(31, 'Alaminut soup', 'Made of mashed potatoes, butter, peas, chicken, mushrooms, universal spice.', '3.00', 'Food-Name-5627.Array', 18, 'Yes', '2022-08-03 19:17:43'),
(32, 'Chinese soup', 'Made of broth, soy sauce, sherry, ginger, peas, red peppers, eggs, vinegar.', '3.00', 'Food-Name-8490.Array', 18, 'Yes', '2022-08-03 19:18:13'),
(33, 'Potato soup', 'Made of bacon, onion, potatoes, broth, fresh milk, dill, salt, pepper.', '3.00', 'Food-Name-7822.Array', 18, 'Yes', '2022-08-03 19:18:43'),
(34, 'Sushi philadelphia roll', 'Made of salmon, cucumbers, cream cheese Philadelphia, nori, rice. 16 pieces', '16.00', 'Food-Name-5808.Array', 19, 'Yes', '2022-08-03 19:19:13'),
(35, 'Healthy sushi', 'Made of cucumber, turkey fillet, sesame, cream cheese Philadelphia.\r\n12 pieces', '13.00', 'Food-Name-7897.Array', 19, 'Yes', '2022-08-03 19:19:33'),
(36, 'Sushi with smoked salmon', 'Made of rice, rice vinegar, salt, nori, salmon, cucumber, cream cheese Philadelphia. 16 pieces', '18.00', 'Food-Name-2560.Array', 19, 'Yes', '2022-08-03 19:19:53'),
(37, 'Sushi with seed paste', 'Made of rice, seeds, lemons, garlic, cucumbers, avocado, arugula, nori, soy sauce. 12 pieces', '14.00', 'Food-Name-1475.Array', 19, 'Yes', '2022-08-03 19:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `del_time` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_user`, `shipping`, `order_date`, `status`, `address`, `del_time`, `note`) VALUES
(231, 37, '3.00', '2022-09-11 02:24:20', 'Cancelled', 'Troshevo Nejnost 20', '40min', ''),
(232, 37, '3.00', '2022-09-11 05:43:59', 'Ordered', 'Troshevo Nejnost 20', '40min', ''),
(233, 46, '3.00', '2022-09-12 08:27:54', 'Ordered', 'test', '40min', ''),
(234, 37, '3.00', '2022-09-16 08:55:20', 'Ordered', 'Troshevo Nejnost 20', '1hour', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `phone`, `email`, `address`, `password`, `reg_date`) VALUES
(29, 'Asen', '0123456711', 'asen@abv.bg', 'Tihomir 11', '$2y$10$0BgBJ8CPlP5n.O6tJOfSc.H.TtlH/6k.QnjIaovv3Bibr/IpeRrV.', '2022-08-16 09:10:16'),
(31, 'Georgi', '0123456787', 'georgi@abv.bg', 'Tihomir 12', '$2y$10$MrDcXHYLdBzP/5lD8MOM2OEo4EOa46oHF.54WYwbI2gFU7iWVxTaW', '2022-08-16 09:16:03'),
(34, 'Yasen', '0123456712', 'yasen@abv.bg', 'Tihomir 12', '$2y$10$CpgkTMoW4Td.OaX2ZKFDO.3RGfHn4eS8iRwDJbzf1Z.BTyeNwp0Ye', '2022-08-22 11:05:27'),
(37, 'Teodora', '0123456789', 'teodora.strahilova@abv.bg', 'Troshevo Nejnost 20', '$2y$10$tOcFQw2mPn2e1xoMnuVgouCinOzJ7jNIGnc/bYG92CS.TLt6sojvS', '2022-08-23 10:52:20'),
(40, 'Yasenna', '0123111112', 'yasena@abv.bg', 'Tihomir 20', '$2y$10$wbucGcdefFl35/Jb9QjAf.fnqdif4wPXozuqYvpQ.aCayPWMilT4S', '2022-08-24 12:03:42'),
(41, 'Silviya', '0123456781', 'silviya123@abv.bg', 'vqrnost 20', '$2y$10$VkbFjRA2ZQWzpZO8xqN.1OXp423WLwr2tcB.AjXC92NvlsZopxD3C', '2022-08-31 12:15:21'),
(43, 'Stefani', '0891234567', 'stefani@abv.bg', 'zhk. Troshevo blok 22', '$2y$10$4wt4bvLySeLAJjzSmxon0OKjnHxJs/9drYYAYqNoscButq05LL/LK', '2022-09-02 03:20:09'),
(46, 'test', '0123456789', 'test@abv.bg', 'test', '$2y$10$63YiOEyqgiHWKxsnwCD7tOcmMS89QndIpQuZ6DdUhD0ntzs8iwnjq', '2022-09-12 08:26:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_food` (`id_food`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_food` (`id_food`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`id_food`) REFERENCES `tbl_food` (`id`);

--
-- Constraints for table `tbl_details`
--
ALTER TABLE `tbl_details`
  ADD CONSTRAINT `tbl_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`),
  ADD CONSTRAINT `tbl_details_ibfk_2` FOREIGN KEY (`id_food`) REFERENCES `tbl_food` (`id`);

--
-- Constraints for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD CONSTRAINT `tbl_food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
