<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Warehouse Stock Transfer Data Transfer Object - Represents stock transfers between warehouses
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/WarehouseStockTransfers
 */
class WarehouseStockTransfer extends BaseDto
{
    // WarehouseStockTransfer properties
        /**
         * @var string|null Comments
         */
    public ?string $Comments = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;
        /**
         * @var string|null DeliveryDate
         */
    public ?string $DeliveryDate = null;
        /**
         * @var string|null OrderDate
         */
    public ?string $OrderDate = null;
        /**
         * @var string|null TransferOrderNumber
         */
    public ?string $TransferOrderNumber = null;
        /**
         * @var string|null TransferStatus
         */
    public ?string $TransferStatus = null;

    // Complex objects (arrays from API)
        /**
         * @var array|null SourceWarehouse
         */
    public ?array $SourceWarehouse = null;
        /**
         * @var array|null DestinationWarehouse
         */
    public ?array $DestinationWarehouse = null;
        /**
         * @var array|null TransferDetails
         */
    public ?array $TransferDetails = null;

    // Simple getters
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
         * Get the TransferStatus
         *
         * @return string|null The TransferStatus
         */
    public function getTransferStatus(): ?string
    {
        return $this->TransferStatus;
    }

        /**
         * Get the TransferOrderNumber
         *
         * @return string|null The TransferOrderNumber
         */
    public function getTransferOrderNumber(): ?string
    {
        return $this->TransferOrderNumber;
    }

        /**
         * Get the SourceWarehouse
         *
         * @return array|null The SourceWarehouse
         */
    public function getSourceWarehouse(): ?array
    {
        return $this->SourceWarehouse;
    }

        /**
         * Get the DestinationWarehouse
         *
         * @return array|null The DestinationWarehouse
         */
    public function getDestinationWarehouse(): ?array
    {
        return $this->DestinationWarehouse;
    }

        /**
         * Get the TransferDetails
         *
         * @return array|null The TransferDetails
         */
    public function getTransferDetails(): ?array
    {
        return $this->TransferDetails;
    }

    // Simple setters
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
         * Set the TransferStatus
         *
         * @param string|null $transferStatus The TransferStatus
         */
    public function setTransferStatus(?string $transferStatus): void
    {
        $this->TransferStatus = $transferStatus;
    }

        /**
         * Set the TransferOrderNumber
         *
         * @param string|null $transferOrderNumber The TransferOrderNumber
         */
    public function setTransferOrderNumber(?string $transferOrderNumber): void
    {
        $this->TransferOrderNumber = $transferOrderNumber;
    }

        /**
         * Set the SourceWarehouse
         *
         * @param array|null $sourceWarehouse The SourceWarehouse
         */
    public function setSourceWarehouse(?array $sourceWarehouse): void
    {
        $this->SourceWarehouse = $sourceWarehouse;
    }

        /**
         * Set the DestinationWarehouse
         *
         * @param array|null $destinationWarehouse The DestinationWarehouse
         */
    public function setDestinationWarehouse(?array $destinationWarehouse): void
    {
        $this->DestinationWarehouse = $destinationWarehouse;
    }

        /**
         * Set the TransferDetails
         *
         * @param array|null $transferDetails The TransferDetails
         */
    public function setTransferDetails(?array $transferDetails): void
    {
        $this->TransferDetails = $transferDetails;
    }
}
