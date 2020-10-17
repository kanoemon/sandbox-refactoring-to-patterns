<?php

namespace App;

/**
 * 文字列をノードで管理するクラス 
 */
class StringNode
{
    private $dom;

    private $textBuffer;

    private $nodes = array();

    public function __construct(string $textBuffer, int $textBegin, int $textEnd, bool $shouldDecode, bool $shouldRemoveEscapeCharacters)
    {
        $this->dom = new \DOMDocument();
        $this->dom->loadHTML($textBuffer);
        $this->decode($textBuffer, $textBegin, $textEnd, $shouldDecode, $shouldRemoveEscapeCharacters);
    }

    public static function createStringNode(string $textBuffer, int $textBegin, int $textEnd, bool $shouldDecode, bool $shouldRemoveEscapeCharacters): StringNode
    {
        return new StringNode($textBuffer, $textBegin, $textEnd, $shouldDecode, $shouldRemoveEscapeCharacters);
    }

    private function decode(string $textBuffer, int $textBegin, int $textEnd, bool $shouldDecode, bool $shouldRemoveEscapeCharacters): void
    {
        $xml = simplexml_import_dom($this->dom);
        $nodes = json_decode(json_encode($xml), true);
        foreach ($nodes['body'] as $tag => $element) {
            if ($shouldRemoveEscapeCharacters) {
                $this->nodes[$tag] = str_replace(array(" ", "　"), "", $element);;
                continue;

            }
            $this->nodes[$tag] = $element;
        }
    }

    public function getNode(): array
    {
        return $this->nodes;
    }
}
