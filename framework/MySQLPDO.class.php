<?php
header("Content-Type:text/html;charset=utf-8");
class MySQLPDO{
    private $dbConfig = array(
        'db' => 'mysql',//数据库
        'host' => 'localhost',//服务器
        'port' => '3306',//端口
        'pass' => '',//密码
        'charset' => 'utf8',//字符集
        'dbname' => 'msg',//默认数据库
    );
    //PDO实例
    private $db;
    //单列模式，本类对象使用
    private static $instance;
    /**
     * 私有的构造方法
     * @ param type $params
     */
    private function __construct($params){//构造方法 类实例化对象时自动调用
        //初始化属性
        $this->dbConfig = array_merge($this->dbConfig,$params);
        //连接服务器
        $this->connect();
    }
    /**
     * 获得单例对象
     * @ param %params array 数据库连接信息
     * @ return object 单例对象
     */
    public static function getInstance($params = array()) {
        if(! self::$instance instanceof self) {
            self::$instance = new self($params);
        }
        return self::$instance;
    }
    /**
     * 私有克隆
     */
    private function __clone() {
    }
    /**
     * 连接目标服务器
     */
    private function connect() {
        try {
            $dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};"
                ."port= {$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};"
                    ."charset={$this->dbConfig['charset']}";
            //实例化PDO
            $this->db = new PDO($dsn,$this->dbConfig['user'],$this->dbConfig['pass']);
            //设定字符串
            $this->db->query("set names {$this->dbConfig['charset']}");
} catch (PDOException $e) {
            //错误提示
            die("数据库连接失败：{$e->getMessage()}");
        }
    }
    /**
     * 执行SQL语句
     * @ param string $sql SQL语句
     * @ return object PDOStatement
     */
    public function query($sql) {
        $rst = $this->db->query($sql);
        if($rst === false) {
            $error = $this->db->errorInfo();
            //print_r($error);
            die("执行SQL语句失败：ERROR{$error[1]}($error[0]:{$error[2]}))");
        }
        return $rst;
    }
    /**
     * 取得一行记录
     * @ param $sql $string 执行SQL语句
     * @ return array 关联数组结果
     */
    public function fetchRow($sql) {
        return $this->query($sql)->fetch(PDO::FETCH_ASSOC);//关联数组
    }
    /**
     * 取得所有结果
     * @ param string $sql 执行SQL语句
     * @ return array 关联数组结果
     */
    public function fetchAll($sql) {
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}