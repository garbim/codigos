<?php

namespace App\Http\Controllers\API\Products;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Services\API\Products\ProductService;

class ProductController extends BaseController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $success = $this->productService->getAll();

            return $this->sendResponse($success, 'Product list successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Product list error.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $success = $this->productService->create($request->all());

            return $this->sendResponse($success, 'Product register successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Product register error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            $success = $this->productService->get($uuid);

            return $this->sendResponse($success, 'Product show successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Product show error.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $uuid)
    {
        try {
            $success = $this->productService->edit($request->all(), $uuid);

            return $this->sendResponse($success, 'Product register successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Product register error.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
