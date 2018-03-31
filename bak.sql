/*
SQLyog v10.2 
MySQL - 5.5.5-10.1.21-MariaDB : Database - idealgifts
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`idealgifts` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `idealgifts`;

/*Table structure for table `mvc_action` */

DROP TABLE IF EXISTS `mvc_action`;

CREATE TABLE `mvc_action` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '控制器id',
  `action_name` varchar(45) NOT NULL COMMENT '控制器名',
  `action_controller` varchar(45) DEFAULT NULL,
  `action_func` varchar(45) NOT NULL COMMENT '执行的方法',
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='控制器表';

/*Table structure for table `mvc_ad_img` */

DROP TABLE IF EXISTS `mvc_ad_img`;

CREATE TABLE `mvc_ad_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:不显示   1:显示',
  `img_path` varchar(255) NOT NULL,
  `img_order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '图片排序',
  `href` varchar(255) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`),
  KEY `ad_primary_key` (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_admin` */

DROP TABLE IF EXISTS `mvc_admin`;

CREATE TABLE `mvc_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增字段',
  `admin_name` varchar(45) DEFAULT NULL COMMENT '管理员名',
  `admin_pwd` char(32) DEFAULT NULL COMMENT '密码',
  `admin_login_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `admin_last_time` int(11) DEFAULT NULL COMMENT '最后一次登录时间',
  `admin_last_ip` int(11) DEFAULT NULL COMMENT '最后一次登录ip',
  `admin_lock` tinyint(4) DEFAULT NULL COMMENT '0 表示可登陆 1表示锁定',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Table structure for table `mvc_advertisement` */

DROP TABLE IF EXISTS `mvc_advertisement`;

CREATE TABLE `mvc_advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(30) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:单图  1:多图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_cart` */

DROP TABLE IF EXISTS `mvc_cart`;

CREATE TABLE `mvc_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `good_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `good_id` int(10) NOT NULL,
  `ctime` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `good_count` int(10) NOT NULL,
  `good_price` int(10) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `good_code` varchar(255) DEFAULT NULL,
  `cid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_category` */

DROP TABLE IF EXISTS `mvc_category`;

CREATE TABLE `mvc_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `category_name` varchar(60) NOT NULL COMMENT '类名',
  `category_pid` int(10) unsigned NOT NULL COMMENT '所属的父类',
  `category_path` varchar(60) NOT NULL DEFAULT '0' COMMENT '到此类的分类路径, ,相隔',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `cover_path` varchar(100) NOT NULL DEFAULT '',
  `is_delete` tinyint(1) DEFAULT '0',
  `is_tuijian` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:不显示在首页  1:显示',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

/*Table structure for table `mvc_gallery` */

DROP TABLE IF EXISTS `mvc_gallery`;

CREATE TABLE `mvc_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL,
  `img_path` varchar(120) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1927 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_good` */

DROP TABLE IF EXISTS `mvc_good`;

CREATE TABLE `mvc_good` (
  `good_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `category_id` int(10) unsigned NOT NULL,
  `good_code` char(11) NOT NULL COMMENT '商品编号 11位',
  `good_name` varchar(60) NOT NULL COMMENT '商品名称',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '0:不显示  1:显示',
  `good_desc` varchar(1000) DEFAULT '""' COMMENT '商品关键字',
  `good_small_img` varchar(255) DEFAULT '' COMMENT '放大镜的小图',
  `createtime` datetime NOT NULL COMMENT '上市时间',
  `good_order` int(11) NOT NULL DEFAULT '0' COMMENT '商品排序',
  `is_promotion` tinyint(1) DEFAULT '0' COMMENT '是否为促销',
  `is_hot` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否热卖',
  `is_best` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否最好',
  `is_new` bit(1) DEFAULT b'0' COMMENT '是否新产品',
  `pdf_path` varchar(255) DEFAULT '',
  `good_weight` varchar(60) DEFAULT NULL COMMENT '商品净重',
  `packing` varchar(60) DEFAULT NULL COMMENT '包装',
  `material` varchar(60) DEFAULT NULL COMMENT '物料',
  `size` varchar(60) DEFAULT NULL COMMENT '大小',
  `sale_price` decimal(10,2) NOT NULL COMMENT '售价',
  `discount_price` decimal(10,2) DEFAULT NULL COMMENT '折扣价',
  `shipping_info` varchar(255) DEFAULT NULL COMMENT '配送信息',
  `type` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `plate` varchar(100) DEFAULT NULL,
  `MOQ` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8 COMMENT='商品表';

/*Table structure for table `mvc_orders` */

DROP TABLE IF EXISTS `mvc_orders`;

CREATE TABLE `mvc_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL COMMENT '订单号',
  `gid` int(10) NOT NULL COMMENT '商品ID',
  `number` int(10) NOT NULL COMMENT '商品数量',
  `gprice` decimal(10,2) NOT NULL COMMENT '商品价格',
  `order_price` decimal(10,2) NOT NULL COMMENT '订单价格',
  `ctime` int(10) NOT NULL COMMENT '创建时间',
  `status` tinyint(4) NOT NULL COMMENT '订单状态1订单提交2发货3收货订单完成',
  `express_name` varchar(255) NOT NULL COMMENT '快递名称',
  `express_number` varchar(255) NOT NULL COMMENT '快递单号',
  `name` varchar(255) NOT NULL COMMENT '收件人名称',
  `phone` varchar(255) NOT NULL COMMENT '收件人手机',
  `address` varchar(255) NOT NULL COMMENT '收件人地址',
  `gname` varchar(255) NOT NULL COMMENT '商品名称',
  `send_time` int(10) NOT NULL COMMENT '发货时间',
  `uid` int(10) NOT NULL COMMENT 'uid',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `complete_time` int(10) NOT NULL COMMENT '订单完成时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_promotion` */

DROP TABLE IF EXISTS `mvc_promotion`;

CREATE TABLE `mvc_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:种类  1:单个商品',
  `order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `start_time` datetime NOT NULL COMMENT '开始时间',
  `end_time` datetime NOT NULL COMMENT '结束时间',
  `create_time` datetime NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_role` */

DROP TABLE IF EXISTS `mvc_role`;

CREATE TABLE `mvc_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL COMMENT '角色名字',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_role_action` */

DROP TABLE IF EXISTS `mvc_role_action`;

CREATE TABLE `mvc_role_action` (
  `role_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`role_id`,`action_id`),
  KEY `fk_vmall_role_has_vmall_action_vmall_action1_idx` (`action_id`),
  KEY `fk_vmall_role_has_vmall_action_vmall_role1_idx` (`role_id`),
  CONSTRAINT `mvc_role_action_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `mvc_action` (`action_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mvc_role_action_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `mvc_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_role_admin` */

DROP TABLE IF EXISTS `mvc_role_admin`;

CREATE TABLE `mvc_role_admin` (
  `role_id` int(10) unsigned NOT NULL,
  `admin_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`admin_id`),
  KEY `fk_vmall_role_has_vmall_admin_vmall_admin1_idx` (`admin_id`),
  KEY `fk_vmall_role_has_vmall_admin_vmall_role1_idx` (`role_id`),
  CONSTRAINT `mvc_role_admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `mvc_admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mvc_role_admin_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `mvc_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_shop` */

DROP TABLE IF EXISTS `mvc_shop`;

CREATE TABLE `mvc_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(60) NOT NULL DEFAULT '' COMMENT '店铺名称',
  `title` varchar(100) NOT NULL,
  `sub_title` text,
  `introduction` text NOT NULL COMMENT '公司介绍',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否在主页中显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_user` */

DROP TABLE IF EXISTS `mvc_user`;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `mvc_user_address` */

DROP TABLE IF EXISTS `mvc_user_address`;

CREATE TABLE `mvc_user_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户ID',
  `username` varchar(60) NOT NULL COMMENT '用户名',
  `name` varchar(255) NOT NULL COMMENT '项目',
  `phone` varchar(255) NOT NULL COMMENT '手机',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `ctime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
