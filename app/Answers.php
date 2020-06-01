<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Answers
 * @package App
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property integer $question_id
 * @property string $created_at
 * @property string $updated_at
 */
class Answers extends Model
{
    protected $fillable = [
        'title',
        'value',
        'question_id'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
