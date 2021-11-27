<?php

namespace App\Domain\Cart\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cartId
 * @property int $productId
 * @property int $count
 *
 * @property Product $product
 */
class CartProduct extends Model
{
    protected $table = 'carts_products';

    protected $fillable = [
        'cartId',
        'productId',
        'count'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'productId');
    }
}