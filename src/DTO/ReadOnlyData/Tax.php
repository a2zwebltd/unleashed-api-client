<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Tax Data Transfer Object - Represents tax rates and codes
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Taxes
 */
class Tax extends BaseDto
{
        /**
         * @var string|null TaxCode
         */
    public ?string $TaxCode = null;
        /**
         * @var string|null TaxName
         */
    public ?string $TaxName = null;
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
         * @var float|null TaxRate
         */
    public ?float $TaxRate = null;
        /**
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var bool|null IsActive
         */
    public ?bool $IsActive = null;

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
         * Get the TaxName
         *
         * @return string|null The TaxName
         */
    public function getTaxName(): ?string
    {
        return $this->TaxName;
    }
        /**
         * Set the TaxCode
         *
         * @param string|null $code The TaxCode
         */
    public function setTaxCode(?string $code): void
    {
        $this->TaxCode = $code;
    }
        /**
         * Set the TaxName
         *
         * @param string|null $name The TaxName
         */
    public function setTaxName(?string $name): void
    {
        $this->TaxName = $name;
    }

    // API Documentation getters
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
         * Set the TaxRate
         *
         * @param float|null $taxRate The TaxRate
         */
    public function setTaxRate(?float $taxRate): void
    {
        $this->TaxRate = $taxRate;
    }
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
