<?php
/**
 * comment表的操作类，继承基础模型类
 */
class commentModel extends model{
    /*查询所有留言*/
    public function  getAll(){
        $data=$this->db->fetchAll("select * from comment");
        return $data;
    }
    /*查询指定ID号的留言*/
    public function getById($id){
        $data=$this->db->fetchRow("select * from comment where id={$id}");
        return $data;
    }
    /*添加留言*/
    public function insert(){
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