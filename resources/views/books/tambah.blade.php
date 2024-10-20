@extends('layouts.master')

@section('title')
    <h1>Tambah Buku</h1>
@endsection

@section('content')
<form action="/books" method="POST" enctype="multipart/form-data">
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
      <label>Book Name</label>
      <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label>Summary</label>
        <textarea name="summary" id="" cols="30" rows="10"></textarea>
    </div>

    <div>
        <label>Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div>
        <label for="">Stock</label>
        <input type="number" class="form-control" name="stock">
    </div>

    <div  class="form-group">
        <label>Category</label>
        <select name="category_id" id="" class="form-control">
            <option value="">Pilih kategori</option>
            @forelse ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                <option value="">Tidak ada kategori</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection