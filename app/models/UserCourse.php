<?php 
namespace App\Models;
use App\Controllers\BaseController;
class UserCourse extends db{
    protected $table = 'user_courses';

    public function insert($user_id, $course_id, $payment_status){
        $sql = "INSERT INTO user_courses( user_id, course_id, payment_status) VALUES ('$user_id','$course_id','$payment_status')";
        return $this->getData($sql, false);
    }

}