<?php


namespace App\Repository;


use App\Model\Drivers;
use App\Repository\Interfaces\DriverInterface;
use Illuminate\Support\Facades\DB;

class DriverRepository implements DriverInterface
{
    public function all()
    {
        return Drivers::all();
    }

    public function getDriver($id)
    {
        return Drivers::find($id);
    }

    public function addDriver($driver)
    {
        Drivers::create($driver);
    }

    public function updateDriver($newDriver, Drivers $driver)
    {
        $driver->update($newDriver);
    }

    public function deleteDriver($id)
    {
        Drivers::destroy($id);
    }

    public function listCustomDriver()
    {
        return DB::select(DB::raw("select d.driver_id                                                           as driver_id,
                                       COUNT(CASE WHEN (state = 'COMPLETED') THEN 1 END)                     as number_of_completed_rides,
                                       COUNT(CASE WHEN (state like 'CANCELLED%') THEN 1 END)                 as number_of_cancelled_rides,
                                       COUNT(DISTINCT CASE WHEN (state = 'COMPLETED') THEN passenger_id END) as number_of_unique_passengers,
                                       SUM(CASE WHEN state = 'COMPLETED' THEN b.fare END) as total_fare,
                                       SUM(CASE WHEN state = 'COMPLETED' THEN ROUND((b.fare * 20)/100,2) END) as total_commission
                                from bookings as b
                                         join drivers d on b.driver_id = d.driver_id
                                where (email like 'fvdrive%' or email like 'fvtaxi%')
                                group by b.driver_id"));

    }

}
