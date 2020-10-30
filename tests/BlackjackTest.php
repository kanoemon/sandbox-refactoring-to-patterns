<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Blackjack\TestAlwaysHitResponse;
use App\Blackjack\Blackjack;

class BlackjackTest extends TestCase
{
    public function testDealerStandsWhenPlayerBusts()
    {
        $deck = [10, 9, 7, 2, 6];
        $blackjack = new Blackjack($deck);
        $blackjack->setPlayerResponse(new TestAlwaysHitResponse());
        $blackjack->play();

        $this->assertTrue($blackjack->didDealerWin(), 'dealer wins');
        $this->assertTrue(!$blackjack->didPlayerWin(), 'player wins');

        $this->assertSame(11, $blackjack->getDealerTotal(), 'dealer total');
        $this->assertSame(23, $blackjack->getPlayerTotal(), 'player total');
    }
}
