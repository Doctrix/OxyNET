<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Model\Security\Permission;
use Tests\Helpers\TestUser;
use Tests\Helpers\AlwaysYesVoter;
use Tests\Helpers\AlwaysNoVoter;

/* require LIB.DS.'debug.php'; */


class PermissionTest extends TestCase {
    
    public function testEmptyVoters(){
        $permission = new Permission();
        $user = new TestUser();
        $this->assertFalse($permission->can($user, 'demo'));
    }

    public function testWithTrueVoter () {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new AlwaysYesVoter);
        $this->assertTrue($permission->can($user, 'demo'));
    }
    public function testWithOneVoterVotesTrue () {
        $permission = new Permission();
        $user = new TestUser();
        $permission->addVoter(new AlwaysNoVoter);
        $permission->addVoter(new AlwaysYesVoter);
        $this->assertTrue($permission->can($user, 'demo'));
    }
}