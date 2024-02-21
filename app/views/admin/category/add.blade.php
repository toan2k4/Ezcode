@extends('layout.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titlePage?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="?url=category&nd=list">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="<?= route('admin/category/add')?>" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Tên danh mục" name="name">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Icon:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="nhập mã icon" name="icon">
                    
                </div>
                
                
                <input type="submit" class="btn btn-primary" value="Thêm Mới" name="gui">
            </form>

        </div>
    </div>
</div>
@endsection