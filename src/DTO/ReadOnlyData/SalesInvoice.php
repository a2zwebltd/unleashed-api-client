<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sales Invoice Data Transfer Object - Represents sales invoices
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SalesInvoices
 */
class SalesInvoice extends BaseDto
{
        /**
         * @var string|null SalesInvoiceCode
         */
    public ?string $SalesInvoiceCode = null;
        /**
         * @var string|null SalesInvoiceName
         */
    public ?string $SalesInvoiceName = null;
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
         * @var string|null InvoiceNumber
         */
    public ?string $InvoiceNumber = null;
        /**
         * @var string|null OrderNumber
         */
    public ?string $OrderNumber = null;
        /**
         * @var string|null QuoteNumber
         */
    public ?string $QuoteNumber = null;
        /**
         * @var string|null InvoiceDate
         */
    public ?string $InvoiceDate = null;
        /**
         * @var string|null DueDate
         */
    public ?string $DueDate = null;
        /**
         * @var string|null InvoiceStatus
         */
    public ?string $InvoiceStatus = null;
        /**
         * @var array|null Customer
         */
    public ?array $Customer = null;
        /**
         * @var array|null DeliveryAddress
         */
    public ?array $DeliveryAddress = null;
        /**
         * @var string|null DeliveryInstruction
         */
    public ?string $DeliveryInstruction = null;
        /**
         * @var float|null ExchangeRate
         */
    public ?float $ExchangeRate = null;
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
         * @var string|null PaymentTerm
         */
    public ?string $PaymentTerm = null;
        /**
         * @var bool|null PaymentReceived
         */
    public ?bool $PaymentReceived = null;
        /**
         * @var array|null InvoiceLines
         */
    public ?array $InvoiceLines = null;
        /**
         * @var array|null Currency
         */
    public ?array $Currency = null;
        /**
         * @var array|null PostalAddress
         */
    public ?array $PostalAddress = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;

        /**
         * Get the SalesInvoiceCode
         *
         * @return string|null The SalesInvoiceCode
         */
    public function getSalesInvoiceCode(): ?string
    {
        return $this->SalesInvoiceCode;
    }
        /**
         * Get the SalesInvoiceName
         *
         * @return string|null The SalesInvoiceName
         */
    public function getSalesInvoiceName(): ?string
    {
        return $this->SalesInvoiceName;
    }
        /**
         * Set the SalesInvoiceCode
         *
         * @param string|null $code The SalesInvoiceCode
         */
    public function setSalesInvoiceCode(?string $code): void
    {
        $this->SalesInvoiceCode = $code;
    }
        /**
         * Set the SalesInvoiceName
         *
         * @param string|null $name The SalesInvoiceName
         */
    public function setSalesInvoiceName(?string $name): void
    {
        $this->SalesInvoiceName = $name;
    }

    // API Documentation getters
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
         * Get the OrderNumber
         *
         * @return string|null The OrderNumber
         */
    public function getOrderNumber(): ?string
    {
        return $this->OrderNumber;
    }
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
         * Get the InvoiceDate
         *
         * @return string|null The InvoiceDate
         */
    public function getInvoiceDate(): ?string
    {
        return $this->InvoiceDate;
    }
        /**
         * Get the DueDate
         *
         * @return string|null The DueDate
         */
    public function getDueDate(): ?string
    {
        return $this->DueDate;
    }
        /**
         * Get the InvoiceStatus
         *
         * @return string|null The InvoiceStatus
         */
    public function getInvoiceStatus(): ?string
    {
        return $this->InvoiceStatus;
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
         * Get the DeliveryAddress
         *
         * @return array|null The DeliveryAddress
         */
    public function getDeliveryAddress(): ?array
    {
        return $this->DeliveryAddress;
    }
        /**
         * Get the DeliveryInstruction
         *
         * @return string|null The DeliveryInstruction
         */
    public function getDeliveryInstruction(): ?string
    {
        return $this->DeliveryInstruction;
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
         * Get the PaymentTerm
         *
         * @return string|null The PaymentTerm
         */
    public function getPaymentTerm(): ?string
    {
        return $this->PaymentTerm;
    }
        /**
         * Get the PaymentReceived
         *
         * @return bool|null The PaymentReceived
         */
    public function getPaymentReceived(): ?bool
    {
        return $this->PaymentReceived;
    }
        /**
         * Get the InvoiceLines
         *
         * @return array|null The InvoiceLines
         */
    public function getInvoiceLines(): ?array
    {
        return $this->InvoiceLines;
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
         * Get the PostalAddress
         *
         * @return array|null The PostalAddress
         */
    public function getPostalAddress(): ?array
    {
        return $this->PostalAddress;
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

    // API Documentation setters
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
         * Set the OrderNumber
         *
         * @param string|null $orderNumber The OrderNumber
         */
    public function setOrderNumber(?string $orderNumber): void
    {
        $this->OrderNumber = $orderNumber;
    }
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
         * Set the InvoiceDate
         *
         * @param string|null $invoiceDate The InvoiceDate
         */
    public function setInvoiceDate(?string $invoiceDate): void
    {
        $this->InvoiceDate = $invoiceDate;
    }
        /**
         * Set the DueDate
         *
         * @param string|null $dueDate The DueDate
         */
    public function setDueDate(?string $dueDate): void
    {
        $this->DueDate = $dueDate;
    }
        /**
         * Set the InvoiceStatus
         *
         * @param string|null $invoiceStatus The InvoiceStatus
         */
    public function setInvoiceStatus(?string $invoiceStatus): void
    {
        $this->InvoiceStatus = $invoiceStatus;
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
         * Set the DeliveryAddress
         *
         * @param array|null $deliveryAddress The DeliveryAddress
         */
    public function setDeliveryAddress(?array $deliveryAddress): void
    {
        $this->DeliveryAddress = $deliveryAddress;
    }
        /**
         * Set the DeliveryInstruction
         *
         * @param string|null $deliveryInstruction The DeliveryInstruction
         */
    public function setDeliveryInstruction(?string $deliveryInstruction): void
    {
        $this->DeliveryInstruction = $deliveryInstruction;
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
         * Set the PaymentTerm
         *
         * @param string|null $paymentTerm The PaymentTerm
         */
    public function setPaymentTerm(?string $paymentTerm): void
    {
        $this->PaymentTerm = $paymentTerm;
    }
        /**
         * Set the PaymentReceived
         *
         * @param bool|null $paymentReceived The PaymentReceived
         */
    public function setPaymentReceived(?bool $paymentReceived): void
    {
        $this->PaymentReceived = $paymentReceived;
    }
        /**
         * Set the InvoiceLines
         *
         * @param array|null $invoiceLines The InvoiceLines
         */
    public function setInvoiceLines(?array $invoiceLines): void
    {
        $this->InvoiceLines = $invoiceLines;
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
         * Set the PostalAddress
         *
         * @param array|null $postalAddress The PostalAddress
         */
    public function setPostalAddress(?array $postalAddress): void
    {
        $this->PostalAddress = $postalAddress;
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
}
