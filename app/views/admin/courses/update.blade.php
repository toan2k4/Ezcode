@extends('layout.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titlePage?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= route('admin/course/list')?>">Danh Sách</a>
        </div>
        <div class="card-body">

            <form action="<?= route('admin/course/update')?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">ID:</label>
                    <input class="form-control" placeholder="AUTO NUMBER" readonly>
                    <input type="hidden" value="<?= $data['course']['id']?>" name="id">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="<?= $data['course']['name']?>"  placeholder="Tên khóa học" name="name">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Description:</label>
                    <input type="text" class="form-control" value="<?= $data['course']['description']?>"  placeholder="Nhập mô tả" name="description">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Price:</label>
                    <input type="number" class="form-control" value="<?= $data['course']['price']?>"  placeholder="Nhập giá" name="price">
                    
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Thumbnail:</label>
                    <input type="file" class="form-control"  name="thumbnail">
                    <input type="hidden" name="thumbnail" value="<?= $data['course']['thumbnail']?>">
                    <img width="150px"  src="app/public/image/<?= $data['course']['thumbnail']?>" alt="">
                </div>
                <div class="mb-3">
                    <label for="">Instructors</label>
                    <select class="form-control"  name="id_teacher" id="">
                        <?php foreach($data['instructors'] as $teacher){?>
                        <option value="<?= $teacher['id']?>"
                            <?= ($data['course']['id_teacher'] === $teacher['id'] ) ? 'selected': ''?>
                        ><?= $teacher['username']?></option>
                        <?php }?>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="">Instructors</label>
                    <select class="form-control"  name="category_id" id="">
                        <?php foreach($data['category'] as $teacher){?>
                        <option value="<?= $teacher['id']?>"
                            <?= ($data['course']['category_id'] === $teacher['id'] ) ? 'selected': ''?>
                        ><?= $teacher['name']?></option>
                        <?php }?>
                    </select>

                </div>
                
                <input type="submit" class="btn btn-primary" value="Cập nhật" name="gui">
            </form>

        </div>
    </div>
</div>
@endsection