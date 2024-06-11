<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $connection  = 'mysql';
    protected $fillable = [
        'title'
    ];

    public function questions()
    {
        return $this->hasMany('App\Model\Question', 'examId', 'id')->orderBy('order');
    }
}
