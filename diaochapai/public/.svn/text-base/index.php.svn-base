<?php
global $g_boot_time;
$g_boot_time = microtime(true);

$app_config = require(dirname(__FILE__) . '/../config/boot.php');
require $app_config['QEEPHP_DIR'] . '/library/q.php';
require $app_config['APP_DIR'] . '/myapp.php';
require $app_config['ROOT_DIR'] . '/lib/functions.php';

$host = implode('.', array_slice(explode('.', $_SERVER['SERVER_NAME']), -2, 2));
session_set_cookie_params(0, '/', $host, false, true);   // 设置session cookie httponly，缓解跨站攻击

$ret = MyApp::instance($app_config)->dispatching();
if (is_string($ret)) echo $ret;

return $ret;
