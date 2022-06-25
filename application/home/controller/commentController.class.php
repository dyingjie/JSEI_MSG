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
        require $_SERVER['DOCUMENT_ROOT'].'/JSEI_MSG/application/home/view/comment_list.html';
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
        require $_SERVER['DOCUMENT_ROOT'].'/JSEI_MSG/application/home/view/comment_info.html';
    }
    /**
     * 添加留言信息
     */
    public function addAction(){
        //判断是否是POST方法提交
        if(empty($_POST)){
            return false;
        }
        $commentModel =new commentModel();
        //调用insert方法
        $pass = $commentModel->insert();
        if($pass) {
            echo "发表留言成功";
        } else {
            echo "发表留言失败";
        }
    }
}