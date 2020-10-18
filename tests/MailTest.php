<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Mail\SystemMail;
use App\Mail\ConsumerMail;
use App\Mail\ClientMail;

class MailTest extends TestCase
{
    /**
     * @test
     */
    public function sendMail()
    {
        $systemMail = new SystemMail(true);
        $this->assertSame(true, $systemMail->send());
        $this->assertSame(true, $systemMail->testFlg());

        $consumerMail = new ConsumerMail(false, false);
        $this->assertSame(true, $consumerMail->send());
        $this->assertSame(false, $consumerMail->testFlg());
        $this->assertSame(false, $consumerMail->autoReplyFlg());

        $clientMail = new ClientMail(true, true);
        $this->assertSame(true, $clientMail->send());
        $this->assertSame(true, $clientMail->testFlg());
        $this->assertSame(true, $clientMail->customFlg());
    }
}
