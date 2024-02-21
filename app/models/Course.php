<?php 
namespace App\Models;

use App\Models\db;

class Course extends db{
    protected $table = 'courses';

    public function getAllCourse(){
        $query = "SELECT courses.id,courses.name, users.username,courses.description, courses.price, courses.thumbnail, courses.total_register, users.username, courses.id_teacher, categories.name as name_category FROM courses 
        JOIN users ON courses.id_teacher = users.id
        JOIN categories ON courses.category_id = categories.id";
        return $this->getData($query);
    }

    public function addCourse( $name, $description, $price, $idTeacher, $category_id, $thumbnail){
        $query = "INSERT INTO courses( name, description, price, id_teacher, category_id, thumbnail) VALUES ('$name', '$description', '$price', '$idTeacher', '$category_id', '$thumbnail')";
        return $this->getData($query, false);
    }

    public function getOneCourse($id){
        $query = "SELECT * FROM courses WHERE id=$id";
        return $this->getData($query, false);
    }

    public function upateCourse($id, $name, $description, $price, $id_teacher, $category_id, $thumbnail){
        $query = "UPDATE courses SET name='$name',description='$description',price='$price',id_teacher='$id_teacher', category_id='$category_id',thumbnail='$thumbnail' WHERE id=$id";
        return $this->getData($query, false);
    }

    public function deleteCourse($id){
        $query = "DELETE FROM courses WHERE id=$id";
        // $query = "UPDATE courses SET status='active' WHERE id=$id";
        return $this->getData($query, false);
    }
}
?>