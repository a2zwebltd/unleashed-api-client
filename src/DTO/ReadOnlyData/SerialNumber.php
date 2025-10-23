<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Serial Number Data Transfer Object - Represents product serial numbers
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SerialNumbers
 */
class SerialNumber extends BaseDto
{
        /**
         * @var string|null SerialNumberCode
         */
    public ?string $SerialNumberCode = null;
        /**
         * @var string|null SerialNumberName
         */
    public ?string $SerialNumberName = null;
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
         * @var string|null SerialNumber
         */
    public ?string $SerialNumber = null;
        /**
         * @var string|null Identifier
         */
    public ?string $Identifier = null;
        /**
         * @var string|null ProductCode
         */
    public ?string $ProductCode = null;
        /**
         * @var string|null WarehouseCode
         */
    public ?string $WarehouseCode = null;
        /**
         * @var string|null Status
         */
    public ?string $Status = null;

        /**
         * Get the SerialNumberCode
         *
         * @return string|null The SerialNumberCode
         */
    public function getSerialNumberCode(): ?string
    {
        return $this->SerialNumberCode;
    }
        /**
         * Get the SerialNumberName
         *
         * @return string|null The SerialNumberName
         */
    public function getSerialNumberName(): ?string
    {
        return $this->SerialNumberName;
    }
        /**
         * Set the SerialNumberCode
         *
         * @param string|null $code The SerialNumberCode
         */
    public function setSerialNumberCode(?string $code): void
    {
        $this->SerialNumberCode = $code;
    }
        /**
         * Set the SerialNumberName
         *
         * @param string|null $name The SerialNumberName
         */
    public function setSerialNumberName(?string $name): void
    {
        $this->SerialNumberName = $name;
    }

    // API Documentation getters
        /**
         * Get the SerialNumber
         *
         * @return string|null The SerialNumber
         */
    public function getSerialNumber(): ?string
    {
        return $this->SerialNumber;
    }
        /**
         * Get the Identifier
         *
         * @return string|null The Identifier
         */
    public function getIdentifier(): ?string
    {
        return $this->Identifier;
    }
        /**
         * Get the ProductCode
         *
         * @return string|null The ProductCode
         */
    public function getProductCode(): ?string
    {
        return $this->ProductCode;
    }
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
         * Get the Status
         *
         * @return string|null The Status
         */
    public function getStatus(): ?string
    {
        return $this->Status;
    }

    // API Documentation setters
        /**
         * Set the SerialNumber
         *
         * @param string|null $serialNumber The SerialNumber
         */
    public function setSerialNumber(?string $serialNumber): void
    {
        $this->SerialNumber = $serialNumber;
    }
        /**
         * Set the Identifier
         *
         * @param string|null $identifier The Identifier
         */
    public function setIdentifier(?string $identifier): void
    {
        $this->Identifier = $identifier;
    }
        /**
         * Set the ProductCode
         *
         * @param string|null $productCode The ProductCode
         */
    public function setProductCode(?string $productCode): void
    {
        $this->ProductCode = $productCode;
    }
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
         * Set the Status
         *
         * @param string|null $status The Status
         */
    public function setStatus(?string $status): void
    {
        $this->Status = $status;
    }
}
