<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Type
 * @package App
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image_link
 * @property string $created_at
 * @property string $updated_at
 */
class Type extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_link'
    ];

    public function typeProperties(): HasMany
    {
        return $this->hasMany(TypeProperty::class, 'type_id');
    }
}
