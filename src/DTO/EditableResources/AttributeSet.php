<?php

/**
 * Attribute Set Data Transfer Object
 *
 * This file contains the AttributeSet class which represents product attribute sets
 * in the Unleashed Software API. Attribute sets are used to group related product
 * attributes together, allowing for organized categorization of product properties.
 *
 * @category DTO
 * @package  Unleashed\ApiClient\DTO\EditableResources
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/AttributeSets
 */

declare(strict_types=1);

namespace Unleashed\ApiClient\DTO\EditableResources;

use Unleashed\ApiClient\DTO\BaseDto;

/**
 * Attribute Set Data Transfer Object - Represents product attribute sets
 *
 * Attribute sets are used to group related product attributes together,
 * allowing for organized categorization of product properties.
 *
 * @category DTO
 * @package  Unleashed\ApiClient\DTO\EditableResources
 * @author   Unleashed Software <support@unleashedsoftware.com>
 * @license  MIT License https://opensource.org/licenses/MIT
 * @link     https://apidocs.unleashedsoftware.com/AttributeSets
 */
class AttributeSet extends BaseDto
{
    /**
     * The name of the attribute set
     *
     * @var string|null
     */
    public ?string $SetName = null;

    /**
     * The type/category of the attribute set
     *
     * @var string|null
     */
    public ?string $Type = null;

    /**
     * Description of the attribute set
     *
     * @var string|null
     */
    public ?string $Description = null;

    /**
     * Whether the attribute set is obsolete/deprecated
     *
     * @var bool|null
     */
    public ?bool $Obsolete = null;

    /**
     * User who created the attribute set
     *
     * @var string|null
     */
    public ?string $CreatedBy = null;

    /**
     * User who last modified the attribute set
     *
     * @var string|null
     */
    public ?string $LastModifiedBy = null;

    /**
     * Collection of attributes belonging to this set
     *
     * @var array|null
     */
    public ?array $Attributes = null;

    /**
     * Get the name of the attribute set
     *
     * @return string|null The attribute set name
     */
    public function getSetName(): ?string
    {
        return $this->SetName;
    }

    /**
     * Get the type/category of the attribute set
     *
     * @return string|null The attribute set type
     */
    public function getType(): ?string
    {
        return $this->Type;
    }

    /**
     * Get the description of the attribute set
     *
     * @return string|null The attribute set description
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * Check if the attribute set is obsolete
     *
     * @return bool|null True if obsolete, false if not, null if not set
     */
    public function isObsolete(): ?bool
    {
        return $this->Obsolete;
    }

    /**
     * Set the name of the attribute set
     *
     * @param string|null $setName The attribute set name
     *
     * @return void
     */
    public function setSetName(?string $setName): void
    {
        $this->SetName = $setName;
    }

    /**
     * Set the type/category of the attribute set
     *
     * @param string|null $type The attribute set type
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->Type = $type;
    }

    /**
     * Set the description of the attribute set
     *
     * @param string|null $description The attribute set description
     *
     * @return void
     */
    public function setDescription(?string $description): void
    {
        $this->Description = $description;
    }

    /**
     * Set whether the attribute set is obsolete
     *
     * @param bool|null $obsolete True if obsolete, false if not, null to unset
     *
     * @return void
     */
    public function setObsolete(?bool $obsolete): void
    {
        $this->Obsolete = $obsolete;
    }
}
