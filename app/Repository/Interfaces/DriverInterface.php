<?php


namespace App\Repository\Interfaces;


use App\Model\Drivers;

interface DriverInterface
{
    public function all();

    public function getDriver($id);

    public function addDriver($driver);

    public function updateDriver($newDriver,Drivers $driver);

    public function deleteDriver($id);

    public function listCustomDriver();
}
