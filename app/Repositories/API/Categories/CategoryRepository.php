<?php

namespace App\Repositories\API\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Services\DTO\Categories\CreateCategoryDto;
use App\Services\DTO\Categories\EditCategoryDto;


class CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function create(CreateCategoryDto $data)
    {
        $storage = ['name' => $data->name, 'uuid' => Str::uuid()->toString()];
        return $this->category->create($storage);
    }

    public function get($uuid)
    {
        return $this->category->where('uuid', '=', $uuid)->firstOrFail();
    }

    public function edit(EditCategoryDto $data)
    {
        $category = $this->get($data->uuid);

        $storage = ['name' => $data->name];
        $category->fill($storage);
        $category->save();
        return $category;
    }
}
