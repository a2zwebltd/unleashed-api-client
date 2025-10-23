<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Supplier Cost Data Transfer Object
 *
 * Represents supplier costs associated with assemblies in the Unleashed system.
 * These costs track expenses from suppliers for assembly components.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/Assemblies
 */
class SupplierCost extends BaseDto
{
    /**
     * Supplier Cost properties
     */

    /**
     * @var string|null Supplier cost description
     */
    public ?string $Description = null;

    /**
     * @var float|null Cost amount
     */
    public ?float $Amount = null;

    /**
     * @var string|null Cost type
     */
    public ?string $CostType = null;

    /**
     * @var string|null Supplier reference
     */
    public ?string $SupplierReference = null;

    /**
     * @var string|null Invoice number
     */
    public ?string $InvoiceNumber = null;

    /**
     * @var string|null Invoice date
     */
    public ?string $InvoiceDate = null;

    /**
     * @var string|null Notes about the cost
     */
    public ?string $Notes = null;

    /**
     * @var string|null User who created the cost
     */
    public ?string $CreatedBy = null;

    /**
     * @var string|null User who last modified the cost
     */
    public ?string $LastModifiedBy = null;

    /**
     * Complex objects (arrays from API)
     */

    /**
     * @var Supplier|null Associated supplier
     */
    public ?array $Supplier = null;

    /**
     * @var Account|null Expense account
     */
    public ?array $ExpenseAccount = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the cost description
     *
     * @return string|null The description
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * Get the cost amount
     *
     * @return float|null The amount
     */
    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    /**
     * Get the supplier reference
     *
     * @return string|null The supplier reference
     */
    public function getSupplierReference(): ?string
    {
        return $this->SupplierReference;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the cost description
     *
     * @param string|null $description The description
     */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }

    /**
     * Set the cost amount
     *
     * @param float|null $amount The amount
     */
    public function setAmount(?float $amount): void
    {
        $this->Amount = $amount;
    }

    /**
     * Set the supplier reference
     *
     * @param string|null $supplierReference The supplier reference
     */
    public function setSupplierReference(?string $supplierReference): void
    {
        $this->SupplierReference = $supplierReference;
    }
}
