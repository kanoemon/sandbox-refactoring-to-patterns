<?php

namespace App\Mail;

class ClientMail extends AbstractMail
{
    private $customFlg;

    protected function __construct(bool $testFlg, bool $customFlg)
    {
        $this->testFlg = $testFlg;
        $this->customFlg = $customFlg;
    }

    public function customFlg(): bool
    {
        return $this->customFlg;
    }
}
