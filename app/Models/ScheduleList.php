<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $start_datetime
 * @property string $end_datetime
 * @property int $assignee
 * @property string $status
 */
class ScheduleList extends Model
{
    protected $table = 'schedule_list';

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'assignee',
        'status'
    ];

    public $timestamps = false;

    // Relasi ke user yang diassign
    public function assigneeUser()
    {
        return $this->belongsTo(User::class, 'assignee');
    }
}
