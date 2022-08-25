<?php

namespace App\Services\DTO;

use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

abstract class AbstractDto
{
    /**
     * AbstractRequestDto constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        // Set rules for validation data
        $validator = Validator::make(
            $data,
            $this->configureValidatorRules(),
            $this->configureValidatorMessages(),
        );

        // Throw exception if validation is fail
        if ($validator->fails()) {
            throw new InvalidArgumentException(
                implode(',', $validator->errors()->all())
            );
        }

        // The data is valid.
        if (!$this->map($data)) {
            throw new InvalidArgumentException('The mapping failed');
        }
    }

    /* @return array */
    abstract protected function configureValidatorRules(): array;

    /* @return array */
    abstract protected function configureValidatorMessages(): array;

    /**
     * @param array $data
     * @return bool
     */
    abstract protected function map(array $data): bool;
}
