<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Stock On Hand Data Transfer Object - Represents stock on hand
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/StockOnHand
 */
class StockOnHand extends BaseDto
{
        /**
         * @var string|null StockOnHandCode
         */
    public ?string $StockOnHandCode = null;
        /**
         * @var string|null StockOnHandName
         */
    public ?string $StockOnHandName = null;
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
         * @var string|null ProductCode
         */
    public ?string $ProductCode = null;
        /**
         * @var string|null ProductDescription
         */
    public ?string $ProductDescription = null;
        /**
         * @var string|null ProductGuid
         */
    public ?string $ProductGuid = null;
        /**
         * @var string|null ProductSourceId
         */
    public ?string $ProductSourceId = null;
        /**
         * @var string|null ProductGroupName
         */
    public ?string $ProductGroupName = null;
        /**
         * @var string|null Warehouse
         */
    public ?string $Warehouse = null;
        /**
         * @var string|null WarehouseCode
         */
    public ?string $WarehouseCode = null;
        /**
         * @var string|null WarehouseId
         */
    public ?string $WarehouseId = null;
        /**
         * @var float|null AllocatedQty
         */
    public ?float $AllocatedQty = null;
        /**
         * @var float|null AvailableQty
         */
    public ?float $AvailableQty = null;
        /**
         * @var float|null QtyOnHand
         */
    public ?float $QtyOnHand = null;
        /**
         * @var float|null AvgCost
         */
    public ?float $AvgCost = null;
        /**
         * @var float|null TotalCost
         */
    public ?float $TotalCost = null;
        /**
         * @var int|null DaysSinceLastSale
         */
    public ?int $DaysSinceLastSale = null;
        /**
         * @var float|null OnPurchase
         */
    public ?float $OnPurchase = null;

        /**
         * Get the StockOnHandCode
         *
         * @return string|null The StockOnHandCode
         */
    public function getStockOnHandCode(): ?string
    {
        return $this->StockOnHandCode;
    }
        /**
         * Get the StockOnHandName
         *
         * @return string|null The StockOnHandName
         */
    public function getStockOnHandName(): ?string
    {
        return $this->StockOnHandName;
    }
        /**
         * Set the StockOnHandCode
         *
         * @param string|null $code The StockOnHandCode
         */
    public function setStockOnHandCode(?string $code): void
    {
        $this->StockOnHandCode = $code;
    }
        /**
         * Set the StockOnHandName
         *
         * @param string|null $name The StockOnHandName
         */
    public function setStockOnHandName(?string $name): void
    {
        $this->StockOnHandName = $name;
    }

    // API Documentation getters
        /**
         * Get the ProductCode
         *
         * @return string|null The ProductCode
         */
    public function getProductCode(): ?string
    {
        return $this->ProductCode;
    }
        /**
         * Get the ProductDescription
         *
         * @return string|null The ProductDescription
         */
    public function getProductDescription(): ?string
    {
        return $this->ProductDescription;
    }
        /**
         * Get the ProductGuid
         *
         * @return string|null The ProductGuid
         */
    public function getProductGuid(): ?string
    {
        return $this->ProductGuid;
    }
        /**
         * Get the ProductSourceId
         *
         * @return string|null The ProductSourceId
         */
    public function getProductSourceId(): ?string
    {
        return $this->ProductSourceId;
    }
        /**
         * Get the ProductGroupName
         *
         * @return string|null The ProductGroupName
         */
    public function getProductGroupName(): ?string
    {
        return $this->ProductGroupName;
    }
        /**
         * Get the Warehouse
         *
         * @return string|null The Warehouse
         */
    public function getWarehouse(): ?string
    {
        return $this->Warehouse;
    }
        /**
         * Get the WarehouseCode
         *
         * @return string|null The WarehouseCode
         */
    public function getWarehouseCode(): ?string
    {
        return $this->WarehouseCode;
    }
        /**
         * Get the WarehouseId
         *
         * @return string|null The WarehouseId
         */
    public function getWarehouseId(): ?string
    {
        return $this->WarehouseId;
    }
        /**
         * Get the AllocatedQty
         *
         * @return float|null The AllocatedQty
         */
    public function getAllocatedQty(): ?float
    {
        return $this->AllocatedQty;
    }
        /**
         * Get the AvailableQty
         *
         * @return float|null The AvailableQty
         */
    public function getAvailableQty(): ?float
    {
        return $this->AvailableQty;
    }
        /**
         * Get the QtyOnHand
         *
         * @return float|null The QtyOnHand
         */
    public function getQtyOnHand(): ?float
    {
        return $this->QtyOnHand;
    }
        /**
         * Get the AvgCost
         *
         * @return float|null The AvgCost
         */
    public function getAvgCost(): ?float
    {
        return $this->AvgCost;
    }
        /**
         * Get the TotalCost
         *
         * @return float|null The TotalCost
         */
    public function getTotalCost(): ?float
    {
        return $this->TotalCost;
    }
        /**
         * Get the DaysSinceLastSale
         *
         * @return int|null The DaysSinceLastSale
         */
    public function getDaysSinceLastSale(): ?int
    {
        return $this->DaysSinceLastSale;
    }
        /**
         * Get the OnPurchase
         *
         * @return float|null The OnPurchase
         */
    public function getOnPurchase(): ?float
    {
        return $this->OnPurchase;
    }

    // API Documentation setters
        /**
         * Set the ProductCode
         *
         * @param string|null $productCode The ProductCode
         */
    public function setProductCode(?string $productCode): void
    {
        $this->ProductCode = $productCode;
    }
        /**
         * Set the ProductDescription
         *
         * @param string|null $productDescription The ProductDescription
         */
    public function setProductDescription(?string $productDescription): void
    {
        $this->ProductDescription = $productDescription;
    }
        /**
         * Set the ProductGuid
         *
         * @param string|null $productGuid The ProductGuid
         */
    public function setProductGuid(?string $productGuid): void
    {
        $this->ProductGuid = $productGuid;
    }
        /**
         * Set the ProductSourceId
         *
         * @param string|null $productSourceId The ProductSourceId
         */
    public function setProductSourceId(?string $productSourceId): void
    {
        $this->ProductSourceId = $productSourceId;
    }
        /**
         * Set the ProductGroupName
         *
         * @param string|null $productGroupName The ProductGroupName
         */
    public function setProductGroupName(?string $productGroupName): void
    {
        $this->ProductGroupName = $productGroupName;
    }
        /**
         * Set the Warehouse
         *
         * @param string|null $warehouse The Warehouse
         */
    public function setWarehouse(?string $warehouse): void
    {
        $this->Warehouse = $warehouse;
    }
        /**
         * Set the WarehouseCode
         *
         * @param string|null $warehouseCode The WarehouseCode
         */
    public function setWarehouseCode(?string $warehouseCode): void
    {
        $this->WarehouseCode = $warehouseCode;
    }
        /**
         * Set the WarehouseId
         *
         * @param string|null $warehouseId The WarehouseId
         */
    public function setWarehouseId(?string $warehouseId): void
    {
        $this->WarehouseId = $warehouseId;
    }
        /**
         * Set the AllocatedQty
         *
         * @param float|null $allocatedQty The AllocatedQty
         */
    public function setAllocatedQty(?float $allocatedQty): void
    {
        $this->AllocatedQty = $allocatedQty;
    }
        /**
         * Set the AvailableQty
         *
         * @param float|null $availableQty The AvailableQty
         */
    public function setAvailableQty(?float $availableQty): void
    {
        $this->AvailableQty = $availableQty;
    }
        /**
         * Set the QtyOnHand
         *
         * @param float|null $qtyOnHand The QtyOnHand
         */
    public function setQtyOnHand(?float $qtyOnHand): void
    {
        $this->QtyOnHand = $qtyOnHand;
    }
        /**
         * Set the AvgCost
         *
         * @param float|null $avgCost The AvgCost
         */
    public function setAvgCost(?float $avgCost): void
    {
        $this->AvgCost = $avgCost;
    }
        /**
         * Set the TotalCost
         *
         * @param float|null $totalCost The TotalCost
         */
    public function setTotalCost(?float $totalCost): void
    {
        $this->TotalCost = $totalCost;
    }
        /**
         * Set the DaysSinceLastSale
         *
         * @param int|null $daysSinceLastSale The DaysSinceLastSale
         */
    public function setDaysSinceLastSale(?int $daysSinceLastSale): void
    {
        $this->DaysSinceLastSale = $daysSinceLastSale;
    }
        /**
         * Set the OnPurchase
         *
         * @param float|null $onPurchase The OnPurchase
         */
    public function setOnPurchase(?float $onPurchase): void
    {
        $this->OnPurchase = $onPurchase;
    }
}
