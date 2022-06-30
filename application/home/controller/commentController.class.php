<?php
/**
 * 留言板控制器类
 */
class commentController extends platformController {
    /**
     * 留言列表
     */
    public function listAction(){
        //实例化模型，取出数据
        $commentModel = new commentModel();
        //取得留言总数
        $num = $commentModel->getNumber();
        //实例化分页类
        $page=new page($num,$GLOBALS['config']['home']['pagesize']);
        //取得所有留言数据
        $data=$commentModel->getAll($page->getLimit());
        //取得分页导航链接
        $pageList=$page->getPageList();
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
            //成功时
            $this->jump($_SERVER['DOCUMENT_ROOT'].'/JSEI_MSG/framework/index.php','发表留言成功');
        } else {
            //失败时
            $this->jump($_SERVER['DOCUMENT_ROOT'].'/JSEI_MSG/framework/index.php','发表留言失败');
        }
    }
}