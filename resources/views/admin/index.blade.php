@extends('template.admin')

@section('name')
  
  <h1 class="text-bold">Welcome {{ Auth::user()->name }}</h1>
@endsection