<?php
/**
 * 默认得到一个匿名用户
 * $passport = Passport::instance();
 *
 * 设置passport信息
 * $passport->change('9d09119e-015a-4fe2-a583-2ad297835fe9', array('email' => 'yangyi@surveypie.com', 'create_time' => '2010-03-10 03:11:00');  // 来调查派用户
 * $passport->change('432423434', array(), 'ali');   //来自ali平台
 * $passport->change('41rj0casfe', array(), 'xxoo'); // 来自xxoo平台
 *
 * 清除当前的认证信息，恢复到匿名用户
 * $passport->clear();
 */
class Passport {
    public static $instance = null;
    protected $_sess_key;
    protected $_profile = null;

    public function __construct($sn = null) {
        $this->_sess_key = Q::ini('acl_session_key');

        if (!isset($_SESSION[$this->_sess_key])) {
            $_SESSION[$this->_sess_key] = array();
        }

        if ($sn) $_SESSION[$this->_sess_key]['sn'] = $sn;
    }

    public function __get($key) {
        return array_key_exists($key, $_SESSION[$this->_sess_key]) ? $_SESSION[$this->_sess_key][$key] : false;
    }

    public function set($key, $val) {
        $_SESSION[$this->_sess_key][$key] = $val;
    }

    public function clear() {
        $passport_sn = $this->sn;

        $_SESSION[$this->_sess_key] = array();

        if ($passport_sn) self::log($passport_sn, 'logout');
    }

    public function change($token, array $more = array(), $from = null) {
        // 如果来自其它认证途径，就根据token和from在passport.map中查询对应的passport sn
        $passport_sn = $from ? self::_tokenToSn($token, $from) : $token;

        $db = dbconnect();
        $roles = $db->execute('select role from passport.roles where passport_sn = ? and (expire_time is null OR expire_time > now())', array($passport_sn))->fetchCol();
        $roles[] = 'user';

        $data = $more;
        $more['sn'] = $passport_sn;
        $more['roles'] = $roles;

        $_SESSION[$this->_sess_key] = $more;

        self::log($passport_sn, 'login');
    }

    public function getRoles() {
        return isset($_SESSION[$this->_sess_key]['roles']) ? $_SESSION[$this->_sess_key]['roles'] : array();
    }

    public function hasRole($role) {
        if (!isset($_SESSION[$this->_sess_key]['roles'])) return false;
        return in_array($role, $_SESSION[$this->_sess_key]['roles']);
    }

    public function addRole($role, $expire_time = null) {
        if ($this->hasRole($role)) return true;
        dbconnect()->insert('passport.roles', array(
            'passport_sn' => $this->sn,
            'role' => $role,
            'exipre_time' => $expire_time
        ));
        $_SESSION[$this->_sess_key]['roles'][] = $roles;
    }

    public function removeRole($role) {
        if (!$this->hasRole($role)) return true;
        if (dbconnect()->delete('passport.roles', array('passport = ? and role = ?', $this->sn, $role))) {
            foreach ($_SESSION[$this->_sess_key]['roles'] as $k => $r) {
                if ($r == $role) unset($_SESSION[$this->_sess_key]['roles'][$k]);
            }
        }
    }

    public function getProfile($key = null) {
        if ($this->_profile === null) {
            if ($passport_sn = $this->sn) {
                $profile = dbconnect()->execute('select * from passport.profile where passport_sn = ?', array($passport_sn))->fetchRow();
            }
            $this->_profile = empty($profile) ? array() : $profile;
        }

        if ($key === null) return $this->_profile;
        return array_key_exists($key, $this->_profile) ? $this->_profile[$key] : false;
    }

    public function setProfile(array $values) {
        if ($passport = $this->sn) {
            dbconnect()->update('passport.profile', $values, array('sn = ?', $passport_sn), array('passport_sn'));
            $this->_profile = null; // 设置profile为null，getProfile()时会重新查询
        }
        return $this;
    }

    public function getCreateTime($format = null) {
        if ( !$create_time = $this->create_time ) return false;
        return $format ? date($format, strtotime($create_time)) : false;
    }

    public function getLastLoginTime($format = null) {
        $passport_sn = $this->sn;
        if (!$passport_sn) return false;

        $login_time = dbconnect()->execute(
            "select create_time from passport.log where passport_sn = ? and method = 'login' order by create_time desc",
            array($passport_sn)
        )->fetchOne();

        if (!$login_time) return false;

        return $format ? date($format, strtotime($login_time)) : $login_time;
    }

    protected static function _tokenToSn($token, $from) {
        $db = dbconnect();
        $passport_sn = $db->execute('select passport_sn from passport.map where from = ? and token = ?', array($from, $token))->fetchOne();
        if ($passport_sn) return $passport_sn;

        // 如果没有passport sn，就建立一个新的，并保存此对应关系
        $passport_sn = uuid();
        $db->insert(array(
            'from' => $from,
            'token' => $token,
            'passport_sn' => $passport_sn
        ));
        return $passport_sn;
    }

    public static function instance() {
        if (self::$instance === null) self::$instance = new self();
        return self::$instance;
    }

    /**
     * 记录passport活动日志
     *
     * @param string $passport_sn
     * @param string $method
     * @static
     * @access public
     * @return boolean
     */
    public static function log($passport_sn, $method) {
        try {
            dbconnect()->insert('passport.log', array('passport_sn' => $passport_sn, 'method' => $method));
        } catch (QDB_Exception $ex) {
            return false;
        }
        return true;
    }
}
