<?php
namespace Core\Db\Driver;


/**

 * 使用mysql_函数的Mysql Driver

 * 建议封装一层对此类的调用，不建议直接调用该接口

 *

 * @author Snake.L

 */
use \PDO;
class Mysql

{



	/**

	 * self

	 * @var Core_Db_Driver_Mysql

	 */

	private static $_instance;

	private static $_cfg;

	/** @var PDO[] 数据库连接ID 支持多个连接 */
    protected $links = [];

    /** @var PDO 当前连接ID */
    protected $linkID;

    // 查询结果类型
    protected $fetchType = PDO::FETCH_ASSOC;

    /** @var PDOStatement PDO操作实例 */
    protected $PDOStatement;

	public static $query_num;



	/**

	 * 获取单例对象

	 * @return Core_Db_Driver_Mysql

	 * @author Snake.L

	 */

	public static function getInstance($cfg)
	{
		if (self::$_instance){
			return self::$_instance;
		}
		self::$_cfg = $cfg;
		self::$_instance = new self();
		return self::$_instance;
	}


	/**
     * 连接数据库方法
     * @param integer       $linkNum 连接序号
     * @return PDO
     * @throws Exception
     */
	private function connect($linkNum = 0)
	{
		$dbname = self::$_cfg['dbName'];
		$config = array(
			'dbhost' => self::$_cfg['dbHost'],
			'dbuser' => self::$_cfg['dbUser'],
			'dbpwd' => self::$_cfg['dbPwd'],
			'dbpconnect' => self::$_cfg['dbPconnect']
		);

		$dsn = 'mysql:host=' . $config['dbhost'] . ';dbname=' . $dbname;
        try{
        	$this->links[$linkNum] = new PDO($dsn, $config['dbuser'], $config['dbpwd']);
        	$this->links[$linkNum]->exec('SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary');
        	return $this->links[$linkNum];
        } catch(Exception $e){
        	echo 'connect db error！';exit;
        }
	}

	/**
     * 初始化数据库连接
     * @access protected
     * @param boolean $master 是否主服务器
     * @return void
     */
    protected function initConnect($master = true)
    {
        if (!$this->linkID) {
            // 默认单数据库
            $this->linkID = $this->connect();
        }
    }

    /**
     * 防止克隆
     * 
     */
    private function __clone() {}

    /**
     * 释放查询结果
     * @access public
     */
    public function free()
    {
        $this->PDOStatement = null;
    }

    /**
     * 执行查询(select) 返回数据集
     * @access public
     * @param string        $sql sql指令
     * @param boolean       $master 是否在主服务器读操作
     * @return mixed
     * @throws PDOException
     */
    public function query($sql, $master = false)
    {
        $this->initConnect($master);
        if (!$this->linkID) {
            return false;
        }

        $sql = $this->changequery($sql);

        //释放前次的查询结果
        if (!empty($this->PDOStatement)) {
            $this->free();
        }

        ++self::$query_num;
        try {
            // 预处理
            $this->PDOStatement = $this->linkID->prepare($sql);
            // 执行查询
            $result = $this->PDOStatement->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 执行语句(针对 INSERT, UPDATE 以及DELETE)
     * @access public
     * @param string        $sql sql指令
     * @return int
     * @throws PDOException
     */
    public function execute($sql, $master = false)
    {
    	$this->initConnect($master);
        if (!$this->linkID) {
            return false;
        }

        $sql = $this->changequery($sql);

        //释放前次的查询结果
        if (!empty($this->PDOStatement)) {
            $this->free();
        }
        try {
            // 预处理
            // $this->PDOStatement->rowCount() 影响行数
            $this->PDOStatement = $this->linkID->prepare($sql);
            // 执行查询
            $result = $this->PDOStatement->execute();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function fetchAll($sql, $num=null, $start=0, $master=false)
    {
    	if($sql != null)  
        {  
        	if ($num)
			{
				$sql = $sql . ' LIMIT ' . intval($start) . ' , ' . $num;
			}
            $this->query($sql, $master);  
        }  

        //返回数据集   
        $result = $this->PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetchOne($sql, $master=false)
    {
    	if($sql != null)  
        {  
        	$sql = $sql . ' LIMIT 1';
            $this->query($sql, $master);  
        }  

        //返回数据集   
        $result = $this->PDOStatement->fetch(PDO::FETCH_ASSOC); 
        return $result;
    }

	/**
	 * 对查询进行表前缀替换
	 * 将 ##__替换为配置中的前缀
	 *
	 * @param string $sql 查询的sql
	 * @return string
	 * @author Snake.L
	 */
	public function changequery($sql)
	{
		return str_replace('##__', self::$_cfg['dbPrefix'], $sql);
	}

	/**
     * beginTransaction 事务开始
     */
    private function beginTransaction()
    {
        $this->linkID->beginTransaction();
    }
    
    /**
     * commit 事务提交
     */
    private function commit()
    {
        $this->linkID->commit();
    }
    
    /**
     * rollback 事务回滚
     */
    private function rollback()
    {
        $this->linkID->rollback();
    }

	/**
	 * 对查询的字符串进行安全转义
	 * @param string $str
	 * @return string
	 * @author Snake.L
	 */

	public function escape($str)
	{
		return addslashes($str);
	}

	public function insertId(){   
        return $this->linkID->lastInsertId();  
    }  

	/**
	 * 快捷的获得一个字段信息
	 *
	 * @param string $sql sql语句，需要做安全转义
	 * @return mix|null
	 * @author Snake.L
	 */
	public function getOne($sql, $master=false)
	{
		$result = $this->fetchOne($sql, $master);
		if ($result)
		{
			return $result[0];
		}
		else
		{
			return null;
		}
	}

	/**
	 * update 快捷操作
	 *
	 * @param string $table 操作的表名
	 * @param string $where where子句
	 * @param array $array 操作的数据关联数组 无需转移，使用原始数据
	 * @param array $safe 安全限制数组
	 * @param array $unset 不做单引号环绕的数组
	 * @return bool
	 * @author Snake.L
	 */

	public function update($table, $where, $array, $safe=array(), $unset=array())
	{
		$set = $this->createset($array, $safe, $unset);
		$sql = "Update $table Set $set Where $where";
		return $this->execute($sql);
	}

	/**
	 * replace 快捷操作
	 *
	 * @param string $table 操作的表名
	 * @param array $array 操作的数据关联数组 无需转移，使用原始数据
	 * @param array $safe 安全限制数组
	 * @return bool
	 * @author Snake.L
	 */

	public function replace($table, $array, $safe=array())
	{
		$set = $this->createset($array, $safe);
		$sql = "Replace Into $table Set $set";
		if ($resource = $this->execute($sql))
		{
			return ($id = $this->insertId()) ? $id : true;
		}
		return false;
	}


	/**
	 * insert 快捷操作
	 * @param string $table 操作的表名
	 * @param array $array 操作的数据关联数组 无需转移，使用原始数据
	 * @param array $safe 安全限制数组
	 * @return number
	 * @author Snake.L
	 */

	public function insert($table, $array, $safe=array())
	{
		$set = $this->createset($array, $safe);
		$sql = "Insert Into $table Set $set";
		if ($resource = $this->execute($sql))
		{
			return ($id = $this->insertId()) ? $id : true;
		}
		return false;
	}

	/**
	 * 创建安全的set子句
	 * @param array $array 需要创建set子句的关联数组
	 * @param array $safe 安全限制数组，字段列表
	 * @param array $unset 不用单引号环绕的字段列表
	 * @return string
	 * @author Snake.L
	 */

	public function createset($array, $safe=array(), $unset=array())
	{
		$_res = array();
		foreach ((array) $array as $_key => $_val)
		{
			if ($safe && !in_array($_key, $safe))
			{
				continue;
			}
			else
			{
				if ($unset && in_array($_key, $unset))
				{
					$_res[$_key] = "`$_key`=$_val";
				}
				else
				{
					$_val = $this->escape($_val);
					$_res[$_key] = "`$_key`='$_val'";
				}
			}
		}

		return implode(',', $_res);
	}


	/**

	 * 数据库报错抛出的异常

	 *

	 * @param string $sql 查询的sql语句

	 * @param resource $link 数据库链接资源

	 * @author Snake.L

	 */

	protected function halt($sql, $link)

	{

		\Core\Util\Log::setFile('MySql','MySQL Query Error : ' . mysql_error($link) . '<br /> SQL:' . $sql, mysql_errno($link));

		throw new \Core\Exception\DbException('MySQL Query Error : ' . mysql_error($link) . '<br /> SQL:' . $sql, mysql_errno($link));

	}



}