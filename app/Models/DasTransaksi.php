<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class DasTransaksi extends Model
{
    use HasFactory,AutoNumberTrait;
    protected $guarded = ["id"];
    protected $table = 'das_transaksis';
    protected $fillable = [
        'user_id',
        'lapangan_id',
        'kode',
        'jam_pesan_awal',
        'jam_pesan_akhir',
        'bukti_bayar',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getAutoNumberOptions()
{
    return [
        'kode' => [
            'format' => function () {
                return 'PSN/' . date('Y.m.d') . '/INV/?'; 
            },
            'length' => 5,
        ]
    ];
}

public function user()
{
    return $this->belongsTo(User::class);
}

}