<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Warehouse Data Transfer Object - Represents warehouses in the system
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Warehouses
 */
class Warehouse extends BaseDto
{
    // Warehouse properties from documentation
        /**
         * @var bool|null IsDefault
         */
    public ?bool $IsDefault = null;
        /**
         * @var bool|null Obsolete
         */
    public ?bool $Obsolete = null;
        /**
         * @var string|null WarehouseCode
         */
    public ?string $WarehouseCode = null;
        /**
         * @var string|null WarehouseName
         */
    public ?string $WarehouseName = null;

    // Simple getters
        /**
         * Get the WarehouseCode
         *
         * @return string|null The WarehouseCode
         */
    public function getWarehouseCode(): ?string
    {
        return $this->WarehouseCode;
    }

        /**
         * Get the WarehouseName
         *
         * @return string|null The WarehouseName
         */
    public function getWarehouseName(): ?string
    {
        return $this->WarehouseName;
    }

        /**
         * Check if Default
         *
         * @return bool|null True if Default, false otherwise
         */
    public function isDefault(): ?bool
    {
        return $this->IsDefault;
    }

        /**
         * Check if Obsolete
         *
         * @return bool|null True if Obsolete, false otherwise
         */
    public function isObsolete(): ?bool
    {
        return $this->Obsolete;
    }

    // Simple setters
        /**
         * Set the WarehouseCode
         *
         * @param string|null $warehouseCode The WarehouseCode
         */
    public function setWarehouseCode(?string $warehouseCode): void
    {
        $this->WarehouseCode = $warehouseCode;
    }

        /**
         * Set the WarehouseName
         *
         * @param string|null $warehouseName The WarehouseName
         */
    public function setWarehouseName(?string $warehouseName): void
    {
        $this->WarehouseName = $warehouseName;
    }

        /**
         * Set the IsDefault
         *
         * @param bool|null $isDefault The IsDefault
         */
    public function setIsDefault(?bool $isDefault): void
    {
        $this->IsDefault = $isDefault;
    }

        /**
         * Set the Obsolete
         *
         * @param bool|null $obsolete The Obsolete
         */
    public function setObsolete(?bool $obsolete): void
    {
        $this->Obsolete = $obsolete;
    }
}
