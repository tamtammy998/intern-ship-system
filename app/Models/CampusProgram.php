<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampusProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'campus_id',
        'program_id',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id','id');
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campuses::class, 'campus_id','id');
    }
}
