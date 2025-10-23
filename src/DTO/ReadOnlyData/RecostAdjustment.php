<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\ReadOnlyData;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Recost Adjustment Data Transfer Object - Represents recost adjustments
 *
 * @package Unleashed\ApiClient\DTO\ReadOnlyData
 * @see     https://apidocs.unleashedsoftware.com/RecostAdjustments
 */
class RecostAdjustment extends BaseDto
{
        /**
         * @var string|null RecostAdjustmentCode
         */
    public ?string $RecostAdjustmentCode = null;
        /**
         * @var string|null RecostAdjustmentName
         */
    public ?string $RecostAdjustmentName = null;
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
         * Get the RecostAdjustmentCode
         *
         * @return string|null The RecostAdjustmentCode
         */
    public function getRecostAdjustmentCode(): ?string
    {
        return $this->RecostAdjustmentCode;
    }
        /**
         * Get the RecostAdjustmentName
         *
         * @return string|null The RecostAdjustmentName
         */
    public function getRecostAdjustmentName(): ?string
    {
        return $this->RecostAdjustmentName;
    }
        /**
         * Set the RecostAdjustmentCode
         *
         * @param string|null $code The RecostAdjustmentCode
         */
    public function setRecostAdjustmentCode(?string $code): void
    {
        $this->RecostAdjustmentCode = $code;
    }
        /**
         * Set the RecostAdjustmentName
         *
         * @param string|null $name The RecostAdjustmentName
         */
    public function setRecostAdjustmentName(?string $name): void
    {
        $this->RecostAdjustmentName = $name;
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
