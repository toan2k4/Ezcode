<?php


// File cấu hình thông tin
const DBNAME = "ezcode";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";


const BASE_URL = "http://localhost:81/xuong/ezcode/khoahoc/";

function route($url){
    return BASE_URL.$url;
}
function flash($key,$msg,$route)  {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:'.BASE_URL.$route.'?msg='.$key);die;
}

