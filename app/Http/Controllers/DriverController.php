<?php

namespace App\Http\Controllers;

use App\Contracts\LogInterface;
use App\Repository\Interfaces\DriverInterface;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    private $driver;
    private $request;
    private $log;

    public function __construct(Request $request, DriverInterface $driver,LogInterface $log)
    {
        $this->driver = $driver;
        $this->request = $request;
        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->driver->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->log->startLog();

        $this->driver->addDriver($this->request->all());

        return response('OK', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->log->startLog();

        $driver = $this->driver->getDriver($id);

        return response()->json($driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $this->log->startLog();

        $driverModel = $this->driver->getDriver($id);

        $this->driver->updateDriver($this->request->all(), $driverModel);

        return response('OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->log->startLog();

        $this->driver->deleteDriver($id);

        return response('Deleted');
    }

    public function listCustomerDriver()
    {
        return $this->driver->listCustomDriver();
    }
}
