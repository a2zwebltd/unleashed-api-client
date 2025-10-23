<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Customer Delivery Address Data Transfer Object - Represents customer delivery addresses
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/CustomerDeliveryAddresses
 */
class CustomerDeliveryAddress extends BaseDto
{
    // CustomerDeliveryAddress properties
        /**
         * @var string|null AddressName
         */
    public ?string $AddressName = null;
        /**
         * @var string|null StreetAddress
         */
    public ?string $StreetAddress = null;
        /**
         * @var string|null Suburb
         */
    public ?string $Suburb = null;
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
         * @var string|null CustomerCode
         */
    public ?string $CustomerCode = null;
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
         * @var string|null StreetAddress2
         */
    public ?string $StreetAddress2 = null;
        /**
         * @var string|null ContactName
         */
    public ?string $ContactName = null;
        /**
         * @var string|null PhoneNumber
         */
    public ?string $PhoneNumber = null;
        /**
         * @var string|null Email
         */
    public ?string $Email = null;
        /**
         * @var bool|null IsDefault
         */
    public ?bool $IsDefault = null;

    // Simple getters
        /**
         * Get the AddressName
         *
         * @return string|null The AddressName
         */
    public function getAddressName(): ?string
    {
        return $this->AddressName;
    }

        /**
         * Get the CustomerCode
         *
         * @return string|null The CustomerCode
         */
    public function getCustomerCode(): ?string
    {
        return $this->CustomerCode;
    }

    // Simple setters
        /**
         * Set the AddressName
         *
         * @param string|null $addressName The AddressName
         */
    public function setAddressName(?string $addressName): void
    {
        $this->AddressName = $addressName;
    }

        /**
         * Set the CustomerCode
         *
         * @param string|null $customerCode The CustomerCode
         */
    public function setCustomerCode(?string $customerCode): void
    {
        $this->CustomerCode = $customerCode;
    }

    // API Documentation getters
        /**
         * Get the StreetAddress2
         *
         * @return string|null The StreetAddress2
         */
    public function getStreetAddress2(): ?string
    {
        return $this->StreetAddress2;
    }
        /**
         * Get the ContactName
         *
         * @return string|null The ContactName
         */
    public function getContactName(): ?string
    {
        return $this->ContactName;
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
         * Get the Email
         *
         * @return string|null The Email
         */
    public function getEmail(): ?string
    {
        return $this->Email;
    }
        /**
         * Get the IsDefault
         *
         * @return bool|null The IsDefault
         */
    public function getIsDefault(): ?bool
    {
        return $this->IsDefault;
    }

    // API Documentation setters
        /**
         * Set the StreetAddress2
         *
         * @param string|null $streetAddress2 The StreetAddress2
         */
    public function setStreetAddress2(?string $streetAddress2): void
    {
        $this->StreetAddress2 = $streetAddress2;
    }
        /**
         * Set the ContactName
         *
         * @param string|null $contactName The ContactName
         */
    public function setContactName(?string $contactName): void
    {
        $this->ContactName = $contactName;
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
         * Set the Email
         *
         * @param string|null $email The Email
         */
    public function setEmail(?string $email): void
    {
        $this->Email = $email;
    }
        /**
         * Set the IsDefault
         *
         * @param bool|null $isDefault The IsDefault
         */
    public function setIsDefault(?bool $isDefault): void
    {
        $this->IsDefault = $isDefault;
    }
}
