<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answers
 * @package App
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property integer $question_id
 */
class Answers extends Model
{
    protected $fillable = [
        'id',
        'title',
        'value',
        'question_id'
    ];
}
