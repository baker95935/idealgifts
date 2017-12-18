/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mymvc

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-05-03 10:48:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mvc_action
-- ----------------------------
DROP TABLE IF EXISTS `mvc_action`;
CREATE TABLE `mvc_action` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '控制器id',
  `action_name` varchar(45) NOT NULL COMMENT '控制器名',
  `action_controller` varchar(45) DEFAULT NULL,
  `action_func` varchar(45) NOT NULL COMMENT '执行的方法',
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='控制器表';

-- ----------------------------
-- Records of mvc_action
-- ----------------------------

-- ----------------------------
-- Table structure for mvc_admin
-- ----------------------------
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

-- ----------------------------
-- Records of mvc_admin
-- ----------------------------
INSERT INTO `mvc_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1409400006', '1458285844', '2130706433', '0');

-- ----------------------------
-- Table structure for mvc_category
-- ----------------------------
DROP TABLE IF EXISTS `mvc_category`;
CREATE TABLE `mvc_category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `category_name` varchar(60) NOT NULL COMMENT '类名',
  `category_pid` int(10) unsigned NOT NULL COMMENT '所属的父类',
  `category_path` varchar(60) NOT NULL DEFAULT '0' COMMENT '到此类的分类路径, ,相隔',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `cover_path` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of mvc_category
-- ----------------------------
INSERT INTO `mvc_category` VALUES ('10', '手机', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('14', '手机', '10', '0-10', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('15', '配件', '10', '0-10', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('16', '运营商', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('17', '购机送费', '16', '0-16', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('18', '选号入网', '16', '0-16', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('19', '上网卡', '16', '0-16', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('20', '平板电脑', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('21', '平板电脑', '20', '0-20', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('22', '配件', '20', '0-20', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('23', '宽带网络', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('24', '移动网络', '23', '0-23', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('25', '家庭网络', '23', '0-23', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('26', '增值服务', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('27', '华为秘盒', '26', '0-26', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('28', '服务', '26', '0-26', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('29', '配件', '26', '0-26', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('30', '应用市场', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('31', '手机游戏', '30', '0-30', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('32', '手机应用', '30', '0-30', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('33', '穿戴', '0', '0', '1', '0', '');
INSERT INTO `mvc_category` VALUES ('34', 'hao', '0', '0', '1', '0', ' uploads/images/2016-04-27/smallimg/1461770049_thumb.jpg');
INSERT INTO `mvc_category` VALUES ('35', 'd', '0', '0', '1', '0', ' uploads/images/2016-04-27/smallimg/1461771448_thumb.jpg');

-- ----------------------------
-- Table structure for mvc_gallery
-- ----------------------------
DROP TABLE IF EXISTS `mvc_gallery`;
CREATE TABLE `mvc_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_original` varchar(100) DEFAULT NULL,
  `img_middle` varchar(100) DEFAULT NULL,
  `img_small` varchar(100) DEFAULT NULL,
  `img_order` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mvc_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for mvc_good
-- ----------------------------
DROP TABLE IF EXISTS `mvc_good`;
CREATE TABLE `mvc_good` (
  `good_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `category_id` int(10) unsigned NOT NULL,
  `good_code` char(11) NOT NULL COMMENT '商品编号 11位',
  `good_name` varchar(60) NOT NULL COMMENT '商品名称',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '0:不显示  1:显示',
  `good_desc` varchar(100) DEFAULT '""' COMMENT '商品关键字',
  `good_small_img` varchar(255) DEFAULT '' COMMENT '放大镜的小图',
  `good_original_img` varchar(255) DEFAULT NULL COMMENT '大图-----商品放大镜图',
  `createtime` datetime NOT NULL COMMENT '上市时间',
  `good_order` int(11) NOT NULL DEFAULT '0' COMMENT '商品排序',
  `is_hot` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否热卖',
  `is_best` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否最好',
  `is_new` bit(1) DEFAULT b'0' COMMENT '是否新产品',
  PRIMARY KEY (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of mvc_good
-- ----------------------------
INSERT INTO `mvc_good` VALUES ('1', '14', '20140910838', '华为 HUAWEI Ascend P7 移动4G智能手机 ', '1', '纤薄机身，玻璃背纹，时尚新宠，全球领先的超薄LTE手机，震撼发售！', '/goods/20140910094809/428_428_540fadd94f78b.jpg', '/goods/20140910094809/540fadd92d1ae.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('2', '14', '20140910319', '华为 荣耀6 双卡双待双通 联通4G智能手机', '1', '全球首款八核4G CAT6手机。9月16日10:08准点开售，仅限9月9日10:08—9月15日18:00预约用户购买，立即预约吧~~（联通合约机有现货，请选购~）', '/goods/20140910095031/428_428_540fae6748343.jpg', '/goods/20140910095031/540fae67403b0.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('3', '14', '20140910641', '华为 荣耀3C 畅玩', '1', '4核1.6GHz极速处理器，5英寸黑瀑布屏，全贴合工艺，LTPS技术；后置BSI 800万像素相机，前置500万像素摄像头；华为Emotion UI 2.3，安全、便捷、分享！', '/goods/20140910095412/428_428_540faf4461797.jpg', '/goods/20140910095412/540faf44599e6.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('4', '14', '20140910215', '华为 HUAWEI Ascend Mate2 双卡双待双通 6.1英寸高清巨屏 电信3G智能手机 CDMA2000/GS', '1', '', '/goods/20140910101305/428_428_540fb3b1424dc.jpg', '/goods/20140910101305/540fb3b139e37.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('5', '14', '20140910290', '华为 HUAWEI C199 麦芒 电信4G智能手机FDD-LTE /TD-LTE/CDMA2000/GSM（月光银）', '1', '7.6mm纤薄金属机身；1300万像素摄像头；支持电信4G网络、双卡三待双通；Qualcomm 骁龙™400 (8928) 四核处理器；3000mAh大电池；麦芒无畏生长，专为年轻定制，中国好声音手机', '/goods/20140910101607/428_428_540fb46717d4c.jpg', '/goods/20140910101607/540fb4670fa97.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('6', '14', '20140910640', '华为 HUAWEI G615 双卡双待 联通3G智能手机 WCDMA/GSM（黑色）', '1', '精致设计，智在分享！5英寸高清晰大屏，四核高速处理器，双卡双待，800万像素高清拍照，华为Emotion UI 2.0 Lite，支持联通42Mbps高速网络！', '/goods/20140910101815/428_428_540fb4e7e7c8e.jpg', '/goods/20140910101815/540fb4e7dfb3b.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('7', '14', '20140910133', '华为 HUAWEI Y321C 双卡双待 3G智能手机 电信定制版 CDMA2000/GSM（黑色）', '1', '4英寸高清大屏，电容式触摸屏，随时上网，随意分享，拥有明天，触控品质生活！', '/goods/20140910102052/428_428_540fb5845d12e.jpg', '/goods/20140910102052/540fb58454c97.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('8', '14', '20140910454', '华为HUAWEI G730L 移动4G智能手机 TD-LTE/TD-SCDMA/GSM（深蓝色）', '1', '4G高速网络，顺畅体验，5.5英寸大屏，单手操作，悬浮窗口，多重任务，魅影触控，炫酷体验', '/goods/20140910102404/428_428_540fb6445921a.jpg', '/goods/20140910102404/540fb64451510.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('10', '14', '20140910222', ' 华为 HUAWEI G660 移动4G定制版 TD-LTE/TD-SCDMA/GSM（白色）', '1', '5英寸高清大屏，四核处理器，支持移动4G高速网络，支持NFC移动支付，让生活更便捷，更智能\r\n', '/goods/20140910102756/428_428_540fb72c4a031.jpg', '/goods/20140910102756/540fb72c4015e.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('11', '14', '20140910732', 'Y320C', '1', 'asd', '/goods/20140911015152/428_428_54108fb883330.jpg', '/goods/20140911015152/54108fb87b1d2.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('12', '14', '20140910993', 'G610s', '1', 'asd', '/goods/20140911015125/428_428_54108f9ddb520.jpg', '/goods/20140911015125/54108f9dd35e9.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('13', '14', '20140910325', '华为P7', '1', 'asd', '/goods/20140911085711/428_428_5410f3679b353.jpg', '/goods/20140911085711/5410f3678a442.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('14', '21', '20140910239', 'MediaPad Youth2', '1', '体态轻盈、金属机身、四核驱动、追求自由 ，3G/Wi-Fi自由连接！', '/goods/20140911015320/428_428_5410901025250.jpg', '/goods/20140911015320/541090101d23b.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('15', '21', '20140910803', 'MediaPad 7 Vogue', '1', '7英寸IPS屏幕，至强四核体验，轻薄金属机身，低功耗长续航，跨界平板实现通话与娱乐双享受！', '/goods/20140911015259/428_428_54108ffbd9e5c.jpg', '/goods/20140911015259/54108ffbc9a7b.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('16', '14', '20140910196', 'C8813D', '1', 'asd', '/goods/20140911015037/428_428_54108f6dd6bb1.jpg', '/goods/20140911015037/54108f6dcf2c6.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('17', '14', '20140910254', 'Ascend P6', '1', 'asd', '/goods/20140911015017/428_428_54108f59ccd0b.jpg', '/goods/20140911015017/54108f59c3bfb.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('18', '14', '20140910804', '荣耀X1', '1', 'asd', '/goods/20140911014956/428_428_54108f4458c82.jpg', '/goods/20140911014956/54108f4451277.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('19', '14', '20140910930', 'C199麦芒', '1', 'asd', '/goods/20140911014407/428_428_54108de70a2d1.jpg', '/goods/20140911014407/54108de702588.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('20', '14', '20140911718', '荣耀3X Pro', '1', 'qwe', '/goods/20140911014306/428_428_54108daa681f5.jpg', '/goods/20140911014306/54108daa5fee6.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('21', '14', '20140911102', '华为Mate7', '1', 'qwe', '/goods/20140911013906/428_428_54108cba3f1fd.jpg', '/goods/20140911013906/54108cba2ca8e.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('22', '14', '20140911466', '荣耀平板', '1', 'qwe', '/goods/20140911014043/428_428_54108d1b69718.jpg', '/goods/20140911014043/54108d1b609bc.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('23', '14', '20140911374', '华为HUAWEI Ascend P7 移动4G智能手机', '1', 'qwe', '/goods/20140911102407/428_428_541107c79da92.jpg', '/goods/20140911102407/541107c7937fb.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('24', '14', '20140911322', '华为荣耀6 双卡双待 移动4G智能手机', '1', 'qwe', '/goods/20140911102204/428_428_5411074d06a9a.jpg', '/goods/20140911102204/5411074cec0ec.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('25', '21', '20140911897', 'MadiaPad M1', '1', '获得德国红点设计大奖的时尚ID，高清IPS显示屏，四核1.6GHz处理器，疾速3G网络体验，支持通话功能，双扬声器环绕立体音效，超强续航，反向充电。', '/goods/20140911015224/428_428_54108fd8c5ed4.jpg', '/goods/20140911015224/54108fd8be66d.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('26', '21', '20140911425', '华为 HUAWEI MediaPad 10 Link+ 10.1英寸平板电脑（Wi-Fi版 四核CPU 16核GPU 8', '1', '航空铝合金轻感机身，10.1英寸IPS全视角屏幕，四核CPU，智能低功耗，Mali450MP4强劲GPU，1080p全高清影音播放，DTS音效', '/goods/20140911093734/428_428_5410fcdeded7b.jpg', '/goods/20140911093734/5410fcded747e.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('27', '21', '20140911574', '华为 HUAWEI MediaPad 7 Youth 7英寸平板电脑 3G版 （全金属机身 A9双核1.6GHz 410', '1', '轻薄全金属机身 A9双核1.6GHz 4100mAh大电池 2G/3G通话', '/goods/20140911094114/428_428_5410fdba49a03.jpg', '/goods/20140911094114/5410fdba41a04.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('28', '21', '20140911626', '阿发达饭店', '1', '阿凡达', '/goods/20140911152907/428_428_54114f43804e5.jpg', '/goods/20140911152907/54114f43686a5.jpg', '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('37', '15', 'd', 'f', '1', ' uploads/images/2016-04-28/smallimg/1461858574_thumb.jpg', '', null, '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('38', '34', 'd', 'f', '1', '', ' uploads/images/2016-04-28/smallimg/1461858574_thumb.jpg', null, '0000-00-00 00:00:00', '0', '\0', '\0', '\0');
INSERT INTO `mvc_good` VALUES ('39', '34', 'd', 'f', '1', 'f', ' uploads/images/2016-04-28/smallimg/1461859074_thumb.jpg', null, '0000-00-00 00:00:00', '0', '\0', '\0', '\0');

-- ----------------------------
-- Table structure for mvc_role
-- ----------------------------
DROP TABLE IF EXISTS `mvc_role`;
CREATE TABLE `mvc_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL COMMENT '角色名字',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mvc_role
-- ----------------------------
INSERT INTO `mvc_role` VALUES ('1', '商品管理');
INSERT INTO `mvc_role` VALUES ('2', '订单管理员');
INSERT INTO `mvc_role` VALUES ('3', '会员管理员');
INSERT INTO `mvc_role` VALUES ('4', '广告管理员');
INSERT INTO `mvc_role` VALUES ('5', '友链管理员');
INSERT INTO `mvc_role` VALUES ('6', '用户问题管理');
INSERT INTO `mvc_role` VALUES ('8', '超级管理员');

-- ----------------------------
-- Table structure for mvc_role_action
-- ----------------------------
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

-- ----------------------------
-- Records of mvc_role_action
-- ----------------------------

-- ----------------------------
-- Table structure for mvc_role_admin
-- ----------------------------
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

-- ----------------------------
-- Records of mvc_role_admin
-- ----------------------------
INSERT INTO `mvc_role_admin` VALUES ('8', '1');
