@extends('layout.master')
@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">{{ session('success') }}</h4>
      <p></p>
      <p class="mb-0"></p>
    </div>
    @endif
    <h1>Admin</h1>
@stop