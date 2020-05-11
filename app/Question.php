<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function property(): HasOne
    {
        return $this->hasOne(Property::class);
    }
}
