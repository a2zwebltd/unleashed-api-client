<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\StockAdjustmentLine;

/**
 * Stock Adjustment Data Transfer Object - Represents stock adjustments
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/StockAdjustments
 */
class StockAdjustment extends BaseDto
{
    // StockAdjustment properties
        /**
         * @var string|null AdjustmentNumber
         */
    public ?string $AdjustmentNumber = null;
        /**
         * @var string|null AdjustmentDate
         */
    public ?string $AdjustmentDate = null;
        /**
         * @var string|null AdjustmentStatus
         */
    public ?string $AdjustmentStatus = null;
        /**
         * @var string|null AdjustmentReason
         */
    public ?string $AdjustmentReason = null;
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Complex objects (arrays from API)
    /**
     * @var Warehouse|null Warehouse for this adjustment
     */
        /**
         * @var array|null Warehouse
         */
    public ?array $Warehouse = null;

    /**
     * @var StockAdjustmentLine[]|null Stock adjustment lines
     */
        /**
         * @var array|null StockAdjustmentLines
         */
    public ?array $StockAdjustmentLines = null;

    // Simple getters
        /**
         * Get the AdjustmentNumber
         *
         * @return string|null The AdjustmentNumber
         */
    public function getAdjustmentNumber(): ?string
    {
        return $this->AdjustmentNumber;
    }

        /**
         * Get the AdjustmentStatus
         *
         * @return string|null The AdjustmentStatus
         */
    public function getAdjustmentStatus(): ?string
    {
        return $this->AdjustmentStatus;
    }

    // Simple setters
        /**
         * Set the AdjustmentNumber
         *
         * @param string|null $adjustmentNumber The AdjustmentNumber
         */
    public function setAdjustmentNumber(?string $adjustmentNumber): void
    {
        $this->AdjustmentNumber = $adjustmentNumber;
    }

        /**
         * Set the AdjustmentStatus
         *
         * @param string|null $adjustmentStatus The AdjustmentStatus
         */
    public function setAdjustmentStatus(?string $adjustmentStatus): void
    {
        $this->AdjustmentStatus = $adjustmentStatus;
    }
}
