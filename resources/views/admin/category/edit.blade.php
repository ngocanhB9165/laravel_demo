@extends('layout.master')
@section('content')
    <div class="container">
        <h1 class="text-center text-primary">Sửa </h1>
        <form action="{{ route('category.update',$categories->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" value="{{ $categories->name }}">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <label for="">Status</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status" id="" value="1" {{ $categories->status ? 'checked' : '' }}> Hiện
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status" id="" value="0" {{ !$categories->status ? 'checked' : '' }}> Ẩn
                </label>
            </div><br>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
@stop