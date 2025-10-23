<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Sales Shipment Data Transfer Object - Represents sales shipments
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/SalesShipments
 */
class SalesShipment extends BaseDto
{
    // Core SalesShipment properties
        /**
         * @var string|null Guid
         */
    public ?string $Guid = null;
        /**
         * @var string|null ShipmentNumber
         */
    public ?string $ShipmentNumber = null;
        /**
         * @var string|null OrderNumber
         */
    public ?string $OrderNumber = null;
        /**
         * @var string|null OrderGuid
         */
    public ?string $OrderGuid = null;
        /**
         * @var string|null ShipmentDate
         */
    public ?string $ShipmentDate = null;
        /**
         * @var string|null DispatchDate
         */
    public ?string $DispatchDate = null;
        /**
         * @var string|null ShipmentStatus
         */
    public ?string $ShipmentStatus = null;
        /**
         * @var string|null TrackingNumber
         */
    public ?string $TrackingNumber = null;
        /**
         * @var array|null ShippingCompany
         */
    public ?array $ShippingCompany = null;
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;
        /**
         * @var string|null ShipmentWeight
         */
    public ?string $ShipmentWeight = null;
        /**
         * @var int|null NumberOfPackages
         */
    public ?int $NumberOfPackages = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;
        /**
         * @var string|null CreatedOn
         */
    public ?string $CreatedOn = null;
        /**
         * @var string|null LastModifiedOn
         */
    public ?string $LastModifiedOn = null;

    // Complex objects (arrays from API)
        /**
         * @var array|null Customer
         */
    public ?array $Customer = null;
        /**
         * @var array|null SalesShipmentLines
         */
    public ?array $SalesShipmentLines = null;

    // Simple getters
        /**
         * Get the Guid
         *
         * @return string|null The Guid
         */
    public function getGuid(): ?string
    {
        return $this->Guid;
    }

        /**
         * Get the ShipmentNumber
         *
         * @return string|null The ShipmentNumber
         */
    public function getShipmentNumber(): ?string
    {
        return $this->ShipmentNumber;
    }

        /**
         * Get the OrderNumber
         *
         * @return string|null The OrderNumber
         */
    public function getOrderNumber(): ?string
    {
        return $this->OrderNumber;
    }

        /**
         * Get the OrderGuid
         *
         * @return string|null The OrderGuid
         */
    public function getOrderGuid(): ?string
    {
        return $this->OrderGuid;
    }

        /**
         * Get the ShipmentStatus
         *
         * @return string|null The ShipmentStatus
         */
    public function getShipmentStatus(): ?string
    {
        return $this->ShipmentStatus;
    }

        /**
         * Get the TrackingNumber
         *
         * @return string|null The TrackingNumber
         */
    public function getTrackingNumber(): ?string
    {
        return $this->TrackingNumber;
    }

        /**
         * Get the ShippingCompany
         *
         * @return array|null The ShippingCompany
         */
    public function getShippingCompany(): ?array
    {
        return $this->ShippingCompany;
    }

        /**
         * Get the Comments
         *
         * @return string|null The Comments
         */
    public function getComments(): ?string
    {
        return $this->Comments;
    }

        /**
         * Get the ShipmentWeight
         *
         * @return string|null The ShipmentWeight
         */
    public function getShipmentWeight(): ?string
    {
        return $this->ShipmentWeight;
    }

        /**
         * Get the NumberOfPackages
         *
         * @return int|null The NumberOfPackages
         */
    public function getNumberOfPackages(): ?int
    {
        return $this->NumberOfPackages;
    }

        /**
         * Get the Customer
         *
         * @return array|null The Customer
         */
    public function getCustomer(): ?array
    {
        return $this->Customer;
    }

        /**
         * Get the SalesShipmentLines
         *
         * @return array|null The SalesShipmentLines
         */
    public function getSalesShipmentLines(): ?array
    {
        return $this->SalesShipmentLines;
    }

    // Simple setters
        /**
         * Set the Guid
         *
         * @param string|null $guid The Guid
         */
    public function setGuid(?string $guid): void
    {
        $this->Guid = $guid;
    }

        /**
         * Set the ShipmentNumber
         *
         * @param string|null $shipmentNumber The ShipmentNumber
         */
    public function setShipmentNumber(?string $shipmentNumber): void
    {
        $this->ShipmentNumber = $shipmentNumber;
    }

        /**
         * Set the OrderNumber
         *
         * @param string|null $orderNumber The OrderNumber
         */
    public function setOrderNumber(?string $orderNumber): void
    {
        $this->OrderNumber = $orderNumber;
    }

        /**
         * Set the OrderGuid
         *
         * @param string|null $orderGuid The OrderGuid
         */
    public function setOrderGuid(?string $orderGuid): void
    {
        $this->OrderGuid = $orderGuid;
    }

        /**
         * Set the ShipmentStatus
         *
         * @param string|null $shipmentStatus The ShipmentStatus
         */
    public function setShipmentStatus(?string $shipmentStatus): void
    {
        $this->ShipmentStatus = $shipmentStatus;
    }

        /**
         * Set the TrackingNumber
         *
         * @param string|null $trackingNumber The TrackingNumber
         */
    public function setTrackingNumber(?string $trackingNumber): void
    {
        $this->TrackingNumber = $trackingNumber;
    }

        /**
         * Set the ShippingCompany
         *
         * @param array|null $shippingCompany The ShippingCompany
         */
    public function setShippingCompany(?array $shippingCompany): void
    {
        $this->ShippingCompany = $shippingCompany;
    }

        /**
         * Set the Comments
         *
         * @param string|null $comments The Comments
         */
    public function setComments(?string $comments): void
    {
        $this->Comments = $comments;
    }

        /**
         * Set the ShipmentWeight
         *
         * @param string|null $shipmentWeight The ShipmentWeight
         */
    public function setShipmentWeight(?string $shipmentWeight): void
    {
        $this->ShipmentWeight = $shipmentWeight;
    }

        /**
         * Set the NumberOfPackages
         *
         * @param int|null $numberOfPackages The NumberOfPackages
         */
    public function setNumberOfPackages(?int $numberOfPackages): void
    {
        $this->NumberOfPackages = $numberOfPackages;
    }

        /**
         * Set the Customer
         *
         * @param array|null $customer The Customer
         */
    public function setCustomer(?array $customer): void
    {
        $this->Customer = $customer;
    }

        /**
         * Set the SalesShipmentLines
         *
         * @param array|null $salesShipmentLines The SalesShipmentLines
         */
    public function setSalesShipmentLines(?array $salesShipmentLines): void
    {
        $this->SalesShipmentLines = $salesShipmentLines;
    }
}
