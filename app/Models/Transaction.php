<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getDendaAttribute()
    {
        $batasPengembalian = Carbon::createFromFormat('d/m/Y', $this->attributes['batas_pengembalian']);

        if ($batasPengembalian->isPast()) {
            // Calculate penalty logic here, e.g., Rp. 5.000.00
            return 'Rp. 5.000.00';
        } else {
            return '-';
        }
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
