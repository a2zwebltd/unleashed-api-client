<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Supplier Data Transfer Object - Represents suppliers in the system
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Suppliers
 */
class Supplier extends BaseDto
{
        /**
         * @var string|null SupplierCode
         */
    public ?string $SupplierCode = null;
        /**
         * @var string|null SupplierName
         */
    public ?string $SupplierName = null;
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
         * @var string|null GSTVATNumber
         */
    public ?string $GSTVATNumber = null;
        /**
         * @var string|null BankName
         */
    public ?string $BankName = null;
        /**
         * @var string|null BankBranch
         */
    public ?string $BankBranch = null;
        /**
         * @var string|null BankAccount
         */
    public ?string $BankAccount = null;
        /**
         * @var string|null Website
         */
    public ?string $Website = null;
        /**
         * @var string|null PhoneNumber
         */
    public ?string $PhoneNumber = null;
        /**
         * @var string|null FaxNumber
         */
    public ?string $FaxNumber = null;
        /**
         * @var string|null MobileNumber
         */
    public ?string $MobileNumber = null;
        /**
         * @var string|null DDINumber
         */
    public ?string $DDINumber = null;
        /**
         * @var string|null TollFreeNumber
         */
    public ?string $TollFreeNumber = null;
        /**
         * @var string|null Email
         */
    public ?string $Email = null;
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;
        /**
         * @var bool|null Taxable
         */
    public ?bool $Taxable = null;
        /**
         * @var string|null XeroContactId
         */
    public ?string $XeroContactId = null;
        /**
         * @var array|null Addresses
         */
    public ?array $Addresses = null;
        /**
         * @var array|null Currency
         */
    public ?array $Currency = null;
        /**
         * @var array|null DefaultWarehouse
         */
    public ?array $DefaultWarehouse = null;
        /**
         * @var float|null LeadTimeDays
         */
    public ?float $LeadTimeDays = null;
        /**
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var float|null MinimumOrderValue
         */
    public ?float $MinimumOrderValue = null;
        /**
         * @var string|null PaymentTerm
         */
    public ?string $PaymentTerm = null;
        /**
         * @var string|null PurchaseOrderCostDistributionMethod
         */
    public ?string $PurchaseOrderCostDistributionMethod = null;
        /**
         * @var string|null PurchaseOrderPrintTemplate
         */
    public ?string $PurchaseOrderPrintTemplate = null;
        /**
         * @var string|null SupplierReturnPrintTemplate
         */
    public ?string $SupplierReturnPrintTemplate = null;
        /**
         * @var string|null Reminder
         */
    public ?string $Reminder = null;

    // Getters for all properties
    /**
     * Get the SupplierCode
     *
     * @return string|null The SupplierCode
     */
    public function getSupplierCode(): ?string
    {
        return $this->SupplierCode;
    }

    /**
     * Get the SupplierName
     *
     * @return string|null The SupplierName
     */
    public function getSupplierName(): ?string
    {
        return $this->SupplierName;
    }

    /**
     * Get the Obsolete
     *
     * @return bool|null The Obsolete
     */
    public function getObsolete(): ?bool
    {
        return $this->Obsolete;
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

    // Setters for all properties
    /**
     * Set the SupplierCode
     *
     * @param string|null $supplierCode The SupplierCode
     */
    public function setSupplierCode(?string $supplierCode): void
    {
        $this->SupplierCode = $supplierCode;
    }

    /**
     * Set the SupplierName
     *
     * @param string|null $supplierName The SupplierName
     */
    public function setSupplierName(?string $supplierName): void
    {
        $this->SupplierName = $supplierName;
    }

    /**
     * Set the Obsolete
     *
     * @param bool|null $obsolete The Obsolete
     */
    public function setObsolete(?bool $obsolete): void
    {
        $this->Obsolete = $obsolete;
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

    // API Documentation getters
        /**
         * Get the GSTVATNumber
         *
         * @return string|null The GSTVATNumber
         */
    public function getGSTVATNumber(): ?string
    {
        return $this->GSTVATNumber;
    }
        /**
         * Get the BankName
         *
         * @return string|null The BankName
         */
    public function getBankName(): ?string
    {
        return $this->BankName;
    }
        /**
         * Get the BankBranch
         *
         * @return string|null The BankBranch
         */
    public function getBankBranch(): ?string
    {
        return $this->BankBranch;
    }
        /**
         * Get the BankAccount
         *
         * @return string|null The BankAccount
         */
    public function getBankAccount(): ?string
    {
        return $this->BankAccount;
    }
        /**
         * Get the Website
         *
         * @return string|null The Website
         */
    public function getWebsite(): ?string
    {
        return $this->Website;
    }
        /**
         * Get the PhoneNumber
         *
         * @return string|null The PhoneNumber
         */
    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }
        /**
         * Get the FaxNumber
         *
         * @return string|null The FaxNumber
         */
    public function getFaxNumber(): ?string
    {
        return $this->FaxNumber;
    }
        /**
         * Get the MobileNumber
         *
         * @return string|null The MobileNumber
         */
    public function getMobileNumber(): ?string
    {
        return $this->MobileNumber;
    }
        /**
         * Get the DDINumber
         *
         * @return string|null The DDINumber
         */
    public function getDDINumber(): ?string
    {
        return $this->DDINumber;
    }
        /**
         * Get the TollFreeNumber
         *
         * @return string|null The TollFreeNumber
         */
    public function getTollFreeNumber(): ?string
    {
        return $this->TollFreeNumber;
    }
        /**
         * Get the Email
         *
         * @return string|null The Email
         */
    public function getEmail(): ?string
    {
        return $this->Email;
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
         * Get the Taxable
         *
         * @return bool|null The Taxable
         */
    public function getTaxable(): ?bool
    {
        return $this->Taxable;
    }
        /**
         * Get the XeroContactId
         *
         * @return string|null The XeroContactId
         */
    public function getXeroContactId(): ?string
    {
        return $this->XeroContactId;
    }
        /**
         * Get the Addresses
         *
         * @return array|null The Addresses
         */
    public function getAddresses(): ?array
    {
        return $this->Addresses;
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
         * Get the DefaultWarehouse
         *
         * @return array|null The DefaultWarehouse
         */
    public function getDefaultWarehouse(): ?array
    {
        return $this->DefaultWarehouse;
    }
        /**
         * Get the LeadTimeDays
         *
         * @return float|null The LeadTimeDays
         */
    public function getLeadTimeDays(): ?float
    {
        return $this->LeadTimeDays;
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
         * Get the MinimumOrderValue
         *
         * @return float|null The MinimumOrderValue
         */
    public function getMinimumOrderValue(): ?float
    {
        return $this->MinimumOrderValue;
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
         * Get the PurchaseOrderCostDistributionMethod
         *
         * @return string|null The PurchaseOrderCostDistributionMethod
         */
    public function getPurchaseOrderCostDistributionMethod(): ?string
    {
        return $this->PurchaseOrderCostDistributionMethod;
    }
        /**
         * Get the PurchaseOrderPrintTemplate
         *
         * @return string|null The PurchaseOrderPrintTemplate
         */
    public function getPurchaseOrderPrintTemplate(): ?string
    {
        return $this->PurchaseOrderPrintTemplate;
    }
        /**
         * Get the SupplierReturnPrintTemplate
         *
         * @return string|null The SupplierReturnPrintTemplate
         */
    public function getSupplierReturnPrintTemplate(): ?string
    {
        return $this->SupplierReturnPrintTemplate;
    }
        /**
         * Get the Reminder
         *
         * @return string|null The Reminder
         */
    public function getReminder(): ?string
    {
        return $this->Reminder;
    }

    // API Documentation setters
        /**
         * Set the GSTVATNumber
         *
         * @param string|null $gstVatNumber The GSTVATNumber
         */
    public function setGSTVATNumber(?string $gstVatNumber): void
    {
        $this->GSTVATNumber = $gstVatNumber;
    }
        /**
         * Set the BankName
         *
         * @param string|null $bankName The BankName
         */
    public function setBankName(?string $bankName): void
    {
        $this->BankName = $bankName;
    }
        /**
         * Set the BankBranch
         *
         * @param string|null $bankBranch The BankBranch
         */
    public function setBankBranch(?string $bankBranch): void
    {
        $this->BankBranch = $bankBranch;
    }
        /**
         * Set the BankAccount
         *
         * @param string|null $bankAccount The BankAccount
         */
    public function setBankAccount(?string $bankAccount): void
    {
        $this->BankAccount = $bankAccount;
    }
        /**
         * Set the Website
         *
         * @param string|null $website The Website
         */
    public function setWebsite(?string $website): void
    {
        $this->Website = $website;
    }
        /**
         * Set the PhoneNumber
         *
         * @param string|null $phoneNumber The PhoneNumber
         */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->PhoneNumber = $phoneNumber;
    }
        /**
         * Set the FaxNumber
         *
         * @param string|null $faxNumber The FaxNumber
         */
    public function setFaxNumber(?string $faxNumber): void
    {
        $this->FaxNumber = $faxNumber;
    }
        /**
         * Set the MobileNumber
         *
         * @param string|null $mobileNumber The MobileNumber
         */
    public function setMobileNumber(?string $mobileNumber): void
    {
        $this->MobileNumber = $mobileNumber;
    }
        /**
         * Set the DDINumber
         *
         * @param string|null $ddiNumber The DDINumber
         */
    public function setDDINumber(?string $ddiNumber): void
    {
        $this->DDINumber = $ddiNumber;
    }
        /**
         * Set the TollFreeNumber
         *
         * @param string|null $tollFreeNumber The TollFreeNumber
         */
    public function setTollFreeNumber(?string $tollFreeNumber): void
    {
        $this->TollFreeNumber = $tollFreeNumber;
    }
        /**
         * Set the Email
         *
         * @param string|null $email The Email
         */
    public function setEmail(?string $email): void
    {
        $this->Email = $email;
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
         * Set the Taxable
         *
         * @param bool|null $taxable The Taxable
         */
    public function setTaxable(?bool $taxable): void
    {
        $this->Taxable = $taxable;
    }
        /**
         * Set the XeroContactId
         *
         * @param string|null $xeroContactId The XeroContactId
         */
    public function setXeroContactId(?string $xeroContactId): void
    {
        $this->XeroContactId = $xeroContactId;
    }
        /**
         * Set the Addresses
         *
         * @param array|null $addresses The Addresses
         */
    public function setAddresses(?array $addresses): void
    {
        $this->Addresses = $addresses;
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
         * Set the DefaultWarehouse
         *
         * @param array|null $defaultWarehouse The DefaultWarehouse
         */
    public function setDefaultWarehouse(?array $defaultWarehouse): void
    {
        $this->DefaultWarehouse = $defaultWarehouse;
    }
        /**
         * Set the LeadTimeDays
         *
         * @param float|null $leadTimeDays The LeadTimeDays
         */
    public function setLeadTimeDays(?float $leadTimeDays): void
    {
        $this->LeadTimeDays = $leadTimeDays;
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
         * Set the MinimumOrderValue
         *
         * @param float|null $minimumOrderValue The MinimumOrderValue
         */
    public function setMinimumOrderValue(?float $minimumOrderValue): void
    {
        $this->MinimumOrderValue = $minimumOrderValue;
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
         * Set the PurchaseOrderCostDistributionMethod
         *
         * @param string|null $purchaseOrderCostDistributionMethod The PurchaseOrderCostDistributionMethod
         */
    public function setPurchaseOrderCostDistributionMethod(?string $purchaseOrderCostDistributionMethod): void
    {
        $this->PurchaseOrderCostDistributionMethod = $purchaseOrderCostDistributionMethod;
    }
        /**
         * Set the PurchaseOrderPrintTemplate
         *
         * @param string|null $purchaseOrderPrintTemplate The PurchaseOrderPrintTemplate
         */
    public function setPurchaseOrderPrintTemplate(?string $purchaseOrderPrintTemplate): void
    {
        $this->PurchaseOrderPrintTemplate = $purchaseOrderPrintTemplate;
    }
        /**
         * Set the SupplierReturnPrintTemplate
         *
         * @param string|null $supplierReturnPrintTemplate The SupplierReturnPrintTemplate
         */
    public function setSupplierReturnPrintTemplate(?string $supplierReturnPrintTemplate): void
    {
        $this->SupplierReturnPrintTemplate = $supplierReturnPrintTemplate;
    }
        /**
         * Set the Reminder
         *
         * @param string|null $reminder The Reminder
         */
    public function setReminder(?string $reminder): void
    {
        $this->Reminder = $reminder;
    }
}
