<?php

namespace App\Concerns;

use App\Helpers\PaymentTicketsHelper;
use App\Models\Raffle;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class OptimisticBlockadeToRaffle
{
    protected Raffle $raffle;
    protected int $ticketNumber;
    protected Ticket $ticket;

    public function defineRaffleTicket(Raffle $raffle, int $ticketNumber): void
    {
        $this->setRaffle($raffle);
        $this->setTicketNumber($ticketNumber);
    }
    public function setRaffle(Raffle $raffle): void
    {
        $this->raffle = $raffle;
    }
    public function getRaffle(): Raffle
    {
        return $this->raffle;
    }
    public function setTicketNumber(int $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
    }
    public function getTicketNumber(): int
    {
        return $this->ticketNumber;
    }

    /**
     * @throws Throwable
     */
    public function makeTicket(): Ticket
    {
        try {
            $raffle = $this->getRaffle();
            $raffleId = $raffle->id;
            $ticketNumber = $this->getTicketNumber();
            $ticket = null;
            DB::transaction(static function () use ($raffleId, $ticketNumber,&$ticket) {
                //Todo verificar si existe el ticket
                $exists = Ticket::where('raffle_id', $raffleId)
                    ->where('number', $ticketNumber)
                    ->lockForUpdate()
                    ->exists();

                if ($exists) {
                    throw new \RuntimeException('El ticket ya ha sido reservado o vendido');
                }

                //Todo Crear y reservar ticket
               $ticket = createAndReservedTicket($raffleId, $ticketNumber);
                return $ticket;
            });
            return $ticket;
        } catch (Throwable $e) {
            Log::error('Hubo un error al intentar crear el ticket: '.$e->getMessage());
        }

    }
}
