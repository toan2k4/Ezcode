<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;



class CategoryController extends BaseController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }
    public function viewAddAdmin()
    {
        $titlePage = "Thêm danh mục khóa học";
        $this->render('admin.category.add', compact('titlePage'));
    }

    public function viewListAdmin()
    {
        $titlePage = "Danh sách danh mục khóa học";
        $data = $this->category->getAllCategory();
        $this->render('admin.category.list', compact('data', 'titlePage'));
    }
    public function viewEditAdmin($id)
    {
        $titlePage = "Sửa danh mục khóa học";
        $data = $this->category->getOneCategory($id);
        $this->render('admin.category.update', compact('data', 'titlePage'));
    }

    public function editCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $icon = $_POST['icon'];

            $check = $this->category->upateCategory($id, $name, $icon);
            if (!$check) {
                echo '<script>alert("Bạn sửa danh mục khóa học thành công")</script>';
            }
            $this->viewListAdmin();
        }

    }

    public function removeCategory($id)
    {
        $this->category->deleteCategory($id);
        $this->viewListAdmin();
    }

    public function insertCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $icon = $_POST['icon'];

            // $targetfile = "app/public/image" . $thumbnail['name'];
            // move_uploaded_file($thumbnail['tmp_name'], $targetfile);
            $check = $this->category->addCategory($name, $icon);
            if (!$check) {
                echo '<script>alert("Bạn thêm danh mục khóa học thành công")</script>';
            }
            $this->viewAddAdmin();
        }
    }
}