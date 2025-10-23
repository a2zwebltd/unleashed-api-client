<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Shipping Company Data Transfer Object - Represents shipping companies
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/ShippingCompanies
 */
class ShippingCompany extends BaseDto
{
        /**
         * @var string|null ShippingCompanyCode
         */
    public ?string $ShippingCompanyCode = null;
        /**
         * @var string|null ShippingCompanyName
         */
    public ?string $ShippingCompanyName = null;
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
    public $LastModifiedOn = null;

    // API Documentation fields
        /**
         * @var string|null Name
         */
    public ?string $Name = null;

        /**
         * Get the ShippingCompanyCode
         *
         * @return string|null The ShippingCompanyCode
         */
    public function getShippingCompanyCode(): ?string
    {
        return $this->ShippingCompanyCode;
    }
        /**
         * Get the ShippingCompanyName
         *
         * @return string|null The ShippingCompanyName
         */
    public function getShippingCompanyName(): ?string
    {
        return $this->ShippingCompanyName;
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
    public function getLastModifiedOn(): ?\DateTimeInterface
    {
        if ($this->LastModifiedOn === null) {
            return null;
        }
        if (is_string($this->LastModifiedOn)) {
            try {
                return new \DateTime($this->LastModifiedOn);
            } catch (\Exception $e) {
                return null;
            }
        }
        return $this->LastModifiedOn;
    }
        /**
         * Set the ShippingCompanyCode
         *
         * @param string|null $code The ShippingCompanyCode
         */
    public function setShippingCompanyCode(?string $code): void
    {
        $this->ShippingCompanyCode = $code;
    }
        /**
         * Set the ShippingCompanyName
         *
         * @param string|null $name The ShippingCompanyName
         */
    public function setShippingCompanyName(?string $name): void
    {
        $this->ShippingCompanyName = $name;
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
    public function setLastModifiedOn(?\DateTimeInterface $lastModifiedOn): void
    {
        $this->LastModifiedOn = $lastModifiedOn;
    }

    // API Documentation getters
        /**
         * Get the Name
         *
         * @return string|null The Name
         */
    public function getName(): ?string
    {
        return $this->Name;
    }

    // API Documentation setters
        /**
         * Set the Name
         *
         * @param string|null $name The Name
         */
    public function setName(?string $name): void
    {
        $this->Name = $name;
    }
}
