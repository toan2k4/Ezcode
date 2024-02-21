<?php 
namespace App\Controllers;
use App\Models\UserCourse;
class BillController extends BaseController{
    protected $userCourse;

    public function __construct(){
        $this->userCourse = new UserCourse();
    }

    public function bill(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $thanh_tien = $_POST['thanhTien'];
            $thanh_toan = $_POST['payUrl'];
            $id_course =  $_POST['course_id'];
            // $this->userCourse->insert($_SESSION['user']['id'], $_POST['course_id'], $_POST['payUrl']);
            include 'app/controllers/thanhtoan.php';

        }
    }

    public function thank($id){
        echo "<script>alert('Bạn đã mua khóa học thành công! Mời bạn vào học')</script>";
        header('location: '.BASE_URL.'detail-course/'.$id);
    }
}