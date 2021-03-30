<?php


namespace App\Repository\Interfaces;


use App\Model\Product;

interface ProductInterface
{
    public function all();

    public function getProduct($id);

    public function addProduct($product);

    public function updateProduct($newProduct,Product $product);

    public function deleteProduct($id);

    public function updateQty($newQty,Product $product);
}
