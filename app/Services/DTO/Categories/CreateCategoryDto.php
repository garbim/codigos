<?php

namespace App\Services\DTO\Categories;


use App\Services\DTO\AbstractDto;
use App\Services\DTO\DtoInterface;

class CreateCategoryDto extends AbstractDto implements DtoInterface
{

    /* @var string */
    public $name;

    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|unique:categories,name',
        ];
    }

    /* @return array */
    protected function configureValidatorMessages(): array
    {
        return [
            'name.required' => "The name field is required.",
            'name.unique' => "The name must by unique.",
        ];
    }


    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        return true;
    }
}
