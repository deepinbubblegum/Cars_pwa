<?php
    $data = [];
    $rootPath = $_SERVER['DOCUMENT_ROOT'];
    $structure = $rootPath.'/dist/images/000000000001372925';
    $file = '000000000001372925_01.jpg';
    $data['user']['car_id'] = '000000000001372925';
    $ffmpge_path = '';
    $output = str_replace('.jpg', '_640x480.jpg', $file);
    // echo $rootPath;
    $file_ex = explode('.', $file);
    $file_str = $rootPath.'/ffmpeg.exe -i '.$structure.'/'.$file.' -vf scale=640:480 '. $structure . '/' .$output;
    shell_exec($file_str);
?>