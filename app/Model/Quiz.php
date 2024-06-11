<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'quiz';
    protected $connection  = 'mysql';


    // The attributes that are mass assignable
    protected $fillable = [
        'question',
        'exam_id',
        'answer',
        'option1',
        'option2',
        'option3'
    ];
    public function exam()
    {
        return $this->hasOne(Exam ::class, 'id', 'exam_id')
            ->withDefault(['name' => '']);
    }
}

