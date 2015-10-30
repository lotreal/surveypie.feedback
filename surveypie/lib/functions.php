<?php
/**
 * 对qeephp url()重新包装
 *
 * @param string $udi
 * @param array $params
 * @access public
 * @return string
 */
function uri($udi, $params = array()) {
    $url = url($udi);
    if ($params) $url .= '?'. http_build_query($params);
    return $url;
}

/**
 * 获得数据句柄
 *
 * @param string $dsn_name
 * @access public
 * @return QDB_Adapter_Abstract
 */
function dbconnect($dsn_name = null) {
    return QDB::getConn($dsn_name);
}

/**
 * 用指定的key把数组重新聚合起来
 *
 * @param array $array
 * @param string $key
 * @access public
 * @return array
 */
function array_groupby($array, $key) {
    $result = array();
    while (list($idx, $item) = each($array)) {
        $result[$item[$key]][$idx] = $item;
    }

    return $result;
}

/**
 * 生成uuid
 * 
 * @access public
 * @return string
 */
function uuid() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

/**
 * 检查是否符合uuid格式
 * 
 * @param mixed $uuid 
 * @access public
 * @return integer  0/1
 */
function is_uuid($uuid) {
    return preg_match('/^[0-9a-f]{8}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{4}\-[0-9a-f]{12}$/', $uuid);
}

function decode_pg_array($string) {
    if (!is_string($string)) return $string;

    $result = explode(',', trim($string, '{}'));
    while (list($k, $v) = each($result)) {
        $result[$k] = trim($v, '"');
    }
    return $result;
}

function encode_pg_array($array) {
    if (!is_array($array)) return $array;

    return sprintf('{"%s"}', implode('","', $array));
}

function dumps() {
    $args = func_get_args();
    return call_user_func(array('QDebug_FirePHP', 'dump'), $args);
}

function get_login_url() {
    $current_url = sprintf('http://%s%s', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
    return sprintf('%s?ref=%s', Q::ini('appini/passport/login_url'), urlencode($current_url));
}

function get_logout_url() {
    $current_url = sprintf('http://%s%s', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
    return sprintf('%s?ref=%s', Q::ini('appini/passport/logout_url'), urlencode($current_url));
}

function get_reg_url() {
    $current_url = sprintf('http://%s%s', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
    return sprintf('%s?ref=%s', Q::ini('appini/passport/reg_url'), urlencode($current_url));
}
