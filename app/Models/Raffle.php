<?php

namespace App\Models;

use App\Enums\RaffleStatusEnum;
use App\Traits\HasFormattedDatesTrait;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $identification
 * @property string $name
 * @property int $numbers
 * @property string $price
 * @property string $prize
 * @property string $prize_img
 * @property RaffleStatusEnum $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RaffleImage> $images
 * @property-read int|null $images_count
 * @method static \Database\Factories\RaffleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle wherePrize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle wherePrizeImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle withoutTrashed()
 * @mixin Eloquent
 * @mixin IdeHelperRaffle
 */
class Raffle extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFormattedDatesTrait;
    protected $table = 'raffles';
    protected $fillable = [
        'identification',
        'name',
        'description',
        'numbers',
        'price',
        'prize',
        'status',
        'created_by'
    ];

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'name' => 'string',
            'description' => 'string',
            'numbers' => 'integer',
            'price' => 'decimal:2',
            'prize' => 'string',
            'status' => RaffleStatusEnum::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function getCreatedAtAttribute(): array
    {
        return $this->createdBy->only('id', 'name');
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function images(): HasMany
    {
        return $this->hasMany(RaffleImage::class);
    }
}
