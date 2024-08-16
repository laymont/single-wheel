<?php

if (! function_exists('ticket_cancelled')) {
    function ticket_cancelled($ticketId): true
    {
        try {
            $ticket = \App\Models\Ticket::find($ticketId);
            $ticket->cancelled = true;
            $ticket->save();
            return true;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Illuminate\Support\Facades\Log::error('Error ticket no existe: '. $e->getMessage());
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException('Error ticket no existe: '. $e->getMessage());
        } catch (\Throwable $e) {
            Log::error('Error al intentar cancelar el ticket: '. $e->getMessage());
            throw new \RuntimeException('Error al intentar cancelar el ticket:');
        }
    }
}
