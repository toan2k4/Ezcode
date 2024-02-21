@extends('layout.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titlePage?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="<?= route('admin/category/add')?>">Thêm danh mục <i class="bi bi-plus-circle"></i></a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>icon danh mục</th>
                            <th>Chức năng</th>
                      
                        </tr>
                    </thead>

                    <tbody>
                        <form action="" method="get">
                            <?php 
                            // var_dump($data);
                            // die();
                                foreach ($data as $key=>$cate) {
                                extract($cate);
                               
                            ?>
                                <tr>
                                   
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $name ?></td>
                                    <td><i style="width: 100px;" class="<?= $icon?>"></i></td>
                                    <td>
                                        <a href="<?= route('admin/category/'.$id.'/edit') ?>" class="btn btn-warning">Sửa</a>
                                        <a href="<?= route('admin/category/'.$id.'/delete') ?>" onclick="return confirm('bạn có chắc muốn xóa khoá học này không?')"  class="btn btn-danger">Xóa</a>
                                    </td>
                                    
                                </tr>
                            <?php } ?>

                    </tbody>


                </table>
        
                </form>
            </div>
        </div>
    </div>

</div>
@endsection