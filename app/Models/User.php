<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaksi()
    {
        return $this->hasMany(DasTransaksi::class);
    }
    public function keluhan()
    {
        return $this->hasMany(DasKeluhan::class);
    }
    public function massage()
    {
        return $this->hasMany(DasMassage::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function alamatLengkap(){
        return $this->hasOne(AlamatLengkap::class,"user_id","id");
    }
}
