<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'abbreviation',
        'name',
        'campus_id',
        'description',
    ];

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campuses::class, 'campus_id');
    }
}
