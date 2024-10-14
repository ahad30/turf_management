<?php

namespace App\Services;

use App\Models\Product;

class CalculateProductPrice
{
    public function calculate($requestProducts)
    {

        $products = [];
        $subtotal = 0;

        foreach ($requestProducts as $stringProduct) {
            $inputProduct = json_decode($stringProduct);

            // find this product from database and add it to cart
            $product = Product::find($inputProduct->id);
            $products[$product->id]['name'] = $product->name;
            $products[$product->id]['quantity'] = $inputProduct->quantity;
            $subtotal += $product->price * $inputProduct->quantity;
        }
        return [
            'products' => $products,
            'subtotal' => $subtotal
        ];
    }
}
