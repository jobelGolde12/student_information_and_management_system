<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'phone_number',
        'email',
        'password',
        'enrollment_status',
        'student_year',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
