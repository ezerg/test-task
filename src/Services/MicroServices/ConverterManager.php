<?php
declare(strict_types=1);

namespace App\Services\MicroServices;

use App\Entity\Services\ServiceInterface;

/**
 * Class ConverterManager
 * @package App\Services\MicroServices
 */
class ConverterManager 
{
    /** @var ServiceConverterInterface[] */
    private $converters;

    /**
     * @param ServiceConverterInterface[] $converters
     */
    public function __construct(array $converters)
    {
        $this->converters = $converters;
    }

    /**
     * @param array $data
     * @return ServiceInterface
     * @throws \Exception
     */
    public function getServiceConverted(array $data): ServiceInterface
    {
        try {
            foreach ($this->converters as $converter) {
                if (isset($data['name']) && $data['name'] === $converter->getName()) {
                    $service = $converter->convertDataToService($service, $data);
                }
            }

            if (!isset($service)) {
                throw new \Exception('No one service was converted. Please check data you provided.');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $service;
    }
}
