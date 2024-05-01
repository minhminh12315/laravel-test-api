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
                    <h3 class="card-title">Danh sach san pham</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.product.addnew') }}" class="btn btn-primary">Them Moi</a>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lstPrd as $key => $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td><img src="{{ asset('/uploads') }}/{{ $item->image }}" alt="" width="100"></td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                    <a data-product_name="{{ $item->name }}" href="{{ route('admin.product.delete', ['id' => $item->id]) }}" class="btn-delete btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                {{ $lstPrd->links() }}
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
<!-- Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">$times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ban co chac muon xoa san pham <strong></strong> nay khong?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Xac Nhan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.btn-delete').click(function(){
            var url = $(this).attr('href');
            let productName = $(this).data('product_name');
            $('#deleteModal strong').text(productName);
            $('#deleteModal').modal('show');
            $('#deleteModal .btn-primary').click(function(){
                window.location.href = url;
            });
            return false;
        });
    });
</script>

@endsection('maincontent')