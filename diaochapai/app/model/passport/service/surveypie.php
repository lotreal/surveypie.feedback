<?php
class Passport_Service_Surveypie extends Passport_Service_Abstract {
    protected $_req;

    public function __construct() {
        parent::__construct();

        $config = $this->_config;
        $options = array();
        if (!empty($config['user']) AND !empty($config['pass'])) {
            $options[CURLOPT_USERPWD] = sprintf('%s:%s', $config['user'], $config['pass']);
        }

        $this->_req = new Helper_Curl($options);
    }

    protected function _request($url, $method = 'get', $fields = array()) {
        if ($method == 'post') {
            $rep = $this->_req->post($url, $fields);
        } else {
            $rep = $this->_req->get($url, $fields);
        }

        $rep = json_decode($rep, true);
        if ($rep === null) return false;
        if (isset($rep['error'], $rep['errno'])) throw new Passport_Service_Exception($rep['error'], $rep['errno']);
        return $rep;
    }

    public function register($email, $passwd) {
        $url = $this->_config['url'] .'/passport';

        return $this->_request($url, 'post', array(
            'email' => $email,
            'passwd' => md5($passwd)
        ));
    }

    public function passwd($sn, $passwd) {
        $url = sprintf('%s/passport/%s', $this->_config['url'], $sn);
        return $this->_request($url, 'post', array('passwd' => md5($passwd)));
    }

    public function findBySn($sn) {
        $url = sprintf('%s/passport/%s', $this->_config['url'], $sn);
        return $this->_request($url);
    }

    public function findByEmail($email) {
        $url = sprintf('%s/passport/%s', $this->_config['url'], $email);
        return $this->_request($url);
    }
}
