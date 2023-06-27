<?php

namespace App\Http\Controllers;

use App\Models\Builder\InvitationBuilder;
use App\Models\Builder\UserBuilder;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function __invoke(Request $request): void
    {
        $this->withDummyDatabase(function () {
            $userQuery = User::query()->whereSomething('id', [2]);
            $user = $userQuery->first();

            $invitationQuery = Invitation::query()->whereSomething('id', [2]);
            $invitation = $invitationQuery->first();

            $this->debug($user, $invitation, $userQuery, $invitationQuery);
        });

        $this->withDummyDatabase(function () {
            $userQuery = User::query()->whereSomethingElse('id', [2]);
            $user = $userQuery->first();

            $invitationQuery = Invitation::query()->whereSomethingElse('id', [2]);
            $invitation = $invitationQuery->first();

            $this->debug($user, $invitation, $userQuery, $invitationQuery);
        });
    }

    private function debug(?User $user, ?Invitation $invitation, UserBuilder $userBuilder, InvitationBuilder $invitationBuilder): void
    {
        if (! function_exists('\PHPStan\dumpType')) {
            dump([
                'get_debug_type($user)' => get_debug_type($user),
                'get_debug_type($invitation)' => get_debug_type($invitation),
                'get_debug_type($userBuilder)' => get_debug_type($userBuilder),
                'get_debug_type($invitationBuilder)' => get_debug_type($invitationBuilder),
            ]);

            return;
        }
        \PHPStan\dumpType($user);
        \PHPStan\dumpType($invitation);
        \PHPStan\dumpType($userBuilder);
        \PHPStan\dumpType($invitationBuilder);

        \PHPStan\Testing\assertType('App\Models\User|null', $user);
        \PHPStan\Testing\assertType('App\Models\Invitation|null', $invitation);

        \PHPStan\Testing\assertType('App\Models\Builder\UserBuilder', $userBuilder);
        \PHPStan\Testing\assertType('App\Models\Builder\InvitationBuilder', $invitationBuilder);
    }

    public function withDummyDatabase(callable $callable): void
    {
        User::truncate();
        Invitation::truncate();
        /** @var User $user */
        $user = User::factory()->create();
        $user->invitations()->create();

        try {
            $callable();
        } finally {
            User::truncate();
            Invitation::truncate();
        }
    }
}
