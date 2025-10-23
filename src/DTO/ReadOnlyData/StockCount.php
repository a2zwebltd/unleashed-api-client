<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Stock Count Data Transfer Object - Represents stock counts
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/StockCounts
 */
class StockCount extends BaseDto
{
        /**
         * @var string|null StockCountCode
         */
    public ?string $StockCountCode = null;
        /**
         * @var string|null StockCountName
         */
    public ?string $StockCountName = null;
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
         * @var string|null CompletedDate
         */
    public ?string $CompletedDate = null;
        /**
         * @var string|null CostOfGoodsAccount
         */
    public ?string $CostOfGoodsAccount = null;
        /**
         * @var string|null CountDate
         */
    public ?string $CountDate = null;
        /**
         * @var string|null CountType
         */
    public ?string $CountType = null;
        /**
         * @var string|null Description
         */
    public ?string $Description = null;
        /**
         * @var string|null Status
         */
    public ?string $Status = null;
        /**
         * @var string|null StockTakeCode
         */
    public ?string $StockTakeCode = null;
        /**
         * @var string|null StockTakeName
         */
    public ?string $StockTakeName = null;
        /**
         * @var array|null StockCountLines
         */
    public ?array $StockCountLines = null;
        /**
         * @var array|null Warehouse
         */
    public ?array $Warehouse = null;

        /**
         * Get the StockCountCode
         *
         * @return string|null The StockCountCode
         */
    public function getStockCountCode(): ?string
    {
        return $this->StockCountCode;
    }
        /**
         * Get the StockCountName
         *
         * @return string|null The StockCountName
         */
    public function getStockCountName(): ?string
    {
        return $this->StockCountName;
    }
        /**
         * Set the StockCountCode
         *
         * @param string|null $code The StockCountCode
         */
    public function setStockCountCode(?string $code): void
    {
        $this->StockCountCode = $code;
    }
        /**
         * Set the StockCountName
         *
         * @param string|null $name The StockCountName
         */
    public function setStockCountName(?string $name): void
    {
        $this->StockCountName = $name;
    }

    // API Documentation getters
        /**
         * Get the CompletedDate
         *
         * @return string|null The CompletedDate
         */
    public function getCompletedDate(): ?string
    {
        return $this->CompletedDate;
    }
        /**
         * Get the CostOfGoodsAccount
         *
         * @return string|null The CostOfGoodsAccount
         */
    public function getCostOfGoodsAccount(): ?string
    {
        return $this->CostOfGoodsAccount;
    }
        /**
         * Get the CountDate
         *
         * @return string|null The CountDate
         */
    public function getCountDate(): ?string
    {
        return $this->CountDate;
    }
        /**
         * Get the CountType
         *
         * @return string|null The CountType
         */
    public function getCountType(): ?string
    {
        return $this->CountType;
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
         * Get the Status
         *
         * @return string|null The Status
         */
    public function getStatus(): ?string
    {
        return $this->Status;
    }
        /**
         * Get the StockTakeCode
         *
         * @return string|null The StockTakeCode
         */
    public function getStockTakeCode(): ?string
    {
        return $this->StockTakeCode;
    }
        /**
         * Get the StockTakeName
         *
         * @return string|null The StockTakeName
         */
    public function getStockTakeName(): ?string
    {
        return $this->StockTakeName;
    }
        /**
         * Get the StockCountLines
         *
         * @return array|null The StockCountLines
         */
    public function getStockCountLines(): ?array
    {
        return $this->StockCountLines;
    }
        /**
         * Get the Warehouse
         *
         * @return array|null The Warehouse
         */
    public function getWarehouse(): ?array
    {
        return $this->Warehouse;
    }

    // API Documentation setters
        /**
         * Set the CompletedDate
         *
         * @param string|null $completedDate The CompletedDate
         */
    public function setCompletedDate(?string $completedDate): void
    {
        $this->CompletedDate = $completedDate;
    }
        /**
         * Set the CostOfGoodsAccount
         *
         * @param string|null $costOfGoodsAccount The CostOfGoodsAccount
         */
    public function setCostOfGoodsAccount(?string $costOfGoodsAccount): void
    {
        $this->CostOfGoodsAccount = $costOfGoodsAccount;
    }
        /**
         * Set the CountDate
         *
         * @param string|null $countDate The CountDate
         */
    public function setCountDate(?string $countDate): void
    {
        $this->CountDate = $countDate;
    }
        /**
         * Set the CountType
         *
         * @param string|null $countType The CountType
         */
    public function setCountType(?string $countType): void
    {
        $this->CountType = $countType;
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
         * Set the Status
         *
         * @param string|null $status The Status
         */
    public function setStatus(?string $status): void
    {
        $this->Status = $status;
    }
        /**
         * Set the StockTakeCode
         *
         * @param string|null $stockTakeCode The StockTakeCode
         */
    public function setStockTakeCode(?string $stockTakeCode): void
    {
        $this->StockTakeCode = $stockTakeCode;
    }
        /**
         * Set the StockTakeName
         *
         * @param string|null $stockTakeName The StockTakeName
         */
    public function setStockTakeName(?string $stockTakeName): void
    {
        $this->StockTakeName = $stockTakeName;
    }
        /**
         * Set the StockCountLines
         *
         * @param array|null $stockCountLines The StockCountLines
         */
    public function setStockCountLines(?array $stockCountLines): void
    {
        $this->StockCountLines = $stockCountLines;
    }
        /**
         * Set the Warehouse
         *
         * @param array|null $warehouse The Warehouse
         */
    public function setWarehouse(?array $warehouse): void
    {
        $this->Warehouse = $warehouse;
    }
}
