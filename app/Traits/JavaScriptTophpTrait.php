<?php

namespace App\Traits;


trait JavaScriptTophpTrait
{
    public function jsTophp($jsStringObject)
    {
        $products = [];
        foreach ($jsStringObject as $product) {
            $products[] = str_replace("'", '"', $product);
        }
        return $products;
    }
}
