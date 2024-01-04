<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// import
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama_kategori','image'
    ];

    // method untuk tambah fitur Accessor
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/categories/' .$value),
        );
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
