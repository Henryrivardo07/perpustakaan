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
                    <p><strong>Stock:</strong> {{ $books->stock }}</p>
                    <p><strong>Kategori:</strong> {{ optional($books->category)->name ?? 'Kategori tidak tersedia' }}</p>
                    <!-- Form untuk Peminjaman Buku -->
                    <form action="{{ route('loan.store', $books->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Pinjam Buku</button>
                    </form>
                    
                    <!-- Jika ada pesan sukses -->
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="/books" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
