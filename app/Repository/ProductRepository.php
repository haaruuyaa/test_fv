<?php


namespace App\Repository;


use App\Model\Product;
use App\Repository\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{

    /*
     * Return All Products
     */
    public function all()
    {
        return Product::all();
    }


    /*
     * Return specific Product by Product ID
     */
    public function getProduct($id)
    {
        return Product::find($id);
    }

    /*
     *  Add new product
     */
    public function addProduct($product): void
    {
        Product::create($product);
    }

    public function updateProduct($newProduct,Product $product)
    {
        $product->update($newProduct);
    }

    public function deleteProduct($id)
    {
        Product::destroy($id);
    }

    public function updateQty($newQty,Product $product)
    {
        $product->product_qty = $newQty;
        $product->update();
    }
}
