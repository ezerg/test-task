<?php
declare(strict_types=1);

namespace App\Services\MicroServices\Converter;

use App\Entity\Services\ServiceInterface;
use App\Services\MicroServices\ServiceConverterInterface;

/**
 * Class GRPCConverter
 * @package App\Services\MicroServices\Converter
 */
class GRPCConverter implements ServiceConverterInterface
{
    /** @var ServiceInterface */
    private ServiceInterface $service;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(
        ServiceInterface $service
    ) {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->service->getName();
    }

    /**
     * @param array $data
     * @return ServiceInterface
     * @throws \Exception
     */
    public function convertDataToService(array $data): ServiceInterface
    {
        $service =  $this->service;

        try {
            if (isset($data['field1'])) {
                $service->setField1($this->validateString($data['field1']));
            }

            if (isset($data['field2'])) {
                $service->setField2($this->validateBoolean($data['field2']));
            }

            if (isset($data['field3'])) {
                $service->setField3($this->validateInt($data['field3']));
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $service;
    }

    /**
     * @param mixed $value
     * @return string
     * @throws \Exception
     */
    private function validateString($value): string
    {
        $validatedValue = $value;

        if (!is_string($validatedValue)) {
            $validatedValue = (string) $value;
            if ($validatedValue != $value) {
                throw new \Exception('Wrong type format.');
            }
        }

        return $validatedValue;
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws \Exception
     */
    private function validateBoolean($value = null): bool
    {
        $validatedValue = $value ?? false;

        if (!is_bool($validatedValue)) {
            $validatedValue = (bool) $value;
            if ($validatedValue != $value) {
                throw new \Exception('Wrong type format.');
            }
        }

        return $validatedValue;
    }

    /**
     * @param $value
     * @return int
     * @throws \Exception
     */
    private function validateInt($value): int
    {
        $validatedValue = (int) $value;

        if ($validatedValue != $value) {
            throw new \Exception('Wrong type format.');
        }

        return $validatedValue;
    }
}
