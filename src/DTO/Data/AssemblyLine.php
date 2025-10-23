<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Assembly Line Data Transfer Object - Represents a line item in an assembly
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/Assemblies
 */
class AssemblyLine extends BaseDto
{
    // AssemblyLine properties from documentation
    /**
     * @var string|null ExpenseAccount
     */
    public ?string $ExpenseAccount = null;
    /**
     * @var float|null DisassembleCost
     */
    public ?float $DisassembleCost = null;
    /**
     * @var float|null Quantity
     */
    public float $Quantity;
    /**
     * @var float|null UnitCost
     */
    public ?float $UnitCost = null;
    /**
     * @var float|null WastageQuantity
     */
    public ?float $WastageQuantity = null;

    // Complex objects (arrays from API)
    /**
     * @var array|null BatchNumbers
     */
    public ?array $BatchNumbers = null;
     /**
      * @var array|null Product
      */
    public ?array $Product = null;

    // Simple getters
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
         * Get the WastageQuantity
         *
         * @return float|null The WastageQuantity
         */
    public function getWastageQuantity(): ?float
    {
        return $this->WastageQuantity;
    }

        /**
         * Get the ProductCode
         *
         * @return string|null The ProductCode
         */
    public function getProductCode(): ?string
    {
        return $this->Product['ProductCode'] ?? null;
    }

    // Simple setters
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
         * Set the WastageQuantity
         *
         * @param float|null $wastageQuantity The WastageQuantity
         */
    public function setWastageQuantity(?float $wastageQuantity): void
    {
        $this->WastageQuantity = $wastageQuantity;
    }

        /**
         * Set the ProductCode
         *
         * @param string|null $productCode The ProductCode
         */
    public function setProductCode(?string $productCode): void
    {
        if ($this->Product === null) {
            $this->Product = [];
        }
        $this->Product['ProductCode'] = $productCode;
    }
}
