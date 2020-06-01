<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Question
 * @package App
 * @property integer $id
 * @property integer $title
 * @property integer $property_id
 * @property string $created_at
 * @property string $updated_at
 */
class Question extends Model
{
    protected $fillable = [
        'title',
        'property_id'
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answers::class, 'question_id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
