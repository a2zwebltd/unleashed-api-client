<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Supplier Return Data Transfer Object - Represents supplier returns
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/SupplierReturns
 */
class SupplierReturn extends BaseDto
{
    // Core properties
        /**
         * @var string|null Guid
         */
    public ?string $Guid = null;
        /**
         * @var string|null SupplierReturnNumber
         */
    public ?string $SupplierReturnNumber = null;
        /**
         * @var string|null ReturnDate
         */
    public ?string $ReturnDate = null;
        /**
         * @var string|null Status
         */
    public ?string $Status = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;
        /**
         * @var string|null SupplierRef
         */
    public ?string $SupplierRef = null;
        /**
         * @var string|null SupplierEORI
         */
    public ?string $SupplierEORI = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null CreatedOn
         */
    public ?string $CreatedOn = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;
        /**
         * @var string|null LastModifiedOn
         */
    public ?string $LastModifiedOn = null;

    // Financial properties
        /**
         * @var float|null SubTotal
         */
    public ?float $SubTotal = null;
        /**
         * @var float|null TaxTotal
         */
    public ?float $TaxTotal = null;
        /**
         * @var float|null Total
         */
    public ?float $Total = null;
        /**
         * @var float|null BaseSubTotal
         */
    public ?float $BaseSubTotal = null;
        /**
         * @var float|null BaseTaxTotal
         */
    public ?float $BaseTaxTotal = null;
        /**
         * @var float|null BaseTotal
         */
    public ?float $BaseTotal = null;
        /**
         * @var float|null BaseReturnCostTotal
         */
    public ?float $BaseReturnCostTotal = null;
        /**
         * @var float|null BaseReturnCostTaxTotal
         */
    public ?float $BaseReturnCostTaxTotal = null;
        /**
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var float|null ExchangeRate
         */
    public ?float $ExchangeRate = null;
        /**
         * @var string|null XeroTaxCode
         */
    public ?string $XeroTaxCode = null;

    // Complex objects (arrays from API)
        /**
         * @var array|null Supplier
         */
    public ?array $Supplier = null;
        /**
         * @var array|null PurchaseOrder
         */
    public ?array $PurchaseOrder = null;
        /**
         * @var array|null Warehouse
         */
    public ?array $Warehouse = null;
        /**
         * @var array|null Currency
         */
    public ?array $Currency = null;
        /**
         * @var array|null SupplierReturnLines
         */
    public ?array $SupplierReturnLines = null;
        /**
         * @var array|null SupplierReturnCosts
         */
    public ?array $SupplierReturnCosts = null;
        /**
         * @var array|null ProductBatches
         */
    public ?array $ProductBatches = null;
        /**
         * @var array|null ProductSerials
         */
    public ?array $ProductSerials = null;

    // Simple getters
        /**
         * Get the Guid
         *
         * @return string|null The Guid
         */
    public function getGuid(): ?string
    {
        return $this->Guid;
    }

        /**
         * Get the SupplierReturnNumber
         *
         * @return string|null The SupplierReturnNumber
         */
    public function getSupplierReturnNumber(): ?string
    {
        return $this->SupplierReturnNumber;
    }

        /**
         * Get the ReturnDate
         *
         * @return string|null The ReturnDate
         */
    public function getReturnDate(): ?string
    {
        return $this->ReturnDate;
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
         * Get the Comments
         *
         * @return string|null The Comments
         */
    public function getComments(): ?string
    {
        return $this->Comments;
    }

        /**
         * Get the SupplierRef
         *
         * @return string|null The SupplierRef
         */
    public function getSupplierRef(): ?string
    {
        return $this->SupplierRef;
    }

        /**
         * Get the SupplierEORI
         *
         * @return string|null The SupplierEORI
         */
    public function getSupplierEORI(): ?string
    {
        return $this->SupplierEORI;
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
         * Get the Total
         *
         * @return float|null The Total
         */
    public function getTotal(): ?float
    {
        return $this->Total;
    }

        /**
         * Get the BaseSubTotal
         *
         * @return float|null The BaseSubTotal
         */
    public function getBaseSubTotal(): ?float
    {
        return $this->BaseSubTotal;
    }

        /**
         * Get the BaseTaxTotal
         *
         * @return float|null The BaseTaxTotal
         */
    public function getBaseTaxTotal(): ?float
    {
        return $this->BaseTaxTotal;
    }

        /**
         * Get the BaseTotal
         *
         * @return float|null The BaseTotal
         */
    public function getBaseTotal(): ?float
    {
        return $this->BaseTotal;
    }

        /**
         * Get the BaseReturnCostTotal
         *
         * @return float|null The BaseReturnCostTotal
         */
    public function getBaseReturnCostTotal(): ?float
    {
        return $this->BaseReturnCostTotal;
    }

        /**
         * Get the BaseReturnCostTaxTotal
         *
         * @return float|null The BaseReturnCostTaxTotal
         */
    public function getBaseReturnCostTaxTotal(): ?float
    {
        return $this->BaseReturnCostTaxTotal;
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
         * Get the XeroTaxCode
         *
         * @return string|null The XeroTaxCode
         */
    public function getXeroTaxCode(): ?string
    {
        return $this->XeroTaxCode;
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
         * Get the PurchaseOrder
         *
         * @return array|null The PurchaseOrder
         */
    public function getPurchaseOrder(): ?array
    {
        return $this->PurchaseOrder;
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
         * Get the Currency
         *
         * @return array|null The Currency
         */
    public function getCurrency(): ?array
    {
        return $this->Currency;
    }

        /**
         * Get the SupplierReturnLines
         *
         * @return array|null The SupplierReturnLines
         */
    public function getSupplierReturnLines(): ?array
    {
        return $this->SupplierReturnLines;
    }

        /**
         * Get the SupplierReturnCosts
         *
         * @return array|null The SupplierReturnCosts
         */
    public function getSupplierReturnCosts(): ?array
    {
        return $this->SupplierReturnCosts;
    }

        /**
         * Get the ProductBatches
         *
         * @return array|null The ProductBatches
         */
    public function getProductBatches(): ?array
    {
        return $this->ProductBatches;
    }

        /**
         * Get the ProductSerials
         *
         * @return array|null The ProductSerials
         */
    public function getProductSerials(): ?array
    {
        return $this->ProductSerials;
    }

    // Simple setters
        /**
         * Set the Guid
         *
         * @param string|null $guid The Guid
         */
    public function setGuid(?string $guid): void
    {
        $this->Guid = $guid;
    }

        /**
         * Set the SupplierReturnNumber
         *
         * @param string|null $supplierReturnNumber The SupplierReturnNumber
         */
    public function setSupplierReturnNumber(?string $supplierReturnNumber): void
    {
        $this->SupplierReturnNumber = $supplierReturnNumber;
    }

        /**
         * Set the ReturnDate
         *
         * @param string|null $returnDate The ReturnDate
         */
    public function setReturnDate(?string $returnDate): void
    {
        $this->ReturnDate = $returnDate;
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
         * Set the Comments
         *
         * @param string|null $comments The Comments
         */
    public function setComments(?string $comments): void
    {
        $this->Comments = $comments;
    }

        /**
         * Set the SupplierRef
         *
         * @param string|null $supplierRef The SupplierRef
         */
    public function setSupplierRef(?string $supplierRef): void
    {
        $this->SupplierRef = $supplierRef;
    }

        /**
         * Set the SupplierEORI
         *
         * @param string|null $supplierEORI The SupplierEORI
         */
    public function setSupplierEORI(?string $supplierEORI): void
    {
        $this->SupplierEORI = $supplierEORI;
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
         * Set the Total
         *
         * @param float|null $total The Total
         */
    public function setTotal(?float $total): void
    {
        $this->Total = $total;
    }

        /**
         * Set the BaseSubTotal
         *
         * @param float|null $baseSubTotal The BaseSubTotal
         */
    public function setBaseSubTotal(?float $baseSubTotal): void
    {
        $this->BaseSubTotal = $baseSubTotal;
    }

        /**
         * Set the BaseTaxTotal
         *
         * @param float|null $baseTaxTotal The BaseTaxTotal
         */
    public function setBaseTaxTotal(?float $baseTaxTotal): void
    {
        $this->BaseTaxTotal = $baseTaxTotal;
    }

        /**
         * Set the BaseTotal
         *
         * @param float|null $baseTotal The BaseTotal
         */
    public function setBaseTotal(?float $baseTotal): void
    {
        $this->BaseTotal = $baseTotal;
    }

        /**
         * Set the BaseReturnCostTotal
         *
         * @param float|null $baseReturnCostTotal The BaseReturnCostTotal
         */
    public function setBaseReturnCostTotal(?float $baseReturnCostTotal): void
    {
        $this->BaseReturnCostTotal = $baseReturnCostTotal;
    }

        /**
         * Set the BaseReturnCostTaxTotal
         *
         * @param float|null $baseReturnCostTaxTotal The BaseReturnCostTaxTotal
         */
    public function setBaseReturnCostTaxTotal(?float $baseReturnCostTaxTotal): void
    {
        $this->BaseReturnCostTaxTotal = $baseReturnCostTaxTotal;
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
         * Set the XeroTaxCode
         *
         * @param string|null $xeroTaxCode The XeroTaxCode
         */
    public function setXeroTaxCode(?string $xeroTaxCode): void
    {
        $this->XeroTaxCode = $xeroTaxCode;
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
         * Set the PurchaseOrder
         *
         * @param array|null $purchaseOrder The PurchaseOrder
         */
    public function setPurchaseOrder(?array $purchaseOrder): void
    {
        $this->PurchaseOrder = $purchaseOrder;
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
         * Set the Currency
         *
         * @param array|null $currency The Currency
         */
    public function setCurrency(?array $currency): void
    {
        $this->Currency = $currency;
    }

        /**
         * Set the SupplierReturnLines
         *
         * @param array|null $supplierReturnLines The SupplierReturnLines
         */
    public function setSupplierReturnLines(?array $supplierReturnLines): void
    {
        $this->SupplierReturnLines = $supplierReturnLines;
    }

        /**
         * Set the SupplierReturnCosts
         *
         * @param array|null $supplierReturnCosts The SupplierReturnCosts
         */
    public function setSupplierReturnCosts(?array $supplierReturnCosts): void
    {
        $this->SupplierReturnCosts = $supplierReturnCosts;
    }

        /**
         * Set the ProductBatches
         *
         * @param array|null $productBatches The ProductBatches
         */
    public function setProductBatches(?array $productBatches): void
    {
        $this->ProductBatches = $productBatches;
    }

        /**
         * Set the ProductSerials
         *
         * @param array|null $productSerials The ProductSerials
         */
    public function setProductSerials(?array $productSerials): void
    {
        $this->ProductSerials = $productSerials;
    }
}
