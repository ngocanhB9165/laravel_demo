@extends('layout.master')
@section('content')
<div class="container">
  @include('admin.users.error')
  @if(session('error'))
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">{{ session('error') }}</h4>
      <p></p>
      <p class="mb-0"></p>
    </div>
    @endif
    <form method="POST" action="/admin/users/login/store">
      @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" value="" name="email">
         
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" value="">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
       
      </form>
</div>
    
@stop