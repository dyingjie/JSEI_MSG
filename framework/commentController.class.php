<?php
/**
 * 留言板控制器类
 */
class commentController{
    /**
     * 留言列表
     */
    public function listAction(){
        //实例化模型，取出数据
        $comment = new commentModel();
        $data = $comment->getAll();
        //print_r($data);
        //载入视图文件
        require 'comment_list.html';
    }
    /**
     * 查看指定留言信息
     */
    public function infoAction(){
        //接收请求参数
        $id = $_GET['id'];
        //实例化模型，取出数据
        $commend = new commentModel();
        $data = $commend->getById($id);
        //载入视图文件
        require 'comment_info.html';
    }
}