<?php
namespace Security;

use Model\User;

interface PermissionDebugger {
    public function debug(Voter $voter, bool $vote, string $permission, User $user, $subject): void;
}