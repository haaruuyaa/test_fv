<?php

namespace App\Http\Controllers;

use App\Contracts\LogInterface;
use App\Model\Order;
use App\Repository\Interfaces\ItemsInterface;
use App\Repository\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $request;
    private $productRepository;
    private $itemRepository;
    private $log;

    //
    public function __construct(Request $request,ProductInterface $productRepository,ItemsInterface $itemRepository,LogInterface $log)
    {
        $this->request = $request;
        $this->productRepository = $productRepository;
        $this->itemRepository = $itemRepository;
        $this->log = $log;
    }

    public function create_order()
    {
        /*
         * Find Product by Product ID selected
         */
        $this->log->startLog();

        $findProduct = $this->productRepository->getProduct($this->request->json('product_id'));

        $reqQty = $this->request->json('qty');


        /*
         * Check Quantity
         */

        if($reqQty <= 0)
        {
            return response('Qty must be more than 0',500);
        }

        if($findProduct->product_qty <= 0)
        {
            return response('Sold Out',500);
        }

        if($findProduct->product_qty < $reqQty)
        {
            return response('Stock Empty',500);
        }

        $amount = ($reqQty * $findProduct->product_price);

        $order = Order::create([
            'user' => $this->request->json('user'),
            'product_id' => $this->request->json('product_id'),
            'amount' => $amount,
            'qty' => $reqQty,
        ]);

        /*
         * Deduct Product Qty after add the order
         */

        $newQty = ($findProduct->product_qty - $this->request->qty);

        $this->productRepository->updateQty($newQty,$findProduct);

        /*
         * update item to bind to the order
         */

        for($i=0;$i<$reqQty;$i++)
        {
            $this->itemRepository->markItemAsSold($order->id);
        }

        $this->log->endLog($order);

        return response('Order Success');

    }
}
