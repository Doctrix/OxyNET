<?php

namespace Model\Security;
use Model\Classes\User;

interface PermissionDebugger {
    public function debug(Voter $voter, bool $vote, string $permission, User $ser, $subject): void;
}