<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyCount extends Model
{
    protected $table = 'copy_counts';


    protected $fillable = ['template', 'quizContent', 'action'];
}
