<?php

namespace App\Models;

<<<<<<< HEAD
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
    
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD

class User extends Authenticatable
{
    use HasFactory, Notifiable;
=======
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
>>>>>>> efb363e (initial value)

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array<int, string>
>>>>>>> efb363e (initial value)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username', // Menambahkan kolom username
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var list<string>
=======
     * @var array<int, string>
>>>>>>> efb363e (initial value)
     */
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    protected $hidden = [
        'password',
        'remember_token',
    ];
<<<<<<< HEAD
    
    protected $casts = [
        'is_first_login' => 'boolean',
    ];
    
    public $timestamps = false;
    
    public function getAuthPassword()
    {
        return $this->password;
    }
}
=======

    /**
<<<<<<< HEAD
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
=======
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
>>>>>>> efb363e (initial value)
}
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
