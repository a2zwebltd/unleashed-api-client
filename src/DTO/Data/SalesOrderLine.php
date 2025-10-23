<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sales Order Line Data Transfer Object
 *
 * Represents a line item in a sales order in the Unleashed system.
 * Each line contains product details, quantities, and pricing information.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/SalesOrders
 */
class SalesOrderLine extends BaseDto
{
    /**
     * Sales Order Line properties
     */

    /**
     * @var string|null Line description
     */
    public ?string $Description = null;

    /**
     * @var float Line quantity (required)
     */
    public float $Quantity;

    /**
     * @var float|null Unit price
     */
    public ?float $UnitPrice = null;

    /**
     * @var float|null Line total
     */
    public ?float $LineTotal = null;

    /**
     * @var float|null Discount percentage
     */
    public ?float $DiscountRate = null;

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
     * @var Product|null Product for this line
     */
    public ?array $Product = null;

    /**
     * @var UnitOfMeasure|null Unit of measure
     */
    public ?array $UnitOfMeasure = null;

    // Getters for all properties
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
     * Get the line quantity
     *
     * @return float|null The quantity
     */
    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    /**
     * Get the unit price
     *
     * @return float|null The unit price
     */
    public function getUnitPrice(): ?float
    {
        return $this->UnitPrice;
    }

    /**
     * Get the line total
     *
     * @return float|null The line total
     */
    public function getLineTotal(): ?float
    {
        return $this->LineTotal;
    }

    /**
     * Get the discount rate
     *
     * @return float|null The discount rate
     */
    public function getDiscountRate(): ?float
    {
        return $this->DiscountRate;
    }

    /**
     * Get the line notes
     *
     * @return string|null The line notes
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * Get the user who created the line
     *
     * @return string|null The user who created the line
     */
    public function getCreatedBy(): ?string
    {
        return $this->CreatedBy;
    }

    /**
     * Get the user who last modified the line
     *
     * @return string|null The user who last modified the line
     */
    public function getLastModifiedBy(): ?string
    {
        return $this->LastModifiedBy;
    }

    /**
     * Get the product for this line
     *
     * @return array|null The product for this line
     */
    public function getProduct(): ?array
    {
        return $this->Product;
    }

    /**
     * Get the unit of measure
     *
     * @return array|null The unit of measure
     */
    public function getUnitOfMeasure(): ?array
    {
        return $this->UnitOfMeasure;
    }

    // Setters for all properties
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
     * Set the line quantity
     *
     * @param float|null $quantity The quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->Quantity = $quantity;
    }

    /**
     * Set the unit price
     *
     * @param float|null $unitPrice The unit price
     */
    public function setUnitPrice(?float $unitPrice): void
    {
        $this->UnitPrice = $unitPrice;
    }

    /**
     * Set the line total
     *
     * @param float|null $lineTotal The line total
     */
    public function setLineTotal(?float $lineTotal): void
    {
        $this->LineTotal = $lineTotal;
    }

    /**
     * Set the discount rate
     *
     * @param float|null $discountRate The discount rate
     */
    public function setDiscountRate(?float $discountRate): void
    {
        $this->DiscountRate = $discountRate;
    }

    /**
     * Set the line notes
     *
     * @param string|null $notes The line notes
     */
    public function setNotes(?string $notes): void
    {
        $this->Notes = $notes;
    }

    /**
     * Set the user who created the line
     *
     * @param string|null $createdBy The user who created the line
     */
    public function setCreatedBy(?string $createdBy): void
    {
        $this->CreatedBy = $createdBy;
    }

    /**
     * Set the user who last modified the line
     *
     * @param string|null $lastModifiedBy The user who last modified the line
     */
    public function setLastModifiedBy(?string $lastModifiedBy): void
    {
        $this->LastModifiedBy = $lastModifiedBy;
    }

    /**
     * Set the product for this line
     *
     * @param array|null $product The product for this line
     */
    public function setProduct(?array $product): void
    {
        $this->Product = $product;
    }

    /**
     * Set the unit of measure
     *
     * @param array|null $unitOfMeasure The unit of measure
     */
    public function setUnitOfMeasure(?array $unitOfMeasure): void
    {
        $this->UnitOfMeasure = $unitOfMeasure;
    }
}
