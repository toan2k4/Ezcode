<?php
namespace App\Controllers;

use App\Models\Account;
use App\Controllers\BaseController;
use App\Controllers\HomeController;

class AccountController extends BaseController
{
    private $account;

    public function __construct()
    {
        $this->account = new Account;
    }

    public function viewRegister()
    {
        $titlePage = "Student Register";
        $this->render('user.login.registration',compact('titlePage'));
    }
    public function viewLogin()
    {
        $titlePage = "Student Login";
        $this->render('user.login.login',compact('titlePage'));
    }
    public function viewAccount()
    {
        $titlePage = "Account";
        $this->render('hom.home',compact($titlePage));
    }

    public function createAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tel = $_POST['tel'];

            $this->account->addAccount($username, $fullname, $email, $password, $tel);
            $this->viewLogin();
        }

    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // $acc->checkLogin($email, $password);
            $check = $this->account->login($email, $password);
            if (is_array($check)) {
                $_SESSION['user'] = $check;
                if($_SESSION['user']['role'] === 'admin'){
                    $view = new HomeController();
                    $view->viewHomeAdmin();
                }else{
                    header('location: '.BASE_URL.'');
                }
            } else {
                echo '<script>alert("tài khoản mật khẩu không đúng")</script>';
                $this->viewLogin();
            }
        }
    }



}
?>