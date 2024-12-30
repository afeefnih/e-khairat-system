<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['full_name', 'email', 'password', 'ic_num', 'address', 'tel_num', 'residency_stat', 'age', 'house_num', 'registration_date', 'is_admin'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
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

    /**
     * Get the dependents associated with the user.
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'No_Ahli'); // Assuming 'No_Ahli' is the foreign key in dependents table
    }
}
