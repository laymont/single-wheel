<?php

namespace App\Concerns;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RaffleBookTickets
{
    protected $raffleId;
    protected $raffleKey;
    protected $totalTickets;

    public function __construct($raffleId, $totalTickets)
    {
        $this->raffleId = $raffleId;
        $this->raffleKey =  "raffle:{$raffleId}:available_numbers";
        $this->totalTickets = $totalTickets;
    }

    public function sendToRedis(): true
    {
        try {
            // Guardar el rango de números disponibles en Redis usando sadd
            Redis::command('sadd', [$this->raffleKey, ...range(1, $this->totalTickets)]);
            return true;
        } catch (\Exception $e) {
            // Loguear el error para seguimiento
            Log::error('Error al enviar datos a Redis: ' . $e->getMessage(), ['exception' => $e]);

            // Puedes lanzar una excepción personalizada si quieres manejarlo en un nivel superior
            throw new \RuntimeException('Error al intentar enviar datos a Redis.');
        }
    }
}
