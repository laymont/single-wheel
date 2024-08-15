<?php

namespace App\Models;

use App\Enums\RaffleStatusEnum;
use App\Traits\HasFormattedDatesTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperRaffleImage
 */
class RaffleImage extends Pivot
{
    use HasFactory;
    use SoftDeletes;
    use HasFormattedDatesTrait;
    protected $table = 'raffle_images';
    protected $fillable = [
        'raffle_id',
        'name',
        'url',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'raffle_id' => 'integer',
            'name' => 'string',
            'url' => 'string',
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
