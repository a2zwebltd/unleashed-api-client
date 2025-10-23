<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sales Quote Data Transfer Object - Represents sales quotes
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SalesQuotes
 */
class SalesQuote extends BaseDto
{
        /**
         * @var string|null SalesQuoteCode
         */
    public ?string $SalesQuoteCode = null;
        /**
         * @var string|null SalesQuoteName
         */
    public ?string $SalesQuoteName = null;
        /**
         * @var bool|null Obsolete
         */
    public ?bool $Obsolete = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // API Documentation fields
        /**
         * @var string|null QuoteNumber
         */
    public ?string $QuoteNumber = null;
        /**
         * @var string|null QuoteDate
         */
    public ?string $QuoteDate = null;
        /**
         * @var string|null QuoteExpiryDate
         */
    public ?string $QuoteExpiryDate = null;
        /**
         * @var string|null AcceptedDate
         */
    public ?string $AcceptedDate = null;
        /**
         * @var string|null QuoteStatus
         */
    public ?string $QuoteStatus = null;
        /**
         * @var array|null Customer
         */
    public ?array $Customer = null;
        /**
         * @var string|null CustomerRef
         */
    public ?string $CustomerRef = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;
        /**
         * @var array|null Warehouse
         */
    public ?array $Warehouse = null;
        /**
         * @var string|null DeliveryName
         */
    public ?string $DeliveryName = null;
        /**
         * @var string|null DeliveryStreetAddress
         */
    public ?string $DeliveryStreetAddress = null;
        /**
         * @var string|null DeliveryStreetAddress2
         */
    public ?string $DeliveryStreetAddress2 = null;
        /**
         * @var string|null DeliverySuburb
         */
    public ?string $DeliverySuburb = null;
        /**
         * @var string|null DeliveryCity
         */
    public ?string $DeliveryCity = null;
        /**
         * @var string|null DeliveryRegion
         */
    public ?string $DeliveryRegion = null;
        /**
         * @var string|null DeliveryCountry
         */
    public ?string $DeliveryCountry = null;
        /**
         * @var string|null DeliveryPostCode
         */
    public ?string $DeliveryPostCode = null;
        /**
         * @var array|null Currency
         */
    public ?array $Currency = null;
        /**
         * @var float|null ExchangeRate
         */
    public ?float $ExchangeRate = null;
        /**
         * @var float|null DiscountRate
         */
    public ?float $DiscountRate = null;
        /**
         * @var array|null Tax
         */
    public ?array $Tax = null;
        /**
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var string|null XeroTaxCode
         */
    public ?string $XeroTaxCode = null;
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
         * @var float|null TotalVolume
         */
    public ?float $TotalVolume = null;
        /**
         * @var float|null TotalWeight
         */
    public ?float $TotalWeight = null;
        /**
         * @var float|null BCSubTotal
         */
    public ?float $BCSubTotal = null;
        /**
         * @var float|null BCTaxTotal
         */
    public ?float $BCTaxTotal = null;
        /**
         * @var float|null BCTotal
         */
    public ?float $BCTotal = null;
        /**
         * @var array|null SalesOrderGroup
         */
    public ?array $SalesOrderGroup = null;
        /**
         * @var array|null DeliveryMethod
         */
    public ?array $DeliveryMethod = null;
        /**
         * @var array|null Salesperson
         */
    public ?array $Salesperson = null;
        /**
         * @var string|null SourceId
         */
    public ?string $SourceId = null;
        /**
         * @var array|null SalesQuoteLines
         */
    public ?array $SalesQuoteLines = null;

        /**
         * Get the SalesQuoteCode
         *
         * @return string|null The SalesQuoteCode
         */
    public function getSalesQuoteCode(): ?string
    {
        return $this->SalesQuoteCode;
    }
        /**
         * Get the SalesQuoteName
         *
         * @return string|null The SalesQuoteName
         */
    public function getSalesQuoteName(): ?string
    {
        return $this->SalesQuoteName;
    }
        /**
         * Set the SalesQuoteCode
         *
         * @param string|null $code The SalesQuoteCode
         */
    public function setSalesQuoteCode(?string $code): void
    {
        $this->SalesQuoteCode = $code;
    }
        /**
         * Set the SalesQuoteName
         *
         * @param string|null $name The SalesQuoteName
         */
    public function setSalesQuoteName(?string $name): void
    {
        $this->SalesQuoteName = $name;
    }

    // API Documentation getters
        /**
         * Get the QuoteNumber
         *
         * @return string|null The QuoteNumber
         */
    public function getQuoteNumber(): ?string
    {
        return $this->QuoteNumber;
    }
        /**
         * Get the QuoteDate
         *
         * @return string|null The QuoteDate
         */
    public function getQuoteDate(): ?string
    {
        return $this->QuoteDate;
    }
        /**
         * Get the QuoteExpiryDate
         *
         * @return string|null The QuoteExpiryDate
         */
    public function getQuoteExpiryDate(): ?string
    {
        return $this->QuoteExpiryDate;
    }
        /**
         * Get the AcceptedDate
         *
         * @return string|null The AcceptedDate
         */
    public function getAcceptedDate(): ?string
    {
        return $this->AcceptedDate;
    }
        /**
         * Get the QuoteStatus
         *
         * @return string|null The QuoteStatus
         */
    public function getQuoteStatus(): ?string
    {
        return $this->QuoteStatus;
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
         * Get the CustomerRef
         *
         * @return string|null The CustomerRef
         */
    public function getCustomerRef(): ?string
    {
        return $this->CustomerRef;
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
         * Get the Warehouse
         *
         * @return array|null The Warehouse
         */
    public function getWarehouse(): ?array
    {
        return $this->Warehouse;
    }
        /**
         * Get the DeliveryName
         *
         * @return string|null The DeliveryName
         */
    public function getDeliveryName(): ?string
    {
        return $this->DeliveryName;
    }
        /**
         * Get the DeliveryStreetAddress
         *
         * @return string|null The DeliveryStreetAddress
         */
    public function getDeliveryStreetAddress(): ?string
    {
        return $this->DeliveryStreetAddress;
    }
        /**
         * Get the DeliveryStreetAddress2
         *
         * @return string|null The DeliveryStreetAddress2
         */
    public function getDeliveryStreetAddress2(): ?string
    {
        return $this->DeliveryStreetAddress2;
    }
        /**
         * Get the DeliverySuburb
         *
         * @return string|null The DeliverySuburb
         */
    public function getDeliverySuburb(): ?string
    {
        return $this->DeliverySuburb;
    }
        /**
         * Get the DeliveryCity
         *
         * @return string|null The DeliveryCity
         */
    public function getDeliveryCity(): ?string
    {
        return $this->DeliveryCity;
    }
        /**
         * Get the DeliveryRegion
         *
         * @return string|null The DeliveryRegion
         */
    public function getDeliveryRegion(): ?string
    {
        return $this->DeliveryRegion;
    }
        /**
         * Get the DeliveryCountry
         *
         * @return string|null The DeliveryCountry
         */
    public function getDeliveryCountry(): ?string
    {
        return $this->DeliveryCountry;
    }
        /**
         * Get the DeliveryPostCode
         *
         * @return string|null The DeliveryPostCode
         */
    public function getDeliveryPostCode(): ?string
    {
        return $this->DeliveryPostCode;
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
         * Get the ExchangeRate
         *
         * @return float|null The ExchangeRate
         */
    public function getExchangeRate(): ?float
    {
        return $this->ExchangeRate;
    }
        /**
         * Get the DiscountRate
         *
         * @return float|null The DiscountRate
         */
    public function getDiscountRate(): ?float
    {
        return $this->DiscountRate;
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
         * Get the XeroTaxCode
         *
         * @return string|null The XeroTaxCode
         */
    public function getXeroTaxCode(): ?string
    {
        return $this->XeroTaxCode;
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
         * Get the TotalVolume
         *
         * @return float|null The TotalVolume
         */
    public function getTotalVolume(): ?float
    {
        return $this->TotalVolume;
    }
        /**
         * Get the TotalWeight
         *
         * @return float|null The TotalWeight
         */
    public function getTotalWeight(): ?float
    {
        return $this->TotalWeight;
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
         * Get the BCTaxTotal
         *
         * @return float|null The BCTaxTotal
         */
    public function getBCTaxTotal(): ?float
    {
        return $this->BCTaxTotal;
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
         * Get the SalesOrderGroup
         *
         * @return array|null The SalesOrderGroup
         */
    public function getSalesOrderGroup(): ?array
    {
        return $this->SalesOrderGroup;
    }
        /**
         * Get the DeliveryMethod
         *
         * @return array|null The DeliveryMethod
         */
    public function getDeliveryMethod(): ?array
    {
        return $this->DeliveryMethod;
    }
        /**
         * Get the Salesperson
         *
         * @return array|null The Salesperson
         */
    public function getSalesperson(): ?array
    {
        return $this->Salesperson;
    }
        /**
         * Get the SourceId
         *
         * @return string|null The SourceId
         */
    public function getSourceId(): ?string
    {
        return $this->SourceId;
    }
        /**
         * Get the SalesQuoteLines
         *
         * @return array|null The SalesQuoteLines
         */
    public function getSalesQuoteLines(): ?array
    {
        return $this->SalesQuoteLines;
    }

    // API Documentation setters
        /**
         * Set the QuoteNumber
         *
         * @param string|null $quoteNumber The QuoteNumber
         */
    public function setQuoteNumber(?string $quoteNumber): void
    {
        $this->QuoteNumber = $quoteNumber;
    }
        /**
         * Set the QuoteDate
         *
         * @param string|null $quoteDate The QuoteDate
         */
    public function setQuoteDate(?string $quoteDate): void
    {
        $this->QuoteDate = $quoteDate;
    }
        /**
         * Set the QuoteExpiryDate
         *
         * @param string|null $quoteExpiryDate The QuoteExpiryDate
         */
    public function setQuoteExpiryDate(?string $quoteExpiryDate): void
    {
        $this->QuoteExpiryDate = $quoteExpiryDate;
    }
        /**
         * Set the AcceptedDate
         *
         * @param string|null $acceptedDate The AcceptedDate
         */
    public function setAcceptedDate(?string $acceptedDate): void
    {
        $this->AcceptedDate = $acceptedDate;
    }
        /**
         * Set the QuoteStatus
         *
         * @param string|null $quoteStatus The QuoteStatus
         */
    public function setQuoteStatus(?string $quoteStatus): void
    {
        $this->QuoteStatus = $quoteStatus;
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
         * Set the CustomerRef
         *
         * @param string|null $customerRef The CustomerRef
         */
    public function setCustomerRef(?string $customerRef): void
    {
        $this->CustomerRef = $customerRef;
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
         * Set the Warehouse
         *
         * @param array|null $warehouse The Warehouse
         */
    public function setWarehouse(?array $warehouse): void
    {
        $this->Warehouse = $warehouse;
    }
        /**
         * Set the DeliveryName
         *
         * @param string|null $deliveryName The DeliveryName
         */
    public function setDeliveryName(?string $deliveryName): void
    {
        $this->DeliveryName = $deliveryName;
    }
        /**
         * Set the DeliveryStreetAddress
         *
         * @param string|null $deliveryStreetAddress The DeliveryStreetAddress
         */
    public function setDeliveryStreetAddress(?string $deliveryStreetAddress): void
    {
        $this->DeliveryStreetAddress = $deliveryStreetAddress;
    }
        /**
         * Set the DeliveryStreetAddress2
         *
         * @param string|null $deliveryStreetAddress2 The DeliveryStreetAddress2
         */
    public function setDeliveryStreetAddress2(?string $deliveryStreetAddress2): void
    {
        $this->DeliveryStreetAddress2 = $deliveryStreetAddress2;
    }
        /**
         * Set the DeliverySuburb
         *
         * @param string|null $deliverySuburb The DeliverySuburb
         */
    public function setDeliverySuburb(?string $deliverySuburb): void
    {
        $this->DeliverySuburb = $deliverySuburb;
    }
        /**
         * Set the DeliveryCity
         *
         * @param string|null $deliveryCity The DeliveryCity
         */
    public function setDeliveryCity(?string $deliveryCity): void
    {
        $this->DeliveryCity = $deliveryCity;
    }
        /**
         * Set the DeliveryRegion
         *
         * @param string|null $deliveryRegion The DeliveryRegion
         */
    public function setDeliveryRegion(?string $deliveryRegion): void
    {
        $this->DeliveryRegion = $deliveryRegion;
    }
        /**
         * Set the DeliveryCountry
         *
         * @param string|null $deliveryCountry The DeliveryCountry
         */
    public function setDeliveryCountry(?string $deliveryCountry): void
    {
        $this->DeliveryCountry = $deliveryCountry;
    }
        /**
         * Set the DeliveryPostCode
         *
         * @param string|null $deliveryPostCode The DeliveryPostCode
         */
    public function setDeliveryPostCode(?string $deliveryPostCode): void
    {
        $this->DeliveryPostCode = $deliveryPostCode;
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
         * Set the ExchangeRate
         *
         * @param float|null $exchangeRate The ExchangeRate
         */
    public function setExchangeRate(?float $exchangeRate): void
    {
        $this->ExchangeRate = $exchangeRate;
    }
        /**
         * Set the DiscountRate
         *
         * @param float|null $discountRate The DiscountRate
         */
    public function setDiscountRate(?float $discountRate): void
    {
        $this->DiscountRate = $discountRate;
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
         * Set the XeroTaxCode
         *
         * @param string|null $xeroTaxCode The XeroTaxCode
         */
    public function setXeroTaxCode(?string $xeroTaxCode): void
    {
        $this->XeroTaxCode = $xeroTaxCode;
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
         * Set the TotalVolume
         *
         * @param float|null $totalVolume The TotalVolume
         */
    public function setTotalVolume(?float $totalVolume): void
    {
        $this->TotalVolume = $totalVolume;
    }
        /**
         * Set the TotalWeight
         *
         * @param float|null $totalWeight The TotalWeight
         */
    public function setTotalWeight(?float $totalWeight): void
    {
        $this->TotalWeight = $totalWeight;
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
         * Set the BCTaxTotal
         *
         * @param float|null $bcTaxTotal The BCTaxTotal
         */
    public function setBCTaxTotal(?float $bcTaxTotal): void
    {
        $this->BCTaxTotal = $bcTaxTotal;
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
         * Set the SalesOrderGroup
         *
         * @param array|null $salesOrderGroup The SalesOrderGroup
         */
    public function setSalesOrderGroup(?array $salesOrderGroup): void
    {
        $this->SalesOrderGroup = $salesOrderGroup;
    }
        /**
         * Set the DeliveryMethod
         *
         * @param array|null $deliveryMethod The DeliveryMethod
         */
    public function setDeliveryMethod(?array $deliveryMethod): void
    {
        $this->DeliveryMethod = $deliveryMethod;
    }
        /**
         * Set the Salesperson
         *
         * @param array|null $salesperson The Salesperson
         */
    public function setSalesperson(?array $salesperson): void
    {
        $this->Salesperson = $salesperson;
    }
        /**
         * Set the SourceId
         *
         * @param string|null $sourceId The SourceId
         */
    public function setSourceId(?string $sourceId): void
    {
        $this->SourceId = $sourceId;
    }
        /**
         * Set the SalesQuoteLines
         *
         * @param array|null $salesQuoteLines The SalesQuoteLines
         */
    public function setSalesQuoteLines(?array $salesQuoteLines): void
    {
        $this->SalesQuoteLines = $salesQuoteLines;
    }
}
