<?php

namespace Classe\Security;
use Classe\Model\User;

interface PermissionDebugger {
    public function debug(Voter $voter, bool $vote, string $permission, User $ser, $subject): void;
}