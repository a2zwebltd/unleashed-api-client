<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\PurchaseOrderLine;

/**
 * Purchase Order Data Transfer Object - Represents purchase orders
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/PurchaseOrders
 */
class PurchaseOrder extends BaseDto
{
    // PurchaseOrder properties
        /**
         * @var string|null OrderNumber
         */
    public ?string $OrderNumber = null;
        /**
         * @var string|null OrderDate
         */
    public ?string $OrderDate = null;
        /**
         * @var string|null RequiredDate
         */
    public ?string $RequiredDate = null;
        /**
         * @var string|null OrderStatus
         */
    public ?string $OrderStatus = null;
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;
        /**
         * @var float|null Total
         */
    public ?float $Total = null;
        /**
         * @var float|null TotalTax
         */
    public ?float $TotalTax = null;
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
     * @var Supplier|null Supplier for this order
     */
        /**
         * @var array|null Supplier
         */
    public ?array $Supplier = null;

    /**
     * @var PurchaseOrderLine[]|null Purchase order lines
     */
        /**
         * @var array|null PurchaseOrderLines
         */
    public ?array $PurchaseOrderLines = null;

    // Getters for all properties
    /**
     * Get the OrderNumber
     *
     * @return string|null The OrderNumber
     */
    public function getOrderNumber(): ?string
    {
        return $this->OrderNumber;
    }

    /**
     * Get the OrderDate
     *
     * @return string|null The OrderDate
     */
    public function getOrderDate(): ?string
    {
        return $this->OrderDate;
    }

    /**
     * Get the RequiredDate
     *
     * @return string|null The RequiredDate
     */
    public function getRequiredDate(): ?string
    {
        return $this->RequiredDate;
    }

    /**
     * Get the OrderStatus
     *
     * @return string|null The OrderStatus
     */
    public function getOrderStatus(): ?string
    {
        return $this->OrderStatus;
    }

    /**
     * Get the Notes
     *
     * @return string|null The Notes
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * Get the Total
     *
     * @return float|null The Total
     */
    public function getTotal(): ?float
    {
        return $this->Total;
    }

    /**
     * Get the TotalTax
     *
     * @return float|null The TotalTax
     */
    public function getTotalTax(): ?float
    {
        return $this->TotalTax;
    }

    /**
     * Get the CreatedBy
     *
     * @return string|null The CreatedBy
     */
    public function getCreatedBy(): ?string
    {
        return $this->CreatedBy;
    }

    /**
     * Get the LastModifiedBy
     *
     * @return string|null The LastModifiedBy
     */
    public function getLastModifiedBy(): ?string
    {
        return $this->LastModifiedBy;
    }

    /**
     * Get the Supplier
     *
     * @return array|null The Supplier
     */
    public function getSupplier(): ?array
    {
        return $this->Supplier;
    }

    /**
     * Get the PurchaseOrderLines
     *
     * @return array|null The PurchaseOrderLines
     */
    public function getPurchaseOrderLines(): ?array
    {
        return $this->PurchaseOrderLines;
    }

    // Setters for all properties
    /**
     * Set the OrderNumber
     *
     * @param string|null $orderNumber The OrderNumber
     */
    public function setOrderNumber(?string $orderNumber): void
    {
        $this->OrderNumber = $orderNumber;
    }

    /**
     * Set the OrderDate
     *
     * @param string|null $orderDate The OrderDate
     */
    public function setOrderDate(?string $orderDate): void
    {
        $this->OrderDate = $orderDate;
    }

    /**
     * Set the RequiredDate
     *
     * @param string|null $requiredDate The RequiredDate
     */
    public function setRequiredDate(?string $requiredDate): void
    {
        $this->RequiredDate = $requiredDate;
    }

    /**
     * Set the OrderStatus
     *
     * @param string|null $orderStatus The OrderStatus
     */
    public function setOrderStatus(?string $orderStatus): void
    {
        $this->OrderStatus = $orderStatus;
    }

    /**
     * Set the Notes
     *
     * @param string|null $notes The Notes
     */
    public function setNotes(?string $notes): void
    {
        $this->Notes = $notes;
    }

    /**
     * Set the Total
     *
     * @param float|null $total The Total
     */
    public function setTotal(?float $total): void
    {
        $this->Total = $total;
    }

    /**
     * Set the TotalTax
     *
     * @param float|null $totalTax The TotalTax
     */
    public function setTotalTax(?float $totalTax): void
    {
        $this->TotalTax = $totalTax;
    }

    /**
     * Set the CreatedBy
     *
     * @param string|null $createdBy The CreatedBy
     */
    public function setCreatedBy(?string $createdBy): void
    {
        $this->CreatedBy = $createdBy;
    }

    /**
     * Set the LastModifiedBy
     *
     * @param string|null $lastModifiedBy The LastModifiedBy
     */
    public function setLastModifiedBy(?string $lastModifiedBy): void
    {
        $this->LastModifiedBy = $lastModifiedBy;
    }

    /**
     * Set the Supplier
     *
     * @param array|null $supplier The Supplier
     */
    public function setSupplier(?array $supplier): void
    {
        $this->Supplier = $supplier;
    }

    /**
     * Set the PurchaseOrderLines
     *
     * @param array|null $purchaseOrderLines The PurchaseOrderLines
     */
    public function setPurchaseOrderLines(?array $purchaseOrderLines): void
    {
        $this->PurchaseOrderLines = $purchaseOrderLines;
    }
}
