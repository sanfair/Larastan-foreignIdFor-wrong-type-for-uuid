<?php

namespace App\Models;

use App\Models\Builder\InvitationBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperInvitation
 */
class Invitation extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return InvitationBuilder<Invitation>
     */
    public static function query(): InvitationBuilder
    {
        return parent::query();
    }

    /**
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return InvitationBuilder<Invitation>
     */
    public function newEloquentBuilder($query): InvitationBuilder
    {
        return new InvitationBuilder($query);
    }
}
