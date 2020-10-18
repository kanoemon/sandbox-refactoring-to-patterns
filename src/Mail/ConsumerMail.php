<?php

namespace App\Mail;

class ConsumerMail extends AbstractMail
{
    private $autoReplyFlg;

    protected function __construct(bool $testFlg, bool $autoReplyFlg)
    {
        $this->testFlg = $testFlg;
        $this->autoReplyFlg = $autoReplyFlg;
    }

    public function autoReplyFlg(): bool
    {
        return $this->autoReplyFlg;
    }
}
