<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $due_date
 * @property string $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $assignee
 */
class Meeting extends Model
{
    protected $table = 'meetings';

    protected $fillable = [
        'name',
        'due_date',
        'status',
        'created_by',
        'assignee'
    ];

    // Aktifkan timestamps jika created_at/updated_at memang otomatis
    public $timestamps = true;

    // Relasi ke User (pembuat)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi ke Team (assignee)
    public function team()
    {
        return $this->belongsTo(Team::class, 'assignee', 'team_id');
    }
}