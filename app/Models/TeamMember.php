<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property string $role
 * @property string $status
 * @property string $invited_at
 */
class TeamMember extends Model
{
    protected $table = 'team_members';

    protected $fillable = [
        'team_id',
        'user_id',
        'role',
        'status',
        'invited_at'
    ];

    public $timestamps = false;

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tim
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'team_id');
    }
}