@extends('layout.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titlePage?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="{{route('admin/course/list')}}">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="<?= route('admin/course/add')?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control"  placeholder="Tên khóa học" name="name">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Description:</label>
                    <input type="text" class="form-control"  placeholder="Nhập mô tả" name="description">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Price:</label>
                    <input type="number" class="form-control"  placeholder="Nhập giá" name="price">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Thumbnail:</label>
                    <input type="file" class="form-control"  name="thumbnail">
                    
                </div>
                <div class="mb-3">
                    <label for="">Instructors</label>
                    <select class="form-control"  name="id_teacher" id="">
                        <?php foreach($data['instructors'] as $teacher){?>
                        <option value="<?= $teacher['id']?>"><?= $teacher['username']?></option>
                        <?php }?>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="">Category</label>
                    <select class="form-control"  name="category_id" id="">
                        <?php foreach($data['category'] as $teacher){?>
                        <option value="<?= $teacher['id']?>"><?= $teacher['name']?></option>
                        <?php }?>
                    </select>

                </div>
                
                <input type="submit" class="btn btn-primary" value="Thêm Mới" name="gui">
            </form>

        </div>
    </div>
</div>
@endsection