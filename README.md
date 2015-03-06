##############################################
########Currency Fair Program / Test #########
# Author: Joseph Stenhouse ###################
# Date: 3/5/2015 #############################
##############################################

Given framework: Laravel 4.2 (There are reasons I did not use 5, primarily because I am not caught up.) I did however feel that Laravel was appropriate.
(Server is running PHP 5.5.20, Apache2, memcached, mysql)

Architecture

 - Mysql
 - CF Message Consumer component is located in app/controllers/MessageControllerCF.php
 - CF Message Processor component is located in app/components/MessageProcessorCF.php
 - CF Message Frontend component is located in app/controllers/FrontendControllerCF.php and app/views (for all the layout and view files + navbar and footer files that are used on the frontend)

To set up your db simply run this SQL. I set this up on my local, but obviously can be changed to whatever you wish.

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `currencyFrom` varchar(3) COLLATE utf8_bin NOT NULL,
  `currencyTo` varchar(3) COLLATE utf8_bin NOT NULL,
  `amountSell` float(12,2) NOT NULL,
  `amountBuy` float(12,2) NOT NULL,
  `rate` float(12,4) NOT NULL,
  `timePlaced` datetime NOT NULL,
  `originatingCountry` varchar(2) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `userId` (`userId`),
  KEY `currencyFrom` (`currencyFrom`),
  KEY `currencyTo` (`currencyTo`),
  KEY `amountSell` (`amountSell`),
  KEY `amountBuy` (`amountBuy`),
  KEY `rate` (`rate`),
  KEY `originatingCountry` (`originatingCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

Apart from the primary key on the table, the other fields have indexes on them that should enable the Message Processor component to retrieve entries based on certain analytical functionalities.


B) Message Consumer component

The endpoint for this component is http://yourserver/message/invoke


C) Message Processor component

The message Processor component is in charge of processing the message database entries before they are displayed by the frontend. 
It is also in charge of retrieving the unique currency pairs from the database AND computing the transaction volumes for these pairs.
All requests are filtered through the frontend.

D) Message Frontend component

THEME

I'm using a custom theme which uses SASS style. It's geared toward an ADMIN look/feel and is flexible. I'm doing a basic route to the theme within Laravel.

The message frontend component can be accessed by going to the base project root (route is set in place to direct requests to frontend/index)
All the actions required are stored inside the FrontendControllerCF file.
I have used a graphical theme I had at my disposal (based on Bootstrap 3) to display the elements in a more user-friendly manner. Theme is called customGridGraph and you can find more details about it here http://themeforest.net/item/customGridGraph-responsive-admin-dashboard-template/4021469
There are 2 parts for the frontend:
    - Message gridview - where the simple messages are retrieved from the database (through the Message Processor component) and displays a table with the entries and their attributes
    - Message analytics - where based on an existing currency pair from the database, it retrieves transaction volumes for the specified pair between MIN(`timePlaced`) and MAX(`timePlaced`) (through the Message Processor component as well) and uses javascript to display the graph for it;