<?php

namespace App\Services\DTO\Products;


use App\Services\DTO\AbstractDto;
use App\Services\DTO\DtoInterface;

class EditProductDto extends AbstractDto implements DtoInterface
{

    /* @var string */
    public $name;
    public $uuid;
    public $price;
    public $active;
    public $quantity;
    public $code;
    public $category_id;
    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|unique:products,name',
            'price' => 'required|min:1',
            'active' => 'required|boolean',
            'quantity' => 'required|min:0',
            'code' => 'required',
            'category_id' => 'required'
        ];
    }

    /* @return array */
    protected function configureValidatorMessages(): array
    {
        return [
            'name.required' => "The name field is required.",
            'name.unique' => "The name must by unique.",
            'price.required' => "The price field is required.",
            'price.min' => "The price field min is 1.",
            'quantity.required' => "The quantity field is required.",
            'quantity.min' => "The quantity field min is 1.",
            'code.required' => "The code field is required.",
            'code.unique' => "The code must by unique.",
            'active.required' => "The active field is required.",
            'active.boolean' => "The active field must by boolean.",
            'category_id.required' => "The category_id field is required.",
        ];
    }


    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->uuid = $data['uuid'];
        $this->price = $data['price'];
        $this->active = $data['active'];
        $this->quantity = $data['quantity'];
        $this->code = $data['code'];
        $this->category_id = $data['category_id'];
        return true;
    }
}
