<?php
namespace Model;

use Core\Model;
/*
 * 模块模型
 */
class Module extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = '';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array();
    
    //用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
    /**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';

    public function mtable($table = 'article')
    {
        $this->_tableName = '##__base_module_' . $table;
        return $this;
    }

    public function addColumn($field, $kind, $length, $isunsigned, $comment)
    {
        $comment = $kind == 'picture' ? '自定义图片:' . $comment : $comment;
        $kind = $kind == 'picture' ? 'varchar' : $kind;
        
        $sql = "ALTER TABLE  `" . $this->_tableName . "` ADD  `" . $field . "` " . $kind;
        if($length > 0)
        {
            $sql .= "( " . $length . " )";
        }
        if($isunsigned)
        {
            $sql .= " UNSIGNED";
        }

        $sql .= " NULL";

        if($comment)
        {
            $sql .= " COMMENT '" . $comment . "'";
        }

        return \Core\Db::execute($sql);
    }

    public function dropColumn($field)
    {
        $sql = "ALTER TABLE  `" . $this->_tableName . "` DROP  `" . $field . "`";

        return \Core\Db::execute($sql);
    }

    public function getColumnList()
    {
        $sql = "SHOW FULL COLUMNS FROM `" . $this->_tableName . "`";
        $fields = \Core\Db::fetchAll($sql);
        $columns = array();
        foreach($fields AS $idx => $field)
        {
            $field['Type'] = strtolower($field['Type']);
            if(preg_match('/^int/', $field['Type']))
            {
                $type = 'int';
            }
            elseif(preg_match('/^tinyint/', $field['Type']))
            {
                $type = 'tinyint';
            }
            elseif(preg_match('/^varchar/', $field['Type']))
            {
                $type = 'varchar';
                if(preg_match('/^自定义图片:/', $field['Comment'])){
                    $type = 'picture';
                }
            }
            elseif(preg_match('/^char/', $field['Type']))
            {
                $type = 'char';
            }
            elseif(preg_match('/^text/', $field['Type']))
            {
                $type = 'text';
            }
            else
            {
                $type = '';
            }
            $columns[$idx]['field'] = $field['Field'];
            $columns[$idx]['comment'] = str_replace('自定义图片:', '', $field['Comment']);

            if($type != '')
            {
                $columns[$idx]['type'] = $type;
            }
            
        }

        return $columns;
    }

    public function getExetendList($aid = 0)
    {
        $columns = $this->getColumnList();

        $lists = array();

        foreach($columns AS $idx => $column)
        {
            if($column['field'] != 'id' && $column['field'] != 'aid')
            {
                $lists[$idx]['field'] = $column['field'];
                $lists[$idx]['comment'] = $column['comment'];
                $lists[$idx]['type'] = $column['type'];
                if($aid != 0)
                {
                    $fieldvalue = $this->where("aid = '$aid'")->getField($column['field']);
                    $lists[$idx]['value'] = $fieldvalue;
                }
            }
        }

        return $lists;
    }

    public function addModule($data){
        $this->getTableName('base_module')->add($data);
        $sql = "CREATE TABLE `##__base_module_" . $data['mark'] . "` (`id` int(8) unsigned NOT NULL AUTO_INCREMENT,`aid` int(8) unsigned NOT NULL DEFAULT '0', PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8";

        return \Core\Db::execute($sql);
    }

    public function dropModule($mark){
        $sql = "DROP TABLE IF EXISTS `##__base_module_" . $mark . "`;";
        return \Core\Db::execute($sql);
    }
}
?>