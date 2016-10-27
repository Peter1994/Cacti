<?php
include('ts3_config.php');

//Get server info
$ft_total_received = $ts3_server->connection_filetransfer_bytes_received_total;
$ft_total_sent = $ts3_server->connection_filetransfer_bytes_sent_total;
$ft_download_quota = $ts3_server->virtualserver_download_quota * 1000 * 1000;
$ft_upload_quota = $ts3_server->virtualserver_upload_quota * 1000 * 1000;

//Echo results
echo "ts3FTReceived:" . $ft_total_received . " ts3FTSent:" . $ft_total_sent . " ts3FTQuotaDown:" . $ft_download_quota  . " ts3FTQuotaUp:" . $ft_upload_quota;
?>
