<?php
include('ts3_config.php');

//Get server info
$total_clients = $ts3_server->virtualserver_clientsonline -  1;
$real_clients = $ts3_server->virtualserver_clientsonline - $ts3_server->virtualserver_queryclientsonline;
$query_clients = $ts3_server->virtualserver_queryclientsonline - 1;
$max_clients = $ts3_server->virtualserver_maxclients;

//Echo results
echo "ts3TotalClients:" . $total_clients . " ts3RealClients:" . $real_clients . " ts3QueryClients:" . $query_clients . " ts3MaxClients:" . $max_clients;
?>
