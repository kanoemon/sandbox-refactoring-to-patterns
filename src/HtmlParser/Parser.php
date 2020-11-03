<?php

namespace App\HtmlParser;

class Parser
{
    private $shouldDecodeNodes = false;
    private $shouldRemoveEscapeCharacters = false;
    private $string;

    private function __construct(string $string)
    {
        $this->string = $string;
    }

    public static function createParser(string $string): Parser
    {
        return new Parser($string);
    }

    public function setNodeDecoding(bool $shouldDecodeNodes): void
    {
        $this->shouldDecodeNodes = $shouldDecodeNodes;
    }

    public function shouldDecodeNodes(): bool
    {
        return $this->shouldDecodeNodes;
    }

    public function setRemoveEscapeCharacters(bool $shouldRemoveEscapeCharacters): void
    {
        $this->shouldRemoveEscapeCharacters = $shouldRemoveEscapeCharacters;
    }

    public function shouldRemoveEscapeCharacters(): bool
    {
        return $this->shouldRemoveEscapeCharacters;
    }

    public function elements(): array
    {
        $stringParser = new StringParser();
        $elements = [];
        $elements[] = $stringParser->find(new NodeReader($this), $this->string, 0, true);
        return $elements;
    }
}