<?php

namespace App\PermissionRequest;

abstract class PermissionState
{
    protected $name;

    public function claimedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
    }

    public function grantedBy(SystemAdmin $admin, SystemPermission $permission): void
    {
    }

    public function equals(PermissionState $otherState): bool
    {
        return $this->name === $otherState->name;
    }

    final public static function requested(): PermissionState
    {
        return new PermissionRequested();
    }

    final public static function granted(): PermissionState
    {
        return new PermissionGranted();
    }

    final public static function claimed(): PermissionState
    {
        return new PermissionClaimed();
    }

    final public static function unixRequested(): PermissionState
    {
        return new UnixPermissionRequested();
    }

    final public static function unixGranted(): PermissionState
    {
        return new UnixPermissionGranted();
    }

    final public static function unixClaimed(): PermissionState
    {
        return new UnixPermissionClaimed();
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
