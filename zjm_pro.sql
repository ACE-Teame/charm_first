/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : zjm_pro

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-16 22:14:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `domain`
-- ----------------------------
DROP TABLE IF EXISTS `domain`;
CREATE TABLE `domain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(32) NOT NULL COMMENT '域名',
  `time` varchar(32) DEFAULT NULL COMMENT '时间',
  `money` float(8,2) DEFAULT '0.00' COMMENT '费用',
  `record_number` varchar(64) DEFAULT NULL COMMENT '备案号',
  `company` varchar(128) DEFAULT NULL COMMENT '公司',
  `nature` varchar(32) DEFAULT NULL COMMENT '性质',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of domain
-- ----------------------------
INSERT INTO `domain` VALUES ('10', '123355', '1497360232', '60.00', '浙ICP备11032557号-5', '结艺网', '个人', '1');
INSERT INTO `domain` VALUES ('11', 'bbrqr.cn', '1497102944', '90.00', '浙ICP备16013117号-5', '梦想飞翔', '个人', '1');
INSERT INTO `domain` VALUES ('12', 'topsun0769.cn', '1497103015', '90.00', '粤ICP备14044442号-1', '东莞市永胜布料有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('13', 'cmbudai.cn ', '1497229753', '90.00', '豫ICP备15036353号-2', '郑州初末布艺有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('14', 'wjlc.co', '1497103273', '75.00', '皖ICP备12009458号-1', '江望九龙', '个人', '1');
INSERT INTO `domain` VALUES ('15', 'letuo.co ', '1497229775', '75.00', '沪ICP备15058074号-1', '上海铁狐狸网络科技有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('16', 'zdimg.com ', '1497230135', '95.00', '浙ICP备15017819号-1', '杭州知底儿网络技术有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('17', 'tjgs.co', '1497103419', '75.00', '津ICP备12003893号-1', '天津大众船务有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('18', 'ubong.cn', '1497230163', '90.00', '粤ICP备15023096号-2', '广州游帮信息科技有限公司 ', '企业', '1');
INSERT INTO `domain` VALUES ('19', 'vriem.cn', '1497230213', '90.00', '沪ICP备15042734号-2', '上海瀚研智能机电有限公司 ', '企业', '1');
INSERT INTO `domain` VALUES ('20', 'shanglida.cn', '1497230203', '90.00', '粤ICP备16036503号-1', '深圳市尚立达法律咨询服务有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('21', 'zw720.cn  ', '1497230233', '90.00', '京ICP备13029935号-10', '北京期待广告策划有限公司', '企业', '1');
INSERT INTO `domain` VALUES ('22', 'huashunglass.com', '1497231896', '60.00', '粤ICP备17047334号-1', '隐藏的心孑', '个人', '1');
INSERT INTO `domain` VALUES ('23', 'teamtoptech.com', '1497231926', '60.00', '粤ICP备17047334号-2', '天拓技术', '个人', '1');

-- ----------------------------
-- Table structure for `person_link`
-- ----------------------------
DROP TABLE IF EXISTS `person_link`;
CREATE TABLE `person_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `leader` varchar(32) DEFAULT NULL COMMENT '负责人',
  `original_link` varchar(255) DEFAULT NULL COMMENT '原始链接',
  `spread_link` varchar(255) DEFAULT NULL COMMENT '推广链接',
  `industry` varchar(32) DEFAULT NULL COMMENT '行业',
  `time` int(10) DEFAULT NULL COMMENT '时间',
  `is_h5` varchar(8) DEFAULT NULL COMMENT '是否是H5',
  `state` varchar(16) DEFAULT NULL COMMENT '状态',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_link
-- ----------------------------
INSERT INTO `person_link` VALUES ('1', '张媛', 'http://top.huashunglass.com/zy/qgcp/index.html', '', '彩票', '1497246505', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('2', '苏立权', 'http://top.huashunglass.com/slq/ngxt/index.html', '', '股票', '1497246275', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('5', '苏立权', 'http://top.huashunglass.com/slq/kc/index.html', '', '口臭', '1497246366', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('6', '苏立权', 'http://top.huashunglass.com/slq/kc/index.html', '', '口臭', '1497246358', '是', '改版', '1');
INSERT INTO `person_link` VALUES ('7', '张腾', 'http://top.huashunglass.com/zt/nbl.html', 'http://www.toutiaopage.com/tetris/page/52202431965/?from=singlemessage&isappinstalled=0', 'NewBalance', '1497249586', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('8', '张腾', 'http://top.huashunglass.com/zt/ryts.html', 'https://yang2.gdyzf.wang/', '', '1497250464', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('9', '张腾', 'http://top.huashunglass.com/zt/viskarry.html', '', '', '1497250713', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('10', '张腾', 'http://top.huashunglass.com/zt/kasi.html', '', '', '1497250761', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('11', '张腾', 'http://top.huashunglass.com/zt/mys.html', '', '', '1497250783', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('12', '张腾', 'http://top.huashunglass.com/zt/mya.html', '', '', '1497250807', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('13', '张腾', 'http://top.huashunglass.com/zt/myb.html', '', '', '1497250833', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('14', '张腾', 'http://top.huashunglass.com/zt/myc.html', '', '', '1497250854', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('15', '张腾', 'http://top.huashunglass.com/zt/myd.html', '', '', '1497250867', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('16', '张腾', 'http://top.huashunglass.com/zt/mye.html', '', '', '1497250879', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('17', '张腾', 'http://top.huashunglass.com/zt/pro/index.html', '', '', '1497250893', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('18', '张腾', 'http://top.huashunglass.com/zt/myf.html', '', '', '1497250902', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('19', '张腾', 'http://top.huashunglass.com/zt/myg.html', '', '', '1497250912', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('20', '张腾', 'http://top.huashunglass.com/zt/hutao/index.html', '', '', '1497250922', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('21', '张腾', 'http://top.huashunglass.com/zt/sesame/index.html', '', '', '1497250935', '是', '新链接', '1');
INSERT INTO `person_link` VALUES ('22', '曾展宏', 'http://top.huashunglass.com/a.html', '', '', '1497250975', '否', '新链接', '1');
INSERT INTO `person_link` VALUES ('23', '曾展宏', 'http://top.huashunglass.com/zzh.html', '', '', '1497250996', '否', '新链接', '1');

-- ----------------------------
-- Table structure for `section_link`
-- ----------------------------
DROP TABLE IF EXISTS `section_link`;
CREATE TABLE `section_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(64) NOT NULL,
  `domain` varchar(64) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `costomer` varchar(128) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of section_link
-- ----------------------------
INSERT INTO `section_link` VALUES ('1', '扶翼', 'http://www.bbrqr.cn/', '1497230474', '北京连邦软件股份有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('2', '扶翼', 'http://www.teamtoptech.com/zqgs/index.html', '1497230567', '昆明新知集团有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('3', '扶翼', 'http://www.topsun0769.cn/', '1497360334', '河北四方食品有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('5', '扶翼', 'http://www.cmbudai.cn/', '1497232018', '广州百莲凯生物科技有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('6', '扶翼', '*.topsun0769.cn', '1497232048', '211.149.193.165', '新链接', '1');
INSERT INTO `section_link` VALUES ('7', '扶翼', 'http://www.wjlc.co/', '1497232083', '安徽省昌海国际贸易有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('8', '扶翼', 'http://www.letuo.co/', '1497232095', '伽蓝（集团）股份有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('9', '扶翼', 'http://www.zdimg.com', '1497232107', '女性客户', '新链接', '1');
INSERT INTO `section_link` VALUES ('10', '扶翼', 'http://www.tjgs.co', '1497232115', '天津唐码书业有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('11', '扶翼', '*.huashunglass.com', '1497232135', '211.149.193.165', '新链接', '1');
INSERT INTO `section_link` VALUES ('12', '扶翼', 'http://info.topsun0769.cn', '1497232165', '211.149.193.165', '新链接', '1');
INSERT INTO `section_link` VALUES ('13', '扶翼', 'http://mr.huashunglass.com/', '1497232178', '211.149.193.165', '新链接', '1');
INSERT INTO `section_link` VALUES ('14', '扶翼', 'http://nx.zdimg.com', '1497232239', '女性客户', '新链接', '1');
INSERT INTO `section_link` VALUES ('15', '扶翼', 'http://yx.topsun0769.cn/', '1497232248', '浙江起游信息技术有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('16', '扶翼', 'http://top.cmbudai.cn/', '1497232255', '青花瓷瓶典藏原浆酒', '新链接', '1');
INSERT INTO `section_link` VALUES ('17', '扶翼', 'http://www.teamtoptech.com/', '1497232262', '中青校园先锋文化（北京）有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('18', '扶翼', 'http://tfbj.bbrqr.cn/', '1497232270', '四川巴蜀书社有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('19', '扶翼', 'http://zl.wjlc.co/', '1497232278', '深圳万购贸易有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('20', '扶翼', 'http://www.ubong.cn/', '1497232285', '深圳益准科技有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('21', '扶翼', 'http://www.vriem.cn/', '1497232292', '上海洞天化妆品有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('22', '扶翼', 'http://abc.letuo.co/', '1497232300', '黑龙江四季安全书籍销售有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('23', '扶翼', 'http://www.vriem.cn/', '1497232307', '211.149.193.165', '新链接', '1');
INSERT INTO `section_link` VALUES ('24', '扶翼', 'http://bet.bbrqr.cn/', '1497232313', '上海自然美富丽化妆品有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('25', '扶翼', 'http://bet.tjgs.co', '1497232320', '泉州天文工艺品有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('26', '扶翼', 'http://clock.zdimg.com', '1497232329', '上海狄顿电子科技有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('27', '扶翼', 'http://shoes.topsun0769.cn/', '1497232338', '深圳力盾鞋业有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('28', '扶翼', 'http://food.ubong.cn/', '1497232345', '厦门正果食品工业有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('29', '扶翼', 'http://honey.cmbudai.cn/', '1497239422', '黑龙江小慈生态农业发展有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('30', '扶翼', 'http://abc.vriem.cn/', '1497239525', '杭州临安吉利绿色食品有限公司', '新链接', '1');
INSERT INTO `section_link` VALUES ('31', 'TSA', 'http://seo.ubong.cn/', '1497245288', '', '新链接', '1');
INSERT INTO `section_link` VALUES ('32', 'TSA', 'http://seo.topsun0769.cn/', '1497245311', '', '新链接', '1');
INSERT INTO `section_link` VALUES ('33', 'TSA', 'http://www.szielts.com.cn/11', '1497245338', '', '新链接', '1');
INSERT INTO `section_link` VALUES ('34', '陌陌', 'http://mo.topsun0769.cn/', '1497245363', '游戏', '新链接', '1');
INSERT INTO `section_link` VALUES ('35', 'KA', 'http://www.zw720.cn/', '1497245385', '彩票', '新链接', '1');
INSERT INTO `section_link` VALUES ('36', 'KA', 'http://bet.zw720.cn/', '1497245401', '肾虚', '新链接', '1');
INSERT INTO `section_link` VALUES ('37', 'KA', 'http://www.shanglida.cn', '1497245418', '健身', '新链接', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '名字',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `time` int(10) NOT NULL COMMENT '时间',
  `group_name` varchar(32) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用(1启用0停用)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '小二', '$2y$10$4/QgcXqbldPGwpQ5z9HtueSa.s.GefhB8bxLiSUlz789E69FHqucm', '1497537807', '1', '1');
INSERT INTO `user` VALUES ('2', '小三', '$2y$10$OKsK7j.OWds9iZh8JgNywezKpJ3lGnJyXoTI7/trzKi.i9wWidZvC', '1497538310', '管理员', '1');
INSERT INTO `user` VALUES ('4', '小四', '$2y$10$m7bDI59d4503.DiExFdpuOp5KUVHqLqUJ88znv760eGA/12u9uAtG', '1497622447', '管理员', '1');
