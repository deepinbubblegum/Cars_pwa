<?php
    require_once('conf/dbconf.php');
    require_once('token.php');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials', 'true');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: *');
    $urlParams = explode('/', $_SERVER['REQUEST_URI']);
    // call funtion in url
    
    if (isset($urlParams[4])) {
        try {
            $urlParams[4]();
        } catch (\Throwable $th) {
            echo $th;
        }
    }else{
        show_404();
    }

    
    function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'OPTION') {
            http_response_code(200);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $token = new Token();
            $db = new Database('localhost', 'cars_dataset','root', '');
            http_response_code(200);
            if(isset($data['user']['username']) && isset($data['user']['password'])){
                $result = $db->query("SELECT passwd FROM user_data WHERE uname = '".$data['user']['username']."'");
                $hash = $result[0]['passwd'];
                if (password_verify($data['user']['password'], $hash)) {
                    $status = array(
                        'user' => $data['user']['username'],
                        'status' => true
                    );
                    $user_token = $token->encode_jwt($status);
                    echo json_encode($user_token);
                } else {
                    echo 'Invalid password.';
                }
            }
        }else{
            // show_404();
            http_response_code(200);
        }
    }

    function me(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        $token = new Token();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $headers = apache_request_headers();
            if(isset($headers['Authorization'])){
                $token_decode = $token->decode_jwt($headers['Authorization']);
                echo json_encode(['data' => $token_decode]);
            }
        }
    }

    function show_404()
    {
        $data_status = array(
            'message' => '404 Not found',
            'status' => false
        );
        http_response_code(404);
        echo json_encode($data_status);
    }

?>