<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorModel extends Model
{

    protected $table = 'instructors';
    protected $fillable = [
        'dateofbirth',
        'phonenumber',
        'gender',
        'instructor_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
