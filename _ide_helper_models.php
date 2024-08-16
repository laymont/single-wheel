<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $method_id
 * @property string|null $reference
 * @property string $amount
 * @property \Illuminate\Support\Carbon $date
 * @property \App\Enums\PayStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\PaymentMethod $methods
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\PaymentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPayment {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property bool $enable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Database\Factories\PaymentMethodFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPaymentMethod {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $payment_id
 * @property int $ticket_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Payment $payment
 * @property-read \App\Models\Ticket $ticket
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTicket whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPaymentTicket {}
}

namespace App\Models{
/**
 * 
 *
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
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|Raffle whereDescription($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRaffle {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $raffle_id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Raffle $raffle
 * @method static \Database\Factories\RaffleImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereRaffleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RaffleImage withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRaffleImage {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $raffle_id
 * @property int $number
 * @property bool $reserved
 * @property bool $cancelled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Raffle $raffle
 * @method static \Database\Factories\TicketFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCancelled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereRaffleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereReserved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTicket {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketUser whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTicketUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

