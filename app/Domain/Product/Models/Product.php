<?php

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $image
 */
class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'image'
    ];
}