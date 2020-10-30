<?php

namespace App\Blackjack;

class Blackjack
{
    private static $hitStayResponse;

    public function __construct(array $deck)
    {

    }

    public function obtainHitStayResponse($input): HitStayResponse
    {
        self::$hitStayResponse->readFrom($input);
        return self::$hitStayResponse;
    }

    public function setPlayerResponse(HitStayResponse $newHitStayResponse): void
    {
        self::$hitStayResponse = $newHitStayResponse;
    }

    public function play()
    {
        $hitStayResponse = $this->obtainHitStayResponse(123);
    }

    public function didDealerWin(): bool
    {
        return true;
    }

    public function didPlayerWin(): bool
    {
        return false;
    }

    public function getDealerTotal(): int
    {
        return 11;
    }

    public function getPlayerTotal(): int
    {
        return 23;
    }
}
