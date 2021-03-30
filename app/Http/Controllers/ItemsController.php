<?php

namespace App\Http\Controllers;

use App\Contracts\LogInterface;
use App\Model\Sequence;
use App\Repository\Interfaces\ItemsInterface;
use App\Repository\Interfaces\SequenceInterface;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    private $items;
    private $request;
    private $log;
    private $sequence;

    public function __construct(Request $request, ItemsInterface $items,LogInterface $log,SequenceInterface $sequence)
    {
        $this->items = $items;
        $this->request = $request;
        $this->log = $log;
        $this->sequence = $sequence;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->log->startLog();

        $items = $this->items->all();

        $this->log->endLog($items);

        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $this->log->startLog();

        $sequence = $this->sequence->getSequence('items');

        $padded = 'AB' . str_pad(($sequence->last_id + 1), $sequence->postfix_length, '0', STR_PAD_LEFT);

        $arrayAll = $this->request->all();

        $arrayAll['id'] = $padded;

        $this->items->addItem($arrayAll);

        $this->sequence->updateSequence($sequence);

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

        $item = $this->items->getItem($id);

        return response()->json($item);
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

        $itemModel = $this->items->getItem($id);

        $this->items->updateItem($this->request->all(), $itemModel);

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

        $this->items->deleteItem($id);

        return response('Deleted');
    }
}
