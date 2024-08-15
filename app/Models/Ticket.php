<?php

namespace App\Models;

use App\Traits\HasFormattedDatesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTicket
 */
class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFormattedDatesTrait;
    protected $table = 'tickets';
    protected $fillable = [
        'raffle_id',
        'number',
        'reserved',
        'cancelled',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'raffle_id' => 'integer',
            'number' => 'integer',
            'reserved' => 'boolean',
            'cancelled' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function raffle(): BelongsTo
    {
        return $this->belongsTo(Raffle::class);
    }
}
