<?php
namespace App\Models;

use PDO;
// tạo kết nối từ project php sang mysql
class db{
    private $connect;
    private $stmt;

    public function __construct(){
        $this->connect = new PDO("mysql:host=".DBHOST.";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }
    
    
    
    // nếu như dùng để lấy danh sách thì sẽ truyền true còn truyền false thì
    //sẽ chạy được các câi truy vấn như thêm sửa xóa
    public function getData($query, $getAll = true){
        $this->stmt = $this->connect->prepare($query);
        $this->stmt->execute();
        if ($getAll) {
            return $this->stmt->fetchAll();
        }
        return $this->stmt->fetch();
    }
}



?>