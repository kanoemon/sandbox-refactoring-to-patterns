<?php

namespace App\Mail;

class SystemMail extends AbstractMail
{
    protected function __construct(bool $testFlg)
    {
        $this->testFlg = $testFlg;
    }
}
