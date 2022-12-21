@extends('layout.master')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('success') }}</strong> 
      </div>
    @endif
    
    
    <script>
      $(".alert").alert();
    </script>
    <h1 class="text-success text-center">List Product</h1>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <a href="{{ route('product.create') }}" class="btn btn-success">Thêm Mới</a>
            <a href="{{ route('product.cabin') }}" class="btn btn-danger">Thùng Rác</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Sale_Price</th>
                        <th>image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->sale_price }}</td>
                            <td><img src="{{ url('uploads') }}/{{$value->image}}" alt="" width="50px"></td>
                            <td>{!! $value->description !!}</td>
                            <td>{{ $value->categories->name }}</td>
                            <td>{!! $value->status ? '<span class="badge badge-success">Hiện</span>' : '<span class="badge badge-danger">Ẩn</span>' !!}</td>
                            <td class="d-flex">
                                <a href="{{ route('product.edit',$value->id) }}" class="btn btn-primary">Sửa</a>
                                <form action="{{ route('product.destroy',$value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Chắn Xóa Chứ??')">Xóa</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            {{ $products->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
    
@stop
