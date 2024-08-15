<?php

namespace App\Enums;

enum RaffleStatusEnum: string
{
    case active = 'active';
    case inactive = 'inactive';
    case complete = 'complete';
    case canceled = 'canceled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
