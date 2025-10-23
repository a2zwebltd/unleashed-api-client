<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Stock Adjustment Line Data Transfer Object
 *
 * Represents a line item in a stock adjustment in the Unleashed system.
 * Each line contains product details and adjustment quantities.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/StockAdjustments
 */
class StockAdjustmentLine extends BaseDto
{
    /**
     * Stock Adjustment Line properties
     */

    /**
     * @var string|null Line description
     */
    public ?string $Description = null;

    /**
     * @var float|null Adjustment quantity
     */
    public ?float $Quantity = null;

    /**
     * @var float|null New quantity after adjustment
     */
    public ?float $NewQuantity = null;

    /**
     * @var float|null New actual value after adjustment
     */
    public ?float $NewActualValue = null;

    /**
     * @var float|null Unit cost
     */
    public ?float $UnitCost = null;

    /**
     * @var float|null Line total
     */
    public ?float $LineTotal = null;

    /**
     * @var string|null Adjustment reason
     */
    public ?string $Reason = null;

    /**
     * @var string|null Line notes
     */
    public ?string $Notes = null;

    /**
     * @var string|null User who created the line
     */
    public ?string $CreatedBy = null;

    /**
     * @var string|null User who last modified the line
     */
    public ?string $LastModifiedBy = null;

    /**
     * Complex objects (arrays from API)
     */

    /**
     * @var Product|null Product being adjusted
     */
    public ?array $Product = null;

    /**
     * @var UnitOfMeasure|null Unit of measure
     */
    public ?array $UnitOfMeasure = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the line description
     *
     * @return string|null The description
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * Get the adjustment quantity
     *
     * @return float|null The quantity
     */
    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    /**
     * Get the unit cost
     *
     * @return float|null The unit cost
     */
    public function getUnitCost(): ?float
    {
        return $this->UnitCost;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the line description
     *
     * @param string|null $description The description
     */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }

    /**
     * Set the adjustment quantity
     *
     * @param float|null $quantity The quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->Quantity = $quantity;
    }

    /**
     * Set the unit cost
     *
     * @param float|null $unitCost The unit cost
     */
    public function setUnitCost(?float $unitCost): void
    {
        $this->UnitCost = $unitCost;
    }
}
