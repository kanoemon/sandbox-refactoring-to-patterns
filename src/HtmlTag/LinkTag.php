<?php

namespace App\HtmlTag;

class LinkTag extends CompositeTag
{
    protected function getTagName(): string
    {
        return 'a';
    }

    protected function keys(): array
    {
        return [
            'href' => 'http://google.com',
        ];
    }

    public function toPlainTextString(): string
    {
        return '';
    }
}
