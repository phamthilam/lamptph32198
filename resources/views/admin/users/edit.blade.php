@extends('admin.layouts.master')

@section('title')
    Theem Sản phẩm
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="{{route('admin.user.editPostUser',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1 class="h3 mb-2 text-gray-800">update User</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" >
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input type="text" class="form-control" name="address" value="{{$user->address}}">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" name="password" value="{{$user->password}}">
                    </div>
                    
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">role</label>
                        <select name="type" class="form-select" id="" name="type">
                            <option value="admin">admin</option>
                            <option value="member">member</option>
                        </select>
                       
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            
        </form>
    </div>
</div>

</div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [ [0, 'desc'] ] }
        );
    </script>
@endsection
