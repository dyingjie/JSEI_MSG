<?php
header("Content-type:text/html;charset=utf8");
//载入数据库操作类
require 'MySQLPDO.class.php';
//载入模型类
require 'model.class.php';
require 'commentModel.class.php';
//实例化comment模型
$comment=new commentModel();
//调用模型中的方法取得结果
echo '<pre>';
//print_r($comment->getAll());
print_r($comment->getById(2));
echo '<pre>';