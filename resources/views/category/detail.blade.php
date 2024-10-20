@extends('layouts.master')

@section('title')
    <h1>Detail Category</h1>
@endsection

@section('content')
    <a href="/category" class="btn btn-primary">Kembali</a>
    <h1>{{$category->name}}</h1>
@endsection