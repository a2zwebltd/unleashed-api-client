<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Product Brand Data Transfer Object - Represents product brands
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/ProductBrands
 */
class ProductBrand extends BaseDto
{
        /**
         * @var string|null ProductBrandCode
         */
    public ?string $ProductBrandCode = null;
        /**
         * @var string|null ProductBrandName
         */
    public ?string $ProductBrandName = null;
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
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var bool|null IsActive
         */
    public ?bool $IsActive = null;

        /**
         * Get the ProductBrandCode
         *
         * @return string|null The ProductBrandCode
         */
    public function getProductBrandCode(): ?string
    {
        return $this->ProductBrandCode;
    }
        /**
         * Get the ProductBrandName
         *
         * @return string|null The ProductBrandName
         */
    public function getProductBrandName(): ?string
    {
        return $this->ProductBrandName;
    }
        /**
         * Set the ProductBrandCode
         *
         * @param string|null $code The ProductBrandCode
         */
    public function setProductBrandCode(?string $code): void
    {
        $this->ProductBrandCode = $code;
    }
        /**
         * Set the ProductBrandName
         *
         * @param string|null $name The ProductBrandName
         */
    public function setProductBrandName(?string $name): void
    {
        $this->ProductBrandName = $name;
    }

    // API Documentation getters
        /**
         * Get the Description
         *
         * @return string|null The Description
         */
    public function getDescription(): ?string
    {
        return $this->Description;
    }
        /**
         * Get the IsActive
         *
         * @return bool|null The IsActive
         */
    public function getIsActive(): ?bool
    {
        return $this->IsActive;
    }

    // API Documentation setters
        /**
         * Set the Description
         *
         * @param string|null $description The Description
         */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }
        /**
         * Set the IsActive
         *
         * @param bool|null $isActive The IsActive
         */
    public function setIsActive(?bool $isActive): void
    {
        $this->IsActive = $isActive;
    }
}
