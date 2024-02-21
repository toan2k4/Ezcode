<?php
    namespace App\Models;

    use App\Models\db;

    class Category extends db{
        public function addCategory($name, $icon){
            $query = "INSERT INTO categories( name, icon) VALUES ('$name','$icon')";
            return $this->getData($query, false);
        }

        public function getAllCategory(){
            $query = "SELECT * FROM categories";
            return $this->getData($query);
        }

        public function getOneCategory($id){
            $query = "SELECT * FROM categories WHERE id=$id";
            return $this->getData($query, false);
        }

        public function upateCategory($id, $name, $icon){
            $query = "UPDATE categories SET name='$name',icon='$icon' WHERE id=$id";
            return $this->getData($query, false);
        }
        public function deleteCategory($id){
            $query = "DELETE FROM `categories` WHERE id=$id";
            return $this->getData($query, false);
        }
    }