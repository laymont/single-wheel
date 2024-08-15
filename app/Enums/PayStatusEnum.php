<?php

namespace App\Enums;

enum PayStatusEnum: string
{
    case Pendiente = 'Pendiente';
    case Recibido = 'Recibido';
    case Verificado = 'Verificado';
    case Rechazado = 'Rechazado';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
