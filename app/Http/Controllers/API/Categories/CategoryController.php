<?php

namespace App\Http\Controllers\API\Categories;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Services\API\Categories\CategoryService;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $success = $this->categoryService->getAll();

            return $this->sendResponse($success, 'Category list successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Category list error.');
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
            $success = $this->categoryService->create($request->all());

            return $this->sendResponse($success, 'Category register successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Category register error.');
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
            $success = $this->categoryService->get($uuid);

            return $this->sendResponse($success, 'Category show successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Category show error.');
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
            $success = $this->categoryService->edit($request->all(), $uuid);

            return $this->sendResponse($success, 'Category register successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 'Category register error.');
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
