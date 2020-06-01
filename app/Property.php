<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Property
 * @package App
 * @property integer $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class Property extends Model
{
    protected $fillable = [
        'title',
    ];

    public function typeProperties(): HasMany
    {
        return $this->hasMany(TypeProperty::class, 'property_id');
    }
}
