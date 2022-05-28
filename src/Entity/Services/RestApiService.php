<?php
declare(strict_types=1);

namespace App\Entity\Services;

/**
 * Class RestApiService
 * @package App\Entity\Services
 */
class RestApiService implements ServiceInterface
{
    public const SERVICE_NAME = 'rest-api-service';

    /** @var string */
    private string $field1 = 'string';

    /** @var bool */
    private bool $field2 = true;

    /** @var string[] */
    private array $field3 = ['string1', 'string2'];

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
    public function setField1(string $field1)
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
    public function setField2(bool $field2)
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
    public function setField3(array $field3)
    {
        $this->field3 = $field3;
    }
}
