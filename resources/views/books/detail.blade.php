@extends('layouts.master')

@section('title')
    <h1 class="text-center my-4">Detail Buku</h1>
@endsection

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('uploads/' . $books->image) }}" class="card-img" alt="{{ $books->title }}" style="height: 100%; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $books->title }}</h2>
                    <p class="card-text">{{ $books->summary }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="/books" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
