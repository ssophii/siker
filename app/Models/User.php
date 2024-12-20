<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Anggota;
use App\Models\RiwayatPemasukkan;
use App\Models\RiwayatPengeluaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'npm',
        'name',
        'password',
        'role',
    ];

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'npm_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function riwayatPemasukkan()
    {
        return $this->hasMany(RiwayatPemasukkan::class);
    }

    public function riwayatPengeluaran()
    {
        return $this->hasMany(RiwayatPengeluaran::class);
    }
}
