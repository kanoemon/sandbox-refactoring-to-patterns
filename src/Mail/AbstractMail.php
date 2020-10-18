<?php

namespace App\Mail;

abstract class AbstractMail
{
    protected $testFlg;

    public static function systemMailforTest(): SystemMail
    {
        return new SystemMail(true);
    }

    public static function consumerMail($customFlg): ConsumerMail
    {
        return new ConsumerMail(false, $customFlg);
    }

    public static function clientMailforTest(): ClientMail
    {
        return new ClientMail(true, true);
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
