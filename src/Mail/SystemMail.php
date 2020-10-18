<?php

namespace App\Mail;

class SystemMail
{
    private $testFlg;

    public function __construct(bool $testFlg)
    {
        $this->testFlg = $testFlg;
    }

    public function send(): bool
    {
        return true;
    }

    public function testFlg(): bool
    {
        return $this->testFlg;
    }
}
