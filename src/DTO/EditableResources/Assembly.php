<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\{
    SupplierCost, ProductionPerson, Batch, Serial, AssemblyLine
};

/**
 * Assembly Data Transfer Object
 *
 * Represents an assembly in the Unleashed system. Assemblies are used to create
 * finished products from component parts and track the assembly process.
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/Assemblies
 */
class Assembly extends BaseDto
{
    /**
     * Assembly properties
     */

    /**
     * @var string|null Actual duration taken to complete the assembly
     */
    public ?string $ActualDuration = null;

    /**
     * @var string|null Date by which the assembly should be completed
     */
    public ?string $AssembleBy = null;

    /**
     * @var string|null Date when the assembly was performed
     */
    public ?string $AssemblyDate = null;

    /**
     * @var string|null Unique assembly number
     */
    public ?string $AssemblyNumber = null;

    /**
     * @var string|null Current status of the assembly (e.g., Parked, In Progress, Complete)
     */
    public ?string $AssemblyStatus = null;

    /**
     * @var string|null Type of assembly
     */
    public ?string $AssemblyType = null;

    /**
     * @var bool|null Whether this is an automatic assembly
     */
    public ?bool $AutoAssembly = null;

    /**
     * @var float|null Quantity that can be assembled
     */
    public ?float $CanAssembleQuantity = null;

    /**
     * @var string|null Comments about the assembly
     */
    public ?string $Comments = null;

    /**
     * @var string|null User who created the assembly
     */
    public ?string $CreatedBy = null;

    /**
     * @var string|null Custom assembly status
     */
    public ?string $CustomAssemblyStatus = null;

    /**
     * @var string|null Total cost for disassembly
     */
    public ?string $DisassembleCostTotal = null;

    /**
     * @var string|null Comments about duration
     */
    public ?string $DurationComments = null;

    /**
     * @var string|null Estimated start date for the assembly
     */
    public ?string $EstimatedStartDate = null;

    /**
     * @var string|null Expected duration for the assembly
     */
    public ?string $ExpectedDuration = null;

    /**
     * @var float|null Quantity to be assembled
     */
    public ?float $Quantity = null;

    /**
     * @var string|null Associated sales order number
     */
    public ?string $SalesOrderNumber = null;

    /**
     * @var float|null Subtotal of supplier costs
     */
    public ?float $SupplierCostsSubTotal = null;

    /**
     * @var float|null Tax on supplier costs
     */
    public ?float $SupplierCostsTax = null;

    /**
     * @var float|null Total cost of the assembly
     */
    public ?float $Total = null;

    /**
     * @var float|null Total cost including all components
     */
    public ?float $TotalCost = null;

    /**
     * @var string|null User who last modified the assembly
     */
    public ?string $LastModifiedBy = null;

    /**
     * Complex objects (arrays from API)
     */

    /**
     * @var AssemblyLine[]|null Assembly lines containing component products
     */
    public ?array $AssemblyLines = null;

    /**
     * @var Batch[]|null Batch numbers associated with the assembly
     */
    public ?array $BatchNumbers = null;

    /**
     * @var Warehouse|null Destination warehouse for the assembly
     */
    public ?array $DestinationWarehouse = null;

    /**
     * @var Product|null Product being assembled
     */
    public ?array $Product = null;

    /**
     * @var ProductionPerson|null Production person assigned to the assembly
     */
    public ?array $ProductionPerson = null;

    /**
     * @var Serial[]|null Serial numbers associated with the assembly
     */
    public ?array $SerialNumbers = null;

    /**
     * @var Warehouse|null Source warehouse for the assembly
     */
    public ?array $SourceWarehouse = null;

    /**
     * @var SupplierCost[]|null Supplier costs for the assembly
     */
    public ?array $SupplierCosts = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the assembly number
     *
     * @return string|null The assembly number
     */
    public function getAssemblyNumber(): ?string
    {
        return $this->AssemblyNumber;
    }

    /**
     * Get the assembly status
     *
     * @return string|null The assembly status
     */
    public function getAssemblyStatus(): ?string
    {
        return $this->AssemblyStatus;
    }

    /**
     * Get the quantity to be assembled
     *
     * @return float|null The quantity
     */
    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    /**
     * Get the product code from the Product array
     *
     * @return string|null The product code
     */
    public function getProductCode(): ?string
    {
        return $this->Product['ProductCode'] ?? null;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the assembly number
     *
     * @param string|null $assemblyNumber The assembly number
     */
    public function setAssemblyNumber(?string $assemblyNumber): void
    {
        $this->AssemblyNumber = $assemblyNumber;
    }

    /**
     * Set the assembly status
     *
     * @param string|null $assemblyStatus The assembly status
     */
    public function setAssemblyStatus(?string $assemblyStatus): void
    {
        $this->AssemblyStatus = $assemblyStatus;
    }

    /**
     * Set the quantity to be assembled
     *
     * @param  float|null $quantity The quantity
     * @return self
     */
    public function setQuantity(?float $quantity): void
    {
        $this->Quantity = $quantity;
    }

    /**
     * Set the product code in the Product array
     *
     * @param  string|null $productCode The product code
     * @return self
     */
    public function setProductCode(?string $productCode): void
    {
        if ($this->Product === null) {
            $this->Product = [];
        }
        $this->Product['ProductCode'] = $productCode;
    }
}
