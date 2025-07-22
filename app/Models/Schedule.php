<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $start
 */
class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'title',
        'description',
        'start'
    ];

    public $timestamps = false;
}