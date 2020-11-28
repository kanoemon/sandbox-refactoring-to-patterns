<?php

namespace App\SuperDatabase;

class QuerySD52 extends AbstractQuery
{
    private $sdConfigFileName;

    public function __construct(string $sdConfigFileName)
    {
        $this->sdConfigFileName = $sdConfigFileName;
    }

    public function login(string $server, string $user, string $password)
    {
    }

    public function doQuery()
    {
        echo 'SD52 query execute.';
    }
}
