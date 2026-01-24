<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassName extends Model
{
    /** @use HasFactory<\Database\Factories\ClassNameFactory> */
    use HasFactory;

     protected $table = 'class_names';

    protected $guarded = [];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
}
