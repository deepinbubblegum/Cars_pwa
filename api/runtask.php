<?php 
header("Access-Control-Allow-Origin: *");

$param = htmlspecialchars($_GET["type"]);
$device = [$_GET["room"]];

if ($param == 'on') {
    $msg = json_encode(["power_on" => $device]);
    sendUdp($msg);
}

if ($param == 'off') {
    $msg = json_encode(["power_off" => $device]);
    sendUdp($msg);

}

function sendUdp ($msg) {
    $server = '10.1.9.250';
    $monitor = '10.1.10.255';
    $port = 8888;

    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    $len = strlen($msg);
    socket_sendto($sock, $msg, $len, 0, $server, $port);
    socket_sendto($sock, $msg, $len, 0, $monitor, $port);
    socket_close($sock);

    echo json_encode(['status' => 'OK !!']);
}


?>