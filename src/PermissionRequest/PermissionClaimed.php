<?php

namespace App\PermissionRequest;

class PermissionClaimed extends PermissionState
{
    protected $name = 'CLAIMED';

    public function grantedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
        if (!$permission->getAdmin()->equals($admin)) {
            return;
        }
        if ($permission->isUnixPermissionDesiredButNotRequested()) {
            $permission->setState(PermissionState::unixRequested());
            $permission->notifyUnixAdminOfPermissionRequest();
            return;
        }

        $permission->setState(PermissionState::granted());
        $permission->setIsGranted(true);
        $permission->notifyUserOfPermissionRequestResult();
    }
}