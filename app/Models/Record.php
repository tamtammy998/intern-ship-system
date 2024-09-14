<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'campus_id',
        'courses_id',
        'hours',
        'document_name',
        'date_from',
        'date_to',
        'document_size',
        'document_extension',
        'status',
        'remarks',
        'document_path'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campuses::class, 'campus_id');
    }

    public function programs(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'courses_id'); // Assuming 'courses_id' refers to Program's 'id'
    }


}
