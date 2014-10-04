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
}
