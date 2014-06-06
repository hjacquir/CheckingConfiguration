<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit\Regex;

use Hj\Regex\Firefox1;
use Hj\Regex\Regex;
use Hj\tests\UnitTestCase;

/**
 * @covers Hj\Regex\Firefox1
 */
class Firefox1Test extends UnitTestCase
{
    /**
     * @var Regex
     */
    private $regex;

    public function setUp()
    {
        $this->regex = new Firefox1();
    }

    public function testShouldBeAnRegex()
    {
        $this->hjAssertInstanceOfRegex($this->regex);
    }

    public function testGetExpressionShouldReturnTheCorrectExpression()
    {
       $this->assertSame('/Firefox[\/ \(]([^ ;\)]+)/i', $this->regex->getExpression());
    }

    public function testShouldSetTheBrowserVersion()
    {
        $matches = array('foo14', 'versionBar');

        $browser = $this->hjGetMockBrowser();

        $this->regex->setBrowserVersion($browser, $matches);

        $this->assertSame('versionBar', $browser->getVersion());
    }
}
