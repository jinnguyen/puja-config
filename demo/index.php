<?php
include __DIR__ . '/../vendor/autoload.php';
use Puja\Configure\Configure;
new Configure(array(__DIR__ . '/config/', __DIR__ . '/app/'));

$databaseCfg = Configure::getInstance('database');
echo $databaseCfg->get('host'); // remote_host

$sessionCfg = Configure::getInstance('session');
echo $sessionCfg->get('savePath'); // /home/tmp

$allCfg = Configure::getInstance();
echo $allCfg->get('app_name'); // Puja/Config