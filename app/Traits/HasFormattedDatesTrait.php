<?php

namespace App\Traits;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasFormattedDatesTrait
{
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Get the created_at date in the desired format.
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => Carbon::parse($value)->setTimezone('America/Caracas')->format('Y-m-d H:i:s'),
        );
    }

    /**
     * Get the updated_at date in the desired format.
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => Carbon::parse($value)->setTimezone('America/Caracas')->format('Y-m-d H:i:s'),
        );
    }

    /**
     * Get the deleted_at date in the desired format.
     */
    protected function deletedAt(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => $value ? Carbon::parse($value)->setTimezone('America/Caracas')->format('Y-m-d H:i:s') : null,
        );
    }
}
