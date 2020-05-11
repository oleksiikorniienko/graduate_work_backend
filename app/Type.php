<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 * @package App
 * @property integer $id
 * @property string $title
 */
class Type extends Model
{
    protected $fillable = [
        'id',
        'title'
    ];
}
