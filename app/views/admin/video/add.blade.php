@extends('layout.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><?= $titlePage ?></h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="<?= route('admin/video/list') ?>">Quay lại <i
                        class="bi bi-plus-circle"></i></a>

            </div>

        </div>
        <div class="p-3 shadow mb-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Thêm tiêu đề section</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Title section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= route('admin/video/add') ?>">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="title">
                                    <input type="hidden" name="link_video">
                                    <input type="hidden" value="{{ $course_id }}" name="course_id">
                                    <input type="hidden" name="parent_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Thêm video
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= route('admin/video/add') ?>" method="post">
                                <div class="form-group">
                                    <label for="title-video" class="col-form-label">Title Video:</label>
                                    <input type="text" class="form-control" id="title-video" name="title">
                                    <input type="hidden" value="{{ $course_id }}" name="course_id">
                                </div>
                                <div class="form-group">
                                    <label for="link-video" class="col-form-label">Link Video:</label>
                                    <input type="text" class="form-control" id="link-video" name="link_video">
                                </div>
                                <div class="form-group">
                                    <label for="link-video" class="col-form-label">Chose section:</label>
                                    <select name="parent_id" id="" class="form-control">
                                        <option value="0" selected>------Chose section------</option>
                                        <?php foreach ($data['title'] as $value) {
                                            echo '<option value="' . $value['id'] . '">' . $value['title'] . '</option>';
                                        } ?>

                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <h1 class="h3 mb-2 text-gray-800">Danh sách video </h1>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php foreach ($data['title'] as $key => $value) {?>
            <div class="accordion-item">
                <h2 class="accordion-header d-flex">
                    <button class="accordion-button collapsed" type="" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse<?= $key ?>" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        <?php if ($value['parent_id'] === 0) {
                            echo $value['title'];
                        } ?>
                    </button>

                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                        data-target="#editVideo{{ $key }}" data-whatever="@mdo">Update</button>
                    <div class="modal fade" id="editVideo{{ $key }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Title section</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?= route('admin/video/edit') ?>">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                name="title" value="{{ $value['title'] }}">
                                            <input type="hidden" name="link_video" value="{{$value['link_video']}}">
                                            <input type="hidden" value="{{ $course_id }}" name="course_id">
                                            <input type="hidden" name="parent_id" value="{{ $value['parent_id'] }}">
                                            <input type="hidden" name="id" value="{{ $value['id'] }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Send message</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a href="{{route('admin/video/delete/'.$value['id'])}}"><button class="btn btn-outline-dark my-2">Delete</button></a>
                </h2>
                <div id="flush-collapse<?= $key ?>" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <ul class="navbar-nav mb-1">
                        <?php foreach ($data['video'] as $i => $video) {
                            if($video['parent_id'] ===  $value['id']){
                        ?>

                        <li class="mb-1 d-flex">
                            <a href="<?= $video['link_video'] ?>" style="background-color: #e3f2fd;"
                                class="nav-item w-100 p-3 video">
                                <span class="item-name"><?= $video['title'] ?></span>
                            </a>
                            <div class="course-item-meta btn-group">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#editVideo_{{ $id }}" data-whatever="@mdo">Update</button>
                                <div class="modal fade" id="editVideo_{{ $id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Title section</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?= route('admin/video/edit') ?>">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Title:</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            name="title" value="{{ $video['title'] }}">
                                                        <input type="hidden" name="id" value="{{ $video['id']}}">
                                                        <input type="hidden" value="{{ $course_id }}"
                                                            name="course_id">
                                                        <input type="hidden" name="parent_id" value="{{ $video['parent_id']}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-form-label">Link video</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="link_video" value="{{ $video['link_video'] }}">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send
                                                            message</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('admin/video/delete/'.$video['id'])}}"><button class="btn btn-outline-dark my-2">Delete</button></a>
                                {{-- <span class="item-meta duration">03:03</span> --}}
                            </div>
                        </li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
            <?php }?>

        </div>



    </div>
@endsection
