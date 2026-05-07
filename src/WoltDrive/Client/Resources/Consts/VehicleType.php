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
    case WALKING = 'walking';
}
