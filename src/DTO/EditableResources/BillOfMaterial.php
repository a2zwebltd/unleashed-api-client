<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;
use Unleashed\ApiClient\DTO\Data\BillOfMaterialLine;

/**
 * Bill of Material Data Transfer Object - Represents product bills of material
 *
 * @package Unleashed\ApiClient\DTO\EditableResources
 * @see     https://apidocs.unleashedsoftware.com/BillOfMaterials
 */
class BillOfMaterial extends BaseDto
{
    // BillOfMaterial properties
    /**
     * @var string|null BillNumber
     */
    public ?string $BillNumber = null;
    /**
     * @var string|null AverageDuration
     */
    public ?string $AverageDuration = null;
    /**
     * @var bool|null CanAutoAssemble
     */
    public ?bool $CanAutoAssemble = null;
    /**
     * @var bool|null CanAutoDisassemble
     */
    public ?bool $CanAutoDisassemble = null;
    /**
     * @var string|null DurationType
     */
    public ?string $DurationType = null;
    /**
     * @var string|null ExpectedDuration
     */
    public ?string $ExpectedDuration = null;
    /**
     * @var bool|null Obsolete
     */
    public ?bool $Obsolete = null;
    /**
     * @var string|null ProductionDaysPerWeek
     */
    public ?string $ProductionDaysPerWeek = null;
        /**
         * @var int|null ProductionHoursPerDay
         */
    public ?int $ProductionHoursPerDay = null;
        /**
         * @var bool|null SortByProductCode
         */
    public ?bool $SortByProductCode = null;
        /**
         * @var string|null CreatedBy
         */
    public ?string $CreatedBy = null;
        /**
         * @var string|null LastModifiedBy
         */
    public ?string $LastModifiedBy = null;

    // Complex objects (arrays from API)
    /**
     * @var Product|null Product for this BOM
     */
        /**
         * @var array|null Product
         */
    public ?array $Product = null;

    /**
     * @var BillOfMaterialLine[]|null Bill of material lines
     */
        /**
         * @var array|null BillOfMaterialsLines
         */
    public ?array $BillOfMaterialsLines = null;

    // Simple getters
        /**
         * Get the BillNumber
         *
         * @return string|null The BillNumber
         */
    public function getBillNumber(): ?string
    {
        return $this->BillNumber;
    }

        /**
         * Get the AverageDuration
         *
         * @return string|null The AverageDuration
         */
    public function getAverageDuration(): ?string
    {
        return $this->AverageDuration;
    }

        /**
         * Get the CanAutoAssemble
         *
         * @return bool|null The CanAutoAssemble
         */
    public function getCanAutoAssemble(): ?bool
    {
        return $this->CanAutoAssemble;
    }

        /**
         * Get the CanAutoDisassemble
         *
         * @return bool|null The CanAutoDisassemble
         */
    public function getCanAutoDisassemble(): ?bool
    {
        return $this->CanAutoDisassemble;
    }

        /**
         * Get the DurationType
         *
         * @return string|null The DurationType
         */
    public function getDurationType(): ?string
    {
        return $this->DurationType;
    }

        /**
         * Get the ExpectedDuration
         *
         * @return string|null The ExpectedDuration
         */
    public function getExpectedDuration(): ?string
    {
        return $this->ExpectedDuration;
    }

        /**
         * Check if Obsolete
         *
         * @return bool|null True if Obsolete, false otherwise
         */
    public function isObsolete(): ?bool
    {
        return $this->Obsolete;
    }

        /**
         * Get the ProductionDaysPerWeek
         *
         * @return string|null The ProductionDaysPerWeek
         */
    public function getProductionDaysPerWeek(): ?string
    {
        return $this->ProductionDaysPerWeek;
    }

        /**
         * Get the ProductionHoursPerDay
         *
         * @return int|null The ProductionHoursPerDay
         */
    public function getProductionHoursPerDay(): ?int
    {
        return $this->ProductionHoursPerDay;
    }

        /**
         * Get the SortByProductCode
         *
         * @return bool|null The SortByProductCode
         */
    public function getSortByProductCode(): ?bool
    {
        return $this->SortByProductCode;
    }

        /**
         * Get the Product
         *
         * @return array|null The Product
         */
    public function getProduct(): ?array
    {
        return $this->Product;
    }

        /**
         * Get the BillOfMaterialsLines
         *
         * @return array|null The BillOfMaterialsLines
         */
    public function getBillOfMaterialsLines(): ?array
    {
        return $this->BillOfMaterialsLines;
    }

    // Simple setters
        /**
         * Set the BillNumber
         *
         * @param string|null $billNumber The BillNumber
         */
    public function setBillNumber(?string $billNumber): void
    {
        $this->BillNumber = $billNumber;
    }

        /**
         * Set the AverageDuration
         *
         * @param string|null $averageDuration The AverageDuration
         */
    public function setAverageDuration(?string $averageDuration): void
    {
        $this->AverageDuration = $averageDuration;
    }

        /**
         * Set the CanAutoAssemble
         *
         * @param bool|null $canAutoAssemble The CanAutoAssemble
         */
    public function setCanAutoAssemble(?bool $canAutoAssemble): void
    {
        $this->CanAutoAssemble = $canAutoAssemble;
    }

        /**
         * Set the CanAutoDisassemble
         *
         * @param bool|null $canAutoDisassemble The CanAutoDisassemble
         */
    public function setCanAutoDisassemble(?bool $canAutoDisassemble): void
    {
        $this->CanAutoDisassemble = $canAutoDisassemble;
    }

        /**
         * Set the DurationType
         *
         * @param string|null $durationType The DurationType
         */
    public function setDurationType(?string $durationType): void
    {
        $this->DurationType = $durationType;
    }

        /**
         * Set the ExpectedDuration
         *
         * @param string|null $expectedDuration The ExpectedDuration
         */
    public function setExpectedDuration(?string $expectedDuration): void
    {
        $this->ExpectedDuration = $expectedDuration;
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
         * Set the ProductionDaysPerWeek
         *
         * @param string|null $productionDaysPerWeek The ProductionDaysPerWeek
         */
    public function setProductionDaysPerWeek(?string $productionDaysPerWeek): void
    {
        $this->ProductionDaysPerWeek = $productionDaysPerWeek;
    }

        /**
         * Set the ProductionHoursPerDay
         *
         * @param int|null $productionHoursPerDay The ProductionHoursPerDay
         */
    public function setProductionHoursPerDay(?int $productionHoursPerDay): void
    {
        $this->ProductionHoursPerDay = $productionHoursPerDay;
    }

        /**
         * Set the SortByProductCode
         *
         * @param bool|null $sortByProductCode The SortByProductCode
         */
    public function setSortByProductCode(?bool $sortByProductCode): void
    {
        $this->SortByProductCode = $sortByProductCode;
    }

        /**
         * Set the Product
         *
         * @param array|null $product The Product
         */
    public function setProduct(?array $product): void
    {
        $this->Product = $product;
    }

        /**
         * Set the BillOfMaterialsLines
         *
         * @param array|null $billOfMaterialsLines The BillOfMaterialsLines
         */
    public function setBillOfMaterialsLines(?array $billOfMaterialsLines): void
    {
        $this->BillOfMaterialsLines = $billOfMaterialsLines;
    }
}
