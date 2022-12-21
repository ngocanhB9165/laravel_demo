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
    <h1 class="text-success text-center">List Category</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="row justify-content-around">
                <a href="{{ route('category.create') }}" class="btn btn-success">Thêm Mới</a>
            <a href="{{ route('category.cabin') }}" class="btn btn-danger">Thùng rác</a>
            <a href="{{ route('category.delete_all') }}" class="btn btn-warning" onclick="return confirm ('Xóa Tất cả??')">Xóa All</a>
            <form action="" method="get" class="d-flex">
                <input type="text" name='keyword' placeholder="Search">
                <button type="submit" class="btn btn-success">Search</button>
            </form>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{!! $item->status ? '<span class="badge badge-success">Hiện</span>' : '<span class="badge badge-danger">Ẩn</span>' !!}</td>
                        <td class="d-flex">
                            <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary">Sửa</a>

                            <form action="{{ route('category.destroy',$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Chắn Xóa Chứ??')">Xóa</button>
                            </form>
                            
                        </td>
                    </tr>
                    @empty
                        <p>no recore</p>
                    @endforelse
                    
                    
                </tbody>
            </table>
            {{ $categories->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
    
@stop
