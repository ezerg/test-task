<?php
declare(strict_types=1);

namespace App\Entity\Services;

/**
 * Class GRPCService
 * @package App\Entity\Services
 */
class GRPCService implements ServiceInterface
{
    public const SERVICE_NAME = 'grpc-service';

    private string $field1 = 'string';
    private bool $field2 = false;
    private int $field3 = 1;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::SERVICE_NAME;
    }

    /**
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @param string $field1
     */
    public function setField1(string $field1): void
    {
        $this->field1 = $field1;
    }

    /**
     * @return bool
     */
    public function getField2(): bool
    {
        return $this->field2;
    }

    /**
     * @param bool $field2
     */
    public function setField2(bool $field2): void
    {
        $this->field2 = $field2;
    }

    /**
     * @return int
     */
    public function getField3(): int
    {
        return $this->field3;
    }

    /**
     * @param int $field3
     */
    public function setField3(int $field3): void
    {
        $this->field3 = $field3;
    }
}
