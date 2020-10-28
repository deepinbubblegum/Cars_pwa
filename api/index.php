<?php
    require_once('conf/dbconf.php');
    $db = new Database('localhost', 'cars_dataset','root', '');
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo json_encode($db->query('SELECT * FROM user_data'));
    }
?>