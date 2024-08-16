<?php

if (! function_exists('createAndReservedTicket')) {
    function createAndReservedTicket ($raffleId, $ticketNumber): \App\Models\Ticket
    {
        try {
            $ticket = new \App\Models\Ticket();
            $ticket->raffle_id = $raffleId;
            $ticket->number = $ticketNumber;
            $ticket->reserved = true;
            $ticket->cancelled = false;
            $ticket->save();
            return $ticket;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Imposible crear el ticket: '.$e->getMessage());
            throw new \RuntimeException('Imposible crear el ticket: '.$e->getMessage());
        }
    }
}
