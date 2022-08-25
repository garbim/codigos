<?php

namespace APP\Services\API\Categories;

use App\Services\DTO\Categories\CreateCategoryDto;
use App\Services\DTO\Categories\EditCategoryDto;
use App\Repositories\API\Categories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function create(array $data)
    {
        try {
            $data = new CreateCategoryDto($data);
            $category = $this->categoryRepository->create($data);
            $success['data'] =  $category;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(array $data, $uuid)
    {
        try {
            $data['uuid'] = $uuid;
            $data = new EditCategoryDto($data);
            $category = $this->categoryRepository->edit($data);
            $success['data'] =  $category;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAll()
    {
        try {
            $categories = $this->categoryRepository->getAll();
            $success['data'] = $categories;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get($uuid)
    {
        try {
            $categories = $this->categoryRepository->get($uuid);
            $success['data'] = $categories;
            return $success;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
