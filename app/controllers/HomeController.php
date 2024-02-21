<?php 
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Course;

class HomeController extends BaseController{
    private $course;
    private $category;

    public function __construct(){
        $this->course = new Course;
        $this->category = new Category;
    }

    public function viewHomeAdmin(){
        $titlePage = 'Trang chủ Admin';
        $this->render('admin.home.home',compact('titlePage'));
    }
    public function viewHomeUser(){
        $titlePage = 'Trang chủ';
        $data['course'] = $this->course->getAllCourse();
        $data['category'] = $this->category->getAllCategory();
        $this->render('user.home.home',compact('titlePage', 'data'));
    }
}
