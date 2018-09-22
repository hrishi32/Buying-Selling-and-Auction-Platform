
CREATE TABLE `user_cart` (
  `user_id` varchar(40) DEFAULT NULL references user(userid),
  `item_id` int(11) DEFAULT NULL references object(id)
  
) ;


CREATE TABLE `user_order` (
  `user_id` varchar(40) DEFAULT NULL references user(userid),
  `item_id` tinyint(1) DEFAULT NULL references object(id)
  
) ;

