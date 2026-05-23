<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'student_name', 'roll_no', 'email', 'phone', 'department',
        'semester', 'category', 'priority', 'subject', 'description', 'status'
    ];
}
