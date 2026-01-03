<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;

    protected $guarded = [];

    // ✅ RELASI KE SUBJECT
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
