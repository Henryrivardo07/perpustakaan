@extends('layouts.master')

@section('title')
    <h1>List Buku</h1>
@endsection

@section('content')
<div class="row">
        @forelse ($books as $item)
    <div class="col-4">
        <div class="card">
                <img class="card-img-top" src="{{asset('uploads/'. $item->image)}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->title }}</h5>
                   <p class="card-text">{{ Str::limit($item->summary, 10,'...') }}</p>
                    <a href="{{ route('books.show', $item->id) }}" class="btn btn-primary">Read More</a>
                    <div class="row my-2">
                        <div class="col">
                            <a href="/books/{{ $item->id }}/edit" class="btn btn-info btn-block">Edit</a>
                        </div>
                        <div class="col">
                            <form action="/books/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @empty
    <p>Tidak ada data</p>
    @endforelse
</div>
    <a href="/books/create" class="btn btn-primary">Add Books</a>
@endsection