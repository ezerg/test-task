<?php
declare(strict_types=1);

namespace App\Services\MicroServices;

use App\Entity\Services\ServiceInterface;

/**
 * Interface ServiceDAOInterface
 * @package App\Services\MicroServices
 */
interface ServiceDAOInterface
{
    /**
     * @return ServiceInterface
     */
    public function loadService(): ServiceInterface;

    /**
     * @param ServiceInterface $service
     * @return void
     */
    public function saveService(ServiceInterface $service);
}
