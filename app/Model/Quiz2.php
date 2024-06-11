<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz2 extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'quiz2';
    protected $connection  = 'mysql';


    // The attributes that are mass assignable
    protected $fillable = [
        'question',
        'answer',
        'option1',
        'option2',
        'option3'
    ];
}

