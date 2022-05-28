<?php
declare(strict_types=1);

namespace App\Services\MicroServices;

use App\Entity\Services\ServiceInterface;

/**
 * Class ServiceManager
 * @package App\Services\MicroServices
 */
class ServiceManager 
{
    /** @var ServiceDAOInterface[] */
    private $services;

    /**
     * @param ServiceDAOInterface[] $services
     */
    public function __construct(array $services)
    {
        $this->services = $services;
    }

    /**
     * @return ServiceInterface[]
     */
    public function loadServices(): array
    {
        $resultServices = [];
        foreach ($this->services as $serviceDao) {
            $loadedService = $serviceDao->loadService();
            $resultServices[$loadedService->getName()] = $loadedService;
        }

        return $resultServices;
    }

    /**
     * @param ServiceInterface $service
     * @return void
     */
    public function saveServices(ServiceInterface $service)
    {
        /** @var ServiceDAOInterface $service */
        foreach ($this->services as $serviceDao) {
           if ($service->getName() === $serviceDao->getServiceName()) {
               $serviceDao->saveService($service);
           }
        }
    }
}
