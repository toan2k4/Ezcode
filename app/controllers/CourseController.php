<?php
namespace App\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Course;
use App\Controllers\BaseController;
use App\Models\Video;

class CourseController extends BaseController
{
    private $course;
    private $account;
    private $category;

    public function __construct()
    {
        $this->course = new Course();
        $this->account = new Account();
        $this->category = new Category();
    }
    public function listCourse()
    {
        $titlePage = 'Danh sách khóa học';
        $data = $this->course->getAllCourse();
        $this->render('user.tranchu.home', compact('data', 'titlePage'));
    }

    public function viewListAdmin()
    {
        $titlePage = "Danh sách khóa học";
        $data = $this->course->getAllCourse();
        // $this->data 
        $this->render('admin.courses.list', compact('titlePage', 'data'));
    }
    public function viewAddAdmin()
    {
        $titlePage = "Thêm khóa học";
        $data['instructors'] = $this->account->getAllInstructors();
        $data['category'] = $this->category->getAllCategory();
        $this->render('admin.courses.add', compact('data', 'titlePage'));
    }

    public function insertCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $idTeacher = $_POST['id_teacher'];
            $category_id = $_POST['category_id'];
            $thumbnail = $_FILES['thumbnail'];

            $targetfile = "app/public/image/" . $thumbnail['name'];
            move_uploaded_file($thumbnail['tmp_name'], $targetfile);
            $check = $this->course->addCourse($name, $description, $price, $idTeacher, $category_id, $thumbnail['name']);
            if (!$check) {
                echo '<script>alert("Bạn thêm danh mục khóa học thành công")</script>';
            }
            $this->viewAddAdmin();
        }
    }

    public function viewEditAdmin($id)
    {
        $titlePage = "Sửa khóa học";
        $data['course'] = $this->course->getOneCourse($id);
        $data['instructors'] = $this->account->getAllInstructors();
        $data['category'] = $this->category->getAllCategory();
        $this->render('admin.courses.update', compact('data', 'titlePage'));
    }

    public function editCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $id_teacher = $_POST['id_teacher'];
            $category_id = $_POST['category_id'];
            $thumbnail = $_FILES['thumbnail'];
            $image = $_POST['thumbnail'];

            $targetDir = "app/public/image/";
            if ($thumbnail['size'] > 0) {
                unlink($targetDir . $image);
                $image = $thumbnail['name'];
                $hinh_anh = $targetDir . $thumbnail['name'];
                move_uploaded_file($thumbnail['tmp_name'], $hinh_anh);
            }

            $check = $this->course->upateCourse($id, $name, $description, $price, $id_teacher, $category_id, $image);
            if (!$check) {
                echo '<script>alert("Bạn sửa khóa học thành công ")</script>';
            }
            $this->viewListAdmin();
        }

    }

    public function removeCourse($id)
    {
        $this->course->deleteCourse($id);
        $this->viewListAdmin();
    }

    public function detailCourse($id){
        $data['course'] = $this->course->getOneCourse($id);
        $data['instructor'] = $this->account->getOneAccount($data['course']['category_id']);
        $video = new Video();
        $data['video'] = $video->getAllVideo($id);
        $data['title'] = $video->getTitleSection($id);
        $this->render('user.courses.detail', compact('data'));
    }
}

?>