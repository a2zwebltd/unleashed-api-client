<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Bill of Material Line Data Transfer Object
 *
 * Represents a line item in a bill of material in the Unleashed system.
 * Each line contains component product details and quantities.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/BillOfMaterials
 */
class BillOfMaterialLine extends BaseDto
{
    /**
     * Bill of Material Line properties
     */

    /**
     * @var string|null Line description
     */
    public ?string $Description = null;

    /**
     * @var string|null Expense account for never diminishing products
     */
    public ?string $ExpenseAccount = null;

    /**
     * @var float|null Component quantity
     */
    public ?float $Quantity = null;

    /**
     * @var string|null Sub bill of material GUID
     */
    public ?string $SubBillOfMaterialGuid = null;

    /**
     * @var float|null Unit cost
     */
    public ?float $UnitCost = null;

    /**
     * @var float|null Wastage quantity
     */
    public ?float $WastageQuantity = null;

    /**
     * @var float|null Line total
     */
    public ?float $LineTotal = null;

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
     * @var Product|null Component product
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
     * Get the component quantity
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
     * Set the component quantity
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
