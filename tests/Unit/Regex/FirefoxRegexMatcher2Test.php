<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit\Regex;

use Hj\Regex\FirefoxRegexMatcher1;
use Hj\Regex\FirefoxRegexMatcher2;
use Hj\tests\UnitTestCase;

/**
 * Class FirefoxRegexMatcher2Test
 * @package Hj\Tests\Unit\Regex
 *
 * @covers \Hj\Regex\FirefoxRegexMatcher2
 */
class FirefoxRegexMatcher2Test extends UnitTestCase
{
    /**
     * @var FirefoxRegexMatcher2
     */
    private $regexMatcher;

    public function setUp()
    {
        $this->regexMatcher = new FirefoxRegexMatcher2();
    }

    public function testShouldBeARegexMatcher()
    {
        $this->hjAssertInstanceOfRegexMatcher($this->regexMatcher);
    }

    public function testGetExpressionShouldReturnTheExpectedStringValue()
    {
        $this->assertSame('/Firefox$/i', $this->regexMatcher->getExpression());
    }

    public function testMatchShouldReturnAnEmptyString()
    {
        $this->assertSame('', $this->regexMatcher->match(array('bar')));
    }
}