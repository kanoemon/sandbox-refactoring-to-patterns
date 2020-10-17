<?php

namespace App;

/**
 * パースするクラス
 */
class Parser
{

    /**
     * @var bool
     */
    private $shouldDecode = false;

    /**
     * @var boolean
     */
    private $shouldRemoveEscapeCharacters = false;

    public function setNodeDecoding(bool $shouldDecode): void
    {
        $this->shouldDecode = $shouldDecode;
    }

    public function setRemoveEscapeCharacters(bool $shouldRemoveEscapeCharacters): void
    {
        $this->shouldRemoveEscapeCharacters = $shouldRemoveEscapeCharacters;
    }

    public function parse(string $string): array
    {
        $stringParser = new StringParser();
        return $stringParser->findString($this, $string, 1, 1);
    }

    public function shouldDecodeNodes(): bool
    {
        return $this->shouldDecode;
    }

    public function shouldRemoveEscapeCharacters(): bool
    {
        return $this->shouldRemoveEscapeCharacters;
    }
}
