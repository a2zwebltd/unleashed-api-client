<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Company Data Transfer Object - Represents company information
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/Companies
 */
class Company extends BaseDto
{
    // Company properties
        /**
         * @var string|null CompanyName
         */
    public ?string $CompanyName = null;
        /**
         * @var string|null BaseCurrencyCode
         */
    public ?string $BaseCurrencyCode = null;
        /**
         * @var float|null DefaultTaxRate
         */
    public ?float $DefaultTaxRate = null;
        /**
         * @var string|null CompanyCode
         */
    public ?string $CompanyCode = null;
        /**
         * @var string|null Address
         */
    public ?string $Address = null;
        /**
         * @var string|null City
         */
    public ?string $City = null;
        /**
         * @var string|null Region
         */
    public ?string $Region = null;
        /**
         * @var string|null PostCode
         */
    public ?string $PostCode = null;
        /**
         * @var string|null Country
         */
    public ?string $Country = null;
        /**
         * @var string|null PhoneNumber
         */
    public ?string $PhoneNumber = null;
        /**
         * @var string|null FaxNumber
         */
    public ?string $FaxNumber = null;
        /**
         * @var string|null Email
         */
    public ?string $Email = null;
        /**
         * @var string|null Website
         */
    public ?string $Website = null;
        /**
         * @var string|null TaxNumber
         */
    public ?string $TaxNumber = null;
        /**
         * @var string|null Currency
         */
    public ?string $Currency = null;
        /**
         * @var string|null TimeZone
         */
    public ?string $TimeZone = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Getters for all properties
    /**
     * Get the CompanyName
     *
     * @return string|null The CompanyName
     */
    public function getCompanyName(): ?string
    {
        return $this->CompanyName;
    }

    /**
     * Get the BaseCurrencyCode
     *
     * @return string|null The BaseCurrencyCode
     */
    public function getBaseCurrencyCode(): ?string
    {
        return $this->BaseCurrencyCode;
    }

    /**
     * Get the DefaultTaxRate
     *
     * @return float|null The DefaultTaxRate
     */
    public function getDefaultTaxRate(): ?float
    {
        return $this->DefaultTaxRate;
    }

    /**
     * Get the CompanyCode
     *
     * @return string|null The CompanyCode
     */
    public function getCompanyCode(): ?string
    {
        return $this->CompanyCode;
    }

    /**
     * Get the Address
     *
     * @return string|null The Address
     */
    public function getAddress(): ?string
    {
        return $this->Address;
    }

    /**
     * Get the City
     *
     * @return string|null The City
     */
    public function getCity(): ?string
    {
        return $this->City;
    }

    /**
     * Get the Region
     *
     * @return string|null The Region
     */
    public function getRegion(): ?string
    {
        return $this->Region;
    }

    /**
     * Get the PostCode
     *
     * @return string|null The PostCode
     */
    public function getPostCode(): ?string
    {
        return $this->PostCode;
    }

    /**
     * Get the Country
     *
     * @return string|null The Country
     */
    public function getCountry(): ?string
    {
        return $this->Country;
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
     * Get the Email
     *
     * @return string|null The Email
     */
    public function getEmail(): ?string
    {
        return $this->Email;
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
     * Get the TaxNumber
     *
     * @return string|null The TaxNumber
     */
    public function getTaxNumber(): ?string
    {
        return $this->TaxNumber;
    }

    /**
     * Get the Currency
     *
     * @return string|null The Currency
     */
    public function getCurrency(): ?string
    {
        return $this->Currency;
    }

    /**
     * Get the TimeZone
     *
     * @return string|null The TimeZone
     */
    public function getTimeZone(): ?string
    {
        return $this->TimeZone;
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

    // Setters for all properties
    /**
     * Set the CompanyName
     *
     * @param string|null $companyName The CompanyName
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->CompanyName = $companyName;
    }

    /**
     * Set the BaseCurrencyCode
     *
     * @param string|null $baseCurrencyCode The BaseCurrencyCode
     */
    public function setBaseCurrencyCode(?string $baseCurrencyCode): void
    {
        $this->BaseCurrencyCode = $baseCurrencyCode;
    }

    /**
     * Set the DefaultTaxRate
     *
     * @param float|null $defaultTaxRate The DefaultTaxRate
     */
    public function setDefaultTaxRate(?float $defaultTaxRate): void
    {
        $this->DefaultTaxRate = $defaultTaxRate;
    }

    /**
     * Set the CompanyCode
     *
     * @param string|null $companyCode The CompanyCode
     */
    public function setCompanyCode(?string $companyCode): void
    {
        $this->CompanyCode = $companyCode;
    }

    /**
     * Set the Address
     *
     * @param string|null $address The Address
     */
    public function setAddress(?string $address): void
    {
        $this->Address = $address;
    }

    /**
     * Set the City
     *
     * @param string|null $city The City
     */
    public function setCity(?string $city): void
    {
        $this->City = $city;
    }

    /**
     * Set the Region
     *
     * @param string|null $region The Region
     */
    public function setRegion(?string $region): void
    {
        $this->Region = $region;
    }

    /**
     * Set the PostCode
     *
     * @param string|null $postCode The PostCode
     */
    public function setPostCode(?string $postCode): void
    {
        $this->PostCode = $postCode;
    }

    /**
     * Set the Country
     *
     * @param string|null $country The Country
     */
    public function setCountry(?string $country): void
    {
        $this->Country = $country;
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
     * Set the Email
     *
     * @param string|null $email The Email
     */
    public function setEmail(?string $email): void
    {
        $this->Email = $email;
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
     * Set the TaxNumber
     *
     * @param string|null $taxNumber The TaxNumber
     */
    public function setTaxNumber(?string $taxNumber): void
    {
        $this->TaxNumber = $taxNumber;
    }

    /**
     * Set the Currency
     *
     * @param string|null $currency The Currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->Currency = $currency;
    }

    /**
     * Set the TimeZone
     *
     * @param string|null $timeZone The TimeZone
     */
    public function setTimeZone(?string $timeZone): void
    {
        $this->TimeZone = $timeZone;
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
}
