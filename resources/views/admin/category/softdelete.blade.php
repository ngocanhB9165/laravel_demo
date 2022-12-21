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
    <h1 class="text-success text-center">Thùng rác</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('category.restore_all') }}" class="btn btn-success"> All Restore</a>   
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
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{!! $item->status ? '<span class="badge badge-success">Hiện</span>' : '<span class="badge badge-danger">Ẩn</span>' !!}</td>
                        <td class="d-flex">
                            <a href="{{ route('category.restore',$item->id) }}" class="btn btn-success">Restore</a>   
                            
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
            {{ $categories->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
    
@stop
