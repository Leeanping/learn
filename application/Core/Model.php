<?php
namespace Core;
/**
 * Model 基类
 * @author Snake.L
 */
class Model
{

    /**
     * 数据库表名
     * @var string
     */
    protected $_tableName;
    /**
     * model所对应的数据表名的前缀
     *
     * @var string
     */
    protected $_prefix = "##__";
    /**
     * SQL语句容器，用于存放SQL语句，为SQL语句组装函数提供SQL语句片段的存放空间。
     *
     * @var array
     */
    protected $_parts;
    /**
     * 数据库字段名
     * @var type array
     */
    protected $_fields;
    /**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
    /**
     * select使用
     * @var type string
     */
    protected $_option;
    /**
     * 全局查询条件
     * @var type string
     */
    protected $_where = '';
    /**
     * 全局排序
     * @var type string
     */
    protected $_order = '';
    /**
     * 全局limit
     * @var type string
     */
    protected $_limit = '';
    /**
     * 全局查询语句
     * @var type string
     */
    protected $_sql = '';
    /**
     * 关联信息
     * @var type string
     */
    protected $_relative = '';
    /**
     * 获取可操作数据
     * @var type string
     */
    protected $_getdata = '';
    /**
     * 全局Cache数组
     * @var array
     */
    protected static $_data;

    public function __construct(){
        $this->_tableName = $this->_prefix . $this->_tableName;
    }

    /**
     * 获取数据表名称
     * @return string 数据表名称
     */
    public function getTableName ($tablename){
        $this->_tableName = $this->_prefix . $tablename;
        return $this;
    }

    /*
     * $where 字段
     * $value 值
     * $suffix = 或者 > 或者 < ....
     * $linkfix and 或者 or
     * 多个使用 where()->where()->where().....
     * 不支持传入数组
     */
    public function where($where, $value = '', $suffix = '=', $linkfix = 'AND'){
        if($value != ''){
            if(!$this->_where){
                if($suffix == 'find_in_set'){
                    $this->_where = "FIND_IN_SET('" . \Core\Db::sqlescape($value) . "', " . $where . ")";
                } elseif($suffix == 'like'){
                    $this->_where = $where . " LIKE '%" . \Core\Db::sqlescape($value) . "%'";
                } elseif($suffix == 'in'){
                    $this->_where = $where . " IN (" . \Core\Db::sqlescape($value) . ")";
                } else{
                    $this->_where = $where . $suffix . "'" . \Core\Db::sqlescape($value) . "'";
                }
            }else{
                if($suffix == 'find_in_set'){
                    $this->_where .= " " . $linkfix . " FIND_IN_SET('" . \Core\Db::sqlescape($value) . "', " . $where . ")";
                } elseif($suffix == 'like'){
                    $this->_where .= " " . $linkfix . " " . $where . " LIKE '%" . \Core\Db::sqlescape($value) . "%'";
                } elseif($suffix == 'in'){
                    $this->_where .= " " . $linkfix . " " . $where . " IN (" . \Core\Db::sqlescape($value) . ")";
                } else{
                    $this->_where .= " " . $linkfix . " " . $where . $suffix . "'" . \Core\Db::sqlescape($value) . "'";
                }
            }
        }else{
            if(!$this->_where){
                $this->_where = $where;
            }else{
                $this->_where .= ' AND ' . $where;
            }
        }
        return $this;
    }

    /*
     * $order 排序
     * $value 值 field asc,field desc
     */
    public function order($value){
        $this->_order = $value;
        return $this;
    }

    /*
     * $limit 数量
     * $startnum 值 
     * $perpage 值 
     */
    public function limit($startnum, $perpage){
        $this->_limit = $startnum . "," . $perpage;
        return $this;
    }

    /*
     * $field 字段
     */
    public function field($field){
        $this->_fields = $field;
        return $this;
    }

    public function getdata($data = array()){
        if(!empty($this->_getdata)){
            $this->_getdata = array();
        }
        $this->_getdata = $data;

        return $this;
    }

    /*
     * 获取列表
     */
    public function select(){
        if(!$this->_fields){
            $this->_fields = '*';
        }
        if(is_array($this->_fields)){
            $this->_fields = implode(',', $this->_fields);
        }

        $sql = 'SELECT ' . $this->_fields . ' FROM ' . $this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        if($this->_order){
            $sql .= ' ORDER BY ' . $this->_order;
        }
        if($this->_limit){
            $limits = explode(',', $this->_limit);
        }
        $this->_where = '';

        return \Core\Db::fetchAll($sql, $limits[1], $limits[0]);
    }

    /**
     * 添加
     * @param array $add    插入的数据关联数组
     * @param array $safe   safe数组，不在这个数组的key将忽略，安全用
     * @param bool $replace 是否使用replace
     * @return insertid|true|false
     */
    public function add ($add = array(), $safe=array (), $replace=false){
        if($replace){
            $rt = \Core\Db::replace ($this->_tableName , $add , $safe);
        }else{
            $rt = \Core\Db::insert ($this->_tableName , $add , $safe);
        }
        if (true === $rt && $add[$this->_idkey]) {
            $rt = $add[$this->_idkey];
        }

        return $rt;
    }
    
    /**
     * 修改
     * @param array $update
     * @return type
     */
    public function update ($update = array()){
        if(!empty($this->_where)){
            $where = $this->_where;
        }else{
            if(!$update[$this->_idkey]){
                return false;
            }
            $where = $this->_idkey . '=' . $update[$this->_idkey];
        }

        if(empty($where) || empty($update)){
            return false;
        }
        
        $rt = \Core\Db::update ($this->_tableName , $where, $update);
        $this->_where = '';
        return $rt;
    }

    /**
     * 通用的Update操作接口
     *
     * @param string $where where字句条件
     * @param array $update 更新的字段列表
     * @param array $unset 用于延长和减少
     * @return bool
     * @author Snake.L
     */
    public function updateall ( $where = '' , $update = array(), $unset = array()){
        if(!empty($this->_where)){
            $where = $this->_where;
        }
        if(empty($where) || empty($update)){
            return false;
        }
        $rt = \Core\Db::update ($this->_tableName , $where, $update, array(), $unset);
        $this->_where = '';
        return $rt;
    }

    /**
     * 获取某个字段值
     * 支持使用数据库字段和方法
     * @access public
     * @param string|array $field 字段名
     * @param mixed        $value 字段值
     * @return integer
     */
    public function getField($field){
        if(empty($this->_where)) return false;
        $sql = 'SELECT ' . $field . ' FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result[$field];
    }

    public function value($field){
        if(empty($this->_where)) return false;
        $sql = 'SELECT ' . $field . ' FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result[$field];
    }

    /**
     * 设置记录的某个字段值
     * 支持使用数据库字段和方法
     * @access public
     * @param string|array $field 字段名
     * @param mixed        $value 字段值
     * @return integer
     */
    public function setField($field, $value = '', $unset = array()){
        if (is_array($field)) {
            $data = $field;
        } else {
            $data[$field] = $value;
        }
        if(empty($this->_where)) return false;

        $rt = $this->updateall($this->_where, $data, $unset);
        $this->_where = '';
        return $rt;
    }

    /**
     * 字段值(延迟)增长
     * @access public
     * @param string  $field    字段名
     * @param integer $value     增长值
     * @return integer|true
     * @throws Exception
     */
    public function setInc($field, $value = 0){
        return $this->setField($field, $field . '+' . $value, (array) $field);
    }

    /**
     * 字段值（延迟）减少
     * @access public
     * @param string  $field    字段名
     * @param integer $value     减少值
     * @return integer|true
     * @throws Exception
     */
    public function setReduce($field, $value = 0){
        return $this->setField($field, $field . '-' . $value, (array) $field);
    }

    /**
     * 删除
     * @param int|array $ids 待删除的IDS
     * @return bool true|false
     */
    public function remove ($ids = array()){
        if(!empty($this->_where)){
            $_where = $this->_where;
        }else{
            if (!is_array ($ids)) {
                $_where = "`$this->_idkey`='$ids'";
                @self::$_data[$this->_tableName][$id] = null;
            } else {
                $_where = "`$this->_idkey` in ('" . implode ("','" , (array) $ids) . "')";
                foreach ((array) $ids as $v){
                    @self::$_data[$this->_tableName][$v] = null;
                }
            }
        }
        if(empty($_where)){
            return false;
        }

        return $this->removeall ($_where);
    }

    /**
     * 快捷删除接口
     *
     * @param string $where where字句条件
     * @return bool
     * @author Snake.L
     */
    public function delete (){
        if(!empty($this->_where)){
            $where = $this->_where;
        }
        if(empty($where)){
            return false;
        }
        \Core\Db::execute ("Delete From `{$this->_tableName}` where {$where}" , true);
        $this->_where = '';
        return true;
    }
    
    /**
     * 通用的Delete操作接口
     * 用于兼容之前版本
     * @param string $where where字句条件
     * @return bool
     * @author Snake.L
     */
    public function removeall ( $where = '' ){
        if(!empty($this->_where)){
            $where = $this->_where;
        }
        if(empty($where)){
            return false;
        }
        \Core\Db::execute ("Delete From `{$this->_tableName}` where {$where}" , true);
        $this->_where = '';
        return true;
    }

    /**
     * 查找一个元素
     * @param number $id
     */
    public function find (){
        if(!$this->_fields){
            $this->_fields = '*';
        }
        if(is_array($this->_fields)){
            $this->_fields = implode(',', $this->_fields);
        }
        if(!$this->_where){
            return false;
        }
        $result = \Core\Db::fetchOne ("Select {$this->_fields} From {$this->_tableName} where {$this->_where}");
        $this->_where = '';
        return $result;
    }

    /**
     * 获得数量
     *
     * @param array $whereArr
     * @return int
     */
    public function getCount ($field = '*'){
        $sql = 'SELECT COUNT(' . $field . ') AS row_count FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result['row_count'];
    }

    public function count ($field = '*'){
        $sql = 'SELECT COUNT(' . $field . ') AS row_count FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result['row_count'];
    }

    public function sum ($field = '*'){
        $sql = 'SELECT SUM(' . $field . ') AS row_sum FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result['row_sum'];
    }

    public function min ($field = '*'){
        $sql = 'SELECT MIN(' . $field . ') AS row_min FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result['row_min'];
    }

    public function max ($field = '*'){
        $sql = 'SELECT MAX(' . $field . ') AS row_max FROM '.$this->_tableName;
        if($this->_where){
            $sql .= ' WHERE ' . $this->_where;
        }
        $result = \Core\Db::fetchOne($sql);
        $this->_where = '';
        return $result['row_max'];
    }

    /**
     * 快捷的获得一条记录
     *
     * @param string $sql sql语句，需要做安全转义
     * @return array|null
     */
    public function fetchOne ($sql){
        return \Core\Db::fetchOne($sql);
    }

    /**
     * 快捷的获得一组记录
     *
     * @param string $sql sql语句，需要做安全转义
     * @return array|null
     */
    public function fetchAll ($sql){
        return \Core\Db::fetchAll($sql);
    }

    /**
     * 获取一条记录
     *
     * @param array $whereArr=array(array('字段', '值', '操作符'),...)
     * @return array
     */
    public function queryOne ($fieldArr, $whereArr, $orderByArr = []){
        $sql = 'SELECT '.$this->formatFields($fieldArr).' FROM '.$this->_tableName . $this->formatWhere($whereArr) . $this->formatOrderBy($orderByArr);
        return \Core\Db::fetchOne($sql);
    }
    
    /**
     * 直接执行一个SQL
     * 在sql语句中用 ##__ 代表表前缀，接口会自动替换为正确的前缀
     *
     * @param string $sql 需要转移
     * @param bool $master 是否读取主库
     * @return resource
     */
    public function query ($sql, $master=false){
        return \Core\Db::query ($sql, $master);
    }

    /**
     * 获得列表
     *
     * @param array $whereArr
     * @param array $orderByArr
     * @param array $limitArr
     * @return array
     */
    public function queryAll ($whereArr=array (), $orderByArr=array (), $limitArr=array (), $fileds=array()){
        $field = isset($fileds) ? implode(',', $fileds) : '*';
        $row_count = 0;
        $offset = 0;
        $sql = 'SELECT '.$this->formatFields($fieldArr).' FROM '.$this->_tableName
                    .$this->formatWhere($whereArr)
                    .$this->formatOrderBy($orderByArr);
        !empty($limitArr) && 2==count($limitArr) && list($row_count, $offset) = (array)$limitArr;
        //echo $sql;
        return \Core\Db::fetchAll($sql, $row_count, $offset);
    }
    
    /*
     * 构建select
     * return string
     */
    public function htmlOptions(array $_options = array()){
        $_optionArr = array();
        foreach($_options AS $_option){
            $_optionArr[$_option[$this->_idkey]] = addslashes($_option[$this->_option]);
        }
        return $_optionArr;
    }

    /**
     * 格式化字段
     *
     * @param array $fieldArr
     * @return string
     */
    public function formatFields($fieldArr){
        return !empty($fieldArr) ? implode(', ', (array)$fieldArr) : '*';
    }
    
    /**
     * 格式化查询条件
     *
     * @param array $whereArr=array(array('字段', '值', '操作符'),...)
     * @return string
     */
    public function formatWhere($whereArr)
    {
        $where = '';
        if(!empty($whereArr))
        {
            foreach ((array)$whereArr as $value)
            {
                list($prefix, $suffix) = self::formatPrefix($value[2]);
                if(!empty($value[2]) && strtoupper($value[2]) == 'FIND_IN_SET')
                {
                    $where .= (empty($where)?' WHERE ':' AND ') . $value[2] . $prefix . "'" . \Core\Db::sqlescape($value[1]) . "'," . $value[0] . $suffix;
                }
                else if(!empty($value[2]) && strtoupper($value[2]) == 'IN')
                {
                    $where .= (empty($where)?' WHERE ':' AND ') . $value[0] . " " . $value[2] . " " . $prefix . \Core\Db::sqlescape($value[1]) . $suffix;
                }
                else
                {
                    $where .= (empty($where)?' WHERE ':' AND ').$value[0].' '.(empty($value[2])?'=':$value[2])." '".$prefix.\Core\Db::sqlescape($value[1]).$suffix."' ";
                }
            }
        }
        return $where;
    }
    
    /**
     * 格式化查询条件前缀
     *
     * @param string $value
     * @return string
     */
    private function formatPrefix($value)
    {
        if(!empty($value))
        {
            $value = strtoupper($value);
            if($value == 'IN' || $value == 'FIND_IN_SET')
            {
                return array('(', ')');
            }
            else if($value == 'LIKE')
            {
                return array('%', '%');
            }
            else
            {
                return array('', '');
            }
        }
    }
    
    /**
     * 格式化排序字段
     *
     * @param array $orderByArr
     * @return string
     */
    public function formatOrderBy($orderByArr)
    {
        return !empty($orderByArr) ? ' ORDER BY '.implode(', ', (array)$orderByArr) : '';
    }
}