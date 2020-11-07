<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\PermissionRequest\SystemPermission;
use App\PermissionRequest\SystemUser;
use App\PermissionRequest\SystemProfile;
use App\PermissionRequest\SystemAdmin;

class PermissionRequestTest extends TestCase
{
    public function testGrantedBy()
    {
        $requestor = new SystemUser();
        $profile = new SystemProfile();
        $permission = new SystemPermission($requestor, $profile);

        $admin = new SystemAdmin();
        $permission->grantedBy($admin);
        $this->assertSame($permission::REQUESTED, $permission->state(), 'requested');
        $this->assertSame(false, $permission->isGranted(), 'not granted');

        $permission->claimedBy($admin);
        $permission->grantedBy($admin);
        $this->assertSame($permission::GRANTED, $permission->state(), 'granted');
        $this->assertSame(true, $permission->isGranted(), 'granted');
    }
}
