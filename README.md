"# idealgifts" 
CREATE TABLE `mvc_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL COMMENT '�û���',
  `password` varchar(32) NOT NULL COMMENT '����',
  `ctime` int(10) NOT NULL COMMENT '����ʱ��',
  `utime` int(10) NOT NULL COMMENT '����ʱ��',
  `order` int(10) NOT NULL DEFAULT '0' COMMENT '������',
  `email` varchar(255) NOT NULL COMMENT '����',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1δ��֤���䣬2������֤',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8

CREATE TABLE `mvc_user_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '�û�ID',
  `username` varchar(60) NOT NULL COMMENT '�û���',
  `name` varchar(255) NOT NULL COMMENT '��Ŀ',
  `phone` varchar(255) NOT NULL COMMENT '�ֻ�',
  `address` varchar(255) NOT NULL COMMENT '��ַ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8