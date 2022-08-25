<?php

namespace APP\Services\API\Products;

use App\Services\DTO\Products\CreateProductDto;
use App\Services\DTO\Products\EditProductDto;
use App\Repositories\API\Products\ProductRepository;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function create(array $data)
    {
        try {
            $data = new CreateProductDto($data);
            $product = $this->productRepository->create($data);
            $success['data'] =  $product;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(array $data, $uuid)
    {
        try {
            $data['uuid'] = $uuid;
            $data = new EditProductDto($data);
            $product = $this->productRepository->edit($data);
            $success['data'] =  $product;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAll()
    {
        try {
            $categories = $this->productRepository->getAll();
            $success['data'] = $categories;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get($uuid)
    {
        try {
            $categories = $this->productRepository->get($uuid);
            $success['data'] = $categories;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
