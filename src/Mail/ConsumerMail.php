<?php

namespace App\Mail;

class ConsumerMail
{
    private $testFlg;

    private $autoReplyFlg;

    public function __construct(bool $testFlg, bool $autoReplyFlg)
    {
        $this->testFlg = $testFlg;
        $this->autoReplyFlg = $autoReplyFlg;
    }

    public function send(): bool
    {
        return true;
    }

    public function testFlg(): bool
    {
        return $this->testFlg;
    }

    public function autoReplyFlg(): bool
    {
        return $this->autoReplyFlg;
    }
}
