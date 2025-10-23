<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Batch Number Data Transfer Object - Represents product batch numbers
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/BatchNumbers
 */
class BatchNumber extends BaseDto
{
    // BatchNumber properties
        /**
         * @var string|null BatchNumber
         */
    public ?string $BatchNumber = null;
        /**
         * @var string|null ProductCode
         */
    public ?string $ProductCode = null;
        /**
         * @var string|null ExpiryDate
         */
    public ?string $ExpiryDate = null;
        /**
         * @var float|null Quantity
         */
    public ?float $Quantity = null;
        /**
         * @var float|null OriginalQty
         */
    public ?float $OriginalQty = null;
        /**
         * @var string|null WarehouseCode
         */
    public ?string $WarehouseCode = null;
        /**
         * @var string|null Status
         */
    public ?string $Status = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Simple getters
        /**
         * Get the BatchNumber
         *
         * @return string|null The BatchNumber
         */
    public function getBatchNumber(): ?string
    {
        return $this->BatchNumber;
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
         * Get the ExpiryDate
         *
         * @return string|null The ExpiryDate
         */
    public function getExpiryDate(): ?string
    {
        return $this->ExpiryDate;
    }

        /**
         * Get the Quantity
         *
         * @return float|null The Quantity
         */
    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

        /**
         * Get the OriginalQty
         *
         * @return float|null The OriginalQty
         */
    public function getOriginalQty(): ?float
    {
        return $this->OriginalQty;
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

    // Simple setters
        /**
         * Set the BatchNumber
         *
         * @param string|null $batchNumber The BatchNumber
         */
    public function setBatchNumber(?string $batchNumber): void
    {
        $this->BatchNumber = $batchNumber;
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
         * Set the ExpiryDate
         *
         * @param string|null $expiryDate The ExpiryDate
         */
    public function setExpiryDate(?string $expiryDate): void
    {
        $this->ExpiryDate = $expiryDate;
    }

        /**
         * Set the Quantity
         *
         * @param float|null $quantity The Quantity
         */
    public function setQuantity(?float $quantity): void
    {
        $this->Quantity = $quantity;
    }

        /**
         * Set the OriginalQty
         *
         * @param float|null $originalQty The OriginalQty
         */
    public function setOriginalQty(?float $originalQty): void
    {
        $this->OriginalQty = $originalQty;
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
