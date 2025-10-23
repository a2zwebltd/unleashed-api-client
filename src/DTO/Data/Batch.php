<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Batch Data Transfer Object
 *
 * Represents batch information for products in the Unleashed system.
 * Batches are used to track product lots and expiry dates.
 *
 * @package Unleashed\ApiClient\DTO\Data
 * @see     https://apidocs.unleashedsoftware.com/BatchNumbers
 */
class Batch extends BaseDto
{
    /**
     * Batch properties
     */

    /**
     * @var string|null Batch number
     */
    public ?string $BatchNumber = null;

    /**
     * @var string|null Product code
     */
    public ?string $ProductCode = null;

    /**
     * @var string|null Expiry date
     */
    public ?string $ExpiryDate = null;

    /**
     * @var float|null Quantity in batch
     */
    public ?float $Quantity = null;

    /**
     * @var string|null Batch status
     */
    public ?string $Status = null;

    /**
     * @var string|null User who created the batch
     */
    public ?string $CreatedBy = null;

    /**
     * @var string|null User who last modified the batch
     */
    public ?string $LastModifiedBy = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the batch number
     *
     * @return string|null The batch number
     */
    public function getBatchNumber(): ?string
    {
        return $this->BatchNumber;
    }

    /**
     * Get the product code
     *
     * @return string|null The product code
     */
    public function getProductCode(): ?string
    {
        return $this->ProductCode;
    }

    /**
     * Get the expiry date
     *
     * @return string|null The expiry date
     */
    public function getExpiryDate(): ?string
    {
        return $this->ExpiryDate;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the batch number
     *
     * @param string|null $batchNumber The batch number
     */
    public function setBatchNumber(?string $batchNumber): void
    {
        $this->BatchNumber = $batchNumber;
    }

    /**
     * Set the product code
     *
     * @param string|null $productCode The product code
     */
    public function setProductCode(?string $productCode): void
    {
        $this->ProductCode = $productCode;
    }

    /**
     * Set the expiry date
     *
     * @param string|null $expiryDate The expiry date
     */
    public function setExpiryDate(?string $expiryDate): void
    {
        $this->ExpiryDate = $expiryDate;
    }
}
