<?php
namespace Model\Security;

use Model\Classes\User;

final class ConsoleDebugger implements PermissionDebugger {
    public function debug(Voter $voter, bool $vote, string $permission, User $ser, $subject): void
    {
        $className = get_class($voter);
        $vote = $vote ? "\e[32myes\e[0m": "\e[31mno\e[0m";
        file_put_contents('php://stdout', "\e[34m$className : \e[37m $vote on $permission\n");
    }
}