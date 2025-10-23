<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\SalesOrderLine;

/**
 * Sales Order Data Transfer Object - Represents sales orders
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/SalesOrders
 */
class SalesOrder extends BaseDto
{
    // SalesOrder properties (required fields)
    public string $OrderNumber;
    public string $OrderDate;
        /**
         * @var string|null RequiredDate
         */
    public ?string $RequiredDate = null;
    public string $OrderStatus;
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;
        /**
         * @var float|null SubTotal
         */
    public ?float $SubTotal = null;
        /**
         * @var array|null Tax
         */
    public ?array $Tax = null;
        /**
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var float|null TaxTotal
         */
    public ?float $TaxTotal = null;
        /**
         * @var float|null Total
         */
    public ?float $Total = null;
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
     * @var Customer|null Customer for this order
     */
        /**
         * @var array|null Customer
         */
    public ?array $Customer = null;

    /**
     * @var SalesOrderLine[]|null Sales order lines
     */
        /**
         * @var array|null SalesOrderLines
         */
    public ?array $SalesOrderLines = null;

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
     * Get the SubTotal
     *
     * @return float|null The SubTotal
     */
    public function getSubTotal(): ?float
    {
        return $this->SubTotal;
    }

    /**
     * Get the Tax
     *
     * @return array|null The Tax
     */
    public function getTax(): ?array
    {
        return $this->Tax;
    }

    /**
     * Get the TaxRate
     *
     * @return float|null The TaxRate
     */
    public function getTaxRate(): ?float
    {
        return $this->TaxRate;
    }

    /**
     * Get the TaxTotal
     *
     * @return float|null The TaxTotal
     */
    public function getTaxTotal(): ?float
    {
        return $this->TaxTotal;
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
     * Get the Customer
     *
     * @return array|null The Customer
     */
    public function getCustomer(): ?array
    {
        return $this->Customer;
    }

    /**
     * Get the SalesOrderLines
     *
     * @return array|null The SalesOrderLines
     */
    public function getSalesOrderLines(): ?array
    {
        return $this->SalesOrderLines;
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
     * Set the SubTotal
     *
     * @param float|null $subTotal The SubTotal
     */
    public function setSubTotal(?float $subTotal): void
    {
        $this->SubTotal = $subTotal;
    }

    /**
     * Set the Tax
     *
     * @param array|null $tax The Tax
     */
    public function setTax(?array $tax): void
    {
        $this->Tax = $tax;
    }

    /**
     * Set the TaxRate
     *
     * @param float|null $taxRate The TaxRate
     */
    public function setTaxRate(?float $taxRate): void
    {
        $this->TaxRate = $taxRate;
    }

    /**
     * Set the TaxTotal
     *
     * @param float|null $taxTotal The TaxTotal
     */
    public function setTaxTotal(?float $taxTotal): void
    {
        $this->TaxTotal = $taxTotal;
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
     * Set the Customer
     *
     * @param array|null $customer The Customer
     */
    public function setCustomer(?array $customer): void
    {
        $this->Customer = $customer;
    }

    /**
     * Set the SalesOrderLines
     *
     * @param array|null $salesOrderLines The SalesOrderLines
     */
    public function setSalesOrderLines(?array $salesOrderLines): void
    {
        $this->SalesOrderLines = $salesOrderLines;
    }
}
