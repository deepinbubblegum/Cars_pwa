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
} else {
    show_404();
}

function generateRandomString($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


// if it work don't touch it
function sendUdp()
{
    $data = json_decode(file_get_contents('php://input'), true);
    $structure = './images/' . $data['user']['car_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'OPTION') {
        http_response_code(200);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $server = '127.0.0.1';
        $port = 16000;
        $msg = '0x80';
        $len = strlen($msg);
        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        socket_sendto($sock, $msg, $len, 0, $server, $port);
        socket_close($sock);

        $tmp_image = './images/tmp';
        $tem_file = [];
        while (sizeof($tem_file) <= 7) {
            // $tem_file = scandir($tmp_image);
            $tem_file = array_diff(scandir($tmp_image, 1), array('..', '.'));
        }

        if (!is_dir($structure)) {
            mkdir($structure, 0777, true);
            for ($i = 0; $i < sizeof($tem_file); $i++) {
                $file_de = explode(".", $tem_file[$i]);
                sleep(1);
                rename($tmp_image . '/' . $tem_file[$i], $structure . '/' . $data['user']['car_id'] . '_' . generateRandomString() . $i . '.' . $file_de[1]);
            }
        } else {
            for ($i = 0; $i < sizeof($tem_file); $i++) {
                $file_de = explode(".", $tem_file[$i]);
                sleep(1);
                rename($tmp_image . '/' . $tem_file[$i], $structure . '/' . $data['user']['car_id'] . '_' . generateRandomString() . $i . '.' . $file_de[1]);
            }
        }

        $file = array_diff(scandir($structure, 1), array('..', '.'));
        echo json_encode(['messages' => $file]);
    }
}

function getimagefrist()
{
    $file = [];
    $data = json_decode(file_get_contents('php://input'), true);
    $structure = './images/' . $data['user']['car_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'OPTION') {
        http_response_code(200);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (is_dir($structure)) {
            $file = array_diff(scandir($structure, 1), array('..', '.'));
        }
        echo json_encode(['messages' => $file]);
    }
}

function upload_file_m()
{
    $image = '';
    print_r($_POST);
}
