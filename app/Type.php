<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Type
 * @package App
 * @property integer $id
 * @property string $title
 */
class Type extends Model
{
    protected $fillable = [
        'title'
    ];

    public function typeProperties(): HasMany
    {
        return $this->hasMany(TypeProperty::class);
    }
}
