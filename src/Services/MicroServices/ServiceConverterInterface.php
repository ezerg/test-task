<?php
declare(strict_types=1);

namespace App\Services\MicroServices;

use App\Entity\Services\ServiceInterface;

/**
 * Interface ServiceConverterInterface
 * @package App\Services\MicroServices
 */
interface ServiceConverterInterface
{
    /**
     * @param array $data
     * @return ServiceInterface
     */
    public function convertDataToService(array $data): ServiceInterface;
}
