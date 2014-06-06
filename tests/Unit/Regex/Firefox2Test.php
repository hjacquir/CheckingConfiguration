<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit\Regex;

use Hj\Regex\Firefox2;
use Hj\Regex\Regex;
use Hj\tests\UnitTestCase;

/**
 * @covers Hj\Regex\Firefox2
 */
class Firefox2Test extends UnitTestCase
{
    /**
     * @var Regex
     */
    private $regex;

    public function setUp()
    {
        $this->regex = new Firefox2();
    }

    public function testShouldBeAnRegex()
    {
        $this->hjAssertInstanceOfRegex($this->regex);
    }

    public function testGetExpressionShouldReturnTheCorrectExpression()
    {
        $this->assertSame('/Firefox$/i', $this->regex->getExpression());
    }

    public function testShouldSetTheBrowserVersion()
    {
        $browser = $this->hjGetMockBrowser();

        $this->regex->setBrowserVersion($browser, array());

        $this->assertSame('', $browser->getVersion());
    }

}
