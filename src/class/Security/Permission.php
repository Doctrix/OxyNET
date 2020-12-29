<?php declare(strict_types=1);
namespace App\Security;
final class Permission {
    /**
     * @var Voter[]
     */
    private $voters = [];

    public function can (\App\Model\User $user, string $permission, $subject = null): bool{
        return false;
    }
    public function addVoter(Voter $voter){
        $this->voters[] = $voter;
    }
}