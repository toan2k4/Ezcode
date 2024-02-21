<?php
    namespace App\Models;

    use App\Models\db;
    class Account extends db{
        public function addAccount($username, $fullname, $email, $password,$tel){
            $query = "INSERT INTO users( username, fullname, email, password ,tel) VALUES ('$username','$fullname','$email','$password','$tel')";
            return $this->getData($query, false);
        }

        public function login($email, $password){
            $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
            return $this->getData($query, false);
        }
        public function getOneAccount($id){
            $query = "SELECT * FROM users WHERE id=$id";
            return $this->getData($query, false);
        }

        public function getAllInstructors(){
            $query = "SELECT * FROM users WHERE role = 'teacher'";
            return $this->getData($query);
        }
    }
?>