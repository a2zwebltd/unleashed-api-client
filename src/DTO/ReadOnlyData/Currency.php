<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Currency Data Transfer Object - Represents currencies in the system
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Currencies
 */
class Currency extends BaseDto
{
    // Currency properties
        /**
         * @var string|null CurrencyCode
         */
    public ?string $CurrencyCode = null;
        /**
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var float|null DefaultBuyRate
         */
    public ?float $DefaultBuyRate = null;
        /**
         * @var float|null DefaultSellRate
         */
    public ?float $DefaultSellRate = null;
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
         * @var string|null Symbol
         */
    public ?string $Symbol = null;
        /**
         * @var bool|null IsBaseCurrency
         */
    public ?bool $IsBaseCurrency = null;
        /**
         * @var string|null LastModifiedOn
         */
    public ?string $LastModifiedOn = null;

    // Getters for all properties
    /**
     * Get the CurrencyCode
     *
     * @return string|null The CurrencyCode
     */
    public function getCurrencyCode(): ?string
    {
        return $this->CurrencyCode;
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
     * Get the DefaultBuyRate
     *
     * @return float|null The DefaultBuyRate
     */
    public function getDefaultBuyRate(): ?float
    {
        return $this->DefaultBuyRate;
    }

    /**
     * Get the DefaultSellRate
     *
     * @return float|null The DefaultSellRate
     */
    public function getDefaultSellRate(): ?float
    {
        return $this->DefaultSellRate;
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

    /**
     * Get the Symbol
     *
     * @return string|null The Symbol
     */
    public function getSymbol(): ?string
    {
        return $this->Symbol;
    }

    /**
     * Get the IsBaseCurrency
     *
     * @return bool|null The IsBaseCurrency
     */
    public function getIsBaseCurrency(): ?bool
    {
        return $this->IsBaseCurrency;
    }

    /**
     * Get the LastModifiedOn
     *
     * @return string|null The LastModifiedOn
     */
    public function getLastModifiedOnString(): ?string
    {
        return $this->LastModifiedOn;
    }

    // Setters for all properties
    /**
     * Set the CurrencyCode
     *
     * @param string|null $currencyCode The CurrencyCode
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->CurrencyCode = $currencyCode;
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
     * Set the DefaultBuyRate
     *
     * @param float|null $defaultBuyRate The DefaultBuyRate
     */
    public function setDefaultBuyRate(?float $defaultBuyRate): void
    {
        $this->DefaultBuyRate = $defaultBuyRate;
    }

    /**
     * Set the DefaultSellRate
     *
     * @param float|null $defaultSellRate The DefaultSellRate
     */
    public function setDefaultSellRate(?float $defaultSellRate): void
    {
        $this->DefaultSellRate = $defaultSellRate;
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

    /**
     * Set the Symbol
     *
     * @param string|null $symbol The Symbol
     */
    public function setSymbol(?string $symbol): void
    {
        $this->Symbol = $symbol;
    }

    /**
     * Set the IsBaseCurrency
     *
     * @param bool|null $isBaseCurrency The IsBaseCurrency
     */
    public function setIsBaseCurrency(?bool $isBaseCurrency): void
    {
        $this->IsBaseCurrency = $isBaseCurrency;
    }

    /**
     * Set the LastModifiedOn
     *
     * @param string|null $lastModifiedOn The LastModifiedOn
     */
    public function setLastModifiedOnString(?string $lastModifiedOn): void
    {
        $this->LastModifiedOn = $lastModifiedOn;
    }
}
