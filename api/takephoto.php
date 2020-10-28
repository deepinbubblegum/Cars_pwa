<?php 
// <IfModule mod_headers.c>
// Header set Access-Control-Allow-Headers "*"
// </IfModule>
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials', 'true');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: *');
    $urlParams = explode('/', $_SERVER['REQUEST_URI']);
    if (isset($urlParams[4])) {
        try {
            $urlParams[4]();
        } catch (\Throwable $th) {
            echo $th;
        }
    }else{
        show_404();
    }

    function sendUdp () {
        if ($_SERVER['REQUEST_METHOD'] == 'OPTION') {
            http_response_code(200);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $structure = './images/'.$data['user']['car_id'];
        if (!mkdir($structure, 0777, true)) {
            echo json_encode(['messages'=> false]);
        }
        $server = '127.0.0.1';
        $port = 16000;
        $msg = '0x80';
        $len = strlen($msg);
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_sendto($sock, $msg, $len, 0, $server, $port);
        socket_close($sock);
        
        sleep(3);
        $file = scandir($structure);
        echo json_encode(['messages' => $file]);
    }
}
