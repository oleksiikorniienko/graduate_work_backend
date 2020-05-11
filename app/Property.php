<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * @package App
 * @property integer $id
 * @property string $title
 */
class Property extends Model
{
    protected $fillable = [
        'id',
        'title',
        'property_id',
    ];
}
