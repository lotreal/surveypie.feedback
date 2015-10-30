<?php return array (
  'expired' => 1291010030,
  'data' => 
  array (
    'runtime_session_provider' => NULL,
    'runtime_session_start' => true,
    'runtime_cache_dir' => '/home/lot/workspace/surveypie.feedback/surveypie/tmp/runtime_cache',
    'runtime_cache_backend' => 'QCache_PHPDataFile',
    'runtime_response_header' => true,
    'error_display' => true,
    'error_display_friendly' => true,
    'error_display_source' => true,
    'error_language' => 'zh_cn',
    'assert_enabled' => true,
    'assert_warning' => true,
    'assert_exception' => false,
    'dispatcher_url_mode' => 'rewrite',
    'routes_cache_lifetime' => 1,
    'acl_default' => 
    array (
      'allow' => 'ACL_EVERYONE',
    ),
    'acl_global' => 
    array (
      'admin' => 
      array (
        'allow' => 'admin',
      ),
    ),
    'db_log_enabled' => false,
    'db_default_dsn' => NULL,
    'db_meta_lifetime' => 10,
    'db_meta_cached' => true,
    'db_meta_cache_backend' => 'QCache_PHPDataFile',
    'i18n_response_charset' => 'utf-8',
    'i18n_multi_languages' => false,
    'l10n_default_timezone' => 'Asia/Shanghai',
    'log_enabled' => false,
    'log_priorities' => 'EMERG, ALERT, CRIT, ERR, WARN, NOTICE, INFO, DEBUG',
    'log_cache_chunk_size' => 64,
    'log_writer_dir' => '/home/lot/workspace/surveypie.feedback/surveypie/log',
    'log_writer_filename' => 'devel.log',
    'session_cookie_name' => 'feedback_sess',
    'acl_session_key' => 'surveypie_passport',
    'db_dsn_pool' => 
    array (
      'devel' => 
      array (
        'driver' => 'pdo_pgsql',
        'host' => '192.168.1.200',
        'login' => 'dev',
        'password' => 'abc',
        'database' => 'diaochapai.feedback',
        'charset' => 'utf8',
      ),
      'test' => 
      array (
        '_use' => 'devel',
      ),
      'deploy' => 
      array (
        '_use' => 'devel',
      ),
      'default' => 
      array (
        'driver' => 'pdo_pgsql',
        'host' => '192.168.1.200',
        'login' => 'dev',
        'password' => 'abc',
        'database' => 'diaochapai.feedback',
        'charset' => 'utf8',
      ),
    ),
    'appini' => 
    array (
      'allow_anonymous' => false,
      'date_fmt' => 'H:i,M-j-Y',
      'topic_tags' => 
      array (
        0 => 'Edit survey',
        1 => 'Theme',
        2 => 'Deploy',
        3 => 'Report',
        4 => 'Comments',
      ),
      'passport' => 
      array (
        'service' => 
        array (
          'surveypie' => 
          array (
            'url' => 'http://passport.surveypie.net',
            'user' => 'dev',
            'pass' => 'abc',
          ),
        ),
        'login_url' => 'http://test.surveypie.net/passport/login',
        'logout_url' => 'http://test.surveypie.net/passport/logout',
        'reg_url' => 'http://test.surveypie.net/passport/register',
      ),
    ),
    'routes' => 
    array (
      'topic' => 
      array (
        'pattern' => '/topic',
        'defaults' => 
        array (
          'controller' => 'default',
          'action' => 'topic',
        ),
      ),
      '_default_' => 
      array (
        'pattern' => '/:controller/:action/*',
        'defaults' => 
        array (
          'controller' => 'default',
          'action' => 'index',
        ),
      ),
    ),
  ),
);