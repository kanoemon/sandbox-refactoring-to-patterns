<?php

namespace App\PermissionRequest;

class UnixPermissionRequested
{
    protected $name = 'UNIX_CLAIMED';

    public function claimedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
        $permission->willBeHandledBy($admin);
        $permission->setState(self::unixClaimed());
    }
}
