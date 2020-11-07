<?php

namespace App\PermissionRequest;

class UnixPermissionClaimed extends PermissionState
{
    protected $name = 'UNIX_CLAIMED';

    public function grantedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
        if (!$permission->getAdmin()->equals($admin)) {
            return;
        }
        if ($permission->getProfile()->isUnixPermissionRequired()) {
            $permission->setIsUnixPermissionGranted(true);
        } elseif ($permission->isUnixPermissionDesiredButNotRequested()) {
            $permission->setState(PermissionState::unixRequested());
            $permission->notifyUnixAdminOfPermissionRequest();
            return;
        }

        $permission->setState(PermissionState::granted());
        $permission->setIsGranted(true);
        $permission->notifyUserOfPermissionRequestResult();
    }
}