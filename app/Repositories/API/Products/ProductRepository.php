<?php

namespace App\Repositories\API\Products;


use App\Models\Product;
use Illuminate\Support\Str;
use App\Services\DTO\Products\CreateProductDto;
use App\Services\DTO\Products\EditProductDto;

class ProductRepository
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function create(CreateProductDto $data)
    {
        $storage = [
            'name' => $data->name,
            'uuid' => Str::uuid()->toString(),
            "price" => $data->price,
            "active" => $data->active,
            "code" => $data->code,
            "quantity" => $data->quantity,
            "category_id" => $data->category_id,
        ];
        return $this->product->create($storage);
    }

    public function get($uuid)
    {
        return $this->product->where('uuid', '=', $uuid)->firstOrFail();
    }

    public function edit(EditProductDto $data)
    {
        $product = $this->get($data->uuid);

        $storage = [
            'name' => $data->name,
            "price" => $data->price,
            "active" => $data->active,
            "code" => $data->code,
            "quantity" => $data->quantity,
            "category_id" => $data->category_id,
        ];
        $product->fill($storage);
        $product->save();
        return $product;
    }
}
