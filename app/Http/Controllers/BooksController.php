<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();

        return view('books.tampil', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.tambah', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'title' => 'required',
            'summary' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required',
            'category_id' => 'exists:categories,id',
        ]);

        $newNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $newNameImage);

        $books = new Books();

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->image = $newNameImage;
        $books->stock = $request->input('stock');
        $books->category_id = $request->input('category_id');

        $books->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);

        return view('books.detail', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $books = Books::find($id);

        return view('books.edit', compact('books', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
        $request->validate([ 
            'title' => 'required',
            'summary' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required',
            'category_id' => 'exists:categories,id',
        ]);

        $books = Books::find($id);

       if($request->hasFile('image')){
        //hapus file lama
        File::delete('uploads/'. $books->image);

        //masukan gambar bary
        $newNameImage = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $newNameImage);
        $books->image = $newNameImage;
       }

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stock = $request->input('stock');
        $books->category_id = $request->input('category_id');

        $books->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        //cek apakah ada gambar lalu dihapus
        if($books->image)
        {
            
            File::delete('uploads/'. $books->image);
        }
        $books->delete();
        return redirect('/books');
    }
}
