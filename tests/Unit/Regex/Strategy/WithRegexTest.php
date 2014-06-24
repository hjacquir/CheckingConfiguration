<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */ 

namespace Hj\Tests\Unit\Regex\Strategy;

use Hj\Regex\Strategy\WithoutRegex;
use Hj\Regex\Strategy\WithRegex;
use Hj\tests\UnitTestCase;

/**
 * Class WithRegexTest
 * @package Hj\Tests\Unit\Regex\Strategy
 *
 * @covers Hj\Regex\Strategy\WithRegex
 */
class WithRegexTest extends UnitTestCase
{
    /**
     * @var WithoutRegex
     */
    private $strategy;

    public function setUp()
    {
        $this->strategy = new WithRegex();
    }

    public function testShouldBeARegexStrategy()
    {
        $this->hjAssertInstanceOfRegexStrategy($this->strategy);
    }

    public function testUseRegexShouldReturnTrue()
    {
        $this->assertTrue($this->strategy->useRegex());
    }
}