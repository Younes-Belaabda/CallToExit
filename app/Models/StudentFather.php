<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFather extends Model
{
    use HasFactory;

    protected $table = 'student_father';

    protected $fillable = ['father_id' , 'student_id'];

    public function student(){
        return $this->belongsTo(User::class , 'student_id');
    }

    public function father(){
        return $this->belongsTo(User::class , 'father_id');
    }
}
