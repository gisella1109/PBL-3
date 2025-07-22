<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string|null $profile_image
 * @property string $display_username
 * @property bool $is_first_login
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'username',
        'password',
        'role',
        'profile_image',
        'display_username',
        'is_first_login',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'is_first_login' => 'boolean',
    ];
    
    public $timestamps = false;
    
    public function getAuthPassword()
    {
        return $this->password;
    }
}