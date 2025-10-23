<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Payment Term Data Transfer Object - Represents payment terms
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/PaymentTerms
 */
class PaymentTerm extends BaseDto
{
        /**
         * @var string|null PaymentTermCode
         */
    public ?string $PaymentTermCode = null;
        /**
         * @var string|null PaymentTermName
         */
    public ?string $PaymentTermName = null;
        /**
         * @var int|null Days
         */
    public ?int $Days = null;
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
         * Get the PaymentTermCode
         *
         * @return string|null The PaymentTermCode
         */
    public function getPaymentTermCode(): ?string
    {
        return $this->PaymentTermCode;
    }
        /**
         * Get the PaymentTermName
         *
         * @return string|null The PaymentTermName
         */
    public function getPaymentTermName(): ?string
    {
        return $this->PaymentTermName;
    }
        /**
         * Get the Days
         *
         * @return int|null The Days
         */
    public function getDays(): ?int
    {
        return $this->Days;
    }
        /**
         * Set the PaymentTermCode
         *
         * @param string|null $code The PaymentTermCode
         */
    public function setPaymentTermCode(?string $code): void
    {
        $this->PaymentTermCode = $code;
    }
        /**
         * Set the PaymentTermName
         *
         * @param string|null $name The PaymentTermName
         */
    public function setPaymentTermName(?string $name): void
    {
        $this->PaymentTermName = $name;
    }
        /**
         * Set the Days
         *
         * @param int|null $days The Days
         */
    public function setDays(?int $days): void
    {
        $this->Days = $days;
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
