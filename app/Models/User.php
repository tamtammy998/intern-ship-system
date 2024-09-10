<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'courses_id',
        'completion',
        'campus_id',
        'intern_start',
        'mname',
        'fname',
        'ccontact',
        'email',
        'contact',
        'password',
        'usertype',
    ];


 // User.php
    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campuses::class, 'campus_id');
    }

    public function programs(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'courses_id'); // Assuming 'courses_id' refers to Program's 'id'
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
}
