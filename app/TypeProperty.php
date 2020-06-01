<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class TypeProperty
 * @package App
 * @property integer $id
 * @property integer $type_id
 * @property integer $property_id
 * @property integer $from
 * @property integer $to
 * @property string $created_at
 * @property string $updated_at
 */
class TypeProperty extends Model
{
    protected $fillable = [
        'type_id',
        'property_id',
        'from',
        'to'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
