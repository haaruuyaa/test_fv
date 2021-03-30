<?php


namespace App\Repository;


use App\Model\Items;
use App\Repository\Interfaces\ItemsInterface;

class ItemsRepository implements ItemsInterface
{
    public function all()
    {
        return Items::all();
    }

    public function getItem($id)
    {
        return Items::find($id);
    }

    public function addItem($items)
    {
        Items::create($items);
    }

    public function updateItem($newItem, Items $items)
    {
        $items->update($newItem);
    }

    public function deleteItem($id)
    {
        Items::destroy($id);
    }

    public function markItemAsSold($orderId)
    {
           $itemModel = Items::whereNull('order_id')
               ->first();

           $itemModel->order_id = $orderId;
           $itemModel->update();
    }

}
