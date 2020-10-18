<?php

namespace App\Mail;

class ClientMail
{
    private $testFlg;

    private $customFlg;

    public function __construct(bool $testFlg, bool $customFlg)
    {
        $this->testFlg = $testFlg;
        $this->customFlg = $customFlg;
    }

    public function send(): bool
    {
        return true;
    }

    public function testFlg(): bool
    {
        return $this->testFlg;
    }

    public function customFlg(): bool
    {
        return $this->customFlg;
    }
}
