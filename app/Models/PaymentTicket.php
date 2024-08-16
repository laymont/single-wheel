<?php

namespace App\Models;

use App\Traits\HasFormattedDatesTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @mixin IdeHelperPaymentTicket
 */
class PaymentTicket extends Pivot
{
    use HasFormattedDatesTrait;
    protected $table = 'payment_tickets';
    protected $fillable = [
        'payment_id',
        'ticket_id',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'payment_id' => 'integer',
            'ticket_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
