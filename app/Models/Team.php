<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $team_id
 * @property string $name
 * @property int $created_by
 * @property string $created_at
 */
class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'team_id';

    protected $fillable = [
        'name',
        'created_by',
        'created_at'
    ];

    public $timestamps = false;

    // Relasi ke user pembuat
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi ke anggota tim
    public function members()
    {
        return $this->hasMany(TeamMember::class, 'team_id', 'team_id');
    }
}