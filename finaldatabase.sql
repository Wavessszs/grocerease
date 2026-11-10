-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2024 at 12:19 PM
-- Server version: 10.11.9-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gywrxlmz_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `EAN` varchar(13) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `distributor` varchar(10) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image_url`, `EAN`, `category`, `stock_quantity`, `location`, `distributor`, `tags`, `created_at`, `updated_at`) VALUES
(20, 'Young\'s Town Sardines in Tomato Sauce with Hot Chilli EOC 155g', 'This ready-to-eat canned food is perfect for a quick and delicious meal.', 24.70, '../../../images/products/redyoungstownsardines.png', '4800527123055', 'GROCERY', 10, 'BINMALEY', 'CSI', 'CANNED', '2024-09-07 07:06:54', '2024-09-07 07:06:54'),
(22, 'Young\'s Town Sardines In Tomato Sauce EOC 155g', 'The selection of the freshest ingredients, a unique method of pre-cooking, and a careful manual preparation process. This ready-to-eat canned food is perfect for a quick and delicious meal.', 23.90, '../../../images/products/greenyoungstownsardines.png', '4800527629083', 'GROCERY', 5, 'LINGAYEN', 'CSI', 'CANNED', '2024-09-07 07:28:33', '2024-09-07 07:28:33'),
(23, 'Coke Coca-Cola Original Taste in Can 325ml', 'Enjoy the taste of uplifting refreshment. Coke is the perfect drink to refresh you in the afternoon, on the go, with your meal or any time.', 34.10, '../../../images/products/Coke Coca-Cola Original Taste in Can 325ml.png', '4801981110001', 'BEVERAGES', 10, 'BINMALEY', 'CSI', 'DRINKS', '2024-09-07 07:52:02', '2024-09-07 07:52:02'),
(24, 'Sprite Carbonated Drinks in Can 325ml', 'A lemon-lime flavoured soft drink with a crisp, clean taste that gives you the ultimate cut-through refreshment.', 34.10, '../../../images/products/Sprite Carbonated Drinks in Can 325ml.png', '4801981110209', 'BEVERAGES', 10, 'DAGUPAN', 'CSI', 'DRINKS', '2024-09-07 07:52:30', '2024-09-07 07:52:30'),
(25, 'Royal Tru Orange 325ml', 'It has a refreshing taste and aroma, making it a favorite drink for people with fever or those that are not feeling well.', 34.10, '../../../images/products/Royal Tru Orange 325ml.png', '4801981110100', 'BEVERAGES', 10, 'DAGUPAN', 'MAGIC', 'DRINKS', '2024-09-07 07:52:52', '2024-09-07 07:52:52'),
(26, 'Coke Original Taste 1.5Liters', 'Enjoy the taste of uplifting refreshment. Coke is the perfect drink to refresh you in the afternoon, on the go, with your meal or any time.', 60.65, '../../../images/products/Coke Original Taste 1.5Liters.png', '4801981116072', 'BEVERAGES', 10, 'DAGUPAN', 'MAGIC', 'DRINKS', '2024-09-07 07:53:24', '2024-09-07 07:53:24'),
(27, 'Royal Tru Orange 1.5Liters', 'It has a refreshing taste and aroma, making it a favorite drink for people with fever or those that are not feeling well.', 60.65, '../../../images/products/Royal Tru Orange 1.5Liters.png', '4801981116171', 'BEVERAGES', 10, 'BINMALEY', 'CSI', 'DRINKS', '2024-09-07 07:53:52', '2024-09-07 07:53:52'),
(28, 'Wilkins\' Distilled Drinking Water 7Liters', 'Most Recommended drinking water by doctors. It goes through an 8-step state-of-the-art purification and distillation process that makes it the safest water for the most sensitive stomach.', 76.40, '../../../images/products/Wilkins_ Distilled Drinking Water 7Liters.png', '4801981164714', 'BEVERAGES', 10, 'DAGUPAN', 'CSI', 'WATER', '2024-09-07 07:54:41', '2024-09-07 07:54:41'),
(29, 'Wilkins\' Distilled Drinking Water 1.5liters', 'Most Recommended drinking water by doctors. It goes through an 8-step state-of-the-art purification and distillation process that makes it the safest water for the most sensitive stomach.', 34.60, '../../../images/products/Wilkins_ Distilled Drinking Water 1.5liters.png', '4800099101154', 'BEVERAGES', 10, 'BINMALEY', 'CSI', 'WATER', '2024-09-07 07:55:07', '2024-09-07 07:55:07'),
(30, 'Wilkins\' Distilled Drinking Water 500ml', 'Most Recommended drinking water by doctors. It goes through an 8-step state-of-the-art purification and distillation process that makes it the safest water for the most sensitive stomach.', 16.00, '../../../images/products/Wilkins_ Distilled Drinking Water 500ml.png', '4800602020934', 'BEVERAGES', 5, 'BINMALEY', 'MAGIC', 'WATER', '2024-09-07 07:55:55', '2024-09-07 07:55:55'),
(31, 'Absolute Pure Distilled Water 6Liters', ' A distilled drinking bottled water that has undergone thorough purification and distillation process, making it the cleanest water for your baby\'s and family\'s safety. ', 73.40, '../../../images/products/Absolute Pure Distilled Water 1000ml.png', '4800014700004', 'BEVERAGES', 5, 'BINMALEY', 'MAGIC', 'WATER', '2024-09-07 07:56:27', '2024-09-07 07:56:27'),
(32, 'Absolute Pure Distilled Water 500ml', 'A distilled drinking bottled water that has undergone thorough purification and distillation process, making it the cleanest water for your baby\'s and family\'s safety.', 14.95, '../../../images/products/Absolute Pure Distilled Water 1000ml.png', '4800014144082', 'BEVERAGES', 10, 'DAGUPAN', 'MAGIC', 'WATER', '2024-09-07 07:56:52', '2024-09-07 07:56:52'),
(34, 'Jack N Jill Mang Juan Sukang Paombong 26g', 'Chicharron sukang paombong is a vegetarian variant of nibble bacon. Tasty and definitely something else. These much-loved treats are fun to enjoy at lunch, as an after-school snack, or party refreshment.', 7.30, '../../../images/products/Jack N Jill Mang Juan Sukang Paombong 26g.png', '4800016110535', 'GROCERY', 10, 'DAGUPAN', 'MAGIC', 'SNACKS', '2024-09-07 08:12:47', '2024-09-07 08:12:47'),
(35, 'Jack N Jill Mang Juan Espesyal Suka\'t Sili 26g', 'Your favorite tasty snacks that capture the Pinoy goodness of chicharron in exciting flavors.', 7.30, '../../../images/products/Jack N Jill Mang Juan Espesyal Suka_t Sili 26g.jpg', '4800016110542', 'GROCERY', 10, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-07 08:15:34', '2024-09-07 08:15:34'),
(36, 'Jack N Jill Piattos Cheese 40G', 'Hexagon-shaped potato crisps are made from the finest potato ingredients and are distinctly thin, bringing out the fullness of their unique flavor.These chips are light and crispy and packed with cheese flavor.These much-loved treats are fun to enjoy at lunch, as an after-school snack, or party refreshment.', 15.40, '../../../images/products/Jack N Jill Piattos Cheese 40G.png', '4800016644801', 'GROCERY', 10, 'BINMALEY', 'CSI', 'SNACKS', '2024-09-07 08:22:34', '2024-09-07 08:22:34'),
(37, 'Jack N Jill Nova Multigrain Snacks Country Cheddar Flavor 38G', 'Ride the new wave of snacks and take off to a totally different taste experience.A healthy mix of 4 wholesome grains rolled into thin chips for that delightful nutty Flavour.Made from fiber, rich grain, corn, wheat, rice, and oats -Nova tastes as great as it is healthy.It has 0-gram of trans fat.', 15.70, '../../../images/products/Jack N Jill Nova Multigrain Snacks Country Cheddar Flavor 38G.png', '4800016663802', 'GROCERY', 10, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-07 08:30:29', '2024-09-07 08:30:29'),
(38, 'Ajinomoto Crispy Fry Original 62g', 'The breading mix sold under the \'Crispy Fry\' brand is known for the crispy and yummy features that it attributes to fried chicken. The breading mix can also act as the perfect marinade for chicken with the blend of flour, seasonings and spices. This is the brand\'s original breading mix flavour.', 16.70, '../../../images/products/Ajinomoto Crispy Fry Original 62g.png', '4801958390108', 'GROCERY', 10, 'DAGUPAN', 'CSI', 'SAUCES', '2024-09-07 08:52:19', '2024-09-07 08:52:19'),
(39, 'Ajinomoto Umami Seasoning 50g', 'A pure monosodium glutamate made from crops like sugarcane, cassava and tapioca. The use of AJI-NO-MOTOÂ® Umami Seasoning brings out the savory-deliciousness of any kind of dish through the taste of umami.', 13.30, '../../../images/products/Ajinomoto Umami Seasoning 50g.png', '4801958146002', 'GROCERY', 10, 'DAGUPAN', 'SM', 'SAUCES', '2024-09-07 08:53:12', '2024-09-26 09:59:26'),
(40, 'Rebisco Crackers Sandwich Chocolate 32gx10s', 'Offers a delightful treat, combining rich, creamy chocolate filling with crispy, lightly sweetened biscuits.', 58.85, '../../../images/products/Rebisco Crackers Sandwich Chocolate 32gx10s.png', '4800092110030', 'GROCERY', 10, 'DAGUPAN', 'MAGIC', 'SNACKS', '2024-09-07 08:59:00', '2024-09-07 08:59:00'),
(41, 'Md isopropyl alcohol 250 mL', 'Higene Isopropyl Alcohol is used as a complete disinfectant, sterilizer, cleanser and can be used as a general antiseptic for everyday all around use.', 63.00, '../../../images/products/Md isopropyl alcohol 250 mL.png', '4806523336772', 'HOUSEHOLDS', 34, 'DAGUPAN', 'MAGIC', 'LAUNDRY', '2024-09-12 07:34:50', '2024-09-12 07:34:50'),
(42, 'Vitamilk double choco shake', 'Vitamilk is an all-natural soy milk that\'s delicious, nutritious, and packed with protein and other vitamins and minerals that are good for the body. Fills good!', 38.00, '../../../images/products/Vitamilk double choco shake.png', '8851028002505', 'BEVERAGES', 50, 'DAGUPAN', 'MAGIC', 'DRINKS', '2024-09-14 13:56:09', '2024-09-14 13:56:09'),
(43, 'Sunsilk co-creations Shampoo 15mL', 'The formulation contains biotin and aloe vera that help to nourish hair from the roots, making them stronger and healthier.', 9.50, '../../../images/products/Sunsilk co-creations Shampoo 15mL.png', '4800888169716', 'HEALTH', 50, 'BINMALEY', 'MAGIC', 'HAIR', '2024-09-14 14:02:54', '2024-09-14 14:02:54'),
(46, 'Milo 22g Sachet', 'Chocolate malt powder for making energy drinks.', 8.50, '../../../images/products/Milo 22g Sachet.png', '4800361383301', 'BEVERAGES', 69, 'BINMALEY', 'MAGIC', 'DRINKS', '2024-09-14 14:07:22', '2024-09-14 14:07:22'),
(47, 'Nissin Cup Noodles Beef Flavor 70g', 'Instant cup noodles with savory beef flavor, ready in minutes.', 27.00, '../../../images/products/Nissin Cup Noodles Beef Flavor 70g.png', '379186417206', 'GROCERY', 54, 'BINMALEY', 'MAGIC', 'CANNED', '2024-09-14 14:13:43', '2024-09-26 09:07:45'),
(48, 'Lucky Me Pancit Canton Chili-Mansi 80g', 'Instant stir-fry noodles with chili and calamansi flavor.', 15.00, '../../../images/products/Lucky Me Pancit Canton Chili-Mansi 80g.png', '4807770273698', 'GROCERY', 78, 'LINGAYEN', 'CSI', 'CANNED', '2024-09-14 14:14:24', '2024-09-14 14:14:24'),
(49, 'Argentina Corned Beef 150g', 'Premium corned beef made from 100% beef, rich in flavor and perfect for breakfast.', 48.00, '../../../images/products/Argentina Corned Beef 150g.png', '748485803197', 'GROCERY', 78, 'DAGUPAN', 'MAGIC', 'CANNED', '2024-09-14 14:15:16', '2024-09-14 14:15:16'),
(50, 'Alaska Evaporated Milk 360ml', 'Rich and creamy evaporated milk, ideal for cooking and desserts', 35.00, '../../../images/products/Alaska Evaporated Milk 360ml.png', '4800575110373', 'GROCERY', 65, 'BINMALEY', 'MAGIC', 'DAIRY', '2024-09-14 14:16:57', '2024-09-14 14:16:57'),
(51, 'Bear Brand Fortified Powdered Milk 33g', 'Fortified powdered milk drink for stronger bones and immunity.', 10.50, '../../../images/products/Bear Brand Fortified Powdered Milk 33g.png', '4800361410816', 'BEVERAGES', 63, 'BINMALEY', 'CSI', 'DRINKS', '2024-09-14 14:22:27', '2024-09-14 14:22:27'),
(52, 'Great Taste Granules 25g', 'Instant coffee drink for a quick and rich coffee flavor', 7.00, '../../../images/products/Great Taste Granules 25g.png', '4800010009767', 'BEVERAGES', 76, 'DAGUPAN', 'CSI', 'DRINKS', '2024-09-14 14:24:25', '2024-09-14 14:24:25'),
(53, 'Colgate Fresh Confidence Toothpaste 100ml', 'Gel toothpaste for fresher breath and healthy teeth.', 99.00, '../../../images/products/Colgate Fresh Confidence Toothpaste 100ml.png', '8850006322918', 'HEALTH', 58, 'DAGUPAN', 'MAGIC', 'ORAL', '2024-09-14 14:25:18', '2024-09-14 14:25:18'),
(54, 'Surf Detergent Powder Blossom Fresh', 'Laundry detergent with a refreshing fragrance.', 120.55, '../../../images/products/Surf Detergent Powder Blossom Fresh.png', '4800888181602', 'HOUSEHOLDS', 87, 'DAGUPAN', 'SM', 'LAUNDRY', '2024-09-14 14:28:32', '2024-09-14 14:28:32'),
(55, 'Century Tuna Flakes in Oil 180g', 'Tuna flakes in oil, high in protein and ideal for a healthy meal.', 45.50, '../../../images/products/Century Tuna Flakes in Oil 180g.png', '748485100081', 'GROCERY', 83, 'DAGUPAN', 'SM', 'CANNED', '2024-09-14 14:41:07', '2024-09-14 14:41:07'),
(56, 'Silver Swan Soy Sauce 500ml', 'Rich and salty soy sauce perfect for cooking and dipping.', 30.00, '../../../images/products/Silver Swan Soy Sauce 500ml.png', '4800344001826', 'GROCERY', 72, 'LINGAYEN', 'SM', 'SAUCES', '2024-09-14 14:44:53', '2024-09-14 14:44:53'),
(57, 'Cowbell condensed milk 206g', 'This can be used as a topping, a filling, cooked into a jam, or simply eaten straight out of a can.', 40.00, '../../../images/products/Cowbell condensed milk 206g.png	', '4800575890787', 'GROCERY', 85, 'DAGUPAN', 'CSI', 'CANNED', '2024-09-14 14:49:09', '2024-09-14 14:49:09'),
(58, 'Cup Noodles Seafood ', 'Taste the authentic flavors of Japan with NissinÂ® Cup Noodle Seafood. From the creators of instant ramen, enjoy the #1 seafood instant noodles in Japan. Itâ€™s an authentic, creamy seafood soup topped with calamari, imitation crab, scrambled eggs, and cabbage â€“ with no added MSG or artificial flavors.', 28.00, '../../../images/products/Cup noodles seafood.png	', '4800016552113', 'GROCERY', 46, 'DAGUPAN', 'CSI', 'CANNED', '2024-09-14 14:59:23', '2024-09-14 14:59:23'),
(59, 'TIDE LAUNDRY DETERGENT POWDER PERFECT CLEAN ODOR DEFENSE ANTIBAC JUMBO 67G 6S', 'It is Tide\'s best-ever formula made to give longer suds, better stain removal, better whiteness and long-lasting freshness.', 82.60, '../../../images/products/TIDE LAUNDRY DETERGENT POWDER PERFECT CLEAN ODOR DEFENSE ANTIBAC JUMBO 67G 6S.png	', '4987176106964', 'HOUSEHOLDS', 74, 'DAGUPAN', 'CSI', 'LAUNDRY', '2024-09-14 15:01:06', '2024-09-14 15:01:06'),
(60, 'ARIEL POWDER DETERGENT FRESH GARDEN BLOOM 64G 6S ', 'New ariel deeper clean for amoy pawis malodour removal with 24hrs protection from amoy pawis germs.', 82.60, '../../../images/products/ARIEL POWDER DETERGENT FRESH GARDEN BLOOM 64G 6S.png	', '4987176067029', 'HOUSEHOLDS', 86, 'DAGUPAN', 'MAGIC', 'LAUNDRY', '2024-09-14 15:02:28', '2024-09-14 15:02:28'),
(61, 'Quake Overload (30g)', 'Quake Overload Mocha Butter 10S 30G is a choco coated mocha butter cake with mocha cream. The combination of mocha cake and smooth mocha cream makes Jack n\' Jill Quake Bars luscious and irresistible.', 12.00, '../../../images/products/Quake overload _30g_.png', '4800016112140', 'GROCERY', 84, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-14 15:03:30', '2024-09-14 15:03:30'),
(62, 'Gatorade Blue Bolt', 'Gatorade Blue Bolt is formulated to replenish electrolytes and provide hydration during physical activities. It contains a blend of carbohydrates, electrolytes, and fluids, designed to help replace what is lost through sweating during exercise or intense physical exertion.', 49.75, '../../../images/products/Gatorade Blue Bolt.png', '4803925241130', 'BEVERAGES', 86, 'BINMALEY', 'MAGIC', 'DRINKS', '2024-09-14 15:04:29', '2024-09-14 15:04:29'),
(63, '555 SARDINES IN TOMATO SAUCE WITH CHILI 155G', 'Seasoned with special spices for a delectable sardines indulgence. It is rich in calcium for stronger bones, protein for muscle building, lycopene for cancer prevention, iodine, and vitamin D.', 24.55, '../../../images/products/555 SARDINES IN TOMATO SAUCE WITH CHILI 155G.png', '748485200026', 'GROCERY', 87, 'DAGUPAN', 'CSI', 'CANNED', '2024-09-15 13:13:08', '2024-09-15 13:13:08'),
(64, 'PUREFOODS CORNED BEEF CHILI GARLIC 210G', 'Purefoods Corned Beef 380G is made with carefully selected premium beef, cooked to perfection with spices for a delicious flavor.', 109.85, '../../../images/products/PUREFOODS CORNED BEEF CHILI GARLIC 210G.png	', '4808887011647', 'GROCERY', 76, 'DAGUPAN', 'CSI', 'CANNED', '2024-09-15 13:14:50', '2024-09-15 13:14:50'),
(65, 'SAN MARINO CHILI CORNED TUNA 180G', 'San Marino Corned Tuna has the perfect combination of the delicious taste of corned beef fused with the health benefits of tuna! It has less oil, lots of tuna than the usual tuna flakes in oil and a whole lot of Omega-3!', 46.50, '../../../images/products/SAN MARINO CHILI CORNED TUNA 180G.png	', '4800249006674', 'GROCERY', 56, 'DAGUPAN', 'CSI', 'CANNED', '2024-09-15 13:21:57', '2024-09-15 13:21:57'),
(66, 'DEL MONTE IMPORTED SLICED PEACHES 825G', 'These delicious fruit slices are a tasty topping for yogurt, cereal, salads, and your favorite flavored gelatin for a fun and tasty treat. ', 170.80, '../../../images/products/DEL MONTE IMPORTED SLICED PEACHES 825G.png	', '24000010623', 'GROCERY', 97, 'DAGUPAN', 'MAGIC', 'CANNED', '2024-09-15 13:22:50', '2024-09-15 13:22:50'),
(67, 'TANDUAY ICE ALCOMIX BLUE FRESH 330ML', 'anduay Ice is a refreshing mix of fruit flavors, triple distilled spirit at 5% ABV. The sweet tangy fruity fun alcomix is an exciting jump starter for your party.', 34.75, '../../../images/products/TANDUAY ICE ALCOMIX BLUE FRESH 330ML.png	', '4800220531379', 'BEVERAGES', 999, 'BINMALEY', 'MAGIC', 'ALCOHOL', '2024-09-15 14:10:38', '2024-09-15 14:10:38'),
(68, 'SMIRNOFF MULE VODKA 330ML', 'Smirnoff Mule is a ready to drink alcoholic beverage inspired by the world renowned Moscow Mule cocktail. Made with Smirnoff Vodka, ginger beer and lime, Smirnoff mule delivers the perfect buzz with a stubbornly refreshing taste. Make the better choice and choose better with Smirnoff Mule.', 43.25, '../../../images/products/SMIRNOFF MULE VODKA 330ML.png	', '4800142116111', 'BEVERAGES', 876, 'DAGUPAN', 'CSI', 'ALCOHOL', '2024-09-15 14:11:40', '2024-09-15 14:11:40'),
(69, 'THE BAR PINK GIN 335ML', 'Take your gin to the next level with The Bar Premium Gin, a world-class gin infused with imported botanicals from Spain that gives it a delicious burst of flavor not found in local gin products.', 63.50, '../../../images/products/THE BAR PINK GIN 335ML.png	', '4800142113325', 'BEVERAGES', 756, 'DAGUPAN', 'CSI', 'ALCOHOL', '2024-09-15 14:12:25', '2024-09-15 14:12:25'),
(70, 'HENNESSY VERY SPECIAL COGNAC 70CL', 'Matured in new oak barrels, Hennessy V.S is bold and fragrant. Its beguiling character is uniquely Hennessy, a timeless choice with an intensity all its own. Hennessy V.S offers toasted and fruit notes, with a rich, clearly defined palate and a welcoming exuberance.', 2649.00, '../../../images/products/HENNESSY VERY SPECIAL COGNAC 70CL.png	', '3245990250203', 'BEVERAGES', 453, 'BINMALEY', 'MAGIC', 'ALCOHOL', '2024-09-15 14:13:03', '2024-09-15 14:13:03'),
(71, 'SAN MIGUEL BEER LIGHT PALE PILSEN CAN 330ML', 'San Miguel Pale Pilsen is a pale, golden lager with a rich, full-bodied flavor. Its smooth, full-flavored taste complements its pleasant aroma, making it a perfectly balanced beer.', 47.85, '../../../images/products/SAN MIGUEL BEER LIGHT PALE PILSEN CAN 330ML.png	', '4801032745046', 'BEVERAGES', 875, 'DAGUPAN', 'MAGIC', 'ALCOHOL', '2024-09-15 14:13:45', '2024-09-15 14:13:45'),
(72, 'RED HORSE BEER EXTRA STRONG BOTTLE 500ML', 'Extra Strong Beer (8% Alc.) Red Horse Beer, the first extra-strong beer brand in the Philippines, is the high-alcohol beer brand of San Miguel Brewery, it is a deeply hued lager with distinctive sweetish taste balanced by a smooth bitterness that leads in a strong alcohol kick.', 55.70, '../../../images/products/RED HORSE BEER EXTRA STRONG BOTTLE 500ML.png	', '4801032211077', 'BEVERAGES', 956, 'LINGAYEN', 'SM', 'ALCOHOL', '2024-09-15 14:14:28', '2024-09-15 14:14:28'),
(73, 'ALFONSO LIGHT ALCOHOL 1 LITER', 'Brandy-type spirit prepared with medium and high-strength wine spirits, 77% and 94% Alc./Vol. aged in oak casks.', 279.00, '../../../images/products/ALFONSO LIGHT ALCOHOL 1 LITER.png	', '8410028900091', 'BEVERAGES', 643, 'BINMALEY', 'SM', 'ALCOHOL', '2024-09-15 14:15:12', '2024-09-15 14:15:12'),
(74, 'GINEBRA SAN MIGUEL ROUND 350ML', 'Ginebra San Miguel is an 80-proof Dutch-type gin made from sugarcane alcohol. Its predominant flavor comes from juniper berries and selected essences from all over the world. Low notes with a little bit of spice, pepper, coriander, acetone, and salt.', 61.00, '../../../images/products/GINEBRA SAN MIGUEL ROUND 350ML.png	', '4800130100023', 'BEVERAGES', 963, 'BINMALEY', 'CSI', 'ALCOHOL', '2024-09-15 14:15:42', '2024-09-15 14:15:42'),
(75, 'JINRO CHAMISUL ORIGINAL 360ML', 'Jinro Chamisul Original passes through a patented bamboo charcoal filtration process 4 times, getting rid of hangover-causing compounds. This drink has a more potent alcohol content than regular soju, making it the favorite drink of those who enjoy an authentic and rich Jinro Soju experience.', 106.00, '../../../images/products/JINRO CHAMISUL ORIGINAL 360ML.png	', '8801048941001', 'BEVERAGES', 623, 'DAGUPAN', 'SM', 'ALCOHOL', '2024-09-15 14:16:15', '2024-09-15 14:16:15'),
(76, 'ASTI CINZANO 750ML', 'Light and refreshing with sage and acacia on the notes and as such is perfect as an aperitivo, or for blending in cocktails such as the Mimosa. TASTE: Full, sweet white peach and good freshness.', 691.00, '../../../images/products/ASTI CINZANO 750ML.png	', '8000020000280', 'BEVERAGES', 364, 'BINMALEY', 'MAGIC', 'ALCOHOL', '2024-09-15 14:16:55', '2024-09-15 14:16:55'),
(77, 'CRISS CROSS CHEESE 65G', 'CRISS CROSS is criss-cut shaped potato snack that comes in a delicious CREAMY CHEESE flavor, enhanced by its soft crunch and melt-in-your-mouth texture that is perfect for your winding down moments!', 21.55, '../../../images/products/CRISS CROSS CHEESE 65G.png	', '4800194105958', 'GROCERY', 835, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-15 14:33:10', '2024-09-15 14:33:10'),
(85, 'OISHI POTATO FRIES KETCHUP 50G', 'These potato fries are flavored with a tangy and slightly sweet tomato ketchup seasoning, which gives them a unique taste and aroma. The Oishi Potato Fries Tomato Ketchup Flavor is a popular snack in the Philippines and is enjoyed by people of all ages.', 14.90, '../../../images/products/OISHI POTATO FRIES KETCHUP 50G.png	', '4800194106030', 'GROCERY', 532, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-15 14:36:41', '2024-09-15 14:36:41'),
(86, 'OISHI CRISPY PATATA BAKED POTATO FLAVOR 24G', 'An irresistible snack with a big, bold taste and a whole bag of delicious rye chips.', 6.65, '../../../images/products/OISHI CRISPY PATATA BAKED POTATO FLAVOR 24G.png	', '4800194104869', 'GROCERY', 542, 'DAGUPAN', 'MAGIC', 'SNACKS', '2024-09-15 14:37:57', '2024-09-15 14:37:57'),
(87, 'JACK N JILL NOVA SWEET CHILI 78G', ' Healthy mix of 4 wholesome grains rolled into thin chips for that delightful nutty flavor. Made from fiber, rich grain, corn, wheat, rice, and oats', 35.50, '../../../images/products/JACK N JILL NOVA SWEET CHILI 78G.png	', '4800016633799', 'GROCERY', 421, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-15 14:39:09', '2024-09-15 14:39:09'),
(88, 'JACK N JILL PIC-A OVERLOAD SNACK MIX BARBEQUE 90G', 'The ultimate 3-in-1 snack mix with the combination of your all-time favorite Jack \'n Jill snacks â€“ Piattos, Nova, and Tostillas. URC\'s snack food megabrand, Jack \'n Jill, offers one of the most diverse portfolios of products in the Philippines.', 34.90, '../../../images/products/JACK N JILL PIC-A OVERLOAD SNACK MIX BARBEQUE 90G.png	', '4800016635250', 'GROCERY', 643, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-15 14:39:50', '2024-09-15 14:39:50'),
(89, 'GRANNY GOOSE TORTILLOS CHILI 100G', 'One snack you can enjoy this season is Granny Goose Tortillos and its tasty line of flavored chips made from 100% real and stoneground corn.', 26.00, '../../../images/products/GRANNY GOOSE TORTILLOS CHILI 100G.png	', '4800016138577', 'GROCERY', 763, 'BINMALEY', 'SM', 'SNACKS', '2024-09-15 14:40:31', '2024-09-15 14:40:31'),
(90, 'NAGARAYA ORIGINAL CRACKER NUTS (YELLOW) 80G', 'This delicious peanuts snack is packed with protein, fibre, and energy to give you a healthy head start.', 21.00, '../../../images/products/NAGARAYA ORIGINAL CRACKER NUTS _YELLOW_ 80G.png', '731126101080', 'GROCERY', 235, 'BINMALEY', 'SM', 'SNACKS', '2024-09-15 14:41:06', '2024-09-15 14:41:06'),
(91, 'BOY BAWANG CORNICK CHILI CHEESE FLAVOR 80G', 'Chilli Cheese Cornick is a thrilling mix of intense chilli heat and creamy cheese, all packed into crunchy corn kernels. It\'s no surprise they are known for their irresistible texture and robust flavour.', 15.00, '../../../images/products/BOY BAWANG CORNICK CHILI CHEESE FLAVOR 80G.png	', '4809011681392', 'GROCERY', 543, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-15 14:41:36', '2024-09-15 14:41:36'),
(92, 'LESLIE CLOVER CHIPS BARBEQUE 24G', 'Clover Chips is the All-Time Favorite, uniquely-shaped corn snack that is deliciously addictive in every bag.', 7.35, '../../../images/products/LESLIE CLOVER CHIPS BARBEQUE 24G.png	', '4800216120112', 'GROCERY', 753, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-15 14:42:21', '2024-09-15 14:42:21'),
(93, 'Jack N Jill Piattos Barbeque 40G ', 'Hexagon-shaped potato crisps are made from the finest potato ingredients and are distinctly thin, bringing out the fullness of its unique flavor. These chips are light and crispy and packed with barbeque flavor. These much-loved treats are fun to enjoy at lunch, as an after-school snack, or party refreshment.', 16.00, '../../../images/products/Jack N Jill Piattos Barbeque 40G.png	', '4800016633782', 'GROCERY', 643, 'DAGUPAN', 'CSI', 'SNACKS', '2024-09-15 14:53:50', '2024-09-15 14:53:50'),
(94, 'KARAPATAN', 'PANGBEBETIME', 9999.00, '../../../images/products/karapatan.png	', '69696969', 'GROCERY', 69, 'LINGAYEN', 'SM', 'SNACKS', '2024-09-24 01:59:09', '2024-09-24 01:59:09'),
(95, 'AKO', 'ay umiibig ng tulad mong d kayang abutin, para kang bituin kay gandang pagmasdan kahit dmo pansin, kay layo man ng agwat, distanya at kwalidad asahan mong sa altar ikaw ang aking kalakad.', 1.00, '../../../images/products/Jasper.png	', '143', 'GROCERY', 1, 'MABINI', 'SM', 'SNACKS', '2024-09-24 03:05:30', '2024-09-24 03:05:30'),
(97, 'CREAMSILK TRIPLE KERATIN RESCUE CONDITIONER ULTIMATE STRAIGHT 170ML', 'NEW Ultimate Straight Conditioner is your Triple Keratin Rescue! Get the benefits of 3 Keratin products in 1 great solution for ultimately smooth hair.', 212.35, '../../../images/products/CREAMSILK TRIPLE KERATIN RESCUE CONDITIONER ULTIMATE STRAIGHT 170ML1.png	', '4800888206183', 'HEALTH', 88765432, 'LINGAYEN', 'SM', 'HAIR', '2024-09-24 04:13:24', '2024-09-24 04:13:24'),
(98, 'DOVE CONDITIONER CERAMIDE INTENSE REPAIR 300ML', 'Discover our next generation of conditioners--New Dove 1 Minute Serum Conditioners, infused with the transformative power of serum capsules that deeply penetrate the hair to repair from within.Dove Intense Repair 1 Minute Serum Conditioner helps reconstruct hair\'s internal structure with every use and smoothens away visible signs of damage in just 1 minute.', 330.55, '../../../images/products/DOVE CONDITIONER CERAMIDE INTENSE REPAIR 300ML.png	', '4800888206640', 'HEALTH', 88, 'LINGAYEN', 'SM', 'HAIR', '2024-09-24 04:25:41', '2024-09-24 04:25:41'),
(99, 'PALMOLIVE NATURALS SHAMPOO INTENSIVE MOISTURE (PINK) 180ML', 'Palmolive Naturals Intensive Moisture with 100% Natural Coconut Cream extract! Instantly adds essential hydration to your hair for long-lasting softness.', 126.25, '../../../images/products/PALMOLIVE NATURALS SHAMPOO INTENSIVE MOISTURE _PINK_ 180ML.png	', '4808888413709', 'HEALTH', 88, 'LINGAYEN', 'SM', 'HAIR', '2024-09-24 04:38:29', '2024-09-24 04:38:29'),
(100, 'P FRESCA BANGUS BONELESS (@250g)', 'Meat fish from Dagupan City', 99.75, '../../../images/products/P FRESCA BANGUS BONELESS _@250g_.png	', '2709339002500', 'GROCERY', 241, 'DAGUPAN', 'CSI', 'SEAFOODS', '2024-09-24 11:53:52', '2024-09-24 11:53:52'),
(101, 'P FRESCA PUSIT BISAYA (@250g)', 'Imported squid from Bisaya.', 79.75, '../../../images/products/P FRESCA PUSIT BISAYA _@250g_.png	', '2709403002500', 'GROCERY', 756, 'BINMALEY', 'MAGIC', 'SEAFOODS', '2024-09-24 11:55:07', '2024-09-24 11:55:07'),
(102, 'CL GG LALAKI (MEDIUM) (@250g)', 'Galung-gung para mga gungung na katulad mo.', 79.75, '../../../images/products/CL GG LALAKI _MEDIUM_ _@250g_.png	', '2714523002500', 'GROCERY', 231, 'BINMALEY', 'MAGIC', 'SEAFOODS', '2024-09-24 11:56:00', '2024-09-24 11:56:00'),
(103, 'CL SUAHE (LARGE) (@250g)', 'Big shrimp good for any occasion', 187.25, '../../../images/products/CL SUAHE _LARGE_ _@250g_.png	', '2714412002500', 'GROCERY', 421, 'BINMALEY', 'MAGIC', 'SEAFOODS', '2024-09-24 11:56:45', '2024-09-24 11:56:45'),
(104, 'CL TILAPIA (LARGE) (@250g)', 'native fish from philippines number 1 yey.', 59.75, '../../../images/products/CL TILAPIA _LARGE_ _@250g_.png	', '2714513002500', 'GROCERY', 512, 'DAGUPAN', 'CSI', 'SEAFOODS', '2024-09-24 11:58:11', '2024-09-24 11:58:11'),
(105, 'MRSGARCIAS PORK STEAK (@250g)', 'a regular meat good for any occasion', 106.75, '../../../images/products/MRSGARCIAS PORK STEAK _@250g_.png	', '2706070002500', 'GROCERY', 761, 'DAGUPAN', 'CSI', 'MEAT', '2024-09-24 11:59:07', '2024-09-24 11:59:07'),
(106, 'VCUTS PORK PATA FRONT (@250g)', 'pig foot good for soup foods.', 55.00, '../../../images/products/VCUTS PORK PATA FRONT _@250g_.png	', '2701339002500', 'GROCERY', 512, 'LINGAYEN', 'SM', 'MEAT', '2024-09-24 12:00:00', '2024-09-24 12:00:00'),
(107, 'MRSGARCIAS PORK LIVER (@250g)', 'pork liver good for pulutan and adobo ', 56.50, '../../../images/products/MRSGARCIAS PORK LIVER _@250g_.png	', '2706067002500', 'GROCERY', 671, 'BINMALEY', 'SM', 'MEAT', '2024-09-24 12:01:13', '2024-09-24 12:01:13'),
(108, 'MRSGARCIAS APC STRIPLOIN (@250g)', 'rare meat for rare occasion', 170.00, '../../../images/products/MRSGARCIAS APC STRIPLOIN _@250g_.png	', '2706028002500', 'GROCERY', 234, 'LINGAYEN', 'CSI', 'MEAT', '2024-09-24 12:02:00', '2024-09-24 12:02:00'),
(109, 'VITAMEATS B.RIB EYE ROAST (@250g)', 'deluxe meat good for its price', 172.50, '../../../images/products/VITAMEATS B.RIB EYE ROAST _@250g_.png	', '2738127002500', 'GROCERY', 421, 'LINGAYEN', 'SM', 'MEAT', '2024-09-24 12:03:03', '2024-09-24 12:03:03'),
(110, 'VITAMEATS B. TBONE (@250g)', 'deluxe meat good for its price', 170.00, '../../../images/products/VITAMEATS B. TBONE _@250g_.png	', '2738131002500', 'GROCERY', 412, 'DAGUPAN', 'CSI', 'MEAT', '2024-09-24 12:03:39', '2024-09-24 12:03:39'),
(111, 'Collagen Boosting Eye Cream', 'An eye cream with collagen and hyaluronic acid. Reduces puffiness and dark circles, giving your eyes a youthful appearance.', 1400.00, '../../../images/products/Collagen Boosting Eye Cream.png	', '3123456789012', 'HEALTH', 6969, 'DAGUPAN', 'MAGIC', 'SKIN', '2024-09-26 02:31:41', '2024-09-26 02:31:41'),
(112, 'Albatross lemon  ', ' Albatross has been Filipino moms\' secret to keeping their bathrooms smelling clean and fresh for a long period of time.', 40.00, '../../../images/products/Albatross lemon.png', '4800067600542', 'HOUSEHOLDS', 9999, 'DAGUPAN', 'SM', 'HOUSE', '2024-09-26 02:37:57', '2024-09-26 02:37:57'),
(113, 'Vitamin E Lip Balm', 'A hydrating lip balm with Vitamin E. Protects and nourishes your lips, keeping them soft and smooth.', 299.00, '../../../images/products/Vitamin E Lip Balm.png	', '2123456789012', 'HEALTH', 343, 'BINMALEY', 'SM', 'PERSONAL', '2024-09-26 02:55:37', '2024-09-26 02:55:37'),
(114, 'Lysol disinfectant spray', 'Lysol disinfecting spray helps protect your family and helps keep them healthy.', 280.00, '../../../images/products/Lysol disinfectant spray.png', '4801002062890', 'HOUSEHOLDS', 9999, 'DAGUPAN', 'SM', 'HOUSE', '2024-09-26 03:03:41', '2024-09-26 03:03:41'),
(115, 'GREENEX ALL PURPOSE CLEANER ORIGINAL 500ML', 'Disinfect, clean, and leave surfaces spotless and protected from 99.9% of germs. Everyone will feel at home when you do your cleaning with Greenex.', 76.65, '../../../images/products/GREENEX ALL PURPOSE CLEANER ORIGINAL 500ML.png', '4800047840852', 'HOUSEHOLDS', 50, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 03:07:30', '2024-09-26 03:07:30'),
(116, 'ZONROX MULTI SURFACE CLEANER FLORAL BLAST 900ML', 'Kills germs upon contact and removes stains grease and dirt. Provides freshness and anti-bac protection on surfaces for up to 48 hours. Sold per bottle contains', 120.00, '../../../images/products/ZONROX MULTI SURFACE CLEANER FLORAL BLAST 900ML1.png	', '4800047847288', 'HOUSEHOLDS', 60, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 03:23:18', '2024-09-26 03:23:18'),
(117, 'Mortien multi insect killer 250ml', 'Mortien multi insect killer kills flies, mosquitoes, moths, cockroaches, spiders, ants, fleas, wasps and silverfish in seconds, and is Morteinâ€™s fastest multi insect killer on cockroaches.', 190.00, '../../../images/products/Mortien multi insect killer 250ml.png', '4801002068748', 'HOUSEHOLDS', 9999, 'DAGUPAN', 'SM', 'PEST', '2024-09-26 03:28:18', '2024-09-26 03:28:18'),
(119, 'Baygon multi insect killer ', 'Maximum Killing Action. Baygon Multi Insect Insect Killer is formulated to provide fast killing power against flying and crawling insects found in and around the household.', 200.00, '../../../images/products/Baygon multi insect killer.png', '4801234108212', 'HOUSEHOLDS', 9999, 'DAGUPAN', 'SM', 'PEST', '2024-09-26 03:38:09', '2024-09-26 03:38:09'),
(120, 'ALBATROSS TOILET BOWL CLEANER CHERRY FRUITY FRAGRANCE 500ML  ', 'Effectively removes and dissolves stains and rusts. Kills 99.9% of germs.', 122.35, '../../../images/products/ALBATROSS TOILET BOWL CLEANER CHERRY FRUITY FRAGRANCE 500ML.png', '4800067601327', 'HOUSEHOLDS', 80, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 03:38:40', '2024-09-26 03:38:40'),
(121, 'GARDENIA PANDESAL 350G', 'Crusty on the outside, soft on the inside, and full to the bite. Masarap, hot or not. Enriched with Vitamins A, B1, B2, Calcium and Folate.', 56.60, '../../../images/products/GARDENIA PANDESAL 350G.png	', '4806502720080', 'GROCERY', 4312, 'DAGUPAN', 'MAGIC', 'SNACKS', '2024-09-26 03:46:56', '2024-09-26 03:46:56'),
(122, 'GARDENIA SOFT DELIGHT PANDESAL 300G', 'Soft Delight Pandesal 300g (12 pcs.) Start your day with Pandesal that is enjoyably soft to the bite and made from the finest ingredients.', 54.00, '../../../images/products/GARDENIA SOFT DELIGHT PANDESAL 300G.png	', '4806502725726', 'GROCERY', 231, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-26 03:47:37', '2024-09-26 03:47:37'),
(123, 'GARDENIA BUTTERTOAST 5 SLICE 125G', 'Gardenia Butter Toast is made from from freshly-baked bread brushed with creamy butter, sprinkled with sugar then baked to a light golden crisp.', 34.55, '../../../images/products/GARDENIA BUTTERTOAST 5 SLICE 125G.png	', '4806502720110', 'GROCERY', 3431, 'LINGAYEN', 'CSI', 'SNACKS', '2024-09-26 03:48:04', '2024-09-26 03:48:04'),
(124, 'GARDENIA CREAM ROLL COOKIES & CREAM 50G', 'Treat yourself to the delightful experience of savoring a mix of crushed cookies and a creamy filling with Gardenia Cream Roll Cookies & Cream! Buy Online.', 18.30, '../../../images/products/GARDENIA CREAM ROLL COOKIES _ CREAM 50G.png	', '4806502725641', 'GROCERY', 3412, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-26 03:48:37', '2024-09-26 03:48:37'),
(125, 'GARDENIA WHITE BREAD THICK 600G', 'An all-time favorite that\'s well-loved for its soft and creamy goodness. Made from Uncle Slocumm\'s special American recipe and a favorite among Filipino ...', 85.85, '../../../images/products/GARDENIA WHITE BREAD THICK 600G.png	', '4806502720097', 'GROCERY', 3431, 'BINMALEY', 'SM', 'SNACKS', '2024-09-26 03:49:04', '2024-09-26 03:49:04'),
(126, 'GARDENIA DOUBLE DELIGHTS UBE & CHEESE LOAF 400G', 'A flavorful fusion of ube and cheese. A delightfully delicious feast for the eyes and the taste buds. Experience the best of two flavors in one loaf.', 88.90, '../../../images/products/GARDENIA DOUBLE DELIGHTS UBE _ CHEESE LOAF 400G.png	', '4806502720165', 'GROCERY', 3441, 'BINMALEY', 'MAGIC', 'SNACKS', '2024-09-26 03:49:35', '2024-09-26 03:49:35'),
(127, 'GARDENIA HIGH FIBER WHEAT BREAD 400G', 'Soft, moist, and made from 100% wholemeal flour and natural honey. Two slices is equivalent to 20% of your daily fiber needs.', 71.60, '../../../images/products/GARDENIA HIGH FIBER WHEAT BREAD 400G.png	', '4806502721452', 'GROCERY', 3414, 'BINMALEY', 'CSI', 'SNACKS', '2024-09-26 03:50:02', '2024-09-26 03:50:02'),
(129, 'PLEDGE PRONTO LIQUID WAX NATURAL 500ML', 'Polishes your floor to a brilliant shine while preventing dirt from getting trapped in grooves and indentations.', 312.40, '../../../images/products/PLEDGE PRONTO LIQUID WAX NATURAL 500ML.png', '4801234010126', 'HOUSEHOLDS', 64564, 'DAGUPAN', 'SM', 'CLEAN', '2024-09-26 04:15:31', '2024-09-26 04:15:31'),
(130, 'STARWAX RED DYE WAX 180G', 'Starwax red dye paste floorwax is easy to apply, fast-drying, does not smell like kerosene and longer lasting.', 36.55, '../../../images/products/STARWAX RED DYE WAX 180G.png', '4800045320097', 'HOUSEHOLDS', 4124, 'DAGUPAN', 'SM', 'CLEAN', '2024-09-26 04:17:23', '2024-09-26 04:17:23'),
(131, 'PLEDGE PRONTO LIQUID WAX RED 1LITER', 'Pledge Â® Pronto Liquid Wax polishes your floors to a brilliant shine while preventing dirt from getting trapped in grooves and indentations.', 563.10, '../../../images/products/PLEDGE PRONTO LIQUID WAX RED 1LITER.png', '4801234010218', 'HOUSEHOLDS', 2314, 'DAGUPAN', 'SM', 'CLEAN', '2024-09-26 04:18:45', '2024-09-26 04:18:45'),
(132, 'SCOTCH BRITE SCOTCH BRITE NET SPONGE 1', 'An ideal tool to remove tough stains in your kitchen without making any scratches thereby giving a superior yet scratch free clean.', 50.50, '../../../images/products/SCOTCH BRITE SCOTCH BRITE NET SPONGE 1.png', '4800314005694', 'HOUSEHOLDS', 4154, 'DAGUPAN', 'SM', 'TOOLS', '2024-09-26 04:20:33', '2024-09-26 04:20:33'),
(133, 'SCOTCH BRITE SCOTCH BRITE SPONGE VALUE PACK 3S', 'Experience a gratifying clean with Scotch-Brite Heavy Duty Scrub Sponges.', 105.60, '../../../images/products/SCOTCH BRITE SCOTCH BRITE SPONGE VALUE PACK 3S.png', '4800314004390', 'HOUSEHOLDS', 2423, 'DAGUPAN', 'SM', 'TOOLS', '2024-09-26 04:25:38', '2024-09-26 04:25:38'),
(134, 'GLEAM GLEAM MURIATIC ACID 250ML ', 'Gleam Muriatic Acid 250ML contains 14%-16% hydrochloric acid, making it ideal for removing tough stains from kitchen tiles, sinks, urinals, and toilet bowls. Itâ€™s a versatile household cleaner designed for effective stain removal.', 40.60, '../../../images/products/GLEAM GLEAM MURIATIC ACID 250ML.png', '480006760172', 'HOUSEHOLDS', 100, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 05:25:10', '2024-09-26 05:25:10'),
(135, 'GLEAM MURIATIC ACID 500ML', 'Gleam Muriatic Acid 500ML contains 14%-16% hydrochloric acid, making it effective for disinfecting and removing tough stains from kitchen tiles, sinks, urinals, and toilet bowls. Itâ€™s a versatile household cleaner designed for various surfaces.', 57.90, '../../../images/products/GLEAM MURIATIC ACID 500ML.png', '4800067601747', 'HOUSEHOLDS', 100, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 05:30:18', '2024-09-26 05:30:18'),
(136, 'GLEAM LIQUID SOSA 250ML ', 'Gleam Liquid Sosa 250ML is an effective solution for unclogging sluggish pipes, sinks, and drains. It dissolves hair, grime, and grease easily and thoroughly. This product is ideal for maintaining smooth-running drains.', 73.75, '../../../images/products/GLEAM LIQUID SOSA 250ML .png', '4800067601822', 'HOUSEHOLDS', 150, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 05:34:37', '2024-09-26 05:34:37'),
(137, 'GLEAM LIQUID SOSA 500ML ', 'Gleam Liquid Sosa 500ml is an effective solution for unclogging sluggish pipes, sinks, and drains. It dissolves hair, grime, and grease easily and thoroughly, ensuring smooth drainage. For preventive maintenance, it can be used once a month by pouring 100 ml', 108.00, '../../../images/products/GLEAM LIQUID SOSA 500ML1.png', '4800067601846', 'HOUSEHOLDS', 150, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 05:38:14', '2024-09-26 05:38:14'),
(138, 'GLEAM LIQUID SOSA 1L ', 'Gleam Liquid Sosa 1L is a powerful solution designed to unclog sluggish pipes, sinks, and drains. It effectively dissolves hair, grime, and grease, ensuring thorough and rapid cleaning. For maintenance, use 100 ml monthly to keep drains running smoothly', 207.50, '../../../images/products/GLEAM LIQUID SOSA 1L.png', '4800067601860', 'HOUSEHOLDS', 180, 'DAGUPAN', 'CSI', 'CLEAN', '2024-09-26 05:44:05', '2024-09-26 05:44:05'),
(139, 'LINIX WALIS TAMBO LARGE ', 'The LINIX Walis Tambo Large is a traditional Filipino soft broom made from tiger grass (phragmites). Itâ€™s designed for sweeping smooth indoor surfaces, offering a lightweight and durable option for efficient cleaning', 253.45, '../../../images/products/LINIX WALIS TAMBO LARGE.png', '3084861', 'HOUSEHOLDS', 100, 'DAGUPAN', 'CSI', 'TOOLS', '2024-09-26 05:53:46', '2024-09-26 05:53:46'),
(140, 'MANSION OVAL BRUSH ASSORTED COLOR 1 PC', 'The Mansion Oval Brush in assorted colors is a versatile cleaning tool designed for various household tasks. Its ergonomic shape and durable bristles make it effective for scrubbing surfaces, ensuring a thorough clean.', 52.25, '../../../images/products/MANSION TOILET BRUSH BOWL 1 PC1.png', '4800196003337', 'HOUSEHOLDS', 40, 'DAGUPAN', 'CSI', 'TOOLS', '2024-09-26 06:13:04', '2024-09-26 06:13:04'),
(141, 'CLEANS UP FLOOR POLISHING PAD 240M ', 'Cleans-up Floor Polishing Pad is the new ideal way to polish and shine floors. Unlike coconut husks and natural fiber polishers. It has no shells to chip off.', 78.75, '../../../images/products/CLEANS UP FLOOR POLISHING PAD 240M.png', '4806504750221', 'HOUSEHOLDS', 50, 'DAGUPAN', 'CSI', 'TOOLS', '2024-09-26 06:16:15', '2024-09-26 06:16:15'),
(143, 'TONKITA HANDY BRUSH WITH DUSTPAN 1 PC ', 'TONKITA Handy Brush with Dust Pan Set - Handy brush dustpan set. Ideal for cleaning dust and other particles in sofa chair, carpets, car seats etc. Soft rubber lip tightly adheres to the surface, allows easy and quick sweeping. Lock system that prevents lost of brush.', 212.90, '../../../images/products/TONKITA HANDY BRUSH WITH DUSTPAN 1 PC.png', '8008990000514', 'HOUSEHOLDS', 67, 'DAGUPAN', 'CSI', 'TOOLS', '2024-09-26 06:27:37', '2024-09-26 06:27:37'),
(144, 'UNCLE JOHNS SPRAYER BLUE 1 PC ', 'All-purpose Spray Bottle: Can be used for cleaning/chemical solutions around the house, watering plants, garden, kitchen, ironing, hair products, salons', 86.00, '../../../images/products/UNCLE JOHNS SPRAYER BLUE 1 PC.png', '4806504753574', 'HOUSEHOLDS', 87, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 06:32:59', '2024-09-26 06:32:59'),
(145, 'BAYGON BAYGON SPRAYER ', 'Baygon is a pesticide brand produced by S. C. Johnson & Son. It is an insecticide used for extermination and control of household pests such as crickets, roaches, ants, carpenter ants, spiders, silverfish and mosquitoes.', 172.50, '../../../images/products/BAYGON BAYGON SPRAYER.png', '4801234116514', 'HOUSEHOLDS', 111, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 06:34:14', '2024-09-26 06:34:14'),
(147, 'BAYGON LIQUID MOSQUITO VAPORIZER REFILL 19.8G ', 'Baygon Liquid Electric is an anti-mosquitoes liquid that is practical, effective, and provides 30 nights of protection against mosquitoes and without the need to change the refill any night in between. It works thanks to a small electric diffuser, is easy to use, equipped with an in-use light.', 197.20, '../../../images/products/BAYGON LIQUID MOSQUITO VAPORIZER REFILL 19.8G.png', '4801234102227', 'HOUSEHOLDS', 120, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 09:34:49', '2024-09-26 09:34:49'),
(148, 'BAYGON MOSQUITO COIL JUMBO LAVANDER 10S  ', 'Protects your family from mosquitoes up to 10 hours. Jumbo coil size with longer protection hours.', 22.00, '../../../images/products/BAYGON MOSQUITO COIL JUMBO LAVANDER 10S1.png', '4801234134495', 'HOUSEHOLDS', 139, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 09:36:55', '2024-09-26 09:36:55'),
(149, 'BAYGON LIQUID MULTI INSECT KILLER GREEN 1L  ', 'Its powerful formula is specially designed to kill crawling, flying and garden insects. Feel confident to use it anywhere indoors or outdoors around carpets, draperies, no-wax floors, houseplants and garden plants. Won\'t damage house plants when used as directed.', 507.25, '../../../images/products/BAYGON LIQUID MULTI INSECT KILLER GREEN 1L.png', '4801234111045', 'HOUSEHOLDS', 240, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 09:38:17', '2024-09-26 09:38:17'),
(150, 'MORTEIN NATURGARD MULTI INSECT KILLER 500ML', 'Effective protection from mosquitoes, flies and cockroaches Â· Use with confidence around your family and pets Â· With fresh citrus scent.', 284.20, '../../../images/products/MORTEIN NATURGARD MULTI INSECT KILLER 500ML.png', '4801002068731', 'HOUSEHOLDS', 240, 'DAGUPAN', 'CSI', 'INSECTICIDES', '2024-09-26 09:39:37', '2024-09-26 09:39:37'),
(151, 'LYSOL DISINFECTANT SPRAY BABYSROOM BABYSROOM 340G', 'Lysol Baby\'s Room disinfectant spray kills 99.9% of the viruses and bacteria on commonly touched hard and soft surfaces in your baby\'s room.', 416.15, '../../../images/products/LYSOL DISINFECTANT SPRAY BABY ROOM BABY ROOM 340G.png', '19200850889', 'HOUSEHOLDS', 213, 'DAGUPAN', 'CSI', 'FRESHENERS', '2024-09-26 10:13:57', '2024-09-28 07:25:29'),
(152, 'ALBATROSS DISINFECTANT SPRAY CLEAN BREEZE 300ML', 'A versatile product that kills 99.9% of viruses, bacteria, and fungi. Combat odors of several different surfaces, through a fresh scent.', 203.00, '../../../images/products/ALBATROSS DISINFECTANT SPRAY CLEAN BREEZE 300ML.png', '4800067133651', 'HOUSEHOLDS', 231, 'DAGUPAN', 'CSI', 'FRESHENERS', '2024-09-26 10:15:37', '2024-09-26 10:15:37'),
(153, 'LYSOL DISINFECTANT SPRAY FRESH BLOSSOMS 340G', 'Kills 99.9% of bacteria on soft surfaces as a spot treatment. Kill 100 illness causing germs. Repeat applications in weekly intervals or when mold and mildew.', 416.15, '../../../images/products/LYSOL DISINFECTANT SPRAY FRESH BLOSSOMS 340G.png', '480100206290', 'HOUSEHOLDS', 232, 'DAGUPAN', 'CSI', 'FRESHENERS', '2024-09-26 10:17:09', '2024-09-26 10:17:09'),
(154, 'MODESS COTTONY SOFT SANITARY NAPKINS ALL NIGHT WITH WINGS 10 PADS', 'may bini pc sa loob ', 9999.00, '../../../images/products/modess.jpg', '19818273', 'GROCERY', 8, 'LINGAYEN', 'SM', 'PERSONAL', '2024-09-26 10:53:12', '2024-09-26 10:53:12'),
(155, 'SAFEGUARD BAR SOAP PURE WHITE 60G', 'Antibacterial & Antifungal Soap facilitates protection of users after wash by slowing down the regrowth of germs, bacteria and fungi.', 18.45, '../../../images/products/SAFEGUARD BAR SOAP PURE WHITE 60G.png', '4902430945554', 'HEALTH', 9999, 'DAGUPAN', 'SM', 'SKIN', '2024-09-27 04:23:54', '2024-09-27 04:23:54'),
(156, 'SAFEGUARD BAR SOAP WHITE CAMELLIA 160GX3', 'Germ Protection For The Whole Family Removes 99.9% Of Germs* Removes Skin Germs That May Cause Skin Infection Pimple Infection And Perspiration Odor.', 189.15, '../../../images/products/SAFEGUARD BAR SOAP WHITE CAMELLIA 160GX3.png', '4987176220677', 'HEALTH', 9999, 'DAGUPAN', 'SM', 'SKIN', '2024-09-27 04:25:54', '2024-09-27 04:25:54'),
(157, 'KOJIESAN SKIN LIGHTENING SOAP 135G', 'Kojie San Lightening Soap contains highly effective, FDA-approved kojic acid, which eliminates and lightens skin cells, so that skin appears visibly lighter.', 72.10, '../../../images/products/KOJIESAN SKIN LIGHTENING SOAP 135G.png', '4809013300017', 'HEALTH', 6723, 'DAGUPAN', 'SM', 'SKIN', '2024-09-27 04:29:14', '2024-09-27 04:29:14'),
(158, 'COLGATE DENTAL FLOSS TOTAL MINT WAX 50M', 'Colgate Â® Total Â® Mint Waxed Dental Floss is durable, easy-to-use dental floss that removes plaque to prevent tartar build-up between dental cleanings.', 124.35, '../../../images/products/COLGATE DENTAL FLOSS TOTAL MINT WAX 50M.png', '4808888200668', 'HEALTH', 4132, 'DAGUPAN', 'SM', 'ORAL', '2024-09-27 04:30:59', '2024-09-27 04:30:59'),
(159, 'POLIDENT DENTURE ADHESIVE CREAM FRESH MINT 40G', 'Polident Adhesive Cream Original Fresh Mint provides strong, all-day hold with up to 38% more bite force.', 257.00, '../../../images/products/POLIDENT DENTURE ADHESIVE CREAM FRESH MINT 40G.png', '4800318407586', 'HEALTH', 6526, 'DAGUPAN', 'SM', 'ORAL', '2024-09-27 04:32:55', '2024-09-27 04:32:55'),
(160, 'CLEANSTAR DENTAL FLOSS BAMBOO CHARCOAL 50 PICKS', 'Our Floss Pick is designed to glide effortlessly between your teeth, removing plaque, food particles, and bacteria with every gentle sweep.', 80.20, '../../../images/products/CLEANSTAR DENTAL FLOSS BAMBOO CHARCOAL 50 PICKS.png', '6924494500317', 'HEALTH', 5133, 'DAGUPAN', 'SM', 'ORAL', '2024-09-27 04:34:55', '2024-09-27 04:34:55'),
(161, 'POLIDENT WHITENING DAILY CLEANSER FOR DENTURES 6 TABLETS', 'POLIDENT WHITENING DAILY CLEANSER FOR DENTURES 6 TABLETSâ‚± 77.05Brand:SKU: 742402-118-4800318002156', 77.05, '../../../images/products/POLIDENT WHITENING DAILY CLEANSER FOR DENTURES 6 TABLETS.png', '4800318002156', 'HEALTH', 5233, 'DAGUPAN', 'SM', 'ORAL', '2024-09-27 04:35:28', '2024-09-27 04:35:28'),
(162, 'ADVANCE EB LIP & CHEEK STAIN VERY RED 20ML', 'EB Advance Lip and Cheek Stain is a makeup tint used to add color to your lips and cheeks.', 203.00, '../../../images/products/ADVANCE EB LIP _ CHEEK STAIN VERY RED 20ML.png', '4800310133612', 'HEALTH', 5236, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-27 04:57:21', '2024-09-27 04:57:21'),
(163, 'EVER BILENA ORIGINAL PENCIL BROWN 12CM', 'Lighter pencil options for that natural definition of eyes or brows. Enriched with Vitamin E that conditions the skin.', 137.05, '../../../images/products/EVER BILENA ORIGINAL PENCIL BROWN 12CM.png', '4800310180258', 'HEALTH', 5232, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-27 05:04:22', '2024-09-27 05:04:22'),
(164, 'CARELINE BEST BROW LINER BRUNETTE 3G', 'Get #blessed looking brows with Careline Best Brow Liner.', 197.95, '../../../images/products/CARELINE BEST BROW LINER BRUNETTE 3G.png', '4800310125105', 'HEALTH', 4121, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-27 05:07:53', '2024-09-27 05:07:53'),
(165, 'EVER BILENA CARELINE FACE POWDER NATURAL 12G', 'It\'s an natural face powder that gives smooth and natural looks in skin and face control oiliness in the face.', 152.25, '../../../images/products/EVER BILENA CARELINE FACE POWDER NATURAL 12G.png', '4800310131809', 'HEALTH', 2112, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-27 05:10:23', '2024-09-27 05:10:23'),
(166, 'IWHITE KOREA WHITENING PACK PEEL OFF MASK 8ML', 'A whitening peel-off mask that effectively gets rid of skin impurities while revealing a brighter, clearer, and smoother complexion.', 25.40, '../../../images/products/IWHITE KOREA WHITENING PACK PEEL OFF MASK 8ML.png', '4809012902106', 'HEALTH', 1241, 'DAGUPAN', 'SM', 'FACIAL', '2024-09-27 05:12:19', '2024-09-27 05:12:19');
INSERT INTO `items` (`id`, `name`, `description`, `price`, `image_url`, `EAN`, `category`, `stock_quantity`, `location`, `distributor`, `tags`, `created_at`, `updated_at`) VALUES
(167, 'PURE BASICS OIL CONTROL FILM 50 SHEETS', 'Pure Basics Oil Control 50 Sheets Effectively removes oil and dirt leaving your face clear all day long 50sheets', 98.00, '../../../images/products/PURE BASICS OIL CONTROL FILM 50 SHEETS.png', '4800399044939', 'HEALTH', 2414, 'DAGUPAN', 'SM', 'FACIAL', '2024-09-27 05:15:28', '2024-09-27 05:15:28'),
(168, 'HELLO GLOW PIMPLE PATCH - CLEAR 30S', 'Product Features and Benefits contains 30 clear patches covers active pimples protect skin and active pimples.', 203.00, '../../../images/products/HELLO GLOW PIMPLE PATCH - CLEAR 30S.png', '4800310154877', 'HEALTH', 2332, 'DAGUPAN', 'SM', 'FACIAL', '2024-09-27 05:17:33', '2024-09-27 05:17:33'),
(169, 'IWHITE KOREA THE BLACK EXTRACTOR NOSE PACK 3.5ML', 'The Black Extractor. Infused with activated micro-charcoal, this cream-type nose pack deeply decongests clogged pores and effectively removes impurities.', 23.35, '../../../images/products/IWHITE KOREA THE BLACK EXTRACTOR NOSE PACK 3.5ML.png', '4806529060572', 'HEALTH', 3221, 'DAGUPAN', 'SM', 'FACIAL', '2024-09-27 05:18:50', '2024-09-27 05:18:50'),
(170, 'WHISKAS ADULT CAT DRY FOOD OCEANFISH 1.2KG', 'Whiskas Dry Food; Ocean Fish Flavor; Adult Cat, 1 year and older; Complete Nutrition; Healthy Bone and Body Grow; Contains Antioxidant.', 301.50, '../../../images/products/WHISKAS ADULT CAT DRY FOOD OCEANFISH 1.2KG.png', '9310022866104', 'HOUSEHOLDS', 76, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 10:11:45', '2024-09-27 10:11:45'),
(171, 'PEDIGREE CAN CHICKEN 700G', 'Pedigree Can is also enriched with Vitamin E and Omega 6 for healthy skin and a beautiful coat. The superb taste from real meat ensures pure enjoyment for dog.', 172.30, '../../../images/products/PEDIGREE CAN CHICKEN 700G.png', '9310022726903', 'HOUSEHOLDS', 76, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 10:22:42', '2024-09-27 10:22:42'),
(172, 'PET ONE PUPPY FOOD 1.4 KG', 'Recommended for Growing puppies ages 3 weeks to 12 months. It also contains milk as a source of calcium for better development of strong bones and muscles.', 213.15, '../../../images/products/PET ONE PUPPY FOOD 1.4 KG.png', '4809012024044', 'HOUSEHOLDS', 76, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 10:25:46', '2024-09-27 10:25:46'),
(173, 'PEDIGREE POUCH CHICKEN & LIVER 130G', 'Pedigree Pouch does not only provide your dogs with Complete and Balanced nutrition, but also gives them a superb taste with meaty chunks for their enjoyment.', 40.85, '../../../images/products/PEDIGREE POUCH CHICKEN _ LIVER 130G.png', '8853301530040', 'HOUSEHOLDS', 78, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 10:27:17', '2024-09-27 10:27:17'),
(174, 'HARVEY FRESH FRESH PET MILK MILK 1L', 'Cosi is formulated and highly delicious milk for pets of all ages. Lactose, the sugar found in regular milk can cause upset tummies for pets.', 174.60, '../../../images/products/HARVEY FRESH FRESH PET MILK MILK 1L.png', '9311697101255', 'HOUSEHOLDS', 78, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 10:28:16', '2024-09-27 10:28:16'),
(175, 'CATSAN CAT LITTER 5L', 'Catsan 5L remove solids and clumps as part of the daily cat routine. CatsanÂ® Ultra Odor Control Cat Litter is a quality cat litter made from naturally occurring Sodium Bentonite. A hygienic, handy and effective answer to controlling odor.', 256.80, '../../../images/products/CATSAN CAT LITTER 5L.png', '6914973108462', 'HOUSEHOLDS', 98, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 11:14:09', '2024-09-27 11:14:09'),
(176, 'CLAS PET BOWL DOUBLE MEDIUM', 'Made of 100% Melamine material which is non-toxic Â· Comes with additional steel bowl inside for easy cleaning', 107.60, '../../../images/products/CLAS PET BOWL DOUBLE MEDIUM.png', '7419478', 'HOUSEHOLDS', 89, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 11:18:47', '2024-09-27 11:18:47'),
(177, 'BFF PET BFF DOG SHIRT PRINTED', 'Check out our dog bff shirt selection for the very best in unique or custom, handmade pieces from our clothing shops.', 131.95, '../../../images/products/BFF PET BFF DOG SHIRT PRINTED.png', '7865497', 'HOUSEHOLDS', 89, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 11:21:05', '2024-09-27 11:21:05'),
(178, 'BFF PET BFF PET UNDERWEAR', 'BFF Period Undies are designed to provide leak-proof protection during your period, combining comfort and style in various colors like Black, Natural, Pale Pink, and Baby Blue. B.F.F. Pet Products offers a range of pet supplies, including toys and accessories for cats and dogs, ensuring your furry friends are happy and entertained.', 89.35, '../../../images/products/BFF PET BFF PET UNDERWEAR.png', '7865510', 'HOUSEHOLDS', 88, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 11:23:51', '2024-09-27 11:23:51'),
(179, 'BFF PET BFF PET SHOES ', 'B.F.F. Pet Shoes are designed to protect your petâ€™s paws from various terrains and weather conditions. These shoes are durable, lightweight, and often feature reflective details for added safety during nighttime walks', 152.25, '../../../images/products/BFF PET BFF PET SHOES.png', '7865527', 'HOUSEHOLDS', 88, 'DAGUPAN', 'CSI', 'PET ', '2024-09-27 11:25:28', '2024-09-27 11:25:28'),
(180, 'BFF PET BFF PET DIAPER XS/S/M XS/S/M', 'B.F.F. Pet Diapers are designed to provide comfort and protection for pets with urinary incontinence, excitable urination, or during heat cycles. Available in sizes XS, S, and M, these diapers feature leak-proof barriers and adjustable fasteners to ensure a secure fit.', 40.60, '../../../images/products/BFF PET BFF PET DIAPER XSSM XSSM.png', '7865541', 'HOUSEHOLDS', 77, 'DAGUPAN', 'CSI', 'PET ', '2024-09-27 11:30:46', '2024-09-27 11:30:46'),
(181, 'BFF PET BFF PET DIAPER L/XL L/XL', 'The BFF PET Diaper in L/XL size is designed for large dogs, offering a secure and comfortable fit. These diapers are highly absorbent, providing effective protection against leaks and accidents, making them ideal for managing incontinence or house training.', 45.70, '../../../images/products/BFF PET BFF PET DIAPER LXL LXL1.png', '7865558', 'HOUSEHOLDS', 70, 'DAGUPAN', 'CSI', 'PET', '2024-09-27 11:32:24', '2024-09-27 11:32:24'),
(182, 'BFF PET BFF PET TOY ', 'The BFF PET Toy is a delightful and durable plaything designed to keep your pet entertained for hours. Made from safe, non-toxic materials, it features a fun and engaging design that encourages active play and mental stimulation.', 60.90, '../../../images/products/BFF PET BFF PET TOY.png', '7865565', 'HOUSEHOLDS', 65, 'DAGUPAN', 'CSI', 'PET ', '2024-09-27 11:34:04', '2024-09-27 11:34:04'),
(183, 'BFF PET BFF DOG LEASH', 'The BFF PET Dog Leash is an eco-friendly option made from recycled materials, available in vibrant patterns. It features an adjustable handle for a comfortable grip and comes in various lengths to suit different walking needs.', 81.20, '../../../images/products/BFF PET BFF DOG LEASH.png', '7865572', 'HOUSEHOLDS', 64, 'DAGUPAN', 'CSI', 'PET ', '2024-09-27 11:35:44', '2024-09-27 11:35:44'),
(184, 'CADBURY SHOTS 18G', 'Take a bite of Cadbury chocolate and lose yourself in the rich and creamy chocolate goodness. PERFECT FOR SNACKING, SHARING OR GIFTING â€“ Enjoy the delicious taste of Cadbury chocolate as a sweet snack for yourself, your kids or share with your family and friends during a party.', 9.40, '../../../images/products/CADBURY SHOTS 18G.png	', '8901233028637', 'GROCERY', 4213, 'DAGUPAN', 'SM', 'SNACKS', '2024-09-28 03:36:41', '2024-09-28 03:36:41'),
(185, 'BABYFLO CROSSCUT 2\'S SILICONE NIPPLES', 'Silicone nipples in blister packs that is distinctive for specific feeding bottle.', 90.75, '../../../images/products/BABYFLO CROSSCUT 2_S SILICONE NIPPLES.png', '4800067052310', 'HEALTH', 150, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 04:14:56', '2024-10-10 05:35:38'),
(186, 'NURTURE WIDENECK 2\'S SILICONE NIPPLES', 'Specially design to promote latch-on and eases the transition between breast and bottle. Fits all standard Wide neck bottles. 100% Dishwasher safe.', 93.00, '../../../images/products/NURTURE WIDENECK 2_S SILICONE NIPPLES.png', '4800147108418', 'HEALTH', 99, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 04:18:06', '2024-10-10 05:36:49'),
(187, 'LOONEY TUNES PERISTALTIC SILICONE NIPPLES SMALL', 'Baby Looney Tunes (TM) Peristaltic Silicone Nipples are made with the highest standards of â€œmedical gradeâ€ silicone material.', 199.00, '../../../images/products/LOONEY TUNES PERISTALTIC SILICONE NIPPLES SMALL.png', '3755365', 'HEALTH', 101, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 04:33:25', '2024-10-10 05:36:59'),
(188, 'LOONEY TUNES SILICONE NIPPLES 2\'S SMALL', 'Super soft and stretches in response to your baby\'s sucking action. Made from high-grade silicone material. PVC free and safety tested.', 115.00, '../../../images/products/LOONEY TUNES SILICONE NIPPLES 2_S SMALL.png', '3756218', 'HEALTH', 100, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 04:36:15', '2024-09-28 11:18:48'),
(189, 'MC METAL POLISH 125ML', 'MC Metal Polish 125ML is a versatile polishing solution designed for various metal surfaces, including copper, brass, silver, bronze, nickel, aluminum, and zinc. It effectively cleans and polishes these metals, making it ideal for auto glass, porcelain tiles, and bathroom fixtures.', 105.00, '../../../images/products/MC METAL POLISH 125ML.png', '3007001078622', 'HOUSEHOLDS', 80, 'DAGUPAN', 'CSI', 'HOUSE', '2024-09-28 04:41:13', '2024-09-28 04:41:13'),
(190, 'LOONEY TUNES BRUSH AND COMB SET WITH NON-SLIP GRIP', 'Looney Tunes (TM) BPA-FREE Brush & Comb Set are designed to detangle, smooth and style your baby\'s hair.', 219.00, '../../../images/products/LOONEY TUNES BRUSH AND COMB SET WITH NON_SLIP GRIP.png', '3756201', 'HEALTH', 98, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 04:41:43', '2024-09-28 11:18:48'),
(191, 'LOONEY TUNES NEWBORN SILICONE NIPPLES 2\'S', 'Baby Looney Tunes (TM) Newborn Nipples are made from 100% high-grade silicone material that resists any reactions with liquids.', 138.00, '../../../images/products/LOONEY TUNES NEWBORN SILICONE NIPPLES 2_S.png', '3756232', 'HEALTH', 80, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 04:44:22', '2024-09-28 11:18:48'),
(192, 'TENDERLUV SILICONE NIPPLE', 'A nipple shield is a thin, silicone device that covers your real nipple during breastfeeding. It helps babies who are having issues latching onto the breast.', 34.00, '../../../images/products/TENDERLUV SILICONE NIPPLE.png', '3760123', 'HEALTH', 70, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 04:47:35', '2024-09-28 11:18:48'),
(194, 'TENDERLUV SILICONE NIPPLES 3\'S', 'Tender Luv(TM) Newborn Rubber Nipples are made from 100% food grade natural rubber material that resists any reactions with liquids and is usually preferred for its softness and elasticity.', 89.00, '../../../images/products/TENDERLUV SILICONE NIPPLES 3_S.png	', '3760154', 'HEALTH', 80, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 04:50:25', '2024-09-28 11:18:48'),
(195, 'LOONEY TUNES MULTI-COLORED SILICONE TEETHER', 'Looney Tunes (TM) Silicone Teether is developed to soothe and give comfort to your babies. It is made from a soft and chewy silicone material.', 229.00, '../../../images/products/LOONEY TUNES MULTI-COLORED SILICONE TEETHER.png', '4465263', 'HEALTH', 60, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 04:53:16', '2024-09-28 11:18:48'),
(196, 'WD40 LUBRICANT OIL 60Z', 'WD-40 Lubricant Oil 6oz is a versatile, multi-use product that protects metal from rust and corrosion, penetrates stuck parts, displaces moisture, and lubricates almost anything. Itâ€™s ideal for a wide range of applications, from household fixes to industrial maintenance', 320.00, '../../../images/products/WD40 LUBRICANT OIL 60Z.png', '3007001028023', 'HOUSEHOLDS', 80, 'DAGUPAN', 'CSI', 'HOUSE', '2024-09-28 04:56:35', '2024-09-28 04:56:35'),
(197, 'LOONEY TUNES MILKER WITH DIVISION', 'LOONEY TUNES MILKER WITH DIVISION', 249.00, '../../../images/products/LOONEY TUNES MILKER WITH DIVISION.png', '3757208', 'HEALTH', 140, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 04:56:49', '2024-09-28 11:18:48'),
(198, 'TENDERLUV DREAMWORKS BABY 3-LAYER SUPER MILKER', 'Made free from toxic Bisphenol-A (BPA)Hold up to 5-8 scoopsPerfect for travel!Dishwasher & sterilizer safe', 119.00, '../../../images/products/TENDERLUV DREAMWORKS BABY 3_LAYER SUPER MILKER.png', '3760611', 'HEALTH', 90, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 05:04:49', '2024-09-28 11:18:48'),
(199, 'VHC GENERIC IGNITER EL120188', 'The VHC Generic Igniter EL120188 is a reliable and cost-effective ignition solution for various kitchen appliances. It ensures efficient and consistent ignition, making it a practical choice for everyday use.', 80.00, '../../../images/products/VHC GENERIC IGNITER EL120188.png', '3007001167661', 'HOUSEHOLDS', 80, 'DAGUPAN', 'CSI', 'TOOLS', '2024-09-28 05:06:01', '2024-09-28 05:06:01'),
(200, 'TENDERLUV FEEDING BOTTLE HOODS 3\'S', 'Tender Luv 3-pc Feeding Bottle HoodsFeeding Bottle Neck: Regular / Standard-Mixed with yellowish', 59.75, '../../../images/products/TENDERLUV FEEDING BOTTLE HOODS 3_S.png', '3760291', 'HEALTH', 100, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 05:06:33', '2024-09-28 11:18:48'),
(202, 'TENDERLUV FEEDING BOTTLE SCREW CAPS 3\'S', 'Fit to standard or regular neck bottle. Description. Tender Luv 3-pc Feeding Bottle Screw Caps can fit to standard or regular neck bottles. ', 34.75, '../../../images/products/TENDERLUV FEEDING BOTTLE SCREW CAPS 3_S.png', '3760307', ' HEALTH', 100, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 05:14:55', '2024-09-28 11:18:48'),
(203, 'PUR TWO HANDLE CUP', 'Pur Spill Proof Cup with twin handles helps baby change from nipple to cup feeding. After cup feeding is learnt, cup can be used without the spout lid.', 220.00, '../../../images/products/PUR TWO HANDLE CUP.png', '8850596855087', ' HEALTH', 96, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 05:19:16', '2024-09-28 11:18:48'),
(204, 'BABYFLO QUENCH CUP', 'Train your baby to drink in a cup without choking. Includes a soft silicone spout. Use with or without spout lid. BPA Free safe for drinking babies.', 105.75, '../../../images/products/BABYFLO QUENCH CUP.png	', '4800067058435', ' HEALTH', 87, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 05:20:44', '2024-09-28 05:20:44'),
(205, 'BABYFLO PREEMIE NURSER FEEDING BOTTLES 2OZ', 'Made from non-toxic polypropylene. BPA-free material. Includes Preemie. Silicone Nipple.', 82.00, '../../../images/products/1BABYFLO PREEMIE NURSER FEEDING BOTTLES 2OZ.png	', '4800067049051', ' HEALTH', 67, 'DAGUPAN', 'SM', 'BABY', '2024-09-28 05:24:03', '2024-09-28 05:24:03'),
(206, 'BABYJOY TRAVEL SET', 'This carry on luggage set is made of high-quality ABS material, which ensures long-term use and is not easy to deform. Plus, covered with frosted film, the surface features waterproof and easy maintenance. The kids\' luggage has passed ASTM and CPSIA certification to ensure toddlers\' safety.', 659.00, '../../../images/products/BABYJOY TRAVEL SET.png	', '4800147112071', ' HEALTH', 54, 'LINGAYEN', 'CSI', 'BABY', '2024-09-28 05:27:56', '2024-09-28 05:27:56'),
(207, 'BABYFLO HARD & SOFT TEETHER', 'Babyflo Teether Hard & Soft Designed to cool and soothe inflamed gums during teething stage. BPA Free', 95.50, '../../../images/products/BABYFLO HARD _ SOFT TEETHER.png	', '4800067049181', ' HEALTH', 77, 'BINMALEY', 'MAGIC', 'BABY', '2024-09-28 05:28:54', '2024-09-28 05:28:54'),
(208, 'PURE BASICS TOOTHBRUSH TWISTER 2+1', 'PURE BASICS TOOTHBRUSH TWISTER 2+1 Â· COLGATE TOOTHBRUSH CLASSIC DEEP CLEAN HANGING MAT WITH CAP MEDIUM COLGATE TOOTHBRUSH CLASSIC DEEP', 99.00, '../../../images/products/PURE BASICS TOOTHBRUSH TWISTER 2_1.png	', '4800399044953', ' HEALTH', 200, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 10:40:01', '2024-09-28 10:40:01'),
(209, 'PURE BASICS BATH GLOVES 1 PAIR', 'Comfortable Fit: Designed to fit comfortably on your hands, ensuring ease of use during bath or shower.', 45.50, '../../../images/products/PURE BASICS BATH GLOVES 1 PAIR.png	', '7387999', ' HEALTH', 235, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 10:42:20', '2024-09-28 10:42:20'),
(210, 'COLGATE TOOTHBRUSH EASY COMFORT 1 PK', 'Its 15mm wide head design has 150%* more bristles for wider reach ensuring greater coverage while you brush while providing gentle gum cleaning. ', 191.85, '../../../images/products/COLGATE TOOTHBRUSH EASY COMFORT 1 PK.png	', '4710168726952', ' HEALTH', 199, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 10:43:55', '2024-09-28 10:43:55'),
(211, 'PURE BASICS BATH SPONGE 1PC', 'Pure Basics Bath Sponge Â· Made in soft and comfy material. Quick dry.', 39.50, '../../../images/products/PURE BASICS BATH SPONGE 1PC.png', '7387982', ' HEALTH', 99, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 10:46:50', '2024-09-28 10:46:50'),
(212, 'IRISH SPRING 3 BAR DEODORANT SOAP ORIGINAL 3.7OZ', 'Irish Spring Original Clean, the new name for our Original bar soap, has a fresh look and a great smell. Has flaxseed oil. This bar soap for men is mild for skin, so you can feel as great as you smell. 98% naturally derived formula that\'s paraben, phthalate and gluten free.', 171.55, '../../../images/products/IRISH SPRING 3 BAR DEODORANT SOAP ORIGINAL 3_7OZ.png', '35000141088', ' HEALTH', 78, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 10:50:17', '2024-09-28 10:50:17'),
(213, 'DR. KAUFMANN MEDICATED SULFUR SOAP 80G', 'It has Sulfur and Zinc Oxide that help remove common skin problems while keeping your skin healthy. It helps dry pimples and prevent acne, blackheads, rough and oily skin, dematitis, scabies, eczema, lice, dandruff, crusty scales and sores. It also helps relieve itchy skin.', 44.45, '../../../images/products/DR. KAUFMANN MEDICATED SULFUR SOAP 80G.png', '4800003492569', ' HEALTH', 88, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 10:52:15', '2024-09-28 10:52:15'),
(214, 'BIODERM GERMICIDAL BAR SOAP COOLNESS 60G', 'Bioderm Germicidal Soap gives 24-hour protection & is safe on the skin. Protects from germs that can cause illnesses & body odor. It is effective in treating acne, pimples, and other skin infections. Helps lighten dark spots and acne marks as it eradicates dead skin.', 17.45, '../../../images/products/BIODERM GERMICIDAL BAR SOAP COOLNESS 60G.png', '4800011113937', ' HEALTH', 90, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 10:53:46', '2024-09-28 10:53:46'),
(215, 'BIODERM SOAP COOLNESS BLUE 135G', 'Protects from germs that can cause illnesses and body odor. It is effective in treating acne, pimples, and other skin infections. Helps lighten dark spots and acne marks as it eradicates dead skin. Sold per box contains 135 grams of Bioderm Germicidal Soap Coolness.', 42.45, '../../../images/products/BIODERM SOAP COOLNESS BLUE 135G.png', '4800011113968', ' HEALTH', 88, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 10:58:06', '2024-09-28 10:58:06'),
(216, 'BIODERM SOAP BLOOM PINK 90G', 'Bioderm Germicidal Soap gives 24-hour protection and is safe on the skin. Protects from germs that can cause illnesses and body odor. It is effective in treating acne, pimples, and other skin infections. Helps lighten dark spots and acne marks as it eradicates dead skin.', 31.10, '../../../images/products/BIODERM SOAP BLOOM PINK 90G.png', '4800011115047', ' HEALTH', 77, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 10:59:48', '2024-09-28 10:59:48'),
(217, 'BIODERM SOAP BLOOM PINK 135G', 'Bioderm Bloom is an ideal skin-germ protection for the whole family with its 99.9% germ killing action with up to 24-hrs protection.', 41.45, '../../../images/products/BIODERM SOAP BLOOM PINK 135G.png', '4800011115061', ' HEALTH', 23, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:07:50', '2024-09-28 11:07:50'),
(218, 'SULPHUR SOAP 80G', 'A soap bar for both face and body suited for oily and acne-prone skin. With 2.5% Sulfur that helps cleanse the skin, helps clear clogged pores, and helps reduce excess oil and accumulation of bacteria.', 37.15, '../../../images/products/SULPHUR SOAP 80G.png', '4800011179049', ' HEALTH', 230, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:09:35', '2024-09-28 11:09:35'),
(219, 'GREEN CROSS SOAP PURE CARE 125G', 'It is clinically tested to kill more than 99.9% of disease and odor-causing germs, with protection that lasts up to 24 hours. It has added Vitamin E and moisturizers to nourish the skin, keeping it soft and smooth. Has long-lasting fragrance for a more enjoyable bathing experience.', 37.25, '../../../images/products/GREEN CROSS SOAP PURE CARE 125G.png', '4800047863042', ' HEALTH', 200, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 11:11:24', '2024-09-28 11:11:24'),
(220, 'GREEN CROSS SOAP COOL MOUNTAIN 125G', 'It is clinically tested to kill more than 99.9% of disease and odor-causing germs, with protection that lasts up to 24 hours. It has added Vitamin E and moisturizers to nourish the skin, keeping it soft and smooth. Has long-lasting fragrance for a more enjoyable bathing experience.', 36.90, '../../../images/products/GREEN CROSS SOAP COOL MOUNTAIN 125G.png', '4800047863134', ' HEALTH', 200, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:12:20', '2024-09-28 11:12:20'),
(221, 'GREEN CROSS SOAP AQUA CLEAN 125G', 'It is clinically tested to kill more than 99.9% of disease and odor-causing germs, with protection that lasts up to 24 hours. It has added Vitamin E and moisturizers to nourish the skin, keeping it soft and smooth. Has long-lasting fragrance for a more enjoyable bathing experience.', 36.90, '../../../images/products/GREEN CROSS SOAP AQUA CLEAN 125G.png', '4800047865282', ' HEALTH', 300, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 11:14:43', '2024-09-28 11:14:43'),
(222, 'BABYFLO ABSORBENT COTTON BUDS PLIABLE PAPER STEMS 200 TIPS', 'Babyflo Cotton Buds is a trusted heritage brand that offers a range of high quality cotton buds products at affordable prices. Tips are made from 100% cotton and available in biodegradable paper stem. Imported from Thailand.', 39.35, '../../../images/products/BABYFLO ABSORBENT COTTON BUDS PLIABLE PAPER STEMS 200 TIPS.png', '4800067054161', ' HEALTH', 199, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 11:25:00', '2024-09-28 11:25:00'),
(223, 'OLD SPICE ANTIPERSPIRANT & DEODORANT MAGNATE 2.6 OZ', 'Old Spice deodorant inhibits odor causing bacteria and is infused with the freshest scents known to man.', 405.00, '../../../images/products/OLD SPICE ANTIPERSPIRANT _ DEODORANT MAGNATE 2_6 OZ.png', '12044011133', ' HEALTH', 199, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 11:27:21', '2024-09-28 11:27:21'),
(224, 'BABYFLO GENTLE BUDS PAPER STEM 200 TIPS', 'Babyflo Cotton Buds is a trusted heritage brand that offers a range of high quality cotton buds products at affordable prices. Tips are made from 100% cotton and available in biodegradable paper stem. Imported from Thailand', 42.90, '../../../images/products/BABYFLO GENTLE BUDS PAPER STEM 200 TIPS.png', '4800067055168', ' HEALTH', 177, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:29:35', '2024-09-28 11:29:35'),
(225, 'OLD SPICE DEODORANT WOLFTHORN STICK 73G', 'Old Spice Wolfthorn Anti-perspirant and Deodorant for men is an invisible solid with triple protection powerâ€”unleashing fierce odor protection, a ridiculously long-lasting scent, and reducing unwanted underarm wetness. This invisible solid goes on ... you guessed it, invisible and leaves you feeling dry.', 405.00, '../../../images/products/OLD SPICE DEODORANT WOLFTHORN STICK 73G.png', '12044038611', ' HEALTH', 66, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:31:45', '2024-09-28 11:31:45'),
(226, 'BABYFLO GENTLE BUDS PLASTIC WHITE 200 TIPS', 'Used to clean the ear canal by removing earwax. With serrated plastic stems for better grip. It comes in a resealable plastic pouch. ', 33.00, '../../../images/products/BABYFLO GENTLE BUDS PLASTIC WHITE 200 TIPS.png', '4800067055861', ' HEALTH', 99, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 11:36:58', '2024-09-28 11:36:58'),
(227, 'OLD SPICE DEODORANT HIGH ENDURANCE FRESH DRY CREAM 14G', '100% Authentic ! Endurance. Long lasting. Stick. We practically threw every word that means stamina into this things name because it works. It provides odor protection all day ', 96.45, '../../../images/products/OLD SPICE DEODORANT HIGH ENDURANCE FRESH DRY CREAM 14G.png', '20800306348', ' HEALTH', 88, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:48:47', '2024-09-28 11:48:47'),
(228, 'BABYFLO GENTLE BUDS PLASTIC PINK 200 TIPS', 'Used to clean the ear canal by removing earwax. With serrated plastic stems for better grip. It comes in a resealable plastic pouch. This can also be used for applying', 33.00, '../../../images/products/BABYFLO GENTLE BUDS PLASTIC PINK 200 TIPS.png', '4800067055946', ' HEALTH', 110, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:51:06', '2024-09-28 11:51:06'),
(229, 'OLD SPICE DEODORANT PURE SPORT DRY CREAM 45G', 'OLD SPICE DEODORANT PURE SPORT DRY CREAM 45G', 238.55, '../../../images/products/OLD SPICE DEODORANT PURE SPORT DRY CREAM 45G.png', '20800718332', ' HEALTH', 222, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:54:13', '2024-09-28 11:54:13'),
(230, 'BABYFLO GENTLE BUDS PLASTIC GREEN 200 TIPS', 'Used to clean the ear canal by removing earwax. With serrated plastic stems for better grip. It comes in a resealable plastic pouch. ', 33.00, '../../../images/products/BABYFLO GENTLE BUDS PLASTIC GREEN 200 TIPS.png', '4800067055991', ' HEALTH', 90, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 11:57:21', '2024-09-28 11:57:21'),
(231, 'NIVEA MEN DEO ROLL ON DEEP EXTREME 50ML', 'NIVEA Men Deep Extreme Deo Roll-On 50ml', 162.40, '../../../images/products/NIVEA MEN DEO ROLL ON DEEP EXTREME 50ML.png', '4005800345432', ' HEALTH', 290, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 11:59:21', '2024-09-28 11:59:21'),
(232, 'CLEENE COTTON ROLLS 50G', 'Absorbency: The New Cleene Pure and Absorbent Cotton Rolls are designed to provide maximum absorption of makeup, ensuring that your makeup stays in place all day long.', 33.25, '../../../images/products/CLEENE COTTON ROLLS 50G.png', '4800067112090', ' HEALTH', 199, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:07:34', '2024-09-28 12:07:34'),
(233, 'NIVEA DEODORANT ROLL-ON EXTRA BRIGHT & FIRM 50ML', 'rightens, smoothens and firms up underarm skin. 10 skin nutrients and vitamins brightens, moisturizes skin and minimizes pores. 48H anti-perspirant protection.', 121.00, '../../../images/products/NIVEA DEODORANT ROLL_ON EXTRA BRIGHT _ FIRM 50ML.png', '4005808230518', ' HEALTH', 180, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 12:10:22', '2024-09-28 12:10:22'),
(234, 'CLEENE COTTON ROLLS 100G', 'Cleene Absorbent Cotton Roll 100gAlways New and Fresh StocksGuaranteed Long Expiry DateNo need to reconfirm Actual Expiry DatesAll images take are actual products.', 62.20, '../../../images/products/CLEENE COTTON ROLLS 100G.png', '4800067112120', ' HEALTH', 120, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 12:13:05', '2024-09-28 12:13:05'),
(235, 'Andokâ€™s Lechon Sauce 340g/12oz', 'Anong sinabi ni chooks to go ey.', 98.00, '../../../images/products/Andokâ€™s Lechon Sauce 340g12oz.png', '1480006815116', 'GROCERY', 312, 'DAGUPAN', 'SM', 'SAUCES', '2024-09-28 12:13:37', '2024-09-28 12:13:37'),
(236, 'NIVEA MEN DEODORANT ROLL-ON DRY IMPACT 50ML', 'Offers white mark protection on black clothes and anti-yellow staining on white clothes. Provides reliable 48-hour protection from sweat and odor. I', 162.40, '../../../images/products/NIVEA MEN DEODORANT ROLL-ON DRY IMPACT 50ML.png', '4005808298334', 'HEALTH', 100, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:13:59', '2024-09-28 12:13:59'),
(237, 'Best Foods Peanut Butter 340g', 'â€“ Sweet & Creamyâ€“ Good Value-for-money', 123.00, '../../../images/products/Best Foods Peanut Butter 340g.png', '4808680653310', 'GROCERY', 342, 'LINGAYEN', 'CSI', 'SAUCES', '2024-09-28 12:14:28', '2024-09-28 12:14:28'),
(238, 'Best Foods Real Mayonnaise Mayo Magic 220ml', 'â€“ A rich sweet blend of real eggs & spicesâ€“ Good value-for-moneySKU: 4808680027159', 125.00, '../../../images/products/Best Foods Real Mayonnaise Mayo Magic 220ml.png', '4808680027159', 'GROCERY', 4231, 'BINMALEY', 'SM', 'SAUCES', '2024-09-28 12:16:12', '2024-09-28 12:16:12'),
(239, 'Del Monte Original Blend Ketchup *Bottle 320g', 'mas masarap pa sa ordinaryong ketchup', 37.50, '../../../images/products/Del Monte Original Blend Ketchup Bottle 320g.png', '4800024013473', 'GROCERY', 3212, 'DAGUPAN', 'SM', 'SAUCES', '2024-09-28 12:17:18', '2024-09-28 12:17:18'),
(240, 'CLEENE COTTON ROLLS 300G', 'Cleene cotton is absorbent and perfect for your skincare needs. Soft and durably made, these ultra-soft balls are gentle on the skin. ', 118.25, '../../../images/products/CLEENE COTTON ROLLS 300G.png', '4800067112182', 'HEALTH', 103, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 12:17:23', '2024-09-28 12:17:23'),
(241, 'CSI Super Savings Banana Ketchup 340g', 'tipid sulit ketchup na abot kaya ng lahat sheesh!', 21.00, '../../../images/products/CSI Super Savings Banana Ketchup 340g.png', '2000000440040', 'GROCERY', 412, 'DAGUPAN', 'MAGIC', 'SAUCES', '2024-09-28 12:17:59', '2024-09-28 12:17:59'),
(242, 'Best Foods Salad & Sandwich Mate 220ml', 'all purpose sauce for any occasion', 58.45, '../../../images/products/Best Foods Salad _ Sandwich Mate 220ml.png', '4808680024271', 'GROCERY', 5123, 'DAGUPAN', 'MAGIC', 'SNACKS', '2024-09-28 12:18:50', '2024-09-28 12:18:50'),
(243, 'Del Monte Sweet Chili Sauce *Bottle 120z', 'good ketchup sauce for chili lovers', 113.00, '../../../images/products/Del Monte Sweet Chili Sauce Bottle 120z.png', '4800024558703', 'GROCERY', 1421, 'LINGAYEN', 'MAGIC', 'SAUCES', '2024-09-28 12:19:45', '2024-09-28 12:19:45'),
(244, 'Mang Tomas All Around Sarsa â€“ Regular 325g', 'letchon sauce na abot kaya, san kapa bili na', 32.55, '../../../images/products/Mang Tomas All Around Sarsa _ Regular 325g.png', '1480166810026', 'GROCERY', 531, 'LINGAYEN', 'CSI', 'SAUCES', '2024-09-28 12:20:29', '2024-09-28 12:20:29'),
(245, 'Pantai Chili Oil 750ml', 'for prying foods w/ enhanced flavor, good for direct chili dishes', 154.00, '../../../images/products/Pantai Chili Oil 750ml.png', '88500580047', 'GROCERY', 512, 'DAGUPAN', 'CSI', 'SAUCES', '2024-09-28 12:21:32', '2024-09-28 12:21:32'),
(246, 'Mang Tomas All Around Sarsa â€“ Siga 325g', 'letchon sauce for all, good for any occasion', 33.55, '../../../images/products/Mang Tomas All Around Sarsa _ Siga 325g.png', '1480166810028', 'GROCERY', 612, 'DAGUPAN', 'SM', 'SAUCES', '2024-09-28 12:22:11', '2024-09-28 12:22:11'),
(247, 'CLEENE COTTON BALLS 150S', 'Excellent Softness And Absorption. Hydrogen Peroxide-bleached That Is Not Harmful To The Skin.', 35.80, '../../../images/products/CLEENE COTTON BALLS 150S.png', '4800067116579', 'HEALTH', 102, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:43:00', '2024-09-28 12:43:00'),
(248, 'NIVEA MEN DEODORANT ROLL-ON COOL KICK 50ML', 'Nivea Men Anti-Perspirant Roll-On Cool Kick 50ml offers you 48-hour protection against perspiration, leaving you feeling fresh and confident.', 148.20, '../../../images/products/NIVEA MEN DEODORANT ROLL-ON COOL KICK 50ML.png', '4005808301843', 'HEALTH', 102, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:45:09', '2024-09-28 12:45:09'),
(249, 'CLEENE YUKI YUKI FACIAL COTTON PUFF BUY 1 TAKE 1 40S', 'Gentle to the skin Lint free touch Two-sided sealed edges NATURAL COTTON: Weave by water energy that can increase its softness, smooth, and lint-free touch.', 70.75, '../../../images/products/CLEENE YUKI YUKI FACIAL COTTON PUFF BUY 1 TAKE 1 40S.png', '4800067124833', 'HEALTH', 20, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 12:48:12', '2024-09-28 12:48:12'),
(250, 'NIVEA MEN DEODORANT SPRAY SILVER PROTECT 150ML', 'NIVEA MEN Silver Protect Anti-Perspirant offers reliable 48 hour anti-perspirant protection that cares for your skin in the process. ', 198.25, '../../../images/products/NIVEA MEN DEODORANT SPRAY SILVER PROTECT 150ML.png', '4005808302598', 'HEALTH', 200, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:50:44', '2024-09-28 12:50:44'),
(251, 'HAPPY COTTON ROLLS 10G', 'Happy cotton rolls super absorbent 10grams100% pure cotton and super absorbent Home use,Hospital use,makw up use,adult and baby use.H', 5.35, '../../../images/products/HAPPY COTTON ROLLS 10G.png', '4801288820153', 'HEALTH', 100, 'DAGUPAN', 'SM', 'PERSONAL', '2024-09-28 12:52:33', '2024-09-28 12:52:33'),
(252, 'NIVEA MEN DEODORANT SPRAY COOL KICK 150ML', 'Nivea Men Deodorant Spray Cool Kick 150 Ml Nivea', 198.25, '../../../images/products/NIVEA MEN DEODORANT SPRAY COOL KICK 150ML.png', '4005808303427', 'HEALTH', 200, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-09-28 12:55:16', '2024-09-28 12:55:16'),
(253, 'HAPPY COTTON ROLLS 40G', 'Happy Cotton 40gMade from 100% pure and natural cotton that absorbs more liquid faster than synthetic fibers.', 18.30, '../../../images/products/HAPPY COTTON ROLLS 40G.png', '4801288820504', 'HEALTH', 200, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-09-28 12:57:26', '2024-09-28 12:57:26'),
(254, 'Pancit', 'ko', 1.00, 'wala', '2312341231232', 'GROCERY', 12341, 'MABINI', 'GAY', 'SNACKS', '2024-10-01 03:10:26', '2024-10-01 03:10:26'),
(255, 'GYNEPRO ULTRA PROTECTION FEMININE WASH 60ML', 'Specially formulated with Chlorhexidine digluconate, giving you 2X better protection vs. other feminine washes to conquer feminine area vulnerabilities.', 86.30, '../../../images/products/GYNEPRO ULTRA PROTECTION FEMININE WASH 60ML.png', '4800135005200', 'HEALTH', 111, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:17:56', '2024-10-03 13:17:56'),
(256, 'GYNEPRO ULTRA PROTECTION FEMININE WASH 150ML', 'Specially formulated with Chlorhexidine digluconate, giving you 2X better protection vs. other feminine washes to conquerfeminine area vulnerabilities. ', 191.85, '../../../images/products/GYNEPRO ULTRA PROTECTION FEMININE WASH 150ML.png', '4800135005217', 'HEALTH', 202, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:19:43', '2024-10-03 13:19:43'),
(257, 'PH CARE FEMININE WASH COOLING COMFORT 250ML', 'pH Care Daily Feminine Wash Cooling Comfort 250ml ', 173.60, '../../../images/products/PH CARE FEMININE WASH COOLING COMFORT 250ML.png', '4800135005682', 'HEALTH', 99, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 13:22:36', '2024-10-03 13:22:36'),
(258, 'PH CARE FEMININE WASH COOLING COMFORT 150ML', 'pH Care Daily Feminine Wash Cooling Comfort 150ML', 137.05, '../../../images/products/PH CARE FEMININE WASH COOLING COMFORT 150ML.png', '4800135005699', 'HEALTH', 87, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:25:14', '2024-10-03 13:25:14'),
(259, 'PH CARE FEMININE WASH COOLING COMFORT 50ML', 'pH Care Daily Feminine Wash Cooling Comfort 50ML', 55.85, '../../../images/products/PH CARE FEMININE WASH COOLING COMFORT 50ML.png', '4800135005705', 'HEALTH', 99, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:27:46', '2024-10-03 13:27:46'),
(260, 'PH CARE FEMININE WASH FLORAL CLEAN 250ML', 'This is a pH-balanced feminine wash, specially made to gently cleanse and protect the feminine area. With pH level 5 to match the natural pH level of the feminine', 160.40, '../../../images/products/PH CARE FEMININE WASH FLORAL CLEAN 250ML.png', '4800135005880', 'HEALTH', 80, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:29:32', '2024-10-03 13:29:32'),
(261, 'PH CARE FEMININE WASH DELICATE WHITE 50ML', '	Ph Care Feminine Wash Delicate White 50ml4.97364.9 out of 5 stars. 736 product reviews.Ph Care Feminine Wash Delicate White 50ml - ,Contains Advance Whitening Complex, Made Of Nature\'s Best Skin Lightening Botanicals', 58.90, '../../../images/products/PH CARE FEMININE WASH DELICATE WHITE 50ML.png', '4800135006139', 'HEALTH', 100, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 13:31:24', '2024-10-03 13:31:24'),
(262, 'PH CARE FEMININE WASH NATURAL PROCTECTION 50ML', 'This is a pH-balanced feminine wash, specially made to gently cleanse and protect the feminine area. ', 53.80, '../../../images/products/PH CARE FEMININE WASH NATURAL PROCTECTION 50ML.png', '4800135006542', 'HEALTH', 200, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:33:06', '2024-10-03 13:33:06'),
(263, 'PH CARE FEMININE WIPES COOLING COMFORT 10S', 'A pack of pH-balanced feminine wipes with a fresh cooling sensation. Perfect for on-the-go use while traveling or in transit Matches the natural pH level of your feminine area ', 43.25, '../../../images/products/PH CARE FEMININE WIPES COOLING COMFORT 10S.png', '4800135007891', 'HEALTH', 200, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:34:47', '2024-10-03 13:34:47'),
(264, 'PH CARE NATURAL PROTECTION 150ML BUY 1 + 1 GYNEPRO ANTISEPTIC FEMININE WASH 60ML SAVE P40.00', 'pH Care Daily Feminine Wash Floral Clean 150ml + Gynepro Ultra Protection Feminine Wash 60ml (Save Php40)', 172.55, '../../../images/products/PH CARE NATURAL PROTECTION 150ML BUY 1 + 1 GYNEPRO ANTISEPTIC FEMININE WASH 60ML SAVE P40.00.png', '4800135011836', 'HEALTH', 300, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 13:37:00', '2024-10-03 13:37:00'),
(265, 'LACTACYD FEMININE WASH ODOR FRESH 250ML', 'Lactacyd Feminine Wash Odor Fresh provides 24-hour freshness with just one drop, perfect for busy days. Lactacyd understands that every woman is ...', 228.90, '../../../images/products/LACTACYD FEMININE WASH ODOR FRESH 250ML.png', '4800136680048', 'HEALTH', 400, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:38:36', '2024-10-03 13:38:36'),
(266, 'LACTACYD FEMININE WASH PRO SENSITIVE 150ML', 'Lactacyd Pro-Sensitive Feminine Wash 150ml, Sold by: Robinsons Department Store, Under: Beauty Expiration Date: May,2025 NoBrand', 180.20, '../../../images/products/LACTACYD FEMININE WASH PRO SENSITIVE 150ML.png', '4800136960027', 'HEALTH', 200, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:40:23', '2024-10-03 13:40:23'),
(267, 'LACTACYD FEMININE WASH PRO SENSITIVE 250ML', 'Lactacyd Pro Sensitive Daily Feminine Wash 250mL Protects & Soothes Sensitive Skin We, Spade Mart and Nemie Furniture offer wide arrays of products from grocery items to Uratex ...', 253.25, '../../../images/products/LACTACYD FEMININE WASH PRO SENSITIVE 250ML.png', '4800136960034', 'HEALTH', 399, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 13:42:19', '2024-10-03 13:42:19'),
(268, 'BETADINE POVIDONE-IODINE FEMININE WASH 7.5% SOLUTION ANTISEPTIC 50ML', 'Welcome to our store. All our products are sold at low prices and ensure quality. If you need them, please feel free to buy them. If you are satisfied with our products, please ...', 130.70, '../../../images/products/BETADINE POVIDONE-IODINE FEMININE WASH 7.5_ SOLUTION ANTISEPTIC 50ML.png', '4800204008620', 'HEALTH', 380, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:45:33', '2024-10-03 13:45:33'),
(269, 'BETADINE FEMININE WASH 7.5%SOLUTION ANTISEPTIC 25ML', 'Povidone Iodine Betadine Feminine Wash - 25ML - Relieves Itching And Protects From Common Germs - Expiry Date: October 2024Povidone Iodine Betadine Feminine Wash 25ml ', 71.05, '../../../images/products/BETADINE FEMININE WASH 7.5_SOLUTION ANTISEPTIC 25ML.png', '4800204008651', 'HEALTH', 200, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-03 13:48:40', '2024-10-03 13:48:40'),
(270, 'BETADINE POVIDONE-IODINE FEMININE WASH 7.5& SOLUTION ANTISEPTIC 100ML', 'Our products here in LRK Depot are always 100% AUTHENTIC, BRAND NEW, and SEALED !!!Guaranteed *** LONG EXPIRY ***Feel free to CHAT with us for more questions. Keep SAFE, Stay .', 212.40, '../../../images/products/BETADINE POVIDONE-IODINE FEMININE WASH 7.5_ SOLUTION ANTISEPTIC 100ML.png', '4800204704447', 'HEALTH', 320, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 13:51:34', '2024-10-03 13:51:34'),
(271, 'CHARMEE FEMININE WIPES SOFT AND GENTLE 150MM', 'The Charmee Feminine Wipes 10\'s are like a mini shower for your lady bits, perfect for those in-between-bath moments. Made with a gentle, pH-balanced formula, these wipes are ...', 24.15, '../../../images/products/CHARMEE FEMININE WIPES SOFT AND GENTLE 150MM.png', '4800488040026', 'HEALTH', 400, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 13:58:44', '2024-10-03 13:58:44'),
(272, 'CHARMEE FEMININE WIPES 10S 150MM', 'Product Ingredients: Aqua, Propylene, Phenoxyethanol, Polysorbate 20, Fragrance, Benzalkonium Chloride, Disodium Cocoamphodiacetate, Cetylpridinium Chloride, PEG-40 ...', 25.15, '../../../images/products/CHARMEE FEMININE WIPES 10S 150MM.png', '4800488040064', 'HEALTH', 299, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 14:01:08', '2024-10-03 14:01:08'),
(273, 'SECURE ADULT WIPES 30SHEETS 180MM', 'Secure Adult Wipes gently wipe away dirt and germs making you feel clean and refreshed anytime and anywhere. #Secure #Wipes #Adult #Gentle SECURE', 76.15, '../../../images/products/SECURE ADULT WIPES 30SHEETS 180MM.png', '4800488100195', 'HEALTH', 222, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-03 14:02:56', '2024-10-03 14:02:56'),
(274, 'BETADINE FRESH BLISS DAILY FEMININE WASH LAVANDER DREAMS 150ML', 'Betadine Fresh Bliss Lavender Dreams Daily Feminine Wash it is delicately formulated for daily gentle cleansing. With Anti-Itch Avena Oats that helps soothe and prevent itching ...', 138.55, '../../../images/products/BETADINE FRESH BLISS DAILY FEMININE WASH LAVANDER DREAMS 150ML.png', '4806516031431', 'HEALTH', 333, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 14:04:21', '2024-10-03 14:04:21'),
(275, 'BETADINE FRESH BLISS DAILY FEMININE WASH LAVANDER DREAMS 250ML', 'Betadine Fresh Bliss Lavender Dreams Daily Feminine Wash it is delicately formulated for daily gentle cleansing. With Anti-Itch Avena Oats that helps soothe and prevent itching ..', 176.10, '../../../images/products/BETADINE FRESH BLISS DAILY FEMININE WASH LAVANDER DREAMS 250ML.png', '4806516031448', 'HEALTH', 444, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-03 14:06:46', '2024-10-03 14:06:46'),
(276, 'BETADINE FRESH BLISS DAILY FEMININE WASH PINK PARADISE 150ML', 'Experience the power of nature and science with Betadine\'s fresh bliss. It is delicately formulated for daily gentle cleansing. With gentle defense lactic acid helps maintain ...', 138.55, '../../../images/products/BETADINE FRESH BLISS DAILY FEMININE WASH PINK PARADISE 150ML.png', '4806516031462', 'HEALTH', 111, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-04 13:01:43', '2024-10-04 13:01:43'),
(277, 'BETADINE FRESH BLISS DAILY FEMININE WASH PINK PARADISE 250ML', 'Experience the power of nature and science with Betadine\'s fresh bliss. It is delicately formulated for daily gentle cleansing. With gentle defense lactic acid helps maintain ...', 176.10, '../../../images/products/BETADINE FRESH BLISS DAILY FEMININE WASH PINK PARADISE 250ML.png', '4806516031479', 'HEALTH', 222, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-04 13:03:09', '2024-10-04 13:03:09'),
(278, 'BETADINE FRESH BLISS DAILY FEMININE WASH REFRESHING LEMON VERBENA 250ML', 'Exclusively designed to offer a lasting feeling of freshness. â€¢ It contains natural extracts from the citrusy leaves of the Lemon Verbena plant which has refreshing and cooling ...', 197.45, '../../../images/products/BETADINE FRESH BLISS DAILY FEMININE WASH REFRESHING LEMON VERBENA 250ML.png', '4806516031653', 'HEALTH', 333, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-04 13:08:54', '2024-10-04 13:08:54'),
(279, 'BETADINE DAILY FEMININE FOAM WASH MOISTURIZING CALENDULA 200ML', 'Experience the power of nature and science with Betadine Fresh Bliss. It has a natural extract from the Cofficinalis flower, Calendula. Exclusively designed for women with dry ...', 229.65, '../../../images/products/BETADINE DAILY FEMININE FOAM WASH MOISTURIZING CALENDULA 200ML.png', '8859350700182', 'HEALTH', 444, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-04 13:10:19', '2024-10-04 13:10:19'),
(280, 'BETADINE DAILY FEMININE FOAM WASH ODOUR CONTROL WITCH HAZEL 200ML', 'Experience the power of nature and science with Betadine Fresh Bliss. It has a natural extract from the Cofficinalis flower, Calendula. Exclusively designed for women with dry ...', 229.65, '../../../images/products/BETADINE DAILY FEMININE FOAM WASH ODOUR CONTROL WITCH HAZEL 200ML.png', '8859350700199', 'HEALTH', 55, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-04 13:12:55', '2024-10-04 13:12:55'),
(281, 'LACTACYD FEMININE WASH PEARL INTIMATE 150ML', 'Lactacyd Pearl Intimate Feminine Wash 150ml, Sold by: Robinsons Department Store, Under: Beauty Expiration Date: October,2024 NoBrand', 177.65, '../../../images/products/LACTACYD FEMININE WASH PEARL INTIMATE 150ML.png', '8936123410506', 'HEALTH', 666, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-04 13:14:46', '2024-10-04 13:14:46'),
(282, 'LACTACYD FEMININE WASH PEARL INTIMATE 250ML', 'Lactacyd Feminine Wash Pearl Intimate 250ml Lactacyd Feminine Wash Pearl Intimate 250ml Lactacyd', 239.05, '../../../images/products/LACTACYD FEMININE WASH PEARL INTIMATE 250ML.png', '8936123410278', 'HEALTH', 765, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-04 13:16:08', '2024-10-04 13:16:08'),
(283, 'LACTACYD FEMININE WASH PEARL INTIMATE 60ML', 'Sweat and excessive friction from tight clothing can darken the skin around the intimate area, causing self-consciousness, decreased confidence or inhibiting intimacy. Made ..', 78.20, '../../../images/products/LACTACYD FEMININE WASH PEARL INTIMATE 60ML.png', '8936123410513', 'HEALTH', 332, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-04 13:17:47', '2024-10-04 13:17:47'),
(284, 'LACTACYD COOL SENSATION 150ML', 'LACTACYD COOL SENSATION FEMININE WASH - Experience gentle cooling and long-lasting freshness with 100% Natural Menthol Essnece - Lactacyd Cool Sensation is specially formulated ...', 177.65, '../../../images/products/LACTACYD COOL SENSATION 150ML.png', '8936123411121', 'HEALTH', 212, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-04 13:19:12', '2024-10-04 13:19:12'),
(285, 'LACTACYD COOL SENSATION 250ML', 'LACTACYD COOL SENSATION FEMININE WASH - Experience gentle cooling and long-lasting freshness with 100% Natural Menthol Essnece - Lactacyd Cool Sensation is specially formulated ...', 239.05, '../../../images/products/LACTACYD COOL SENSATION 250ML.png', '8936123411138', 'HEALTH', 112, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-04 13:21:34', '2024-10-04 13:21:34'),
(286, 'LACTACYD FEMININE WASH ALL-DAY CARE 60ML', 'Lactacyd Feminine Wash All-day Care 60ml Lactacyd', 74.60, '../../../images/products/LACTACYD FEMININE WASH ALL-DAY CARE 60ML.png', '8993237343014', 'HEALTH', 544, 'LINGAYEN', 'CSI', 'PERSONAL', '2024-10-04 13:23:10', '2024-10-04 13:23:10'),
(287, 'LACTACYD FEMININE WASH ALL-DAY CARE 150ML', 'Lactacyd is a popular and the leading feminine hygiene brand worldwide. It also comes in different variants that will surely address every need of a womanâ€™s feminine health ...', 172.05, '../../../images/products/LACTACYD FEMININE WASH ALL-DAY CARE 150ML.png', '8993237343021', 'HEALTH', 22, 'BINMALEY', 'MAGIC', 'PERSONAL', '2024-10-04 13:24:49', '2024-10-04 13:24:49'),
(288, 'LACTACYD FEMININE WASH ALL-DAY CARE 250ML', 'Beyond shower gel and water, Lactacyd pH3.5 protects your intimate area healthy and fresh. Contains Lactic Acid and Lactoserum from natural milk extract to protect from ...', 229.90, '../../../images/products/LACTACYD FEMININE WASH ALL-DAY CARE 250ML.png', '8993237343038', 'HEALTH', 322, 'DAGUPAN', 'SM', 'PERSONAL', '2024-10-04 13:26:16', '2024-10-04 13:26:16'),
(289, 'Dexter', 'peram vape', 99.00, '../../../images/products/Dexter.png', '7362828638826', 'GROCERY', 1, 'BINMALEY', 'CSI', 'SNACKS', '2024-10-12 11:12:33', '2024-10-12 11:12:33'),
(292, 'CREAMSILK ULTIMATE REBORN STANDOUT STRAIGHT TRI-OLEO CONDITIONER 180ML', 'Cream Silk Ultimate Reborn Standout Straight Tri-Oleo Conditioner Standout Straight Hair Conditioner for straight hair has Frizz Defense Complex to make frizzy hair straighter.', 149.25, '../../../images/products/CREAMSILK ULTIMATE REBORN STANDOUT STRAIGHT TRI-OLEO CONDITIONER 180ML.png', '4800888139481', 'HEALTH', 2134, 'DAGUPAN', 'SM', 'HAIR', '2024-10-16 00:59:22', '2024-10-16 00:59:22'),
(293, 'CREAMSILK ULTIMATE REBORN HAIRFALL DEFENSE TRI-OLEO CONDITIONER 180ML', 'Itâ€™s the hair conditioner for hair fall and conditioner for long hair with Break-Shield Complex.', 149.25, '../../../images/products/CREAMSILK ULTIMATE REBORN HAIRFALL DEFENSE TRI-OLEO CONDITIONER 180ML.png', '4800888139467', 'HEALTH', 5133, 'DAGUPAN', 'SM', 'HAIR', '2024-10-16 01:01:31', '2024-10-16 01:01:31'),
(294, 'PANTENE CONDITIONER 3-MINUTE MIRACLE KERATIN STRAIGHT 150ML', 'The 3 Minute Miracle Keratin Straight Conditioner gives your hair the ultra-rich moisture it deserves to achieve that Keratin-straight hair you\'ve been dreaming of.', 135.60, '../../../images/products/PANTENE CONDITIONER 3-MINUTE MIRACLE KERATIN STRAIGHT 150ML.png', '4902430874069', 'HEALTH', 2341, 'DAGUPAN', 'SM', 'HAIR', '2024-10-16 01:03:50', '2024-10-16 01:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `courier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `full_name`, `address`, `phone`, `total_amount`, `status`, `created_at`, `updated_at`, `courier_id`) VALUES
(1, 17, NULL, NULL, NULL, 368.40, 'ongoing', '2024-09-11 22:44:31', '2024-09-12 23:54:37', NULL),
(2, 17, 'jowen', 'bahay', '091236832', 47.80, 'ongoing', '2024-09-11 22:49:37', '2024-09-12 23:54:37', NULL),
(3, 17, 'jowen', 'bahay', '091236832', 47.80, 'pending', '2024-09-11 22:53:26', '2024-09-12 23:54:37', NULL),
(4, 17, 'jowen', 'bahay', '091236832', 204.60, 'pending', '2024-09-11 23:00:38', '2024-09-12 23:54:37', NULL),
(5, 7, 'joenlw', 'asdf', '2341234123', 68.20, 'pending', '2024-09-12 02:28:00', '2024-09-12 23:54:37', NULL),
(6, 7, 'joenlw', 'asdf', '2341234123', 189.50, 'pending', '2024-09-12 07:27:33', '2024-09-12 23:54:37', NULL),
(7, 23, 'ass', 'ggg', '4556', 74.10, 'pending', '2024-09-12 07:28:18', '2024-09-12 23:54:37', NULL),
(8, 7, 'joenlw', 'asdf', '2341234123', 73.40, 'pending', '2024-09-12 07:38:16', '2024-09-12 23:54:37', NULL),
(9, 29, 'roman', 'mamarlao', '09065912666', 290.00, 'pending', '2024-09-12 07:59:27', '2024-09-12 23:54:37', NULL),
(10, 28, 'ramon', 'baley', '09286969', 68.20, 'done', '2024-09-12 09:19:07', '2024-09-12 23:54:37', NULL),
(11, 27, 'yyytt', 'ytuy', '866765', 102.30, 'done', '2024-09-12 09:56:22', '2024-09-12 23:54:37', NULL),
(12, 27, 'yyytt', 'ytuy', '866765', 121.90, 'done', '2024-09-12 10:10:30', '2024-09-12 23:54:37', NULL),
(13, 27, 'yyytt', 'ytuy', '866765', 102.30, 'done', '2024-09-12 10:20:41', '2024-09-12 23:54:37', NULL),
(14, 20, 'cynthia', 'secret', '09308235675', 143.35, 'ongoing', '2024-09-12 10:59:45', '2024-09-12 23:54:37', NULL),
(15, 7, 'joenlw', 'asdf', '2341234123', 23.90, 'pending', '2024-09-12 12:08:48', '2024-09-12 23:54:37', NULL),
(16, 27, 'itnol', 'ytuy', '866765', 174.00, 'done', '2024-09-12 12:41:09', '2024-09-28 01:57:29', 27),
(17, 18, 'carlo pogi', 'taga diyan', '09123123', 71.70, 'pending', '2024-09-12 12:45:07', '2024-09-12 23:54:37', NULL),
(18, 27, 'yyytt', 'ytuy', '866765', 443.30, 'done', '2024-09-12 12:50:46', '2024-09-12 23:54:37', NULL),
(19, 28, 'ramon', 'baley', '09286969', 69.00, 'done', '2024-09-12 12:59:24', '2024-09-12 23:54:37', NULL),
(20, 28, 'ramon', 'baley', '09286969', 102.30, 'ongoing', '2024-09-12 13:23:43', '2024-09-12 23:54:37', NULL),
(21, 17, 'jowen', 'bahay', '091236832', 102.30, 'done', '2024-09-12 23:30:17', '2024-09-13 00:02:34', NULL),
(22, 17, 'jowen', 'bahay', '091236832', 68.20, 'done', '2024-09-12 23:42:49', '2024-09-13 00:02:25', NULL),
(23, 17, 'jowen', 'bahay', '091236832', 146.80, 'ongoing', '2024-09-13 00:00:43', '2024-09-13 00:03:00', NULL),
(24, 17, 'jowen', 'bahay', '091236832', 150.10, 'ongoing', '2024-09-13 00:02:50', '2024-09-13 00:03:02', NULL),
(25, 17, 'jowen', 'bahay', '091236832', 67.65, 'ongoing', '2024-09-13 00:09:32', '2024-09-13 00:09:47', NULL),
(26, 17, 'jowen', 'bahay', '091236832', 102.30, 'done', '2024-09-13 00:16:19', '2024-09-13 00:17:03', NULL),
(27, 33, 'arnel', 'bahay ng mga pogi', '133', 242.20, 'done', '2024-09-13 10:01:10', '2024-09-13 10:02:51', NULL),
(28, 17, 'jowen', 'bahay', '091236832', 682.00, 'done', '2024-09-14 00:23:34', '2024-09-28 01:57:27', 27),
(29, 17, 'jowen', 'bahay', '091236832', 354.70, 'done', '2024-09-14 00:24:41', '2024-09-14 00:26:08', 23),
(30, 34, 'Jellz', 'sabahayngmabini', '09095267803', 23.90, 'done', '2024-09-14 03:45:04', '2024-09-14 03:48:44', 35),
(31, 18, 'carlo pogi', 'taga diyan', '09123123', 24.70, 'pending', '2024-09-14 06:32:41', '2024-09-14 06:32:41', NULL),
(32, 17, 'jowen', 'bahay', '091236832', 341.00, 'done', '2024-09-14 09:48:26', '2024-09-14 09:51:22', 16),
(33, 17, 'jowen', 'bahay', '091236832', 136.40, 'done', '2024-09-14 09:51:43', '2024-09-14 10:00:29', 27),
(34, 17, 'jowen', 'bahay', '091236832', 102.30, 'pending', '2024-09-14 10:54:54', '2024-09-14 10:54:54', NULL),
(35, 20, 'cynthia', 'secret', '09308235675', 102.30, 'pending', '2024-09-15 00:13:59', '2024-09-15 00:13:59', NULL),
(36, 17, 'jowen', 'bahay', '091236832', 102.30, 'done', '2024-09-16 02:46:57', '2024-09-28 01:57:28', 27),
(37, 17, 'jowen', 'bahay', '091236832', 298.20, 'done', '2024-09-20 06:15:06', '2024-09-20 06:16:36', 27),
(38, 17, 'jowen', 'bahay', '091236832', 215.70, 'done', '2024-09-23 08:24:48', '2024-09-23 08:25:37', 27),
(39, 19, 'Carlo Villanueva', 'Pantal West, Dagupan City', '09123456789', 107.70, 'done', '2024-09-23 12:17:51', '2024-09-23 12:19:07', 27),
(40, 17, 'jowen', 'bahay', '091236832', 279.00, 'pending', '2024-09-23 23:54:24', '2024-09-23 23:54:24', NULL),
(41, 41, 'sdfg', 'awertqer', '58416541561', 100063.40, 'done', '2024-09-24 02:11:32', '2024-09-24 02:14:57', 22),
(42, 19, 'Carlo Villanueva', 'Pantal West, Dagupan City', '09123456789', 24.55, 'done', '2024-09-26 10:12:02', '2024-10-02 08:53:26', 27),
(43, 17, 'jowen', 'bahay', '091236832', 111785.00, 'pending', '2024-09-27 06:38:52', '2024-09-27 06:38:52', NULL),
(44, 17, 'jowen', 'bahay', '091236832', 1183.20, 'pending', '2024-09-27 06:44:08', '2024-09-27 06:44:08', NULL),
(45, 17, 'jowen', 'bahay', '091236832', 172.50, 'pending', '2024-09-27 06:44:51', '2024-09-27 06:44:51', NULL),
(46, 17, 'jowen', 'bahay', '091236832', 172.50, 'pending', '2024-09-27 06:51:24', '2024-09-27 06:51:24', NULL),
(47, 17, 'jowen', 'bahay', '091236832', 1200.00, 'pending', '2024-09-27 06:52:07', '2024-09-27 06:52:07', NULL),
(48, 17, 'jowen', 'bahay', '091236832', 611.75, 'pending', '2024-09-27 06:53:57', '2024-09-27 06:53:57', NULL),
(49, 17, 'jowen', 'bahay', '091236832', 9.50, 'pending', '2024-09-27 07:46:12', '2024-09-27 07:46:12', NULL),
(50, 17, 'jowen', 'bahay', '091236832', 120.55, 'done', '2024-09-28 01:05:39', '2024-09-28 01:57:23', 27),
(51, 17, 'jowen', 'bahay', '091236832', 111258.00, 'done', '2024-09-28 01:58:39', '2024-09-28 02:02:39', 27),
(52, 34, 'Jellz', 'urmom', '09095267803SENDGCASH', 350.00, 'done', '2024-09-28 05:11:47', '2024-09-28 05:12:41', 27),
(53, 34, 'Jellz', 'urmom', '09095267803SENDGCASH', 10.00, 'accepted', '2024-09-28 05:20:37', '2024-10-01 06:24:15', 27),
(54, 17, 'jowen', 'bahay', '091236832', 609939.00, 'pending', '2024-09-28 05:55:05', '2024-09-28 05:55:05', NULL),
(55, 36, 'Krisfel', 'Coquia', '11111', 30.80, 'done', '2024-09-28 14:38:39', '2024-10-10 11:24:37', 27),
(56, 17, 'jowen', 'bahay', '091236832', 59.60, 'done', '2024-10-10 11:12:55', '2024-10-10 11:24:40', 27),
(57, 17, 'jowen', 'bahay', '091236832', 396.50, 'accepted', '2024-10-10 11:14:56', '2024-10-10 11:22:53', 27),
(58, 17, 'jowen', 'bahay', '091236832', 12.00, 'accepted', '2024-10-10 11:17:56', '2024-10-10 11:22:45', 27),
(59, 17, 'jowen', 'bahay', '091236832', 79.00, 'done', '2024-10-10 11:19:08', '2024-10-10 11:32:24', 27),
(60, 20, 'cynthia', 'secret', '9304853', 80.00, 'pending', '2024-10-12 04:39:31', '2024-10-12 04:39:31', NULL),
(61, 19, 'Carlo Villanueva', 'Pantal West, Dagupan City', '09123456789', 13.30, 'pending', '2024-10-15 00:49:04', '2024-10-15 00:49:04', NULL),
(62, 17, 'jowen', 'bahay', '091236832', 329.55, 'done', '2024-10-15 03:37:54', '2024-10-15 03:38:28', 27),
(63, 49, 'Shit', 'Head', '874513219684', 125.00, 'accepted', '2024-10-16 07:20:04', '2024-10-16 07:20:52', 27),
(64, 49, 'Shit', 'Head', '874513219684', 15.70, 'pending', '2024-10-16 09:03:47', '2024-10-16 09:03:47', NULL),
(65, 51, 'Cute', 'cute pa rin', '123', 144.20, 'pending', '2024-10-18 07:45:38', '2024-10-18 07:45:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 16, 22, 3, NULL),
(2, 16, 24, 3, NULL),
(3, 17, 22, 3, 23.90),
(4, 18, 24, 8, 34.10),
(5, 18, 23, 5, 34.10),
(6, 19, 41, 1, 69.00),
(7, 20, 23, 3, 34.10),
(8, 21, 24, 3, 34.10),
(9, 22, 23, 2, 34.10),
(10, 23, 31, 2, 73.40),
(11, 24, 22, 2, 23.90),
(12, 24, 23, 3, 34.10),
(13, 25, 32, 1, 14.95),
(14, 25, 35, 3, 7.30),
(15, 25, 36, 2, 15.40),
(16, 26, 23, 3, 34.10),
(17, 27, 29, 7, 34.60),
(18, 28, 23, 20, 34.10),
(19, 29, 20, 4, 24.70),
(20, 29, 22, 5, 23.90),
(21, 29, 24, 4, 34.10),
(22, 30, 22, 1, 23.90),
(23, 31, 20, 1, 24.70),
(24, 32, 24, 10, 34.10),
(25, 33, 23, 4, 34.10),
(26, 34, 23, 3, 34.10),
(27, 35, 23, 3, 34.10),
(28, 36, 24, 3, 34.10),
(29, 37, 37, 4, 15.70),
(30, 37, 40, 4, 58.85),
(31, 38, 37, 1, 15.70),
(32, 38, 25, 2, 34.10),
(33, 38, 26, 2, 60.65),
(34, 38, 51, 1, 10.50),
(35, 39, 37, 5, 15.70),
(36, 39, 35, 4, 7.30),
(37, 40, 73, 1, 279.00),
(38, 41, 31, 1, 73.40),
(39, 41, 94, 10, 9999.00),
(40, 42, 63, 1, 24.55),
(41, 43, 34, 8, 7.30),
(42, 43, 60, 5, 82.60),
(43, 43, 25, 6, 34.10),
(44, 43, 114, 4, 280.00),
(45, 43, 94, 11, 9999.00),
(46, 44, 147, 6, 197.20),
(47, 45, 145, 1, 172.50),
(48, 46, 145, 1, 172.50),
(49, 47, 116, 10, 120.00),
(50, 48, 120, 5, 122.35),
(51, 49, 43, 1, 9.50),
(52, 50, 54, 1, 120.55),
(53, 51, 70, 42, 2649.00),
(54, 52, 50, 10, 35.00),
(55, 53, 95, 10, 1.00),
(56, 54, 94, 61, 9999.00),
(57, 55, 36, 2, 15.40),
(58, 56, 85, 4, 14.90),
(59, 57, 250, 2, 198.25),
(60, 58, 61, 1, 12.00),
(61, 59, 211, 2, 39.50),
(62, 60, 57, 2, 40.00),
(63, 61, 39, 1, 13.30),
(64, 62, 64, 3, 109.85),
(65, 63, 238, 1, 125.00),
(66, 64, 37, 1, 15.70),
(67, 65, 157, 2, 72.10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roles` enum('admin','user','courier','') NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `full_name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(7, 'hatdog', 'nialjur', 'admin', 'joenlw', 'asdf', '2341234123', '0000-00-00 00:00:00', '2024-09-12 11:06:26'),
(16, 'nangiiyot', 'mangingiyot123', 'courier', 'Carlo Villanueva', 'Pantal West, Dagupan City', '09123456789', '2024-09-07 08:47:25', '2024-09-07 08:47:25'),
(17, 'jowen', 'pogi', 'user', 'jowen', 'bahay', '091236832', '2024-09-07 08:51:36', '2024-09-07 08:51:36'),
(18, 'saui2carlo', 'betlogqgreen', 'admin', 'carlo pogi', 'taga diyan', '09123123', '2024-09-07 08:55:13', '2024-10-01 04:29:48'),
(19, 'Carlo123', '1234', 'user', 'Carlo Villanueva', 'Pantal West, Dagupan City', '09123456789', '2024-09-07 09:03:09', '2024-09-07 09:03:09'),
(20, 'jccutieee', '12345678', 'user', 'cynthia', 'secret', '9304853', '2024-09-07 09:24:13', '2024-09-07 09:24:13'),
(21, 'abdol', 'jakol', 'user', 'nigga', '69', '09987654321', '2024-09-07 10:55:52', '2024-09-07 10:55:52'),
(22, 'rideurmom', 'jakol', 'courier', 'momrider', '69', '09987654321', '2024-09-07 10:58:31', '2024-09-07 10:58:31'),
(23, 'ass', 'ibok', 'courier', 'ass', 'ggg', '4556', '2024-09-08 00:11:00', '2024-09-08 00:11:00'),
(24, 'htilog', 'bilog', 'user', 'aaron', 'abong', '912423445', '2024-09-08 03:37:42', '2024-09-08 03:37:42'),
(25, 'unknownexile', '123456', 'user', 'Carlo Villanueva', 'Dagupan City', '23481847382', '2024-09-10 02:34:28', '2024-09-10 02:34:28'),
(26, 'bobo', 'tangina', 'user', 'tangina ka', 'fucker', '411658451', '2024-09-10 03:24:40', '2024-09-10 03:24:40'),
(27, 'bao', 'ninam', 'courier', 'yyytt', 'ytuy', '866765', '2024-09-10 23:01:09', '2024-09-10 23:01:09'),
(28, 'otin', 'kogreen', 'admin', 'ramon', 'baley', '09286969', '2024-09-12 07:02:59', '2024-09-12 07:02:59'),
(29, 'roman', 'oldstar15', 'user', 'roman', 'mamarlao', '09065912666', '2024-09-12 07:51:33', '2024-09-12 07:51:33'),
(30, 'ramon123', 'oldstar15', 'user', 'roman', 'mamarlao', '09065912666', '2024-09-12 07:52:58', '2024-09-12 07:52:58'),
(31, 'ramoan', 'oldstar15', 'courier', 'roman', 'mamarlao', '09065912666', '2024-09-12 08:00:13', '2024-09-12 08:00:13'),
(32, 'gian', '12345678', 'courier', 'cynthia', 'secret', '09308235675', '2024-09-12 13:00:02', '2024-09-12 13:00:02'),
(33, 'arnel', 'ar', 'user', 'arnel', 'bahay ng mga pogi', '133', '2024-09-13 09:59:47', '2024-09-13 09:59:47'),
(34, 'Jellz', '123456789', 'admin', 'Jellz', 'urmom', '09095267803SENDGCASH', '2024-09-14 03:41:43', '2024-09-14 13:10:19'),
(35, 'Jellzx', '123456789', 'courier', 'Jellz', 'sabahayngmabini', '09095267803', '2024-09-14 03:45:37', '2024-09-14 03:45:37'),
(36, 'Krisfel', 'gwapoako', 'user', 'Krisfel', 'Coquia', '11111', '2024-09-14 13:54:38', '2024-09-14 13:54:38'),
(37, 'CustomerJellz', '12345678', 'user', 'Jellz Customer', 'aybastasamabini', '123', '2024-09-15 12:43:43', '2024-09-15 12:43:43'),
(38, 'krisfel1', 'coquia', 'user', 'Krisfel', 'Coquia', '11111', '2024-09-17 09:46:40', '2024-09-17 09:46:40'),
(39, '03-1718-02144', 'qwer', 'user', 'hakdog', '69', '09123', '2024-09-20 05:58:48', '2024-09-20 05:58:48'),
(40, 'abcdefg', '1234', 'user', 'abcde', 'abcdef', '12345', '2024-09-20 11:52:00', '2024-09-20 11:52:00'),
(41, 'nin', 'am', 'user', 'sdfg', 'awertqer', '58416541561', '2024-09-24 02:09:10', '2024-09-24 02:09:10'),
(42, 'abcdefghij', '12345', 'courier', 'abcde', 'abcde', '12345', '2024-09-24 03:41:20', '2024-09-24 03:41:20'),
(43, 'mahomo', '12345', 'courier', 'maho', '12dfgrrgg', '13434234', '2024-09-24 03:42:53', '2024-09-24 03:42:53'),
(44, 'kat', '12345', 'courier', 'kat', 'dagupan', '0912345', '2024-09-24 05:26:43', '2024-09-24 05:26:43'),
(45, 'halimawasdf', '12345', 'user', 'kat', 'hatdog', '1234567', '2024-09-24 06:49:57', '2024-10-01 03:56:14'),
(46, 'betbet', 'nolnol', 'courier', 'asdf', 'ljsdkf', 'asdf', '2024-10-01 05:46:52', '2024-10-01 05:46:52'),
(47, 'serenity2223', 'oldstar15', 'user', 'ramon', 'mamarlao', '09065912666', '2024-10-09 05:57:16', '2024-10-09 05:57:16'),
(48, '123', '123', 'courier', '123', '123', '123', '2024-10-15 03:45:36', '2024-10-15 03:45:36'),
(49, 'Shit', 'Head', 'user', 'Shit', 'Head', '874513219684', '2024-10-16 07:14:47', '2024-10-16 07:14:47'),
(50, 'cute', 'cute', 'courier', 'Cute', 'Cute pa rin', '123', '2024-10-18 07:27:53', '2024-10-18 07:27:53'),
(51, 'cute1', 'cute1', 'user', 'Cute', 'cute pa rin', '123', '2024-10-18 07:31:02', '2024-10-18 07:31:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EAN` (`EAN`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
