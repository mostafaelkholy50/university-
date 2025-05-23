<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'Phone',
        'specialty',
        'section',
        'years',
        'image',
        'code',
        'code_created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
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
    public function contact()
    {
        return $this->hasMany(contact::class);
    }
    public function commentNews()
    {
        return $this->hasMany(CommentNews::class);
    }
    public function schedule()
    {
        return $this->hasMany(schedule::class);
    }
    public function grades()
    {
        return $this->hasMany(grades::class);
    }
    public function subjects()
    {
        return $this->hasMany(subjects::class);
    }
    public function enroll()
    {
        return $this->hasMany(enroll::class);
    }
    public function termOnePayments()
    {
        return $this->hasMany(term_one_payments::class);
    }
    public function termTwoPayments()
    {
        return $this->hasMany(term_two_payments::class);
    }
}
