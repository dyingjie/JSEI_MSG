<?php
header('Context-Type:text/html;charset=utf8');
//载入数据库操作类
require 'MySQLPDO.class.php';
//载入模型文件
require 'model.class.php';
require 'commentModel.class.php';
//载入控制器类
require 'commentController.class.php';
$comment = new commentController();
//根据有无get参数调用不同的Action
if(empty($_GET)){
    $comment->listAction();
} else{
    $comment->infoAction();
}
