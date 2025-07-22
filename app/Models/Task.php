<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $deadline
 * @property string $status
 * @property string|null $deskripsi
 * @property int $member_id
 * @property string|null $submission_text
 * @property string|null $submission_file
 */
class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'nama',
        'deadline',
        'status',
        'deskripsi',
        'member_id',
        'submission_text',
        'submission_file'
    ];

    public $timestamps = false;

    // Relasi ke user / member
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
}