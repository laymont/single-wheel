<?php

namespace App\Models;

use App\Traits\HasFormattedDatesTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TicketUser extends Pivot
{
    use HasFormattedDatesTrait;
    protected $table = 'ticket_users';
    protected $fillable = [
        'ticket_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'ticket_id' => 'integer',
            'user_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
