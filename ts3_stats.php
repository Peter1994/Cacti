<?php
parse_str(implode('&', array_slice($argv, 1)), $_GET);

//Require TS3 PHP Framework
require_once('libraries/TeamSpeak3/TeamSpeak3.php');

$script_error = false;

	if(isset($_GET['ts3_ip']) && !empty($_GET['ts3_ip'])){

		$ts3_ip = $_GET['ts3_ip'];
		
	}else{

		$script_error = true;

	}

        if(isset($_GET['ts3_port']) && !empty($_GET['ts3_port'])){

                $ts3_port = $_GET['ts3_port'];
                
        }else{

                $ts3_port = "9987";

        }

        if(isset($_GET['ts3_username']) && !empty($_GET['ts3_username'])){

                $ts3_user = $_GET['ts3_username'];
                
        }else{

                $script_error = true;

        }

        if(isset($_GET['ts3_password']) && !empty($_GET['ts3_password'])){

                $ts3_pass = $_GET['ts3_password'];
                
        }else{

                $script_error = true;

        }

	
	if(isset($_GET['mode']) && !empty($_GET['mode']) && $script_error == false) {

		$ts3_server = TeamSpeak3::factory("serverquery://" . $ts3_user . ":" . $ts3_pass . "@" . $ts3_ip . "/?server_port=" . $ts3_port);

		$mode = $_GET['mode'];

		switch($mode) {

			case "bandwidth":
				//Get server info
				$server_total_received = $ts3_server->connection_bytes_received_total / 10;
				$server_total_sent = $ts3_server->connection_bytes_sent_total / 10;

				//Echo results
				echo "ts3ServerReceived:" . $server_total_received . " ts3ServerSent:" . $server_total_sent;

				break;

			case "clients":
				//Get server info
				$total_clients = $ts3_server->virtualserver_clientsonline -  1;
				$real_clients = $ts3_server->virtualserver_clientsonline - $ts3_server->virtualserver_queryclientsonline;
				$query_clients = $ts3_server->virtualserver_queryclientsonline - 1;
				$max_clients = $ts3_server->virtualserver_maxclients;

				//Echo results
				echo "ts3TotalClients:" . $total_clients . " ts3RealClients:" . $real_clients . " ts3QueryClients:" . $query_clients . " ts3MaxClients:" . $max_clients;

				break;

			case "connection":
				//Get server info
				$total_ping = $ts3_server->virtualserver_total_ping;
				$total_packetloss = $ts3_server->virtualserver_total_packetloss_total;

				//Echo results
				echo "ts3Ping:" . $total_ping . " ts3Packetloss:" . $total_packetloss;

				break;

			case "filetransfer":
				//Get server info
				$ft_total_received = $ts3_server->connection_filetransfer_bytes_received_total / 10;
				$ft_total_sent = $ts3_server->connection_filetransfer_bytes_sent_total / 10;
				$ft_download_quota = $ts3_server->virtualserver_download_quota * 1000 * 1000;
				$ft_upload_quota = $ts3_server->virtualserver_upload_quota * 1000 * 1000;

				//Echo results
				echo "ts3FTReceived:" . $ft_total_received . " ts3FTSent:" . $ft_total_sent . " ts3FTQuotaDown:" . $ft_download_quota  . " ts3FTQuotaUp:" . $ft_upload_quota;

				break;

			default:
				echo "SCRIPT ERROR: Unkown mode!\nAvailable modes: bandwidth, clients, connection, filetransfer.\n";
		}
	}else{
		echo "SCRIPT ERROR: One or more required variables have not been defined. Required variables: ts3_ip, ts3_username, ts3_password, mode.\nUsage: php -f ts3_stats.php ts3_ip=192.168.1.56 ts3_username=serveradmin ts3_password=*** mode=bandwidth\n";
	}
?>
