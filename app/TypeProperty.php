<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class TypeProperty
 * @package App
 * @property integer $id
 * @property integer $type_id
 * @property integer $property_id
 * @property integer $from
 * @property integer $to
 */
class TypeProperty extends Model
{
    protected $fillable = [
        'id',
        'type_id',
        'property_id',
        'from',
        'to'
    ];

    public function type(): HasOne
    {
        return $this->hasOne(Type::class);
    }

    public function property(): HasOne
    {
        return $this->hasOne(Property::class);
    }
}
