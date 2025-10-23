<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Supplier Return Reason Data Transfer Object - Represents supplier return reasons
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SupplierReturnReasons
 */
class SupplierReturnReason extends BaseDto
{
        /**
         * @var string|null SupplierReturnReasonCode
         */
    public ?string $SupplierReturnReasonCode = null;
        /**
         * @var string|null SupplierReturnReasonName
         */
    public ?string $SupplierReturnReasonName = null;
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
         * Get the SupplierReturnReasonCode
         *
         * @return string|null The SupplierReturnReasonCode
         */
    public function getSupplierReturnReasonCode(): ?string
    {
        return $this->SupplierReturnReasonCode;
    }
        /**
         * Get the SupplierReturnReasonName
         *
         * @return string|null The SupplierReturnReasonName
         */
    public function getSupplierReturnReasonName(): ?string
    {
        return $this->SupplierReturnReasonName;
    }
        /**
         * Set the SupplierReturnReasonCode
         *
         * @param string|null $code The SupplierReturnReasonCode
         */
    public function setSupplierReturnReasonCode(?string $code): void
    {
        $this->SupplierReturnReasonCode = $code;
    }
        /**
         * Set the SupplierReturnReasonName
         *
         * @param string|null $name The SupplierReturnReasonName
         */
    public function setSupplierReturnReasonName(?string $name): void
    {
        $this->SupplierReturnReasonName = $name;
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
