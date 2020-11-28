<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\SuperDatabase\QuerySD51;
use App\SuperDatabase\QuerySD52;

class SuperDatabaseTest extends TestCase
{
    public function testLoginSD51()
    {
        $this->expectOutputString('SD51 query execute.');
        $query = new QuerySD51();
        $query->login('dbserver', 'user', 'password');
        $query->doQuery();
    }

    public function testLoginSD52()
    {
        $this->expectOutputString('SD52 query execute.');
        $query = new QuerySD52('./config.ini');
        $query->login('dbserver', 'user', 'password');
        $query->doQuery();
    }
}
