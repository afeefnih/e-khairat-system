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
     * @var array<string>
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
        'No_Ahli', // Add No_Ahli only if you allow manual updates
        'payment_status',
        'transaction_id',
        'bill_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Boot method to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->No_Ahli) {
                $lastNoAhli = User::max('No_Ahli'); // Fetch the highest No_Ahli value
                $user->No_Ahli = str_pad((int) $lastNoAhli + 1, 4, '0', STR_PAD_LEFT); // Increment and pad
            }
        });
    }

    /**
     * Get the dependents associated with the user.
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'No_Ahli', 'No_Ahli');
    }
}
