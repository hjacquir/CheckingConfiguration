<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\Tests\Unit\Matchable;

use Hj\Matchable\Browser;
use Hj\Matchable\Firefox;
use Hj\tests\UnitTestCase;

/**
 * @covers \Hj\Matchable\Firefox
 */
class FirefoxTest extends UnitTestCase
{
    /**
     * @var Browser
     */
    private $browser;

    public function setUp()
    {
        $this->browser = new Firefox();
    }

    public function testShouldBeBrowser()
    {
        $this->hjAssertInstanceOfBrowser($this->browser);
    }

    public function testShouldBeMatchable()
    {
        $this->hjAssertInstanceOfMatchable($this->browser);
    }

    public function testGetNameShouldReturnTheCorrectName()
    {
        $this->assertSame('Firefox', $this->browser->getName());
    }

    public function testHasRegexShouldReturnTrue()
    {
        $this->assertTrue($this->browser->hasRegex());
    }

    public function testShouldBeAbleToAddEngines()
    {
        $this->assertCount(0, $this->browser->getEngines());
        $this->browser->addEngine($this->hjGetMockEngine());
        $this->assertCount(1, $this->browser->getEngines());
    }

    public function testShouldGetEngines()
    {
        $engine = $this->hjGetMockEngine();

        $this->browser->addEngine($engine);

        $this->hjAssertIfTheArrayHasKeyAndValue($this->browser->getEngines(), 0, $engine);
    }

    public function testShouldBeAbleToAddRegexs()
    {
        $this->assertCount(0, $this->browser->getRegexs());
        $this->browser->addRegex($this->hjGetMockRegex());
        $this->assertCount(1, $this->browser->getRegexs());
    }

    public function testShouldGetRegexs()
    {
        $regex = $this->hjGetMockRegex();

        $this->browser->addRegex($regex);

        $this->hjAssertIfTheArrayHasKeyAndValue($this->browser->getRegexs(), 0, $regex);
    }

    public function testShoulGetAndSetVersion()
    {
        $this->hjAssertThatObjectHaveGetAndSetMethods($this->browser, 'version', 'foo12');
    }

    public function testShouldHaveRegex()
    {
        $this->assertTrue($this->browser->hasRegex());
    }
}
