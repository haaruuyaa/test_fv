<?php


namespace App\Repository\Interfaces;


use App\Model\Items;

interface ItemsInterface
{
    public function all();

    public function getItem($id);

    public function addItem($item);

    public function updateItem($newItem,Items $item);

    public function deleteItem($id);

    public function markItemAsSold($id);
}
