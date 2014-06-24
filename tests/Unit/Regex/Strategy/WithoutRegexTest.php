<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Tests\Unit\Regex\Strategy;

use Hj\Regex\Strategy\WithoutRegex;
use Hj\tests\UnitTestCase;

/**
 * Class WithoutRegexTest
 * @package Hj\Tests\Unit\Regex\Strategy
 *
 * @covers Hj\Regex\Strategy\WithoutRegex
 */
class WithoutRegexTest extends UnitTestCase
{
    /**
     * @var WithoutRegex
     */
    private $strategy;

    public function setUp()
    {
        $this->strategy = new WithoutRegex();
    }

    public function testShouldBeARegexStrategy()
    {
        $this->hjAssertInstanceOfRegexStrategy($this->strategy);
    }

    public function testUseRegexShouldReturnFalse()
    {
        $this->assertFalse($this->strategy->useRegex());
    }
}