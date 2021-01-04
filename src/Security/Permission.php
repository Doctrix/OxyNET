<?php 
namespace Model\Security;

use Model\Classes\User;

final class Permission {
    /**
     * @var Voter[]
     */
    private array $voters = [];
    private ?PermissionDebugger $debugger;

    public function __construct(?PermissionDebugger $debugger = null)
    {
        $this->debugger = $debugger;
    }

    public function can (User $user, string $permission, $subject = null): bool{
        foreach($this->voters as $voter){
            if($voter->canVote($permission,$subject)){
                $vote = $voter->vote($user,$permission, $subject);
                if($this->debugger){
                    $this->debugger->debug($voter,$vote,$permission,$user,$subject);
                }

                if($vote == true){
                    return true;
                }
            }
        }
        return false;
    }
    public function addVoter(Voter $voter){
        $this->voters[] = $voter;
    }
}