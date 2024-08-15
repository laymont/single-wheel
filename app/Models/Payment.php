<?php

namespace App\Models;

use App\Enums\PayStatusEnum;
use App\Traits\HasFormattedDatesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperPayment
 */
class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFormattedDatesTrait;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'method_id',
        'reference',
        'amount',
        'date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'user_id' => 'integer',
            'method_id' => 'integer',
            'reference' => 'string',
            'amount' => 'decimal:2',
            'date' => 'datetime',
            'status' => PayStatusEnum::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function methods(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'method_id');
    }
}
