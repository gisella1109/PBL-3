<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'nama',
        'tanggal',
        'status',
        'foto',
        'member_id'
    ];

    public $timestamps = true; // created_at & updated_at otomatis

    // Relasi ke user/member
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}