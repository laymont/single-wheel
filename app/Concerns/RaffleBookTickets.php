<?php

namespace App\Concerns;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use RuntimeException;

class RaffleBookTickets
{
    protected ?int $ticketNumber = null;

    /**
     * Crea el talonario de boletos en Redis.
     *
     * @param int $raffleId
     * @param int $totalTickets
     * @return array
     * @throws RuntimeException
     */
    public function createRaffleBook(int $raffleId, int $totalTickets): array
    {
        $raffleKey = "raffle:{$raffleId}:available_numbers";

        try {
            Redis::command('sadd', [$raffleKey, ...range(1, $totalTickets)]);
            return [
                'status' => 'success',
                'message' => "Talonario creado exitosamente para la rifa {$raffleId}.",
                'raffleId' => $raffleId,
                'totalTickets' => $totalTickets,
                'availableTickets' => $totalTickets,
            ];
        } catch (\Exception $e) {
            Log::error('Error al crear talonario en Redis: ' . $e->getMessage(), ['exception' => $e]);
            throw new RuntimeException('Error al intentar crear el talonario de boletos en Redis.');
        }
    }

    /**
     * Selecciona un número de ticket disponible de Redis y lo elimina del talonario.
     *
     * @param int $raffleId
     * @return array
     * @throws RuntimeException
     */
    public function setTicketNumber(int $raffleId): array
    {
        $raffleKey = "raffle:{$raffleId}:available_numbers";

        try {
            $ticketNumber = Redis::command('spop', [$raffleKey]);

            if (!$ticketNumber) {
                throw new RuntimeException("No hay tickets disponibles para la rifa {$raffleId}.");
            }

            $this->ticketNumber = $ticketNumber;

            // Obtener el número de tickets restantes
            $remainingTickets = Redis::command('scared', [$raffleKey]);

            return [
                'status' => 'success',
                'ticketNumber' => $ticketNumber,
                'raffleId' => $raffleId,
                'remainingTickets' => $remainingTickets,
            ];
        } catch (\Exception $e) {
            Log::error('Error al intentar comprar el ticket: ' . $e->getMessage(), ['exception' => $e]);
            throw new RuntimeException('No se pudo completar la compra del ticket. Por favor, intente nuevamente.');
        }
    }

    /**
     * Obtiene el número del ticket seleccionado.
     *
     * @return int|null
     */
    public function getTicketNumber(): ?int
    {
        return $this->ticketNumber;
    }

    /**
     * Obtiene los números de tickets aún disponibles en Redis.
     *
     * @param int $raffleId
     * @return array|string
     */
    public function getAvailableTickets(int $raffleId): array|string
    {
        $raffleKey = "raffle:{$raffleId}:available_numbers";

        try {
            // Verifica si la rifa existe en Redis
            if (!Redis::exists($raffleKey)) {
                return "La rifa con ID {$raffleId} no existe.";
            }

            // Obtiene los tickets disponibles
            $availableTickets = Redis::command('smembers', [$raffleKey]);

            if (empty($availableTickets)) {
                return "Todos los tickets para la rifa {$raffleId} han sido vendidos.";
            }

            return $availableTickets;
        } catch (\Exception $e) {
            Log::error('Error al obtener tickets disponibles: ' . $e->getMessage(), ['exception' => $e]);
            throw new RuntimeException('Error al intentar obtener los tickets disponibles.');
        }
    }
}
