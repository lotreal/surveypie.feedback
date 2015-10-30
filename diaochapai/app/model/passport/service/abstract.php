<?php
abstract class Passport_Service_Abstract {
    protected $_config = null;

    public function __construct() {
        $classname = explode('_', get_class($this));
        $service_name = strtolower(array_pop($classname));
        $config = Q::ini('appini/passport/service/'.$service_name);
        if (!$config) throw new Passport_Service_Exception(sprintf('Passport service[%s] not found!', $service_name));
        $this->_config = $config;
    }
}

class Passport_Service_Exception extends QException {}
