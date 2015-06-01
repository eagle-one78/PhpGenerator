<?php

use WsdlToPhp\PhpGenerator\Element\PhpVariable;

use WsdlToPhp\PhpGenerator\Tests\TestCase;

class PhpVariableTest extends TestCase
{
    public function testGetPhpDeclarationNullValue()
    {
        $variable = new PhpVariable('foo');

        $this->assertSame('$foo = NULL;', $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationTrueValue()
    {
        $variable = new PhpVariable('foo', true);

        $this->assertSame('$foo = true;', $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationFalseValue()
    {
        $variable = new PhpVariable('foo', false);

        $this->assertSame('$foo = false;', $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationStringOneValue()
    {
        $variable = new PhpVariable('foo', '1');

        $this->assertSame('$foo = \'1\';', $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationNumberOneValue()
    {
        $variable = new PhpVariable('foo', 1);

        $this->assertSame('$foo = 1;', $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationArray()
    {
        $variable = new PhpVariable('foo', array(
            '0',
            1,
        ));

        $this->assertSame("\$foo = array (\n  0 => '0',\n  1 => 1,\n);", $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationNewInstance()
    {
        $variable = new PhpVariable('foo', 'new DOMDocument(\'1.0\', \'utf-8\')');

        $this->assertSame("\$foo = new DOMDocument('1.0', 'utf-8');", $variable->getPhpDeclaration());
    }

    public function testGetPhpDeclarationFunctoin()
    {
        $variable = new PhpVariable('foo', 'is_array(1)');

        $this->assertSame("\$foo = is_array(1);", $variable->getPhpDeclaration());
    }
}