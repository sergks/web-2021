<?php

namespace App\Http\Controllers;

use App\Domain\Cart\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    /**
     * Информаця о корзине.
     * @return \App\Domain\Cart\Models\Cart
     */
    public function info()
    {
        $service = new CartService();
        return $service->getCart();
    }

    /**
     * Добавляет товар в корзину.
     * @param Request $request
     * @return array
     */
    public function addToCart(Request $request)
    {
        $service = new CartService();
        $service->addToCart($request->get('id'), $request->get('count', 1));

        return [
            'inCart' => true
        ];
    }
}