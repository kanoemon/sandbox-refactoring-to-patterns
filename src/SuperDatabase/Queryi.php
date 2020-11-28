<?php

namespace App\SuperDatabase;

interface Query
{
    public function login(string $server, string $user, string $password);
}
