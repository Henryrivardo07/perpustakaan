@extends('layouts.master')

@section('title')
    <h1>Tambah Kategori</h1>
@endsection

@section('content')
<form action="/category" method="POST">
    {{-- Validation --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Input FORM --}}
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection