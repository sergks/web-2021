<?php

namespace App\Domain\Cart\Services;

use App\Domain\Cart\Models\Cart;
use App\Domain\Cart\Models\CartProduct;
use App\Domain\Product\Models\Product;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartService
{
    /**
     * Добавляет товар в корзину.
     * @param $productId
     * @param $count
     */
    public function addToCart($productId, $count)
    {
        $product = Product::query()
            ->where(['id' => $productId])
            ->first();

        if ($product === null) {
            throw new NotFoundHttpException('Товар не найден.');
        }

        $cart = $this->getCart();

        CartProduct::create([
            'cartId' => $cart->id,
            'productId' => $product->id,
            'count' => $count
        ]);

        // пересчитываем корзину
        $this->calculate($cart);
    }

    /**
     * Возвращает модель корзины.
     * @return Cart
     */
    public function getCart()
    {
        $cart = Cart::query()->first();

        if ($cart === null) {
            $cart = Cart::create([
                'total' => 0,
                'count' => 0
            ]);
        }

        return $cart;
    }

    /**
     * @param Cart $cart
     */
    protected function calculate($cart)
    {
        /** @var $list CartProduct[] */
        $list = CartProduct::query()
            ->with(['product'])
            ->where(['cartId' => $cart->id])
            ->get();

        $total = 0;
        $count = 0;

        foreach ($list as $item) {
            $total += $item->product->price * $item->count;
            $count += $item->count;
        }

        $cart->total = $total;
        $cart->count = $count;
        $cart->save();
    }
}