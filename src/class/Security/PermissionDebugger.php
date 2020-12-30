<?php declare(strict_types=1);

namespace App\Security;
use App\Model\User;

interface PermissionDebugger {
    public function debug(Voter $voter, bool $vote, string $permission, User $ser, $subject): void;
}