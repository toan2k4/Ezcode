<?php 
namespace App\Models;

class Video extends db{
    protected $table = 'videos';
    public function insertVideo($title, $link_video = '', $course_id, $parent_id=''){
        $sql = "INSERT INTO ".$this->table." (title, link_video, course_id, parent_id) VALUES ('$title', '$link_video', '$course_id', '$parent_id')";
        return $this->getData($sql, false);
    }

    public function getAllVideo($id){
        $sql = "SELECT * FROM videos WHERE course_id =$id and parent_id <> 0";
        return $this->getData($sql);
    }

    public function getOneVideo($id){
        $sql = "SELECT * FROM videos WHERE id =$id";
        return $this->getData($sql, false);
    }

    public function getTitleSection($id){
        $sql = "SELECT * FROM videos WHERE course_id = $id and parent_id = 0";
        return $this->getData($sql);
    }

    public function updateVideo($id,$title, $link_video = '', $course_id, $parent_id=''){
        $sql = "UPDATE videos SET title='$title',link_video='$link_video',course_id='$course_id',parent_id='$parent_id' WHERE id=$id";
        return $this->getData($sql,false);
    }

    public function deleteVideo($id){
        $query = "DELETE FROM videos WHERE id=$id";
        // $query = "UPDATE videos SET status='unactive' WHERE id=$id";
        return $this->getData($query, false);
    }
}