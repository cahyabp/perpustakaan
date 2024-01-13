<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'tanggal_pinjam', 'tanggal_pengembalian'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
