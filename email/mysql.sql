-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： mysql:3306
-- 生成日期： 2019-01-26 18:12:01
-- 服务器版本： 8.0.13
-- PHP 版本： 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `phpemail`
--
CREATE DATABASE IF NOT EXISTS `phpemail` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpemail`;

-- --------------------------------------------------------

--
-- 表的结构 `email_access`
--

CREATE TABLE `email_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(4) NOT NULL DEFAULT '0' COMMENT '父级id',
  `type` int(4) DEFAULT '1' COMMENT '权限类型1:菜单2:操作',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
  `urls` varchar(1000) NOT NULL DEFAULT '' COMMENT '全线路径',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态 1：启用 2：禁用',
  `update_time` int(11) DEFAULT NULL COMMENT '最后一次更新时间',
  `create_time` int(11) DEFAULT NULL COMMENT '插入时间',
  `path` varchar(255) DEFAULT NULL COMMENT '路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限详情表';

--
-- 转存表中的数据 `email_access`
--

INSERT INTO `email_access` (`id`, `parent_id`, `type`, `title`, `urls`, `status`, `update_time`, `create_time`, `path`) VALUES
(1, 0, 1, '合同管理', 'Contract', 1, NULL, NULL, ''),
(2, 1, 1, '合同创建', 'Contract/create', 1, NULL, NULL, '1'),
(4, 0, 1, '客户管理', 'Customer', 1, 1545149709, 1545149709, ''),
(5, 4, 1, '客户创建', 'Customer/create', 1, 1546525797, 1546525797, '4'),
(12, 1, 1, '合同列表', 'Contract/list', 1, 1546681372, 1546681372, '1');

-- --------------------------------------------------------


--
-- 表的结构 `email_email`
--

CREATE TABLE `email_email` (
  `id` int(4) UNSIGNED NOT NULL COMMENT '邮箱配置编号',
  `host` varchar(255) DEFAULT NULL COMMENT '邮箱主机地址',
  `agreement` varchar(255) DEFAULT NULL COMMENT '邮箱协议',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱账号',
  `password` varchar(255) DEFAULT NULL COMMENT '邮箱账号',
  `port` int(11) DEFAULT NULL COMMENT '邮箱端口号',
  `company` varchar(255) DEFAULT NULL COMMENT '公司名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `email_email`
--

INSERT INTO `email_email` (`id`, `host`, `agreement`, `email`, `password`, `port`, `company`) VALUES
(3, 'smtp.163.cn', 'http', '18228937997@163.com', '123456789', 459, '上海云道信息科技');

-- --------------------------------------------------------

--
-- 表的结构 `email_role`
--

CREATE TABLE `email_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `access_ids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '权限字符',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：启用2：禁用3:逻辑删除',
  `update_time` int(11) DEFAULT NULL COMMENT '最后一次更新时间',
  `create_time` int(11) DEFAULT NULL COMMENT '插入时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `email_role`
--

INSERT INTO `email_role` (`id`, `role_name`, `access_ids`, `status`, `update_time`, `create_time`) VALUES
(1, '', '12', 3, 1546775797, NULL),
(2, '管理员', '1,2,12,4,5,6,8', 1, 1546876561, NULL),
(3, '合同管理员', '1', 1, 1546876576, NULL),
(4, '系统管理员', '6,8', 1, 1546876589, 1546774497);

-- --------------------------------------------------------

--
-- 表的结构 `email_user`
--

CREATE TABLE `email_user` (
  `id` int(4) UNSIGNED NOT NULL COMMENT '用户id',
  `last_name` varchar(11) NOT NULL COMMENT '用户姓',
  `first_name` varchar(11) NOT NULL COMMENT '用户名',
  `number` varchar(11) NOT NULL COMMENT '登录账号',
  `pwd` varchar(32) NOT NULL COMMENT '登录密码',
  `email` varchar(20) NOT NULL DEFAULT ' ' COMMENT '邮箱账号',
  `tel` varchar(11) NOT NULL DEFAULT ' ' COMMENT '联系电话',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '数据更新时间',
  `active_time` int(11) NOT NULL COMMENT '账号激活时间',
  `type` int(1) NOT NULL DEFAULT '3' COMMENT '账号类型.1:销售,2:工程师,3:销售+工程师,4:后台管理',
  `status` int(1) NOT NULL DEFAULT '3' COMMENT '数据状态.1:启用,2:删除,3:禁用',
  `role_id` int(2) NOT NULL DEFAULT '0' COMMENT '角色id，关联role中的id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';

--
-- 转存表中的数据 `email_user`
--

INSERT INTO `email_user` (`id`, `last_name`, `first_name`, `number`, `pwd`, `email`, `tel`, `create_time`, `update_time`, `active_time`, `type`, `status`, `role_id`) VALUES
(1, '漆', '齐', 'admin001', 'e10adc3949ba59abbe56e057f20f883e', '182228937997@163.com', '18228937997', 1544152620, 1546876716, 1544152620, 4, 1, 2),
(2, '张', '三', 'zhangsan', 'e10adc3949ba59abbe56e057f20f883e', '18228937992@163.com', '18228937992', 1544152740, 1546876728, 1544152740, 1, 1, 2),
(3, 'li', 'si', 'lisi1212', 'e10adc3949ba59abbe56e057f20f883e', '18228937993@163.com', '18228937993', 1544152784, 1546876703, 1544152784, 2, 3, 3),
(4, 'wang1', 'wu', 'wangwu', 'e10adc3949ba59abbe56e057f20f883e', '18228937994@163.com', '18228937994', 1544152820, 1546876616, 1544152820, 3, 1, 3),
(6, '1', '2', '1234567', '123456', '5@163.com', '15683202303', 1546740208, 1546876602, 1546740208, 3, 1, 4),
(7, '1', '2', '1234567', 'e10adc3949ba59abbe56e057f20f883e', '5@163.com', '15683202303', 1546740244, 1546745632, 1546740244, 3, 2, 0),
(8, '1', '2', '1234567', 'dcb9814b1fca606cd9d5c1e6bdd60814', '5@163.com', '15683202303', 1546740341, 1546745597, 1546740341, 3, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `email_user_history`
--

CREATE TABLE `email_user_history` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '合同记录表id',
  `t_id` int(11) NOT NULL COMMENT '合同id',
  `people` varchar(32) NOT NULL COMMENT '合同公司对接人',
  `email` varchar(20) NOT NULL DEFAULT ' ' COMMENT '联系邮箱',
  `tel` varchar(11) NOT NULL DEFAULT ' ' COMMENT '联系电话',
  `start_time` int(11) NOT NULL COMMENT '对接人对接开始时间',
  `end_time` int(11) NOT NULL COMMENT '对接人对结束时间',
  `create_time` int(11) NOT NULL COMMENT '数据创建时间',
  `update_time` int(11) NOT NULL,
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='合同客户对接人历史信息记录表';

--
-- 转储表的索引
--

--
-- 表的索引 `email_access`
--
ALTER TABLE `email_access`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `email_email`
--
ALTER TABLE `email_email`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `email_role`
--
ALTER TABLE `email_role`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `email_user`
--
ALTER TABLE `email_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `email_user_history`
--
ALTER TABLE `email_user_history`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `email_access`
--
ALTER TABLE `email_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `email_email`
--
ALTER TABLE `email_email`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '邮箱配置编号', AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `email_role`
--
ALTER TABLE `email_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `email_user`
--
ALTER TABLE `email_user`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `email_user_history`
--
ALTER TABLE `email_user_history`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '合同记录表id';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
