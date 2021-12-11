<?php

namespace App\Http\Controllers;

use App\Domain\Product\Models\Product;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Контроллер для управления товарами.
 */
class ProductController extends Controller
{
    public function list()
    {
        return Product::query()
            ->orderBy('price')
            ->get();
    }

    public function info($id)
    {
        $product = Product::query()
            ->where(['id' => $id])
            ->first();

        if ($product === null) {
            throw new NotFoundHttpException('Товар не найден');
        }

        return $product;
    }
}