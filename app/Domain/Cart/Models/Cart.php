<?php

namespace App\Domain\Cart\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $total
 * @property int $count
 */
class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'total',
        'count'
    ];
}