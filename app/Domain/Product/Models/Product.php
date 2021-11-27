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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'inCart' => false
        ];
    }
}