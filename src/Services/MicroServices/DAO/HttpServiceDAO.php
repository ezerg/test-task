<?php
declare(strict_types=1);

namespace App\Services\MicroServices\DAO;

use App\Services\MicroServices\ServiceDAOInterface;
use App\Entity\Services\ServiceInterface;

/**
 * Class HttpServiceDAO
 * @package App\Services\MicroServices\ServiceDAO
 */
class HttpServiceDAO implements ServiceDAOInterface
{
    /** @var ServiceInterface */
    private ServiceInterface $service;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->service->getName();
    }

    /**
     * @return ServiceInterface
     */
    public function loadService(): ServiceInterface
    {
        return $this->service;
    }

    /**
     * @param ServiceInterface $service
     * @return void
     */
    public function saveService(ServiceInterface $service)
    {
        $this->service = $service;
    }
}
