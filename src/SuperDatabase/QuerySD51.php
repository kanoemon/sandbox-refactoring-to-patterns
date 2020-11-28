<?php

namespace App\SuperDatabase;

class QuerySD51 extends AbstractQuery
{
    public function login(string $server, string $user, string $password, string $sdConfigFileName = null)
    {
    }

    public function doQuery()
    {
        echo 'SD51 query execute.';
    }
}
