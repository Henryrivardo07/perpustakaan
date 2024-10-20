@extends('layouts.master')

@section('title')
    <h1>Update Category</h1>
@endsection

@section('content')
    <a href="/category" class="btn btn-primary">Kembali</a>
    @extends('layouts.master')

@section('title')
    <h1>Edit Kategori</h1>
@endsection

@section('content')
<form action="/category/{{ $category->id }}" method="Post">
    @method('put')
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
      <input type="text" value="{{ $category->name }}" class="form-control" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@endsection