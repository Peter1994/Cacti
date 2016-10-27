<?php
//Require TS3 PHP Framework
require_once('libraries/TeamSpeak3/TeamSpeak3.php');

//TS3 connection config
$ts3_user = 'serveradmin';
$ts3_pass = '34RK+mIM';
$ts3_ip = '192.168.0.5:10011';
$ts3_port = 9987;

//Prepare TS3 Server connection
$ts3_server = TeamSpeak3::factory("serverquery://$ts3_user:$ts3_pass@$ts3_ip/?server_port=$ts3_port");
?>
