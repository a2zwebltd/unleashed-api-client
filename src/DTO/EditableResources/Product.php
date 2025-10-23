<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use DateTimeInterface;
use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Product Data Transfer Object - Represents products in the system
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/Products
 */
class Product extends BaseDto
{
    // Basic product info (required fields)
    public ?string $ProductCode = null;
    public ?string $ProductDescription = null;
        /**
         * @var string|null Barcode
         */
    public ?string $Barcode = null;
        /**
         * @var string|null PackSize
         */
    public ?string $PackSize = null;

    // Physical dimensions
        /**
         * @var float|null Width
         */
    public ?float $Width = null;
        /**
         * @var float|null Height
         */
    public ?float $Height = null;
        /**
         * @var float|null Depth
         */
    public ?float $Depth = null;
        /**
         * @var float|null Weight
         */
    public ?float $Weight = null;

    // Stock levels
        /**
         * @var float|null MinStockAlertLevel
         */
    public ?float $MinStockAlertLevel = null;
        /**
         * @var float|null MaxStockAlertLevel
         */
    public ?float $MaxStockAlertLevel = null;
        /**
         * @var float|null ReOrderPoint
         */
    public ?float $ReOrderPoint = null;

    // Pricing
        /**
         * @var float|null LastCost
         */
    public ?float $LastCost = null;
        /**
         * @var float|null NominalCost
         */
    public ?float $NominalCost = null;
        /**
         * @var float|null DefaultPurchasePrice
         */
    public ?float $DefaultPurchasePrice = null;
        /**
         * @var float|null DefaultSellPrice
         */
    public ?float $DefaultSellPrice = null;
        /**
         * @var float|null CustomerSellPrice
         */
    public ?float $CustomerSellPrice = null;
        /**
         * @var float|null AverageLandPrice
         */
    public ?float $AverageLandPrice = null;
        /**
         * @var float|null MinimumSellPrice
         */
    public ?float $MinimumSellPrice = null;
        /**
         * @var float|null MinimumSaleQuantity
         */
    public ?float $MinimumSaleQuantity = null;
        /**
         * @var float|null MinimumOrderQuantity
         */
    public ?float $MinimumOrderQuantity = null;
        /**
         * @var float|null AutomaticChargeCost
         */
    public ?float $AutomaticChargeCost = null;

    // Product status (required fields)
    public bool $Obsolete = false;
    public bool $NeverDiminishing = false;
        /**
         * @var bool|null IsComponent
         */
    public ?bool $IsComponent = null;
        /**
         * @var bool|null IsAssembledProduct
         */
    public ?bool $IsAssembledProduct = null;
        /**
         * @var bool|null IsSerialized
         */
    public ?bool $IsSerialized = null;
        /**
         * @var bool|null IsBatchTracked
         */
    public ?bool $IsBatchTracked = null;
        /**
         * @var bool|null IsSellable
         */
    public ?bool $IsSellable = null;
        /**
         * @var bool|null IsPurchasable
         */
    public ?bool $IsPurchasable = null;

    // Tax settings
        /**
         * @var bool|null TaxablePurchase
         */
    public ?bool $TaxablePurchase = null;
        /**
         * @var bool|null TaxableSales
         */
    public ?bool $TaxableSales = null;
        /**
         * @var string|null XeroTaxCode
         */
    public ?string $XeroTaxCode = null;
        /**
         * @var float|null XeroTaxRate
         */
    public ?float $XeroTaxRate = null;
        /**
         * @var string|null XeroSalesTaxCode
         */
    public ?string $XeroSalesTaxCode = null;
        /**
         * @var float|null XeroSalesTaxRate
         */
    public ?float $XeroSalesTaxRate = null;

    // Notes and comments
        /**
         * @var string|null Notes
         */
    public ?string $Notes = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;
        /**
         * @var bool|null CopyCommentsForPurchases
         */
    public ?bool $CopyCommentsForPurchases = null;
        /**
         * @var bool|null CopyCommentsForSales
         */
    public ?bool $CopyCommentsForSales = null;

    // Images
        /**
         * @var string|null Images
         */
    public ?string $Images = null;
        /**
         * @var string|null ImageUrl
         */
    public ?string $ImageUrl = null;
        /**
         * @var string|null Reminder
         */
    public ?string $Reminder = null;

    // Complex objects (arrays from API)
    /**
     * @var UnitOfMeasure|null Unit of measure
     */
        /**
         * @var array|null UnitOfMeasure
         */
    public ?array $UnitOfMeasure = null;

    /**
     * @var UnitOfMeasure|null Default purchases unit of measure
     */
        /**
         * @var array|null DefaultPurchasesUnitOfMeasure
         */
    public ?array $DefaultPurchasesUnitOfMeasure = null;

    /**
     * @var ProductGroup|null Product group
     */
        /**
         * @var array|null ProductGroup
         */
    public ?array $ProductGroup = null;

    /**
     * @var ProductBrand|null Product brand
     */
        /**
         * @var array|null ProductBrand
         */
    public ?array $ProductBrand = null;

    /**
     * @var ProductGroup|null Product sub group
     */
        /**
         * @var array|null ProductSubGroup
         */
    public ?array $ProductSubGroup = null;

    /**
     * @var Supplier|null Supplier
     */
        /**
         * @var array|null Supplier
         */
    public ?array $Supplier = null;

    /**
     * @var AttributeSet|null Attribute set
     */
        /**
         * @var array|null AttributeSet
         */
    public ?array $AttributeSet = null;

    /**
     * @var array|null Bin location
     */
        /**
         * @var array|null BinLocation
         */
    public ?array $BinLocation = null;

    /**
     * @var Account|null Xero sales account
     */
        /**
         * @var array|null XeroSalesAccount
         */
    public ?array $XeroSalesAccount = null;

    /**
     * @var Account|null Xero cost of goods account
     */
        /**
         * @var array|null XeroCostOfGoodsAccount
         */
    public ?array $XeroCostOfGoodsAccount = null;

    /**
     * @var Account|null Purchase account
     */
        /**
         * @var array|null PurchaseAccount
         */
    public ?array $PurchaseAccount = null;

    // Price tiers
    /**
     * @var SellPriceTier|null Sell price tier 1
     */
        /**
         * @var array|null SellPriceTier1
         */
    public ?array $SellPriceTier1 = null;

    /**
     * @var SellPriceTier|null Sell price tier 2
     */
        /**
         * @var array|null SellPriceTier2
         */
    public ?array $SellPriceTier2 = null;

    /**
     * @var SellPriceTier|null Sell price tier 3
     */
        /**
         * @var array|null SellPriceTier3
         */
    public ?array $SellPriceTier3 = null;

    /**
     * @var SellPriceTier|null Sell price tier 4
     */
        /**
         * @var array|null SellPriceTier4
         */
    public ?array $SellPriceTier4 = null;

    /**
     * @var SellPriceTier|null Sell price tier 5
     */
        /**
         * @var array|null SellPriceTier5
         */
    public ?array $SellPriceTier5 = null;

    /**
     * @var SellPriceTier|null Sell price tier 6
     */
        /**
         * @var array|null SellPriceTier6
         */
    public ?array $SellPriceTier6 = null;

    /**
     * @var SellPriceTier|null Sell price tier 7
     */
        /**
         * @var array|null SellPriceTier7
         */
    public ?array $SellPriceTier7 = null;

    /**
     * @var SellPriceTier|null Sell price tier 8
     */
        /**
         * @var array|null SellPriceTier8
         */
    public ?array $SellPriceTier8 = null;

    /**
     * @var SellPriceTier|null Sell price tier 9
     */
        /**
         * @var array|null SellPriceTier9
         */
    public ?array $SellPriceTier9 = null;

    /**
     * @var SellPriceTier|null Sell price tier 10
     */
        /**
         * @var array|null SellPriceTier10
         */
    public ?array $SellPriceTier10 = null;

    // Inventory and commerce
    /**
     * @var array[]|null Inventory details
     */
        /**
         * @var array|null InventoryDetails
         */
    public ?array $InventoryDetails = null;

    /**
     * @var UnitOfMeasure[]|null Alternate units of measure
     */
        /**
         * @var array|null AlternateUnitsOfMeasure
         */
    public ?array $AlternateUnitsOfMeasure = null;
        /**
         * @var string|null CommerceCode
         */
    public ?string $CommerceCode = null;
        /**
         * @var string|null CustomsDescription
         */
    public ?string $CustomsDescription = null;
        /**
         * @var string|null SupplementaryClassificationAbbreviation
         */
    public ?string $SupplementaryClassificationAbbreviation = null;
        /**
         * @var string|null ICCCountryCode
         */
    public ?string $ICCCountryCode = null;
        /**
         * @var string|null ICCCountryName
         */
    public ?string $ICCCountryName = null;

    // System fields
        /**
         * @var string|null SourceId
         */
    public ?string $SourceId = null;
        /**
         * @var string|null SourceVariantParentId
         */
    public ?string $SourceVariantParentId = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Additional properties for getter/setter methods
    /**
     * @var string|null ProductType
     */
    public ?string $ProductType = null;
    /**
     * @var float|null AverageCost
     */
    public ?float $AverageCost = null;
    /**
     * @var float|null StandardCost
     */
    public ?float $StandardCost = null;
    /**
     * @var float|null SellPriceExTax
     */
    public ?float $SellPriceExTax = null;
    /**
     * @var float|null SellPriceIncTax
     */
    public ?float $SellPriceIncTax = null;
    /**
     * @var string|null DefaultPurchaseUnitOfMeasure
     */
    public ?string $DefaultPurchaseUnitOfMeasure = null;
    /**
     * @var string|null SupplierProductCode
     */
    public ?string $SupplierProductCode = null;

    // Simple getters for common use cases
        /**
         * Get the ProductCode
         *
         * @return string|null The ProductCode
         */
    public function getProductCode(): ?string
    {
        return $this->ProductCode;
    }

        /**
         * Get the ProductDescription
         *
         * @return string|null The ProductDescription
         */
    public function getProductDescription(): ?string
    {
        return $this->ProductDescription;
    }

        /**
         * Get the SellPrice
         *
         * @return float|null The SellPrice
         */
    public function getSellPrice(): ?float
    {
        return $this->DefaultSellPrice;
    }

    /**
     * Check if Sellable
     *
     * @return bool|null True if Sellable, false otherwise
     */
    public function isSellable(): ?bool
    {
        return $this->IsSellable;
    }

    /**
     * Get IsSellable
     *
     * @return bool|null The IsSellable
     */
    public function getIsSellable(): ?bool
    {
        return $this->IsSellable;
    }

    /**
     * Check if Purchasable
     *
     * @return bool|null True if Purchasable, false otherwise
     */
    public function isPurchasable(): ?bool
    {
        return $this->IsPurchasable;
    }

    /**
     * Get IsPurchasable
     *
     * @return bool|null The IsPurchasable
     */
    public function getIsPurchasable(): ?bool
    {
        return $this->IsPurchasable;
    }

    // Simple setters for common use cases
        /**
         * Set the ProductCode
         *
         * @param string|null $productCode The ProductCode
         */
    public function setProductCode(?string $productCode): void
    {
        $this->ProductCode = $productCode;
    }

        /**
         * Set the ProductDescription
         *
         * @param string|null $productDescription The ProductDescription
         */
    public function setProductDescription(?string $productDescription): void
    {
        $this->ProductDescription = $productDescription;
    }

        /**
         * Set the SellPrice
         *
         * @param float|null $sellPrice The SellPrice
         */
    public function setSellPrice(?float $sellPrice): void
    {
        $this->DefaultSellPrice = $sellPrice;
    }

        /**
         * Set the IsSellable
         *
         * @param bool|null $isSellable The IsSellable
         */
    public function setIsSellable(?bool $isSellable): void
    {
        $this->IsSellable = $isSellable;
    }

        /**
         * Set the IsPurchasable
         *
         * @param bool|null $isPurchasable The IsPurchasable
         */
    public function setIsPurchasable(?bool $isPurchasable): void
    {
        $this->IsPurchasable = $isPurchasable;
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
     * Set the Notes
     *
     * @param string|null $notes The Notes
     */
    public function setNotes(?string $notes): void
    {
        $this->Notes = $notes;
    }

    /**
     * Get the Barcode
     *
     * @return string|null The Barcode
     */
    public function getBarcode(): ?string
    {
        return $this->Barcode;
    }

    /**
     * Set the Barcode
     *
     * @param string|null $barcode The Barcode
     */
    public function setBarcode(?string $barcode): void
    {
        $this->Barcode = $barcode;
    }

    /**
     * Get the PackSize
     *
     * @return string|null The PackSize
     */
    public function getPackSize(): ?string
    {
        return $this->PackSize;
    }

    /**
     * Set the PackSize
     *
     * @param string|null $packSize The PackSize
     */
    public function setPackSize(?string $packSize): void
    {
        $this->PackSize = $packSize;
    }

    /**
     * Get the Weight
     *
     * @return float|null The Weight
     */
    public function getWeight(): ?float
    {
        return $this->Weight;
    }

    /**
     * Set the Weight
     *
     * @param float|null $weight The Weight
     */
    public function setWeight(?float $weight): void
    {
        $this->Weight = $weight;
    }

    /**
     * Get the ProductType
     *
     * @return string|null The ProductType
     */
    public function getProductType(): ?string
    {
        return $this->ProductType;
    }

    /**
     * Set the ProductType
     *
     * @param string|null $productType The ProductType
     */
    public function setProductType(?string $productType): void
    {
        $this->ProductType = $productType;
    }

    /**
     * Get the LastCost
     *
     * @return float|null The LastCost
     */
    public function getLastCost(): ?float
    {
        return $this->LastCost;
    }

    /**
     * Set the LastCost
     *
     * @param float|null $lastCost The LastCost
     */
    public function setLastCost(?float $lastCost): void
    {
        $this->LastCost = $lastCost;
    }

    /**
     * Get the AverageCost
     *
     * @return float|null The AverageCost
     */
    public function getAverageCost(): ?float
    {
        return $this->AverageCost;
    }

    /**
     * Set the AverageCost
     *
     * @param float|null $averageCost The AverageCost
     */
    public function setAverageCost(?float $averageCost): void
    {
        $this->AverageCost = $averageCost;
    }

    /**
     * Get the StandardCost
     *
     * @return float|null The StandardCost
     */
    public function getStandardCost(): ?float
    {
        return $this->StandardCost;
    }

    /**
     * Set the StandardCost
     *
     * @param float|null $standardCost The StandardCost
     */
    public function setStandardCost(?float $standardCost): void
    {
        $this->StandardCost = $standardCost;
    }

    /**
     * Get the SellPriceExTax
     *
     * @return float|null The SellPriceExTax
     */
    public function getSellPriceExTax(): ?float
    {
        return $this->SellPriceExTax;
    }

    /**
     * Set the SellPriceExTax
     *
     * @param float|null $sellPriceExTax The SellPriceExTax
     */
    public function setSellPriceExTax(?float $sellPriceExTax): void
    {
        $this->SellPriceExTax = $sellPriceExTax;
    }

    /**
     * Get the SellPriceIncTax
     *
     * @return float|null The SellPriceIncTax
     */
    public function getSellPriceIncTax(): ?float
    {
        return $this->SellPriceIncTax;
    }

    /**
     * Set the SellPriceIncTax
     *
     * @param float|null $sellPriceIncTax The SellPriceIncTax
     */
    public function setSellPriceIncTax(?float $sellPriceIncTax): void
    {
        $this->SellPriceIncTax = $sellPriceIncTax;
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
     * Set the Comments
     *
     * @param string|null $comments The Comments
     */
    public function setComments(?string $comments): void
    {
        $this->Comments = $comments;
    }

    /**
     * Get the CopyCommentsForSales
     *
     * @return bool|null The CopyCommentsForSales
     */
    public function getCopyCommentsForSales(): ?bool
    {
        return $this->CopyCommentsForSales;
    }

    /**
     * Set the CopyCommentsForSales
     *
     * @param bool|null $copyCommentsForSales The CopyCommentsForSales
     */
    public function setCopyCommentsForSales(?bool $copyCommentsForSales): void
    {
        $this->CopyCommentsForSales = $copyCommentsForSales;
    }

    /**
     * Get the CopyCommentsForPurchases
     *
     * @return bool|null The CopyCommentsForPurchases
     */
    public function getCopyCommentsForPurchases(): ?bool
    {
        return $this->CopyCommentsForPurchases;
    }

    /**
     * Set the CopyCommentsForPurchases
     *
     * @param bool|null $copyCommentsForPurchases The CopyCommentsForPurchases
     */
    public function setCopyCommentsForPurchases(?bool $copyCommentsForPurchases): void
    {
        $this->CopyCommentsForPurchases = $copyCommentsForPurchases;
    }

    /**
     * Get the IsAssembledProduct
     *
     * @return bool|null The IsAssembledProduct
     */
    public function getIsAssembledProduct(): ?bool
    {
        return $this->IsAssembledProduct;
    }

    /**
     * Set the IsAssembledProduct
     *
     * @param bool|null $isAssembledProduct The IsAssembledProduct
     */
    public function setIsAssembledProduct(?bool $isAssembledProduct): void
    {
        $this->IsAssembledProduct = $isAssembledProduct;
    }

    /**
     * Get the IsSerialized
     *
     * @return bool|null The IsSerialized
     */
    public function getIsSerialized(): ?bool
    {
        return $this->IsSerialized;
    }

    /**
     * Set the IsSerialized
     *
     * @param bool|null $isSerialized The IsSerialized
     */
    public function setIsSerialized(?bool $isSerialized): void
    {
        $this->IsSerialized = $isSerialized;
    }

    /**
     * Get the IsBatchTracked
     *
     * @return bool|null The IsBatchTracked
     */
    public function getIsBatchTracked(): ?bool
    {
        return $this->IsBatchTracked;
    }

    /**
     * Set the IsBatchTracked
     *
     * @param bool|null $isBatchTracked The IsBatchTracked
     */
    public function setIsBatchTracked(?bool $isBatchTracked): void
    {
        $this->IsBatchTracked = $isBatchTracked;
    }

    /**
     * Get the NeverDiminishing
     *
     * @return bool|null The NeverDiminishing
     */
    public function getNeverDiminishing(): ?bool
    {
        return $this->NeverDiminishing;
    }

    /**
     * Set the NeverDiminishing
     *
     * @param bool|null $neverDiminishing The NeverDiminishing
     */
    public function setNeverDiminishing(?bool $neverDiminishing): void
    {
        $this->NeverDiminishing = $neverDiminishing;
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
     * Set the Obsolete
     *
     * @param bool|null $obsolete The Obsolete
     */
    public function setObsolete(?bool $obsolete): void
    {
        $this->Obsolete = $obsolete;
    }

    /**
     * Get the DefaultPurchaseUnitOfMeasure
     *
     * @return string|null The DefaultPurchaseUnitOfMeasure
     */
    public function getDefaultPurchaseUnitOfMeasure(): ?string
    {
        return $this->DefaultPurchaseUnitOfMeasure;
    }

    /**
     * Set the DefaultPurchaseUnitOfMeasure
     *
     * @param string|null $defaultPurchaseUnitOfMeasure The DefaultPurchaseUnitOfMeasure
     */
    public function setDefaultPurchaseUnitOfMeasure(?string $defaultPurchaseUnitOfMeasure): void
    {
        $this->DefaultPurchaseUnitOfMeasure = $defaultPurchaseUnitOfMeasure;
    }

    /**
     * Get the TaxablePurchase
     *
     * @return bool|null The TaxablePurchase
     */
    public function getTaxablePurchase(): ?bool
    {
        return $this->TaxablePurchase;
    }

    /**
     * Set the TaxablePurchase
     *
     * @param bool|null $taxablePurchase The TaxablePurchase
     */
    public function setTaxablePurchase(?bool $taxablePurchase): void
    {
        $this->TaxablePurchase = $taxablePurchase;
    }

    /**
     * Get the TaxableSales
     *
     * @return bool|null The TaxableSales
     */
    public function setTaxableSales(?bool $taxableSales): void
    {
        $this->TaxableSales = $taxableSales;
    }

    /**
     * Get the TaxableSales
     *
     * @return bool|null The TaxableSales
     */
    public function getTaxableSales(): ?bool
    {
        return $this->TaxableSales;
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
     * Set the XeroTaxCode
     *
     * @param string|null $xeroTaxCode The XeroTaxCode
     */
    public function setXeroTaxCode(?string $xeroTaxCode): void
    {
        $this->XeroTaxCode = $xeroTaxCode;
    }

    /**
     * Get the XeroTaxRate
     *
     * @return float|null The XeroTaxRate
     */
    public function getXeroTaxRate(): ?float
    {
        return $this->XeroTaxRate;
    }

    /**
     * Set the XeroTaxRate
     *
     * @param float|null $xeroTaxRate The XeroTaxRate
     */
    public function setXeroTaxRate(?float $xeroTaxRate): void
    {
        $this->XeroTaxRate = $xeroTaxRate;
    }

    /**
     * Get the XeroSalesTaxCode
     *
     * @return string|null The XeroSalesTaxCode
     */
    public function getXeroSalesTaxCode(): ?string
    {
        return $this->XeroSalesTaxCode;
    }

    /**
     * Set the XeroSalesTaxCode
     *
     * @param string|null $xeroSalesTaxCode The XeroSalesTaxCode
     */
    public function setXeroSalesTaxCode(?string $xeroSalesTaxCode): void
    {
        $this->XeroSalesTaxCode = $xeroSalesTaxCode;
    }

    /**
     * Get the XeroSalesTaxRate
     *
     * @return float|null The XeroSalesTaxRate
     */
    public function getXeroSalesTaxRate(): ?float
    {
        return $this->XeroSalesTaxRate;
    }

    /**
     * Set the XeroSalesTaxRate
     *
     * @param float|null $xeroSalesTaxRate The XeroSalesTaxRate
     */
    public function setXeroSalesTaxRate(?float $xeroSalesTaxRate): void
    {
        $this->XeroSalesTaxRate = $xeroSalesTaxRate;
    }

    /**
     * Get the SupplierProductCode
     *
     * @return string|null The SupplierProductCode
     */
    public function getSupplierProductCode(): ?string
    {
        return $this->SupplierProductCode;
    }

    /**
     * Set the SupplierProductCode
     *
     * @param string|null $supplierProductCode The SupplierProductCode
     */
    public function setSupplierProductCode(?string $supplierProductCode): void
    {
        $this->SupplierProductCode = $supplierProductCode;
    }

    /**
     * Get the CommerceCode
     *
     * @return string|null The CommerceCode
     */
    public function getCommerceCode(): ?string
    {
        return $this->CommerceCode;
    }

    /**
     * Set the CommerceCode
     *
     * @param string|null $commerceCode The CommerceCode
     */
    public function setCommerceCode(?string $commerceCode): void
    {
        $this->CommerceCode = $commerceCode;
    }

    /**
     * Get the CustomsDescription
     *
     * @return string|null The CustomsDescription
     */
    public function getCustomsDescription(): ?string
    {
        return $this->CustomsDescription;
    }

    /**
     * Set the CustomsDescription
     *
     * @param string|null $customsDescription The CustomsDescription
     */
    public function setCustomsDescription(?string $customsDescription): void
    {
        $this->CustomsDescription = $customsDescription;
    }

    /**
     * Get the ICCCountryCode
     *
     * @return string|null The ICCCountryCode
     */
    public function getIccCountryCode(): ?string
    {
        return $this->ICCCountryCode;
    }

    /**
     * Set the ICCCountryCode
     *
     * @param string|null $iccCountryCode The ICCCountryCode
     */
    public function setIccCountryCode(?string $iccCountryCode): void
    {
        $this->ICCCountryCode = $iccCountryCode;
    }

    /**
     * Get the ICCCountryName
     *
     * @return string|null The ICCCountryName
     */
    public function getIccCountryName(): ?string
    {
        return $this->ICCCountryName;
    }

    /**
     * Set the ICCCountryName
     *
     * @param string|null $iccCountryName The ICCCountryName
     */
    public function setIccCountryName(?string $iccCountryName): void
    {
        $this->ICCCountryName = $iccCountryName;
    }
}
