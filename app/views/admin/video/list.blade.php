@extends('layout.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $titlePage?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Instructors</th>
                            <th>Category</th>
                            <th>Action</th>
                      
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
                                    <td><img style="width: 100px;" src="<?= BASE_URL?>app/public/image/<?= $thumbnail?>" alt=""></i></td>
                                    <td><?= $username ?></td>
                                    <td><?= $name_category ?></td>
                                    <td>
                                        <a href="<?= route('admin/video/'.$id.'/add') ?>" class="btn btn-warning">Add video</a>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </form>
                    </tbody>


                </table>
        
                
            </div>
        </div>
    </div>

</div>
@endsection