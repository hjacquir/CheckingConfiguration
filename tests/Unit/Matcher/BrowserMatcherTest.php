<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\Tests\Unit\Matcher;

use Hj\Matchable\Browser;
use Hj\Matcher\BrowserMatcher;
use Hj\Matcher\Matcher;
use Hj\tests\UnitTestCase;

/**
 * @covers Hj\Matcher\BrowserMatcher
 *
 * @todo Refactor
 */
class BrowserMatcherTest extends UnitTestCase
{
    /**
     * @var BrowserMatcher
     */
    private $matcher;

    /**
     * @var Browser|\PHPUnit_Framework_MockObject_MockObject
     */
    private $browser;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $agent;

    public function setUp()
    {
        $this->browser = $this->hjGetMockBrowser();
        $this->agent   = $this->hjGetMockAgent();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getMatcher()
    {
        $this->matcher = $this->getMockForAbstractClass(
            '\Hj\Matcher\BrowserMatcher',
            array($this->browser)
        );

        return $this->matcher;
    }

    public function testShouldBeAMatcher()
    {
        $this->hjAssertInstanceOfMatcher($this->getMatcher());
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage You must provide engines for the browser
     */
    public function testShouldThrowAnExceptionWhenTheBrowserEngineIsEmpty()
    {
        $this->getMatcher()->match($this->agent);
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage You must provide the regexs for the browser
     */
    public function testShouldThrowAnExceptionWhenTheBrowserUseRegexAndTheBrowserRegexIsEmpty()
    {
        $this->assertBrowserExpectsEngine();

        $this->browser
            ->expects($this->once())
            ->method('hasRegex')
            ->will($this->returnValue(true));

        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue('fooEngine'));

        $this->getMatcher()->match($this->agent);
    }

    public function testMethodMatchShouldReturnNullWhenTneBrowserIsNotMatched()
    {
        $this->assertBrowserExpectsEngine();

        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue('barEngine'));

        $this->assertSame(null, $this->getMatcher()->match($this->agent));
    }

    public function testShouldMatchTheBrowserWithTheCorrectVersionWhenItHasRegex()
    {
        $this->assertBrowserExpectsEngine();

        $regex = $this->hjGetMockRegex();
        $regex
            ->expects($this->once())
            ->method('getExpression')
            ->will($this->returnValue('/([0-9])\w+/'));

        $this->browser
            ->expects($this->once())
            ->method('hasRegex')
            ->will($this->returnValue(true));
        $this->browser
            ->expects($this->once())
            ->method('getRegexs')
            ->will($this->returnValue(array($regex)));

        $this->agent
            ->expects($this->at(0))
            ->method('getHttpUserAgent')
            ->will($this->returnValue('fooEngine/29.0'));

        $this->agent
            ->expects($this->at(1))
            ->method('getHttpUserAgent')
            ->will($this->returnValue('fooEngine/29.0'));

        $this->hjAssertInstanceOfBrowser($this->getMatcher()->match($this->agent));
    }

    public function testShouldMatchTheBrowserWhenItNotUsedRegex()
    {
        $this->assertBrowserExpectsEngine();

        $this->browser
            ->expects($this->once())
            ->method('hasRegex')
            ->will($this->returnValue(false));
        $this->browser
            ->expects($this->once())
            ->method('setVersion')
            ->with('fooVersion');

        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue('fooEngine/29.0'));

        $matcher = $this->getMatcher();
        $matcher
            ->expects($this->once())
            ->method('matchVersionWithoutRegex')
            ->will($this->returnValue('fooVersion'));

        $this->hjAssertInstanceOfBrowser($matcher->match($this->agent));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function assertBrowserExpectsEngine()
    {
        $engine = $this->hjGetMockEngine();
        $engine
            ->expects($this->once())
            ->method('getName')
            ->will($this->returnValue('fooEngine'));
        $this->browser
            ->expects($this->once())
            ->method('getEngines')
            ->will($this->returnValue(array($engine)));
    }
}