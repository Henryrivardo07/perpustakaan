<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function create(){
        return view('category.create');
    }
    public function store(Request $request){

        // dd($request->all()); Buat Test Data nya

        // Validation
         $request->validate([
            'name' => 'required|min:2',
        ]);

        // masukan data ke database
        DB::table('categories')->insert([
            'name' => $request->input( 'name')
        ]);

        // redirect ke halaman tampilkan
        return redirect('/category');
    }
    public function index(){
        $categories = DB::table('categories')->get();

        // dd($categories); buat test data

        // return view('category.category', ['categories' => $categories]); ARRAY ASOSIATIF
        return view('category.category', compact('categories'));
    }
    public function show($id){
    //    return $id; cek id

       $category = DB::table('categories')->where('id', $id)->first();
       return view('category.detail', compact('category'));
    }

    public function edit($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        DB::table('categories')->where('id', $id)->update([
            'name' => $request->input('name')
        ]);
        return redirect('/category');
    }

    public function destroy($id){
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/category');
    }
    
}