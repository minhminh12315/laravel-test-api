@extends('admin.layouts.master')

@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sach san pham</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v3</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cap Nhat san pham</h3>
                    <div class="card-tools">
                        <a href="" class="btn btn-warning">Quay lai</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Ten San Pham</label>
                            <input value="{{ $prd->name }}" type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Mo Ta San Pham</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">value="{{ $prd->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Gia San Pham</label>
                            <input value="{{ $prd->price }} type="text" class="form-control" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="">Anh San Pham</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <img src="{{ asset('/uploads') }}/{{ $prd->image }}" class="img-upload" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Danh Muc San Pham</label>
                            <select class="form-control" name="category_id" id="">
                                <option value="">Chon Danh Muc</option>
                                @foreach($lstCategory as $key => $item)
                                    <option {{ ($prd->category->id == $item->id) ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Gui Di</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<script>
    $(document).ready(function(){
        $('#image').change(function(){
            var file = $(this)[0].files[0];
            console.log(file);
            var reader = new FileReader();
            reader.onload = function(e){
                console.log(e.target);
                console.log(e.target.result);
                $('.img-upload').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        })
    })
</script>


@endsection('maincontent')