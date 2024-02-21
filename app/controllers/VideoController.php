<?php 
namespace App\Controllers;
use App\Models\Course;
use App\Models\Video;


class VideoController extends BaseController{
    protected $course;
    protected $video;
    public function __construct(){
        $this->course = new Course();
        $this->video = new Video();
    }
    public function viewlistAdmin(){
        $data = $this->course->getAllCourse();
        $titlePage = "Page add video";
        $this->render('admin.video.list', compact('titlePage', 'data'));
    }
    public function viewAddAdmin($id){
        $course_id = $id;
        $data['video'] = $this->video->getAllVideo($course_id);
        $data['title'] = $this->video->getTitleSection($course_id);
        $titlePage = "Page add video";
        $this->render('admin.video.add', compact('titlePage', 'data','course_id'));
    }

    public function addVideo(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $link_video = $_POST['link_video'];
            $course_id = $_POST['course_id'];
            $parent_id = $_POST['parent_id'];
            $check = $this->video->insertVideo($title, $link_video, $course_id, $parent_id);
            if(!$check){
                echo '<script>alert("Bạn thêm thành công")</script>';
            }

            $this->viewAddAdmin($course_id);
        }
    }

    // public function viewEditVideo($id){
    //     $data['haha'] = 1;

    //     $course_id = $id;
    //     $data['video'] = $this->video->getAllVideo($course_id);
    //     $data['title'] = $this->video->getTitleSection($course_id);
    //     $titlePage = "Page add video";
    //     $this->render('admin.video.add', compact('titlePage', 'data','course_id'));
    // }

    public function editVideo(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $link_video = $_POST['link_video'];
            $course_id = $_POST['course_id'];
            $parent_id = $_POST['parent_id'];
            $id = $_POST['id'];
            $check = $this->video->updateVideo($id,$title, $link_video, $course_id, $parent_id);
            if(!$check){
                echo '<script>alert("Bạn sửa thành công")</script>';
            }

            $this->viewAddAdmin($course_id);
        }
    }

    public function removeVideo($id){
        $this->video->deleteVideo($id);
        $this->viewListAdmin();
    }
}
