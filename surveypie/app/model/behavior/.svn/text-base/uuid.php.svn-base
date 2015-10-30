<?php
class Model_Behavior_Uuid extends QDB_ActiveRecord_Behavior_Abstract
{

    /**
     * 设置
     *
     * @var array
     */
    protected $_settings = array (
    );

    /**
     * 构造函数
     *
     * @param QDB_ActiveRecord_Meta $meta
     * @param array $settings
     */
    public function __construct(QDB_ActiveRecord_Meta $meta, array $settings) {
        parent::__construct($meta, $settings);

        if ($meta->idname_count > 1)
        {
            throw new QDB_ActiveRecord_CompositePKIncompatibleException($this->_meta->class_name, __CLASS__);
        }
    }

    /**
     * 绑定行为插件
     */
    public function bind() {
        $this->_addEventHandler(self::BEFORE_CREATE, array($this, '_before_create'));
    }

    /**
     * 在数据库中创建 ActiveRecord 对象前调用
     *
     * @param QDB_ActiveRecord_Abstract $obj
     */
    public function _before_create(QDB_ActiveRecord_Abstract $obj) {
        $new_id = self::genUuid();
        $idname = reset($this->_meta->idname);
        $obj->changePropForce($idname, $new_id);
    }

    static public function genUuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
