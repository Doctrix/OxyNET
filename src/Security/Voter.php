<?php

namespace Model\Security;
use Model\Classes\User;

interface Voter {
    public function canVote(string $permission, $subject = null): bool;
    public function vote(User $user, string $permission, $subjet =null): bool;
}