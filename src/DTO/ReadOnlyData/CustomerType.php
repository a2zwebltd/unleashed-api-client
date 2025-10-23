<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Customer Type Data Transfer Object - Represents customer types
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/CustomerTypes
 */
class CustomerType extends BaseDto
{
    // CustomerType properties
        /**
         * @var string|null CustomerTypeCode
         */
    public ?string $CustomerTypeCode = null;
        /**
         * @var string|null CustomerTypeName
         */
    public ?string $CustomerTypeName = null;
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

    // Simple getters
        /**
         * Get the CustomerTypeCode
         *
         * @return string|null The CustomerTypeCode
         */
    public function getCustomerTypeCode(): ?string
    {
        return $this->CustomerTypeCode;
    }

        /**
         * Get the CustomerTypeName
         *
         * @return string|null The CustomerTypeName
         */
    public function getCustomerTypeName(): ?string
    {
        return $this->CustomerTypeName;
    }

    // Simple setters
        /**
         * Set the CustomerTypeCode
         *
         * @param string|null $customerTypeCode The CustomerTypeCode
         */
    public function setCustomerTypeCode(?string $customerTypeCode): void
    {
        $this->CustomerTypeCode = $customerTypeCode;
    }

        /**
         * Set the CustomerTypeName
         *
         * @param string|null $customerTypeName The CustomerTypeName
         */
    public function setCustomerTypeName(?string $customerTypeName): void
    {
        $this->CustomerTypeName = $customerTypeName;
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
