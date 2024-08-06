@extends('admin.layouts.master')

@section('title')
    Theem Sản phẩm
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.products.addPostProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                      
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="basiInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                        <label for="basiInput" class="form-label">price</label>
                                        <input type="number" class="form-control" name="price" id="price" value="0">
                                    </div>
                                     <div class="mt-3">
                                        <label for="basiInput" class="form-label">category</label>
                                        <select class="form-select" name="category_id" id="category_id">
                                            @foreach ($category as $id=>$name)
                                                   <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                         
                                            </select>
                                    </div>  
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">image:</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                      </div>
                                   
                                  
                                </div>
                                <!--end col-->
                                
                               
                                <div class="row">
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row" style="height: 300px; overflow: scroll;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Variant</h4>
                      
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                               <table>
                                <tr>
                                    <th class="text-center">size</th>
                                    <th class="text-center">color</th>
                                    <th class="text-center">quanlity</th>
                                </tr>
                               
                                @foreach($sizes as $sizeID => $sizeName)
                                @php($flagRowspan = true)
        
                                @foreach($colors as $colorID => $colorName)
                                    <tr class="text-center">
        
                                        @if($flagRowspan)
                                            <td style="vertical-align: middle;"
                                                rowspan="{{ count($colors) }}"><b>{{ $sizeName }}</b></td>
                                        @endif
                                        @php($flagRowspan = false)
        
                                        <td>
                                            <p >{{$colorName}}</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control"
                                                   value="0"
                                                   name="product_variants[{{ $sizeID . '-' . $colorID }}][quatity]">
                                        </td>
                                    </tr>
        
                                @endforeach
                            @endforeach
                               </table>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
               
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <button class="btn btn-primary" type="submit">Save</button>
                      
                    </div><!-- end card header -->
            
                            
                        </div>
                 
                </div>
            </div>
            <!--end col-->

        </form>
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
{{-- 
    <script>
        new DataTable("#example", {
            order: [ [0, 'desc'] ] }
        );
    </script> --}}
@endsection
