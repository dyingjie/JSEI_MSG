<?php
//数据库配置
return array(
    'db'=>array(
//数据库环境
        'user'=>'root',
        'pass'=>'root',
        'dbname'=>'hcit_msg',
    ),
//整体信息
    'app'=>array(
        'default_platform'=>'home',//默认平台
    ),
//前台配置
    'home'=>array(
        'default_controller'=>'comment',//默认控制器
        'default_action'=>'list',//默认方法
    ),
//后台配置
    'admin'=>array(
        'default_controller'=>'',//默认控制器
        'default_action'=>'',//默认方法
    ),
);