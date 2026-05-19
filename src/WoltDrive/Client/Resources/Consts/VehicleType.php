<?php
/**
 * Description of VehicleType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WoltDrive\Client\Resources\Consts;

enum VehicleType: string
{
    case CAR = 'car';
    case SCOOTER = 'scooter';
    case BICYCLE = 'bicycle';
    case MOTORCYCLE = 'motorcycle';
    case ELECTRIC_BICYCLE = 'electric_bicycle';
    case ELECTRIC_SCOOTER = 'electric_scooter';
    case ELECTRIC_MOTORCYCLE = 'electric_motorcycle';
    case WALKING = 'walking';
    case OTHER = 'other';

    public static function fromString(?string $value): self
    {
        if (is_null($value)) {
            return self::OTHER;
        }

        return self::tryFrom($value) ?? self::OTHER;
    }
}
