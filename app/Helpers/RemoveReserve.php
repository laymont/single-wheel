<?php

if (! function_exists('removeReserve')) {
    function removeReserve($ticketId): true
    {
        try {
            $ticket = \App\Models\Ticket::find($ticketId);
            $ticket->reserved = false;
            $ticket->save();
            return true;
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Imposible remover la reserva del ticket: ' . $e->getMessage());
            throw new \RuntimeException('Imposible remover la reserva del ticket: ' . $e->getMessage());
        }
    }
}
