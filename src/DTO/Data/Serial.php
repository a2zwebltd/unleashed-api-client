<?php

/**
 * Serial Data Transfer Object
 *
 * This file contains the Serial class which represents serial number information
 * for products in the Unleashed system. Serial numbers are used to track
 * individual product instances.
 *
 * @category DTO
 * @package  Unleashed\ApiClient\DTO\Data
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/SerialNumbers
 */

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\Data;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Serial Data Transfer Object
 *
 * Represents serial number information for products in the Unleashed system.
 * Serial numbers are used to track individual product instances.
 *
 * @category DTO
 * @package  Unleashed\ApiClient\DTO\Data
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/SerialNumbers
 */
class Serial extends BaseDto
{
    /**
     * The serial number identifier
     *
     * @var string|null
     */
    public ?string $SerialNumber = null;

    /**
     * The product code associated with this serial number
     *
     * @var string|null
     */
    public ?string $ProductCode = null;

    /**
     * The current status of the serial number
     *
     * @var string|null
     */
    public ?string $Status = null;

    /**
     * The location where the serial number is stored
     *
     * @var string|null
     */
    public ?string $Location = null;

    /**
     * Additional notes about the serial number
     *
     * @var string|null
     */
    public ?string $Notes = null;

    /**
     * User who created the serial number record
     *
     * @var string|null
     */
    public ?string $CreatedBy = null;

    /**
     * User who last modified the serial number record
     *
     * @var string|null
     */
    public ?string $LastModifiedBy = null;

    /**
     * Simple getters for common use cases
     */

    /**
     * Get the serial number
     *
     * @return string|null The serial number
     */
    public function getSerialNumber(): ?string
    {
        return $this->SerialNumber;
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
     * Get the serial status
     *
     * @return string|null The status
     */
    public function getStatus(): ?string
    {
        return $this->Status;
    }

    /**
     * Simple setters for common use cases
     */

    /**
     * Set the serial number
     *
     * @param string|null $serialNumber The serial number
     *
     * @return void
     */
    public function setSerialNumber(?string $serialNumber): void
    {
        $this->SerialNumber = $serialNumber;
    }

    /**
     * Set the product code
     *
     * @param string|null $productCode The product code
     *
     * @return void
     */
    public function setProductCode(?string $productCode): void
    {
        $this->ProductCode = $productCode;
    }

    /**
     * Set the serial status
     *
     * @param string|null $status The status
     *
     * @return void
     */
    public function setStatus(?string $status): void
    {
        $this->Status = $status;
    }
}
