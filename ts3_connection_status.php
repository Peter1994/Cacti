<?php
include('ts3_config.php');

//Get server info
$total_ping = $ts3_server->virtualserver_total_ping;
$total_packetloss = $ts3_server->virtualserver_total_packetloss_total;

//Echo results
echo "ts3Ping:" . $total_ping . " ts3Packetloss:" . $total_packetloss;
?>
