<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;

    protected $table = "student_master";

    protected $fillable = ['student_f_name','student_m_name', 'student_l_name', 'student_state','student_city','gender','profile_photo_link'];
}
