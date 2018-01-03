"# idealgifts" 
CREATE TABLE `mvc_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `ctime` int(10) NOT NULL COMMENT '创建时间',
  `utime` int(10) NOT NULL COMMENT '更新时间',
  `order` int(10) NOT NULL DEFAULT '0' COMMENT '订单数',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1未验证邮箱，2是已验证',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8

CREATE TABLE `mvc_user_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户ID',
  `username` varchar(60) NOT NULL COMMENT '用户名',
  `name` varchar(255) NOT NULL COMMENT '项目',
  `phone` varchar(255) NOT NULL COMMENT '手机',
  `address` varchar(255) NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8