<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sell Price Tier Data Transfer Object - Represents sell price tiers
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/SellPriceTiers
 */
class SellPriceTier extends BaseDto
{
        /**
         * @var string|null SellPriceTierCode
         */
    public ?string $SellPriceTierCode = null;
        /**
         * @var string|null SellPriceTierName
         */
    public ?string $SellPriceTierName = null;
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
         * Get the SellPriceTierCode
         *
         * @return string|null The SellPriceTierCode
         */
    public function getSellPriceTierCode(): ?string
    {
        return $this->SellPriceTierCode;
    }
        /**
         * Get the SellPriceTierName
         *
         * @return string|null The SellPriceTierName
         */
    public function getSellPriceTierName(): ?string
    {
        return $this->SellPriceTierName;
    }
        /**
         * Set the SellPriceTierCode
         *
         * @param string|null $code The SellPriceTierCode
         */
    public function setSellPriceTierCode(?string $code): void
    {
        $this->SellPriceTierCode = $code;
    }
        /**
         * Set the SellPriceTierName
         *
         * @param string|null $name The SellPriceTierName
         */
    public function setSellPriceTierName(?string $name): void
    {
        $this->SellPriceTierName = $name;
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
