<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    // Nama tabel yang terhubung dengan model ini
    protected $table = 'books'; // Tidak wajib jika menggunakan konvensi Laravel

    // Kolom yang bisa diisi (mass-assignable)
    protected $fillable = ['title', 'summary', 'image', 'stock', 'category_id'];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke peminjaman
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
