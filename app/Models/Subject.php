<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Material;
use App\Models\ClassName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;



    protected $guarded = [];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function className()
    {
        return $this->belongsTo(ClassName::class, 'class_id');
    }


}
