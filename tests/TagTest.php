<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Tag\TagNode;
use App\Tag\TagBuilder;

class TagTest extends TestCase
{
    public function testBuildOneNode()
    {
        $builder = new TagBuilder('flavors');
        $this->assertSame('<flavors></flavors>', $builder->toXml());
    }

    public function testBuildOneChild()
    {
        $builder = new TagBuilder('flavors');
        $builder->addChild('flavor');
        $this->assertSame('<flavors><flavor></flavor></flavors>', $builder->toXml());
    }

    public function testBuildChildrenOfChildren()
    {
        $builder = new TagBuilder('flavors');
        $builder->addChild('flavor');
        $builder->addChild('requirements');
        $builder->addChild('requirement');
        $this->assertSame('<flavors><flavor><requirements><requirement></requirement></requirements></flavor></flavors>', $builder->toXml());
    }

    public function testBuildSibling()
    {
        $builder = new TagBuilder('flavors');
        $builder->addChild('flavor1');
        $builder->addSibling('flavor2');
        $this->assertSame('<flavors><flavor1></flavor1><flavor2></flavor2></flavors>', $builder->toXml());
    }

    public function testRepeatingChildrenAndGrandchildren()
    {
        $builder = new TagBuilder('flavors');
        for($i = 0; $i < 2; $i++) {
            $builder->addToParent('flavors', 'flavor');
            $builder->addChild('requirements');
            $builder->addChild('requirement');
        }
        $this->assertSame('<flavors><flavor><requirements><requirement></requirement></requirements></flavor><flavor><requirements><requirement></requirement></requirements></flavor></flavors>', $builder->toXml());
    }

    public function testParentNameNotFound()
    {
        $builder = new TagBuilder('flavors');
        try {
            for($i = 0; $i < 2; $i++) {
                $builder->addToParent('favors', 'flavor');
                $builder->addChild('requirements');
                $builder->addChild('requirement');
            }
            $this->fail('shuld not allow adding to parent that does not exist');
        } catch(\RuntimeException $e) {
            $this->assertSame('missing parent tag:favors', $e->getMessage());

        }
    }

    public function testAttributesAndValues()
    {
        $builder = new TagBuilder('flavors');
        $builder->addAttribute('name', 'TDD');
        $builder->addChild('requirements');

        $builder->addToParent('requirements', 'require');
        $builder->addAttribute('type', 'hardware');
        $builder->addValue('value1');

        $builder->addToParent('requirements', 'require');
        $builder->addAttribute('type', 'software');
        $builder->addValue('value2');
        $this->assertSame("<flavors name='TDD'><requirements><require type='hardware'>value1</require><require type='software'>value2</require></requirements></flavors>", $builder->toXml());
    }

    public function testParents()
    {
        $root = new TagNode('root');
        $this->assertNull($root->getParent());

        $childNode = new TagNode('child');
        $root->add($childNode);
        $this->assertSame($root, $childNode->getParent());
        $this->assertSame('root', $childNode->getParent()->getName());
    }
}
