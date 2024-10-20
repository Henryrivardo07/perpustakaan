@extends('layouts.master')

@section('title')
    <h1>Category Buku</h1>
@endsection

@section('content')
<a href="/category/create" class="btn btn-primary">Add Category</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        {{-- Looping for else --}}
    @forelse ($categories as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->name}}</td>
            <td>
                <form action="/category/{{ $item->id }}" method="post">
                    <a href="/category/{{ $item->id }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/category/update/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a> 
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
    <p>No users</p>
        @endforelse
    </tbody>
  </table>
@endsection