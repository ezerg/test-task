<?php
declare(strict_types=1);

namespace App\Entity\Services;

/**
 * Class HttpService
 * @package App\Entity\Services
 */
class HttpService implements ServiceInterface
{
    public const SERVICE_NAME = 'http-service';

    private bool $field1 = true;
    private int $field2 = 1;
    private array $field3 = ['string', 2];

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::SERVICE_NAME;
    }

    /**
     * @return bool
     */
    public function getField1(): bool
    {
        return $this->field1;
    }

    /**
     * @param bool $field1
     */
    public function setField1(bool $field1): void
    {
        $this->field1 = $field1;
    }

    /**
     * @return int
     */
    public function getField2(): int
    {
        return $this->field2;
    }

    /**
     * @param int $field2
     */
    public function setField2(int $field2): void
    {
        $this->field2 = $field2;
    }

    /**
     * @return array
     */
    public function getField3(): array
    {
        return $this->field3;
    }

    /**
     * @param array $field3
     */
    public function setField3(array $field3): void
    {
        $this->field3 = $field3;
    }
}
