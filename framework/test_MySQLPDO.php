<?php
header('Content-Type:text/html;charset=utf8');
//载入类文件
require 'MySQLPDO.class.php';
//配置数据库连接信息
$dbConfig=array('user'=>'root','pass'=>'root','dbname'=>'hcit_msg');
//实例化MySQLPDO类
$db=MySQLPDO::getInstance($dbConfig);
//执行SQL查询，取得全部结果
$data=$db->fetchAll('select * from comment');
//输出查询结果
echo '<pre>';
print_r($data);
echo "</pre>";