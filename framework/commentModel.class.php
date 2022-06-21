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
}