<?php
/**
 * admin 平台控制器
 */
class platformController{
    /**
     * 构造方法
     */
    public function __construct(){
        /**
         * 构造方法
         */
        $this->checkLogin();
    }
    private function checkLogin(){
        //login方法不需要验证
        if(CONTROLLER=='admin' && ACTION=='login'){
            return  ;
        }
        //通过SESSION 判断是否登录
        session_start();
        if(! isset($_SESSION['admin'])){
            //未登录跳转到login方法
            $this->jump($_SERVER[DOUCUMENT_ROOT].'/JSEI_MSG/framework/index.php? p=admin&c=admin&a=login');
        }
    }
    /**
     * 跳转方法
     */
    protected function jump($url){
        header("Location:$url");
        die();
    }
}