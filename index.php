<?php

session_start();

require_once "env.php";
require_once "vendor/autoload.php";
// unset($_SESSION['user']);

require_once "route.php";
// use App\Controllers\CategoryController;
// use App\Controllers\CourseController;
// use App\Controllers\AccountController;
// use App\Controllers\HomeController;

// $acc = new AccountController();
// $course = new CourseController();
// $home = new HomeController();
// $category = new CategoryController();
// $url = isset($_GET['url']) ? $_GET['url'] : '/';
// if (isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'user') {
//     switch ($url) {
//         case '/':
//             $course->listCourse();
//             break;
//         case 'register':
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $fullname = $_POST['fullname'];
//                 $username = $_POST['username'];
//                 $email = $_POST['email'];
//                 $password = $_POST['password'];
//                 $tel = $_POST['tel'];
//                 $acc->createAccount($username, $fullname, $email, $password, $tel);
//             }
//             $acc->viewRegister();
//             break;
//         case 'login':
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $email = $_POST['email'];
//                 $password = $_POST['password'];
//                 $acc->checkLogin($email, $password);
//             }
//             $acc->viewLogin();
//             break;
//         case 'account':

//             break;

//     }
// } elseif (isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') {
//     include "app/views/admin/include/header.php";
//     switch ($url) {
//         case '/':
//             $home->viewHomeAdmin();
//             break;
//         case 'category':
//             if (isset($_GET['nd']) && $_GET['nd'] === 'add') {
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $category->insertCategory($_POST['name'], $_POST['icon']);
//                 }
//                 $category->viewAddAdmin();
//             }
//             if (isset($_GET['nd']) && $_GET['nd'] === 'list') {
//                 $category->viewListAdmin();
//             }

//             if (isset($_GET['nd']) && $_GET['nd'] === 'update') {
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $category->editCategory($_POST['id'], $_POST['name'], $_POST['icon']);
//                 }
//                 if (isset($_GET['id'])) {
//                     $category->viewEditAdmin($_GET['id']);
//                 }
//             }

//             if (isset($_GET['nd']) && $_GET['nd'] === 'delete') {
//                 if (isset($_GET['id'])) {
//                     $category->removeCategory($_GET['id']);
//                 }
//             }
//             break;
//         case 'course':
//             if (isset($_GET['nd']) && $_GET['nd'] === 'list') {
//                 $course->viewListAdmin();
//             }

//             if (isset($_GET['nd']) && $_GET['nd'] === 'add') {
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $course->insertCourse($_POST['name'], $_POST['description'], $_POST['price'], $_POST['id_teacher'], $_POST['category_id'], $_FILES['thumbnail']);
//                 }
//                 $course->viewAddAdmin();
//             }

//             if (isset($_GET['nd']) && $_GET['nd'] === 'update') {
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $course->editCourse($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['id_teacher'], $_POST['category_id'] , $_FILES['thumbnail'], $_POST['thumbnail']);
//                 }
//                 if (isset($_GET['id'])) {

//                     $course->viewEditAdmin($_GET['id']);
//                 }
//             }

//             if (isset($_GET['nd']) && $_GET['nd'] === 'delete') {
//                 if (isset($_GET['id'])) {
//                     $course->removeCourse($_GET['id']);
//                 }
//             }
//             break;
//         case 'video':
//             include 'app/views/admin/video/add.php';
//             break;

//     }
//     include "app/views/admin/include/footer.php";

// } else {
//     switch ($url) {
//         case '/':
//             $course->listCourse();
//             break;
//         case 'register':
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $fullname = $_POST['fullname'];
//                 $username = $_POST['username'];
//                 $email = $_POST['email'];
//                 $password = $_POST['password'];
//                 $tel = $_POST['tel'];
//                 $acc->createAccount($username, $fullname, $email, $password, $tel);
//             }
//             $acc->viewRegister();
//             break;
//         case 'login':
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $email = $_POST['email'];
//                 $password = $_POST['password'];
//                 $acc->checkLogin($email, $password);
//             }
//             $acc->viewLogin();
//             break;
//         case 'account':
//             $acc->viewAccount();
//             break;

//     }
// }


