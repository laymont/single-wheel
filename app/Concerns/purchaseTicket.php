<?php

namespace App\Concerns;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class purchaseTicket
{
    public function purchase($raffleId, $ticketId): true
    {
        try {
            $raffleKey = raffle_key($raffleId);

            // Obtener el número del ticket desde Redis usando spop
            $ticketNumber = Redis::command('spop', [$raffleKey]);

            if (!$ticketNumber) {
                throw new \RuntimeException("No se pudo obtener el ticket $ticketId para la rifa $raffleId.");
            }

            return true;
        } catch (\Exception $e) {
            // Loguear el error para seguimiento
            Log::error('Error al intentar comprar el ticket: ' . $e->getMessage(), ['exception' => $e]);

            // Puedes lanzar una excepción personalizada si quieres manejarlo en un nivel superior
            throw new \RuntimeException('Error al intentar comprar el ticket.');
        }
    }
}
