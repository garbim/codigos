<?php

namespace App\Services\DTO\Categories;


use App\Services\DTO\AbstractDto;
use App\Services\DTO\DtoInterface;

class EditCategoryDto extends AbstractDto implements DtoInterface
{

    /* @var string */
    public $name;

    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|unique:categories,name',
            'uuid' => 'required',
        ];
    }

    /* @return array */
    protected function configureValidatorMessages(): array
    {
        return [
            'name.required' => "The name field is required.",
            'name.unique' => "The name must by unique.",
            'uuid.required' => "The id field is required.",
        ];
    }


    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->uuid = $data['uuid'];
        return true;
    }
}
