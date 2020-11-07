<?php

namespace App\PermissionRequest;

class PermissionRequested extends PermissionState
{
    protected $name = 'REQUESTED';

    public function claimedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
        $permission->willBeHandledBy($admin);
        $permission->setState(self::claimed());
    }
}
