<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Unit of Measure Data Transfer Object - Represents units of measure
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/UnitOfMeasures
 */
class UnitOfMeasure extends BaseDto
{
        /**
         * @var string|null UnitOfMeasureCode
         */
    public ?string $UnitOfMeasureCode = null;
        /**
         * @var string|null UnitOfMeasureName
         */
    public ?string $UnitOfMeasureName = null;
        /**
         * @var bool|null Obsolete
         */
    public ?bool $Obsolete = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // API Documentation fields
        /**
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var bool|null IsActive
         */
    public ?bool $IsActive = null;

        /**
         * Get the UnitOfMeasureCode
         *
         * @return string|null The UnitOfMeasureCode
         */
    public function getUnitOfMeasureCode(): ?string
    {
        return $this->UnitOfMeasureCode;
    }
        /**
         * Get the UnitOfMeasureName
         *
         * @return string|null The UnitOfMeasureName
         */
    public function getUnitOfMeasureName(): ?string
    {
        return $this->UnitOfMeasureName;
    }
        /**
         * Set the UnitOfMeasureCode
         *
         * @param string|null $code The UnitOfMeasureCode
         */
    public function setUnitOfMeasureCode(?string $code): void
    {
        $this->UnitOfMeasureCode = $code;
    }
        /**
         * Set the UnitOfMeasureName
         *
         * @param string|null $name The UnitOfMeasureName
         */
    public function setUnitOfMeasureName(?string $name): void
    {
        $this->UnitOfMeasureName = $name;
    }

    // API Documentation getters
        /**
         * Get the Description
         *
         * @return string|null The Description
         */
    public function getDescription(): ?string
    {
        return $this->Description;
    }
        /**
         * Get the IsActive
         *
         * @return bool|null The IsActive
         */
    public function getIsActive(): ?bool
    {
        return $this->IsActive;
    }

    // API Documentation setters
        /**
         * Set the Description
         *
         * @param string|null $description The Description
         */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }
        /**
         * Set the IsActive
         *
         * @param bool|null $isActive The IsActive
         */
    public function setIsActive(?bool $isActive): void
    {
        $this->IsActive = $isActive;
    }
}
