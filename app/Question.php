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
 */
class Question extends Model
{
    protected $fillable = [
        'id',
        'title',
        'property_id'
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answers::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
