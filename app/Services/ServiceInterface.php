<?php

namespace App\Services;

use App\Services\Dto\DtoInterface;

interface ServiceInterface
{

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface;
    /**
     * @return bool
     */
    public function execute(): bool;
}
