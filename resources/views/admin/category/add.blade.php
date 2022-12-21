@extends('layout.master')
@section('content')
    <div class="container">
        <h1 class="text-center text-success">Thêm mới</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <label for="">Status</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status" id="" value="1" checked> Hiện
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status" id="" value="0"> Ẩn
                </label>
            </div><br>
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </form>
    </div>
@stop