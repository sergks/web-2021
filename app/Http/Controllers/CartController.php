<?php

namespace App\Http\Controllers;

use App\Domain\Cart\Models\Cart;
use App\Domain\Cart\Models\CartProduct;
use App\Domain\Cart\Services\CartService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    /**
     * Информаця о корзине.
     * @return Cart|Model
     */
    public function info()
    {
        return Cart::query()->first();
    }

    /**
     * Добавляет товар в корзину.
     * @param Request $request
     * @return array
     */
    public function addToCart(Request $request)
    {
        $id = $request->get('id');
        $count = $request->get('count', 1);

        $cart = Cart::query()
            ->first();

        $cartProduct = CartProduct::query()
            ->where(['cartId' => $cart->id, 'productId' => $id])
            ->first();

        if ($cartProduct === null) {
            $cartProduct = CartProduct::create([
                'cartId' => $cart->id,
                'productId' => $id,
                'count' => $count
            ]);
        } else {
            $cartProduct->count += $count;
            $cartProduct->save();
        }

        // расчёт корзины
        $total = 0;
        $count = 0;

        $cartProducts = CartProduct::query()
            ->where(['cartId' => $cart->id])
            ->get();

        foreach ($cartProducts as $cartProduct) {
            $count += $cartProduct->count;
            $total += $cartProduct->product->price;
        }

        $cart->total = $total;
        $cart->count = $count;
        $cart->save();

        return [
            'inCart' => true
        ];
    }
}