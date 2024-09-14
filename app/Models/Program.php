<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'abbreviation',
        'name',
        'campus_id',
        'description',
    ];

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campuses::class, 'campus_id');
    }

    public function intern(): HasMany
    {
        return $this->hasMany(User::class, 'courses_id', 'id');
    } 
}
