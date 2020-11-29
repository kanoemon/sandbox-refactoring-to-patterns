<?php

namespace App\TextExtractor;

interface Node
{
    public function accept(NodeVisitor $nodeVisitor): void;
}
