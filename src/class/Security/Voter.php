<?php declare(strict_types=1);
namespace App\Security;
interface Voter {
    public function canVote(string $permission, $subject = null): bool;
    public function vote(\App\Model\User $user, string $permission, $subjet =null): bool;
}