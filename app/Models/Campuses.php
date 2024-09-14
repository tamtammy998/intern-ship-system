<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'location',
        'president',
        'description',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'id','campus_id');
    }

}
