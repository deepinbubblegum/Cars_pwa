<?php
    include("scr/php-jwt/src/JWT.php");
    use \Firebase\JWT\JWT;

    //สร้าง function สำหรับ สร้าง Json Web Token โดยรับ String user
    function encode_jwt($user)
    {   //กำหนด key สำหรับ encode jwt
        $key = "BUBBLEGUM";
        //สร้าง object ข้อมูลสำหรับทำ jwt
        $payload = array(
            "user" => $user,
            "date_time" => date("Y-m-d H:i:s")//กำหนดวันเวลาที่สร้าง
        );
        //สร้าง JWT สำหรับ object ข้อมูล
        $jwt = JWT::encode($payload, $key);
        //เพื่อความปลาดภัยยิ่งขึ้นเมื่อได้ JWT แล้วควรเข้ารหัสอีกชั้นหนึ่ง
        $jwt=encrypt_decrypt($jwt,"encrypt");
        // return token ที่สร้าง
        return $jwt;
    }

        //สร้าง function สำหรับอ่านข้อมูล User จาก JWT ( Token )
        function decode_jwt($jwt)
        {
            //กำหนด key สำหรับ decode jwt โดย
            $key = "my_JWT_key";
            try{
                //ถอดรหัส token
                $jwt= encrypt_decrypt($jwt,"decrypt");
                //decode token ให้เป็นข้อมูล user
                $payload = JWT::decode($jwt, $key, array('HS256'));
    
            }catch(Exception $e)
            {   //กรณี Token ไม่ถูกต้องจะ return false
                return false;
            }
           
            //return ข้อมูล user กลับไป
            return  (array)$payload;
    
        }
?>