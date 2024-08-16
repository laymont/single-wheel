<?php

if (! function_exists('raffle_key')) {
    function raffle_key($raffleId): string
    {
        return "raffle:{$raffleId}:available_numbers";
    }
}
