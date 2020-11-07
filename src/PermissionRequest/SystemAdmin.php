<?php

namespace App\PermissionRequest;

class SystemAdmin
{
    public function equals(SystemAdmin $otherAdmin): bool
    {
        return true;
    }
}
