<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $table = 'lapangans';
    protected $fillable = [
        'name',
        'jenis',
        'warna',
        'ukuran',
        'harga',
        'created_at',
        'updated_at',
    ];
}
