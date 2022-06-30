<?php
/**
 * comment表的操作类，继承基础模型类
 */
require 'C:\wamp64\www/JSEI_MSG/framework/model.class.php';
class commentModel extends model{
    /**
     * 留言列表
     */
    public function  getAll($limit){
        //获得排序参数
        $order = '';
        if(isset($_GET['sort']) && $_GET['sort'] == 'desc'){
            $order = 'order by id desc';
        }
        //拼接SQL
        $sql = "select poster,comment,date,reply from comment $order limit $limit";
        //查询结果
        $data=$this->db->fetchAll($sql);
        return $data;
    }
    /**
     * 留言总数
     */
    public function getNumber(){
        $data = $this->db->fetchRow("select count(*) from comment");
        return $data['count(*)'];
    }
    /*查询指定ID号的留言*/
    public function getById($id){
        $data=$this->db->fetchRow("select * from comment where id={$id}");
        return $data;
    }
    /*添加留言*/
    public function insert(){
        //输入过滤
        $this->filter(array('poster','mail','comment'),'htmlspecialchars');
        $this->filter(array('poster','mail','comment'),'nl2br');
        //接收输入数据
        $data['poster'] = $_POST['poster'];
        $data['mail'] = $_POST['mail'];
        $data['comment'] = $_POST['comment'];
        //为其他字段赋值
        $data['reply'] = '';
        $data['date'] = date('Y-m-d H:i:s');
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        //拼接SQL语句
        $sql="insert into comment set ";
        foreach ($data as $k => $v){
            $sql.="$k='$v',";
        }
        $sql=   rtrim($sql,',');//删除最右边的逗号
        //执行SQL并返回
        return $this->db->query($sql);
    }
}