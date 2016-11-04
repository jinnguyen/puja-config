# puja-config v1.0.0
Allow load multi configured files, access the configured value as an object

<strong>Install:</strong><br />
<pre>composer require jinnguyen/puja-config</pre>

<strong>Usage:</strong><br />
<pre>
require 'path/to/vendor/autoload.php';
</pre>

<strong>Example:</strong><br /><br />
<strong>Folder tree:</strong>
<pre>
root/
root/app/configure.php
root/app/configure_local.php
root/config/configure.php
root/config/configure_local.php
</pre>

<strong>File root/config/configure.php</strong><br />
<pre>
$configures['database'] = array(
    'host' => 'localhost',
);
$configures['app_name'] = 'Puja/Config';
</pre>

<strong>File root/config/configure_local.php</strong>
<pre>
$configures['database'] = array(
    'host' => 'remote_host',
);
</pre>

<strong>File root/app/configure.php</strong>
<pre>
$configures['session'] = array(
    'savePath' => '/tmp',
);
</pre>

<strong>File root/app/configure_local.php</strong>
<pre>
$configures['session'] = array(
    'savePath' => '/home/tmp',
);
</pre>

<strong>File root/demo.php:</strong>
<pre>
include 'path/to/vendor/autoload.php';
use Puja\Configure\Configure;
new Configure(array('config/', 'app/'));


$databaseCfg = Configure::getInstance('database');
echo $databaseCfg->get('host'); // remote_host

$sessionCfg = Configure::getInstance('session');
echo $sessionCfg->get('savePath'); // /home/tmp

$allCfg = Configure::getInstance();
echo $allCfg->get('app_name'); // Puja/Config
</pre>

<strong>Note</strong><br /><br />
<strong>new Configure(array('<strong>config</strong>/', '<strong>app</strong>/'));</strong> is same with
<pre>
require <strong>config</strong>/configure.php
require <strong>config</strong>/configure_local.php
require <strong>app</strong>/configure.php
require <strong>app</strong>/configure_local.php

</pre>

So the values from configure_local.php will overwrite configure.php in same folder, the last folder will overwrite the previous folder.

