<?php

namespace App\Http\Controllers;

use App\Contracts\LogInterface;
use App\Repository\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    private $request;
    private $log;

    public function __construct(Request $request, ProductInterface $product,LogInterface $log)
    {
        $this->product = $product;
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
        $this->log->startLog();

        $products = $this->product->all();

        $this->log->endLog($products);

        return $products;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $this->log->startLog();

        $this->product->addProduct($this->request->all());

        return response('OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->log->startLog();

        $product = $this->product->getProduct($id);

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $this->log->startLog();

        $productModel = $this->product->getProduct($id);

        $this->product->updateProduct($this->request->all(), $productModel);

        return response('OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->log->startLog();

        $this->product->deleteProduct($id);

        return response('Deleted');
    }
}
