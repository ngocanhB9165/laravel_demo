@extends('layout.master')
@section('content')
    <div class="container">
        <h1 class="text-center text-success">Thêm mới</h1>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Sale_Price</label>
              <input type="text" name="sale_price" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="file" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" id="description" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="category_id" id="">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                
              </select>
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