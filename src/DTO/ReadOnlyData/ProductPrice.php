<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Product Price Data Transfer Object - Represents product prices
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/ProductPrices
 */
class ProductPrice extends BaseDto
{
    // Product Price properties
        /**
         * @var array|null Product
         */
    public ?array $Product = null;
        /**
         * @var array|null ProductGroup
         */
    public ?array $ProductGroup = null;
        /**
         * @var array|null Customer
         */
    public ?array $Customer = null;
        /**
         * @var string|null PriceType
         */
    public ?string $PriceType = null;
        /**
         * @var float|null DiscountValue
         */
    public ?float $DiscountValue = null;
        /**
         * @var float|null MinimumQuantity
         */
    public ?float $MinimumQuantity = null;
        /**
         * @var float|null DefaultSellPrice
         */
    public ?float $DefaultSellPrice = null;
        /**
         * @var float|null CustomerPrice
         */
    public ?float $CustomerPrice = null;
        /**
         * @var string|null ValidFrom
         */
    public ?string $ValidFrom = null;
        /**
         * @var string|null ValidTo
         */
    public ?string $ValidTo = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;

    // Simple getters
        /**
         * Get the Product
         *
         * @return array|null The Product
         */
    public function getProduct(): ?array
    {
        return $this->Product;
    }

        /**
         * Get the ProductGroup
         *
         * @return array|null The ProductGroup
         */
    public function getProductGroup(): ?array
    {
        return $this->ProductGroup;
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
         * Get the PriceType
         *
         * @return string|null The PriceType
         */
    public function getPriceType(): ?string
    {
        return $this->PriceType;
    }

        /**
         * Get the DiscountValue
         *
         * @return float|null The DiscountValue
         */
    public function getDiscountValue(): ?float
    {
        return $this->DiscountValue;
    }

        /**
         * Get the MinimumQuantity
         *
         * @return float|null The MinimumQuantity
         */
    public function getMinimumQuantity(): ?float
    {
        return $this->MinimumQuantity;
    }

        /**
         * Get the DefaultSellPrice
         *
         * @return float|null The DefaultSellPrice
         */
    public function getDefaultSellPrice(): ?float
    {
        return $this->DefaultSellPrice;
    }

        /**
         * Get the CustomerPrice
         *
         * @return float|null The CustomerPrice
         */
    public function getCustomerPrice(): ?float
    {
        return $this->CustomerPrice;
    }

        /**
         * Get the ValidFrom
         *
         * @return string|null The ValidFrom
         */
    public function getValidFrom(): ?string
    {
        return $this->ValidFrom;
    }

        /**
         * Get the ValidTo
         *
         * @return string|null The ValidTo
         */
    public function getValidTo(): ?string
    {
        return $this->ValidTo;
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

    // Simple setters
        /**
         * Set the Product
         *
         * @param array|null $product The Product
         */
    public function setProduct(?array $product): void
    {
        $this->Product = $product;
    }

        /**
         * Set the ProductGroup
         *
         * @param array|null $productGroup The ProductGroup
         */
    public function setProductGroup(?array $productGroup): void
    {
        $this->ProductGroup = $productGroup;
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
         * Set the PriceType
         *
         * @param string|null $priceType The PriceType
         */
    public function setPriceType(?string $priceType): void
    {
        $this->PriceType = $priceType;
    }

        /**
         * Set the DiscountValue
         *
         * @param float|null $discountValue The DiscountValue
         */
    public function setDiscountValue(?float $discountValue): void
    {
        $this->DiscountValue = $discountValue;
    }

        /**
         * Set the MinimumQuantity
         *
         * @param float|null $minimumQuantity The MinimumQuantity
         */
    public function setMinimumQuantity(?float $minimumQuantity): void
    {
        $this->MinimumQuantity = $minimumQuantity;
    }

        /**
         * Set the DefaultSellPrice
         *
         * @param float|null $defaultSellPrice The DefaultSellPrice
         */
    public function setDefaultSellPrice(?float $defaultSellPrice): void
    {
        $this->DefaultSellPrice = $defaultSellPrice;
    }

        /**
         * Set the CustomerPrice
         *
         * @param float|null $customerPrice The CustomerPrice
         */
    public function setCustomerPrice(?float $customerPrice): void
    {
        $this->CustomerPrice = $customerPrice;
    }

        /**
         * Set the ValidFrom
         *
         * @param string|null $validFrom The ValidFrom
         */
    public function setValidFrom(?string $validFrom): void
    {
        $this->ValidFrom = $validFrom;
    }

        /**
         * Set the ValidTo
         *
         * @param string|null $validTo The ValidTo
         */
    public function setValidTo(?string $validTo): void
    {
        $this->ValidTo = $validTo;
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
