<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Mail\AbstractMail;

class MailTest extends TestCase
{
    /**
     * @test
     */
    public function sendMail()
    {
        $systemMail = AbstractMail::systemMailforTest();
        $this->assertSame(true, $systemMail->send());
        $this->assertSame(true, $systemMail->testFlg());

        $consumerMail = AbstractMail::consumerMail(false);
        $this->assertSame(true, $consumerMail->send());
        $this->assertSame(false, $consumerMail->testFlg());
        $this->assertSame(false, $consumerMail->autoReplyFlg());

        $clientMail = AbstractMail::clientMailforTest(true);
        $this->assertSame(true, $clientMail->send());
        $this->assertSame(true, $clientMail->testFlg());
        $this->assertSame(true, $clientMail->customFlg());
    }
}
