<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Product Group Data Transfer Object - Represents product groups
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/ProductGroups
 */
class ProductGroup extends BaseDto
{
        /**
         * @var string|null ProductGroupCode
         */
    public ?string $ProductGroupCode = null;
        /**
         * @var string|null ProductGroupName
         */
    public ?string $ProductGroupName = null;
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
         * Get the ProductGroupCode
         *
         * @return string|null The ProductGroupCode
         */
    public function getProductGroupCode(): ?string
    {
        return $this->ProductGroupCode;
    }
        /**
         * Get the ProductGroupName
         *
         * @return string|null The ProductGroupName
         */
    public function getProductGroupName(): ?string
    {
        return $this->ProductGroupName;
    }
        /**
         * Set the ProductGroupCode
         *
         * @param string|null $code The ProductGroupCode
         */
    public function setProductGroupCode(?string $code): void
    {
        $this->ProductGroupCode = $code;
    }
        /**
         * Set the ProductGroupName
         *
         * @param string|null $name The ProductGroupName
         */
    public function setProductGroupName(?string $name): void
    {
        $this->ProductGroupName = $name;
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
