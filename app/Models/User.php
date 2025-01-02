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
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'ic_num',
        'address',
        'tel_num',
        'residency_stat',
        'age',
        'house_num',
        'registration_date',
        'is_admin',
        'No_Ahli', // Added No_Ahli to fillable
        'payment_status',
        'transaction_id',
        'bill_code',
    ];

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
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Automatically generate the next No_Ahli for new users
            $lastNoAhli = static::max('No_Ahli'); // Get the highest No_Ahli
            $nextNoAhli = str_pad((int) $lastNoAhli + 1, 4, '0', STR_PAD_LEFT); // Generate the next No_Ahli
            $user->No_Ahli = $nextNoAhli; // Assign it to the user
        });
    }

    /**
     * Get the dependents associated with the user.
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'No_Ahli'); // Assuming 'No_Ahli' is the foreign key in the dependents table
    }
}
