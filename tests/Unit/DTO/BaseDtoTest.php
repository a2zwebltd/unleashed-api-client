<?php

declare(strict_types=1);

namespace Unleashed\ApiClient\Tests\Unit\DTO;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Unleashed\ApiClient\DTO\BaseDto;

#[CoversClass(BaseDto::class)]
class BaseDtoTest extends TestCase
{
    public function testBaseDtoCreation(): void
    {
        // Create a concrete test class that extends BaseDto
        $dto = new class extends BaseDto {
        };

        $this->assertInstanceOf(BaseDto::class, $dto);
        $this->assertNull($dto->getGuid());
        $this->assertNull($dto->getCreatedOn());
        $this->assertNull($dto->getLastModifiedOn());
    }

    public function testBaseDtoSettersAndGetters(): void
    {
        $dto = new class extends BaseDto {
        };

        $dto->setGuid('test-guid-123');
        $dto->setCreatedOn(new \DateTime('2023-01-01 12:00:00'));
        $dto->setLastModifiedOn(new \DateTime('2023-01-01 12:00:00'));

        $this->assertEquals('test-guid-123', $dto->getGuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $dto->getCreatedOn());
        $this->assertInstanceOf(\DateTimeInterface::class, $dto->getLastModifiedOn());
    }

    public function testBaseDtoToArray(): void
    {
        $dto = new class extends BaseDto {
        };
        $dto->setGuid('test-guid-123');
        $dto->setCreatedOn(new \DateTime('2023-01-01 12:00:00'));
        $dto->setLastModifiedOn(new \DateTime('2023-01-01 12:00:00'));

        $array = $dto->toArray();

        $this->assertIsArray($array);
        $this->assertEquals('test-guid-123', $array['guid']);
        $this->assertInstanceOf(\DateTimeInterface::class, $array['createdOn']);
        $this->assertInstanceOf(\DateTimeInterface::class, $array['lastModifiedOn']);
    }

    public function testBaseDtoFromArray(): void
    {
        $data = [
            'guid' => 'test-guid-123',
            'createdOn' => new \DateTime('2023-01-01T12:00:00'),
            'lastModifiedOn' => new \DateTime('2023-01-01T12:00:00'),
        ];

        $dto = (new class extends BaseDto {
        })::fromArray($data);

        $this->assertEquals('test-guid-123', $dto->getGuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $dto->getCreatedOn());
        $this->assertInstanceOf(\DateTimeInterface::class, $dto->getLastModifiedOn());
    }

    public function testBaseDtoJsonSerialization(): void
    {
        $dto = new class extends BaseDto {
        };
        $dto->setGuid('test-guid-123');
        $dto->setCreatedOn(new \DateTime('2023-01-01 12:00:00'));

        $json = json_encode($dto);
        $decoded = json_decode($json, true);

        $this->assertIsArray($decoded);
        $this->assertEquals('test-guid-123', $decoded['guid']);
        $this->assertIsArray($decoded['createdOn']); // JSON decoded DateTime becomes array
    }

    public function testBaseDtoSettersReturnVoid(): void
    {
        $dto = new class extends BaseDto {
        };

        // Test that setters return void (not $this)
        $result = $dto->setGuid('test-guid-123');
        $this->assertNull($result);

        $result = $dto->setCreatedOn(new \DateTime());
        $this->assertNull($result);

        $result = $dto->setLastModifiedOn(new \DateTime());
        $this->assertNull($result);
    }

    public function testBaseDtoNullValues(): void
    {
        $dto = new class extends BaseDto {
        };

        // Test that null values are handled correctly
        $dto->setGuid(null);
        $dto->setCreatedOn(null);
        $dto->setLastModifiedOn(null);

        $this->assertNull($dto->getGuid());
        $this->assertNull($dto->getCreatedOn());
        $this->assertNull($dto->getLastModifiedOn());
    }

    public function testBaseDtoDateTimeFields(): void
    {
        $dto = new class extends BaseDto {
        };

        $dateTime = new \DateTime('2023-01-01 12:00:00');
        $dto->setLastModifiedOn($dateTime);

        $this->assertInstanceOf(\DateTimeInterface::class, $dto->getLastModifiedOn());
        $this->assertEquals($dateTime, $dto->getLastModifiedOn());

        // Test null datetime
        $dto->setLastModifiedOn(null);
        $this->assertNull($dto->getLastModifiedOn());
    }

    public function testBaseDtoInheritance(): void
    {
        // Test that BaseDto can be extended
        $extendedDto = new class extends BaseDto {
            public string $customField = '';

            public function getCustomField(): string
            {
                return $this->customField;
            }

            public function setCustomField(string $customField): void
            {
                $this->customField = $customField;
            }
        };

        $extendedDto->setGuid('test-guid');
        $extendedDto->setCustomField('custom value');

        $this->assertEquals('test-guid', $extendedDto->getGuid());
        $this->assertEquals('custom value', $extendedDto->getCustomField());
    }

    public function testBaseDtoArrayConversion(): void
    {
        $dto = new class extends BaseDto {
        };
        $dto->setGuid('test-guid-123');
        $dto->setCreatedOn(new \DateTime('2023-01-01 12:00:00'));
        $dto->setLastModifiedOn(new \DateTime('2023-01-01 12:00:00'));

        $array = $dto->toArray();

        // Test that all base fields are included
        $this->assertArrayHasKey('guid', $array);
        $this->assertArrayHasKey('createdOn', $array);
        $this->assertArrayHasKey('lastModifiedOn', $array);

        // Test that values are correct
        $this->assertEquals('test-guid-123', $array['guid']);
        $this->assertInstanceOf(\DateTimeInterface::class, $array['createdOn']);
        $this->assertInstanceOf(\DateTimeInterface::class, $array['lastModifiedOn']);
    }
}
