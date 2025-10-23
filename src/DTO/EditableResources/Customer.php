<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use DateTimeInterface;
use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Customer Data Transfer Object - Represents customers in the system
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/Customers
 */
class Customer extends BaseDto
{
    // Basic customer info (required fields)
    public string $CustomerCode;
    public string $CustomerName;
        /**
         * @var string|null Email
         */
    public ?string $Email = null;
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
         * @var string|null EmailCC
         */
    public ?string $EmailCC = null;
        /**
         * @var string|null Website
         */
    public ?string $Website = null;
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;

    // Tax information
        /**
         * @var string|null TaxCode
         */
    public ?string $TaxCode = null;
        /**
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var bool|null Taxable
         */
    public ?bool $Taxable = null;

    // Financial
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
         * @var float|null DiscountRate
         */
    public ?float $DiscountRate = null;
        /**
         * @var bool|null HasCreditLimit
         */
    public ?bool $HasCreditLimit = null;
        /**
         * @var float|null CreditLimit
         */
    public ?float $CreditLimit = null;

    // Customer settings
        /**
         * @var string|null CustomerType
         */
    public ?string $CustomerType = null;
        /**
         * @var string|null CustomerTypeGuid
         */
    public ?string $CustomerTypeGuid = null;
        /**
         * @var string|null PaymentTerm
         */
    public ?string $PaymentTerm = null;
        /**
         * @var string|null SellPriceTier
         */
    public ?string $SellPriceTier = null;
        /**
         * @var string|null SellPriceTierReference
         */
    public ?string $SellPriceTierReference = null;
        /**
         * @var string|null SalesPerson
         */
    public ?string $SalesPerson = null;

    // Status flags
        /**
         * @var bool|null Obsolete
         */
    public ?bool $Obsolete = null;
        /**
         * @var bool|null StopCredit
         */
    public ?bool $StopCredit = null;
        /**
         * @var bool|null PrintInvoice
         */
    public ?bool $PrintInvoice = null;
        /**
         * @var bool|null PrintPackingSlipInsteadOfInvoice
         */
    public ?bool $PrintPackingSlipInsteadOfInvoice = null;

    // Contact details
        /**
         * @var string|null ContactFirstName
         */
    public ?string $ContactFirstName = null;
        /**
         * @var string|null ContactLastName
         */
    public ?string $ContactLastName = null;

    // Xero integration
        /**
         * @var string|null XeroContactId
         */
    public ?string $XeroContactId = null;
        /**
         * @var string|null XeroSalesAccount
         */
    public ?string $XeroSalesAccount = null;
        /**
         * @var string|null XeroCostOfGoodsAccount
         */
    public ?string $XeroCostOfGoodsAccount = null;

    // Complex objects (arrays from API)
    /**
     * @var CustomerDeliveryAddress[]|null Customer delivery addresses
     */
        /**
         * @var array|null Addresses
         */
    public ?array $Addresses = null;

    /**
     * @var array[]|null Customer contacts
     */
        /**
         * @var array|null Contacts
         */
    public ?array $Contacts = null;

    /**
     * @var Currency|null Customer currency
     */
        /**
         * @var array|null Currency
         */
    public ?array $Currency = null;

    /**
     * @var SalesOrderGroup|null Sales order group
     */
        /**
         * @var array|null SalesOrderGroup
         */
    public ?array $SalesOrderGroup = null;

    /**
     * @var DeliveryMethod|null Delivery method
     */
        /**
         * @var array|null DeliveryMethod
         */
    public ?array $DeliveryMethod = null;

    /**
     * @var Warehouse|null Default warehouse
     */
        /**
         * @var array|null DefaultWarehouse
         */
    public ?array $DefaultWarehouse = null;

    // System fields
        /**
         * @var string|null SourceId
         */
    public ?string $SourceId = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;
        /**
         * @var string|null Reminder
         */
    public ?string $Reminder = null;
        /**
         * @var string|null EORINumber
         */
    public ?string $EORINumber = null;
        /**
         * @var string|null GSTVATNumber
         */
    public ?string $GSTVATNumber = null;

    // Getters for all properties
    /**
     * Get the CustomerCode
     *
     * @return string|null The CustomerCode
     */
    public function getCustomerCode(): ?string
    {
        return $this->CustomerCode;
    }

    /**
     * Get the CustomerName
     *
     * @return string|null The CustomerName
     */
    public function getCustomerName(): ?string
    {
        return $this->CustomerName;
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
     * Get the EmailCC
     *
     * @return string|null The EmailCC
     */
    public function getEmailCC(): ?string
    {
        return $this->EmailCC;
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
     * Get the Notes
     *
     * @return string|null The Notes
     */
    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    /**
     * Get the TaxCode
     *
     * @return string|null The TaxCode
     */
    public function getTaxCode(): ?string
    {
        return $this->TaxCode;
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
     * Get the Taxable
     *
     * @return bool|null The Taxable
     */
    public function getTaxable(): ?bool
    {
        return $this->Taxable;
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
     * Get the DiscountRate
     *
     * @return float|null The DiscountRate
     */
    public function getDiscountRate(): ?float
    {
        return $this->DiscountRate;
    }

    /**
     * Get the HasCreditLimit
     *
     * @return bool|null The HasCreditLimit
     */
    public function getHasCreditLimit(): ?bool
    {
        return $this->HasCreditLimit;
    }

    /**
     * Get the CreditLimit
     *
     * @return float|null The CreditLimit
     */
    public function getCreditLimit(): ?float
    {
        return $this->CreditLimit;
    }

    /**
     * Get the CustomerType
     *
     * @return string|null The CustomerType
     */
    public function getCustomerType(): ?string
    {
        return $this->CustomerType;
    }

    /**
     * Get the CustomerTypeGuid
     *
     * @return string|null The CustomerTypeGuid
     */
    public function getCustomerTypeGuid(): ?string
    {
        return $this->CustomerTypeGuid;
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
     * Get the SellPriceTier
     *
     * @return string|null The SellPriceTier
     */
    public function getSellPriceTier(): ?string
    {
        return $this->SellPriceTier;
    }

    /**
     * Get the SellPriceTierReference
     *
     * @return string|null The SellPriceTierReference
     */
    public function getSellPriceTierReference(): ?string
    {
        return $this->SellPriceTierReference;
    }

    /**
     * Get the SalesPerson
     *
     * @return string|null The SalesPerson
     */
    public function getSalesPerson(): ?string
    {
        return $this->SalesPerson;
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
     * Get the StopCredit
     *
     * @return bool|null The StopCredit
     */
    public function getStopCredit(): ?bool
    {
        return $this->StopCredit;
    }

    /**
     * Get the PrintInvoice
     *
     * @return bool|null The PrintInvoice
     */
    public function getPrintInvoice(): ?bool
    {
        return $this->PrintInvoice;
    }

    /**
     * Get the PrintPackingSlipInsteadOfInvoice
     *
     * @return bool|null The PrintPackingSlipInsteadOfInvoice
     */
    public function getPrintPackingSlipInsteadOfInvoice(): ?bool
    {
        return $this->PrintPackingSlipInsteadOfInvoice;
    }

    /**
     * Get the ContactFirstName
     *
     * @return string|null The ContactFirstName
     */
    public function getContactFirstName(): ?string
    {
        return $this->ContactFirstName;
    }

    /**
     * Get the ContactLastName
     *
     * @return string|null The ContactLastName
     */
    public function getContactLastName(): ?string
    {
        return $this->ContactLastName;
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
     * Get the XeroSalesAccount
     *
     * @return string|null The XeroSalesAccount
     */
    public function getXeroSalesAccount(): ?string
    {
        return $this->XeroSalesAccount;
    }

    /**
     * Get the XeroCostOfGoodsAccount
     *
     * @return string|null The XeroCostOfGoodsAccount
     */
    public function getXeroCostOfGoodsAccount(): ?string
    {
        return $this->XeroCostOfGoodsAccount;
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
     * Get the Contacts
     *
     * @return array|null The Contacts
     */
    public function getContacts(): ?array
    {
        return $this->Contacts;
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
     * Get the DefaultWarehouse
     *
     * @return array|null The DefaultWarehouse
     */
    public function getDefaultWarehouse(): ?array
    {
        return $this->DefaultWarehouse;
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
     * Get the Reminder
     *
     * @return string|null The Reminder
     */
    public function getReminder(): ?string
    {
        return $this->Reminder;
    }

    /**
     * Get the EORINumber
     *
     * @return string|null The EORINumber
     */
    public function getEORINumber(): ?string
    {
        return $this->EORINumber;
    }

    /**
     * Get the GSTVATNumber
     *
     * @return string|null The GSTVATNumber
     */
    public function getGSTVATNumber(): ?string
    {
        return $this->GSTVATNumber;
    }

    // Setters for all properties
    /**
     * Set the CustomerCode
     *
     * @param string|null $customerCode The CustomerCode
     */
    public function setCustomerCode(?string $customerCode): void
    {
        $this->CustomerCode = $customerCode;
    }

    /**
     * Set the CustomerName
     *
     * @param string|null $customerName The CustomerName
     */
    public function setCustomerName(?string $customerName): void
    {
        $this->CustomerName = $customerName;
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
     * Set the EmailCC
     *
     * @param string|null $emailCC The EmailCC
     */
    public function setEmailCC(?string $emailCC): void
    {
        $this->EmailCC = $emailCC;
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
     * Set the Notes
     *
     * @param string|null $notes The Notes
     */
    public function setNotes(?string $notes): void
    {
        $this->Notes = $notes;
    }

    /**
     * Set the TaxCode
     *
     * @param string|null $taxCode The TaxCode
     */
    public function setTaxCode(?string $taxCode): void
    {
        $this->TaxCode = $taxCode;
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
     * Set the Taxable
     *
     * @param bool|null $taxable The Taxable
     */
    public function setTaxable(?bool $taxable): void
    {
        $this->Taxable = $taxable;
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
     * Set the DiscountRate
     *
     * @param float|null $discountRate The DiscountRate
     */
    public function setDiscountRate(?float $discountRate): void
    {
        $this->DiscountRate = $discountRate;
    }

    /**
     * Set the HasCreditLimit
     *
     * @param bool|null $hasCreditLimit The HasCreditLimit
     */
    public function setHasCreditLimit(?bool $hasCreditLimit): void
    {
        $this->HasCreditLimit = $hasCreditLimit;
    }

    /**
     * Set the CreditLimit
     *
     * @param float|null $creditLimit The CreditLimit
     */
    public function setCreditLimit(?float $creditLimit): void
    {
        $this->CreditLimit = $creditLimit;
    }

    /**
     * Set the CustomerType
     *
     * @param string|null $customerType The CustomerType
     */
    public function setCustomerType(?string $customerType): void
    {
        $this->CustomerType = $customerType;
    }

    /**
     * Set the CustomerTypeGuid
     *
     * @param string|null $customerTypeGuid The CustomerTypeGuid
     */
    public function setCustomerTypeGuid(?string $customerTypeGuid): void
    {
        $this->CustomerTypeGuid = $customerTypeGuid;
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
     * Set the SellPriceTier
     *
     * @param string|null $sellPriceTier The SellPriceTier
     */
    public function setSellPriceTier(?string $sellPriceTier): void
    {
        $this->SellPriceTier = $sellPriceTier;
    }

    /**
     * Set the SellPriceTierReference
     *
     * @param string|null $sellPriceTierReference The SellPriceTierReference
     */
    public function setSellPriceTierReference(?string $sellPriceTierReference): void
    {
        $this->SellPriceTierReference = $sellPriceTierReference;
    }

    /**
     * Set the SalesPerson
     *
     * @param string|null $salesPerson The SalesPerson
     */
    public function setSalesPerson(?string $salesPerson): void
    {
        $this->SalesPerson = $salesPerson;
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
     * Set the StopCredit
     *
     * @param bool|null $stopCredit The StopCredit
     */
    public function setStopCredit(?bool $stopCredit): void
    {
        $this->StopCredit = $stopCredit;
    }

    /**
     * Set the PrintInvoice
     *
     * @param bool|null $printInvoice The PrintInvoice
     */
    public function setPrintInvoice(?bool $printInvoice): void
    {
        $this->PrintInvoice = $printInvoice;
    }

    /**
     * Set the PrintPackingSlipInsteadOfInvoice
     *
     * @param bool|null $printPackingSlipInsteadOfInvoice The PrintPackingSlipInsteadOfInvoice
     */
    public function setPrintPackingSlipInsteadOfInvoice(?bool $printPackingSlipInsteadOfInvoice): void
    {
        $this->PrintPackingSlipInsteadOfInvoice = $printPackingSlipInsteadOfInvoice;
    }

    /**
     * Set the ContactFirstName
     *
     * @param string|null $contactFirstName The ContactFirstName
     */
    public function setContactFirstName(?string $contactFirstName): void
    {
        $this->ContactFirstName = $contactFirstName;
    }

    /**
     * Set the ContactLastName
     *
     * @param string|null $contactLastName The ContactLastName
     */
    public function setContactLastName(?string $contactLastName): void
    {
        $this->ContactLastName = $contactLastName;
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
     * Set the XeroSalesAccount
     *
     * @param string|null $xeroSalesAccount The XeroSalesAccount
     */
    public function setXeroSalesAccount(?string $xeroSalesAccount): void
    {
        $this->XeroSalesAccount = $xeroSalesAccount;
    }

    /**
     * Set the XeroCostOfGoodsAccount
     *
     * @param string|null $xeroCostOfGoodsAccount The XeroCostOfGoodsAccount
     */
    public function setXeroCostOfGoodsAccount(?string $xeroCostOfGoodsAccount): void
    {
        $this->XeroCostOfGoodsAccount = $xeroCostOfGoodsAccount;
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
     * Set the Contacts
     *
     * @param array|null $contacts The Contacts
     */
    public function setContacts(?array $contacts): void
    {
        $this->Contacts = $contacts;
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
     * Set the DefaultWarehouse
     *
     * @param array|null $defaultWarehouse The DefaultWarehouse
     */
    public function setDefaultWarehouse(?array $defaultWarehouse): void
    {
        $this->DefaultWarehouse = $defaultWarehouse;
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
     * Set the Reminder
     *
     * @param string|null $reminder The Reminder
     */
    public function setReminder(?string $reminder): void
    {
        $this->Reminder = $reminder;
    }

    /**
     * Set the EORINumber
     *
     * @param string|null $eoriNumber The EORINumber
     */
    public function setEORINumber(?string $eoriNumber): void
    {
        $this->EORINumber = $eoriNumber;
    }

    /**
     * Set the GSTVATNumber
     *
     * @param string|null $gstvatNumber The GSTVATNumber
     */
    public function setGSTVATNumber(?string $gstvatNumber): void
    {
        $this->GSTVATNumber = $gstvatNumber;
    }
}
