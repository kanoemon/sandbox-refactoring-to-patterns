<?php

namespace App\PermissionRequest;


class SystemPermission
{
    public const REQUESTED = 'REQUESTED';
    public const CLAIMED = 'CLAIMED';
    public const GRANTED = 'GRANTED';
    public const DENIED = 'DENIED';
    public const UNIX_REQUESTED = 'UNIX_REQUESTED';
    public const UNIX_CLAIMED = 'UNIX_CLAIMED';
    public const UNIX_GRANTED = 'UNIX_GRANTED';
    public const UNIX_DENIED = 'UNIX_DENIED';

    private $requestor;
    private $profile;
    private $admin;
    private $isGranted = false;
    private $isUnixPermissionGranted = false;
    private $permissionState;

    public function __construct(SystemUser $requestor, SystemProfile $profile)
    {
        $this->requestor = $requestor;
        $this->profile = $profile;
        $this->notifyAdminOfPermissionRequest();
        $this->setState(PermissionState::requested());
    }

    public function setIsUnixPermissionGranted(bool $isUnixPermissionGranted): void
    {
        $this->isUnixPermissionGranted = $isUnixPermissionGranted;
    }

    public function setIsGranted(bool $isGranted): void
    {
        $this->isGranted = $isGranted;
    }

    public function setState(PermissionState $state) :void
    {
        $this->permissionState = $state;
    }

    public function getState(): PermissionState
    {
        return $this->permissionState;
    }

    private function notifyAdminOfPermissionRequest(): void
    {
        $this->admin = new SystemAdmin();
    }

    public function getAdmin(): SystemAdmin
    {
        return $this->admin;
    }

    public function grantedBy(SystemAdmin $admin): void
    {
        $this->permissionState->grantedBy($admin, $this);
    }

    public function getProfile(): SystemProfile
    {
        return $this->profile;
    }

    public function isUnixPermissionDesiredButNotRequested(): bool
    {
        return $this->profile->isUnixPermissionRequired() && !$this->isUnixPermissionGranted();
    }

    private function notifyUnixAdminOfPermissionRequest()
    {

    }

    private function isUnixPermissionGranted(): bool
    {
        return $this->isUnixPermissionGranted;
    }

    public function claimedBy(SystemAdmin $admin)
    {
        $this->permissionState->claimedBy($admin, $this);
    }

    public function willBeHandledBy(SystemAdmin $admin)
    {
        $this->admin = $admin;
    }

    public function notifyUserOfPermissionRequestResult()
    {

    }

    public function state(): string
    {
        return $this->getState();
    }

    public function isGranted(): bool
    {
        return $this->isGranted;
    }
}
