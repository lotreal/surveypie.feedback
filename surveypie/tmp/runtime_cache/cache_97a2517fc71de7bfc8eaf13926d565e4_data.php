<?php return array (
  'expired' => 1291010021,
  'data' => 
  array (
    'topic' => 
    array (
      'type' => 'simple',
      'name' => 'topic',
      'pattern' => 'topic',
      'pattern_parts' => 
      array (
        0 => 'static',
      ),
      'config' => 
      array (
      ),
      'vars' => 
      array (
      ),
      'varnames' => 
      array (
        'controller' => 'default',
        'action' => 'topic',
        'module' => 'default',
        'namespace' => 'default',
      ),
      'defaults' => 
      array (
        'controller' => true,
        'action' => true,
        'module' => true,
        'namespace' => true,
      ),
      'static_parts' => 
      array (
        0 => 'topic',
      ),
      'static_optional' => 
      array (
        0 => false,
      ),
    ),
    '_default_' => 
    array (
      'type' => 'simple',
      'name' => '_default_',
      'pattern' => ':controller/:action/*',
      'pattern_parts' => 
      array (
        0 => 'var',
        1 => 'var',
        2 => 'wildcard',
      ),
      'config' => 
      array (
        'controller' => '([a-z][a-z0-9]*)*',
        'action' => '([a-z][a-z0-9]*)*',
      ),
      'vars' => 
      array (
        0 => 'controller',
        1 => 'action',
      ),
      'varnames' => 
      array (
        'controller' => 'default',
        'action' => 'index',
        'module' => 'default',
        'namespace' => 'default',
      ),
      'defaults' => 
      array (
        'controller' => true,
        'action' => true,
        'module' => true,
        'namespace' => true,
      ),
      'static_parts' => 
      array (
        2 => '*',
      ),
      'static_optional' => 
      array (
        2 => false,
      ),
    ),
  ),
);