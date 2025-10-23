<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\CreditNoteLine;

/**
 * Credit Note Data Transfer Object - Represents credit notes in the system
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/CreditNotes
 */
class CreditNote extends BaseDto
{
    // CreditNote properties
    public ?string $CreditNumber = null;
    public ?string $CreditDate = null;
    public ?string $Status = null;
    public ?string $Reference = null;
    public ?string $Comments = null;
    public ?float $Total = null;
    public ?float $SubTotal = null;
    public ?float $TaxTotal = null;
    public ?float $BCSubTotal = null;
    public ?float $BCTotal = null;
    public ?float $TaxRate = null;
    public ?float $ExchangeRate = null;
    public ?string $CreditType = null;
    public ?string $InvoiceNumber = null;
    public ?string $SalesInvoiceDate = null;
    public ?string $RequiredDeliveryDate = null;
    public ?string $CreatedBy = null;
    public ?string $LastModifiedBy = null;

    // Complex objects (arrays from API)
    /**
     * @var Customer|null Customer for this credit note
     */
    public ?array $Customer = null;

    /**
     * @var Warehouse|null Warehouse for this credit note
     */
    public ?array $Warehouse = null;

    /**
     * @var SalesOrder|null Sales order for this credit note
     */
    public ?array $SalesOrder = null;

    /**
     * @var Currency|null Currency for this credit note
     */
    public ?array $Currency = null;

    /**
     * @var Tax|null Tax for this credit note
     */
    public ?array $Tax = null;

    /**
     * @var CreditLine[]|null Credit note lines
     */
    public ?array $CreditLines = null;

    // Getters for all properties
    /**
     * Get the CreditNumber
     *
     * @return string|null The CreditNumber
     */
    public function getCreditNumber(): ?string
    {
        return $this->CreditNumber;
    }

    /**
     * Get the CreditDate
     *
     * @return string|null The CreditDate
     */
    public function getCreditDate(): ?string
    {
        return $this->CreditDate;
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

    /**
     * Get the Reference
     *
     * @return string|null The Reference
     */
    public function getReference(): ?string
    {
        return $this->Reference;
    }

    /**
     * Get the Comments
     *
     * @return string|null The Comments
     */
    public function getComments(): ?string
    {
        return $this->Comments;
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
     * Get the SubTotal
     *
     * @return float|null The SubTotal
     */
    public function getSubTotal(): ?float
    {
        return $this->SubTotal;
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
     * Get the BCSubTotal
     *
     * @return float|null The BCSubTotal
     */
    public function getBCSubTotal(): ?float
    {
        return $this->BCSubTotal;
    }

    /**
     * Get the BCTotal
     *
     * @return float|null The BCTotal
     */
    public function getBCTotal(): ?float
    {
        return $this->BCTotal;
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
     * Get the ExchangeRate
     *
     * @return float|null The ExchangeRate
     */
    public function getExchangeRate(): ?float
    {
        return $this->ExchangeRate;
    }

    /**
     * Get the CreditType
     *
     * @return string|null The CreditType
     */
    public function getCreditType(): ?string
    {
        return $this->CreditType;
    }

    /**
     * Get the InvoiceNumber
     *
     * @return string|null The InvoiceNumber
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->InvoiceNumber;
    }

    /**
     * Get the SalesInvoiceDate
     *
     * @return string|null The SalesInvoiceDate
     */
    public function getSalesInvoiceDate(): ?string
    {
        return $this->SalesInvoiceDate;
    }

    /**
     * Get the RequiredDeliveryDate
     *
     * @return string|null The RequiredDeliveryDate
     */
    public function getRequiredDeliveryDate(): ?string
    {
        return $this->RequiredDeliveryDate;
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
     * Get the Warehouse
     *
     * @return array|null The Warehouse
     */
    public function getWarehouse(): ?array
    {
        return $this->Warehouse;
    }

    /**
     * Get the SalesOrder
     *
     * @return array|null The SalesOrder
     */
    public function getSalesOrder(): ?array
    {
        return $this->SalesOrder;
    }

    /**
     * Get the Currency
     *
     * @return array|null The Currency
     */
    public function getCurrency(): ?array
    {
        return $this->Currency;
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
     * Get the CreditLines
     *
     * @return array|null The CreditLines
     */
    public function getCreditLines(): ?array
    {
        return $this->CreditLines;
    }

    // Setters for all properties
    /**
     * Set the CreditNumber
     *
     * @param string|null $creditNumber The CreditNumber
     */
    public function setCreditNumber(?string $creditNumber): void
    {
        $this->CreditNumber = $creditNumber;
    }

    /**
     * Set the CreditDate
     *
     * @param string|null $creditDate The CreditDate
     */
    public function setCreditDate(?string $creditDate): void
    {
        $this->CreditDate = $creditDate;
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

    /**
     * Set the Reference
     *
     * @param string|null $reference The Reference
     */
    public function setReference(?string $reference): void
    {
        $this->Reference = $reference;
    }

    /**
     * Set the Comments
     *
     * @param string|null $comments The Comments
     */
    public function setComments(?string $comments): void
    {
        $this->Comments = $comments;
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
     * Set the SubTotal
     *
     * @param float|null $subTotal The SubTotal
     */
    public function setSubTotal(?float $subTotal): void
    {
        $this->SubTotal = $subTotal;
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
     * Set the BCSubTotal
     *
     * @param float|null $bcSubTotal The BCSubTotal
     */
    public function setBCSubTotal(?float $bcSubTotal): void
    {
        $this->BCSubTotal = $bcSubTotal;
    }

    /**
     * Set the BCTotal
     *
     * @param float|null $bcTotal The BCTotal
     */
    public function setBCTotal(?float $bcTotal): void
    {
        $this->BCTotal = $bcTotal;
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
     * Set the ExchangeRate
     *
     * @param float|null $exchangeRate The ExchangeRate
     */
    public function setExchangeRate(?float $exchangeRate): void
    {
        $this->ExchangeRate = $exchangeRate;
    }

    /**
     * Set the CreditType
     *
     * @param string|null $creditType The CreditType
     */
    public function setCreditType(?string $creditType): void
    {
        $this->CreditType = $creditType;
    }

    /**
     * Set the InvoiceNumber
     *
     * @param string|null $invoiceNumber The InvoiceNumber
     */
    public function setInvoiceNumber(?string $invoiceNumber): void
    {
        $this->InvoiceNumber = $invoiceNumber;
    }

    /**
     * Set the SalesInvoiceDate
     *
     * @param string|null $salesInvoiceDate The SalesInvoiceDate
     */
    public function setSalesInvoiceDate(?string $salesInvoiceDate): void
    {
        $this->SalesInvoiceDate = $salesInvoiceDate;
    }

    /**
     * Set the RequiredDeliveryDate
     *
     * @param string|null $requiredDeliveryDate The RequiredDeliveryDate
     */
    public function setRequiredDeliveryDate(?string $requiredDeliveryDate): void
    {
        $this->RequiredDeliveryDate = $requiredDeliveryDate;
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
     * Set the Warehouse
     *
     * @param array|null $warehouse The Warehouse
     */
    public function setWarehouse(?array $warehouse): void
    {
        $this->Warehouse = $warehouse;
    }

    /**
     * Set the SalesOrder
     *
     * @param array|null $salesOrder The SalesOrder
     */
    public function setSalesOrder(?array $salesOrder): void
    {
        $this->SalesOrder = $salesOrder;
    }

    /**
     * Set the Currency
     *
     * @param array|null $currency The Currency
     */
    public function setCurrency(?array $currency): void
    {
        $this->Currency = $currency;
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
     * Set the CreditLines
     *
     * @param array|null $creditLines The CreditLines
     */
    public function setCreditLines(?array $creditLines): void
    {
        $this->CreditLines = $creditLines;
    }
}
