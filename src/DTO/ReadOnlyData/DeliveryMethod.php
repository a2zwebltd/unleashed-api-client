<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Delivery Method Data Transfer Object - Represents delivery methods
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/DeliveryMethods
 */
class DeliveryMethod extends BaseDto
{
        /**
         * @var string|null DeliveryMethodCode
         */
    public ?string $DeliveryMethodCode = null;
        /**
         * @var string|null DeliveryMethodName
         */
    public ?string $DeliveryMethodName = null;
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
         * Get the DeliveryMethodCode
         *
         * @return string|null The DeliveryMethodCode
         */
    public function getDeliveryMethodCode(): ?string
    {
        return $this->DeliveryMethodCode;
    }
        /**
         * Get the DeliveryMethodName
         *
         * @return string|null The DeliveryMethodName
         */
    public function getDeliveryMethodName(): ?string
    {
        return $this->DeliveryMethodName;
    }
        /**
         * Set the DeliveryMethodCode
         *
         * @param string|null $code The DeliveryMethodCode
         */
    public function setDeliveryMethodCode(?string $code): void
    {
        $this->DeliveryMethodCode = $code;
    }
        /**
         * Set the DeliveryMethodName
         *
         * @param string|null $name The DeliveryMethodName
         */
    public function setDeliveryMethodName(?string $name): void
    {
        $this->DeliveryMethodName = $name;
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
