<?php

namespace Tests\Helpers;

use Model\User;

use Security\Voter;

class AlwaysYesVoter implements Voter {
    public function canVote(string $permission, $subject = null): bool {
        return true;
    }
    public function vote(User $user, string $permission, $subject = null): bool {
        return true;
    }
}