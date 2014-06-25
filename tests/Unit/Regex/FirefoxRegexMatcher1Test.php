<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Tests\Unit\Regex;

use Hj\Regex\FirefoxRegexMatcher1;
use Hj\tests\UnitTestCase;

/**
 * Class FirefoxRegexMatcher1Test
 * @package Hj\Tests\Unit\Regex
 *
 * @covers \Hj\Regex\FirefoxRegexMatcher1
 */
class FirefoxRegexMatcher1Test extends UnitTestCase
{
    /**
     * @var FirefoxRegexMatcher1
     */
    private $regexMatcher;

    public function setUp()
    {
        $this->regexMatcher = new FirefoxRegexMatcher1();
    }

    public function testShouldBeARegexMatcher()
    {
        $this->hjAssertInstanceOfRegexMatcher($this->regexMatcher);
    }

    public function testGetExpressionShouldReturnTheExpectedStringValue()
    {
        $this->assertSame('/Firefox[\/ \(]([^ ;\)]+)/i', $this->regexMatcher->getExpression());
    }

    public function testMatchShouldReturnTheSecondElementOfTheMatchedArray()
    {
        $this->assertSame('1.2', $this->regexMatcher->match(array('foor', '1.2')));
    }
}