<?php
declare(strict_types=1);

namespace App\Services\MicroServices;

use App\Entity\Services\RestApiService;
use App\Entity\Services\GRPCService;
use App\Entity\Services\HttpService;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/**
 * Class TypeMapper
 * @package App\Services\MicroServices
 */
class TypeMapper 
{
    private const TYPES = [
        RestApiService::SERVICE_NAME => [
            'field1' => TextType::class,
            'field2' => CheckboxType::class,
            'field3' => CollectionType::class
        ],
        GRPCService::SERVICE_NAME => [
            'field1' => TextType::class,
            'field2' => CheckboxType::class,
            'field3' => TextType::class
        ],
        HttpService::SERVICE_NAME => [
            'field1' => CheckboxType::class,
            'field2' => TextType::class,
            'field3' => CollectionType::class
        ]
    ];

    /**
     * @param string $serviceName
     * @param string $field
     * @return string
     * @throws \Exception
     */
    public static function getType(string $serviceName, string $field): string
    {
        if (isset(self::TYPES[$serviceName][$field])) {
            return self::TYPES[$serviceName][$field];
        }

        throw new \Exception(sprintf('Wrong data format for %1 service and %2 field.', $serviceName, $field));
    }
}
