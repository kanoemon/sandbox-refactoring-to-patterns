<?php

namespace App\HtmlTag;

class FormTag extends CompositeTag
{
    private $formMethod = 'post';
    private $formURL = 'http://example.com';
    private $formName = 'form-name';

    protected function keys(): array
    {
        return [
            'method' => $this->formMethod,
            'action' => $this->formURL,
            'name' => $this->formName,
        ];
    }

    protected function getTagName(): string
    {
        return 'form';
    }

    public function toPlainTextString(): string
    {
        return '';
    }
}
