<?php
declare(strict_types=1);

namespace App\Entity\Services;

/**
 * Interface Service
 * @package App\Entity\Services
 */
interface ServiceInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
