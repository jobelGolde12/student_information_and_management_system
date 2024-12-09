<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'subject_name'
    ];
}
