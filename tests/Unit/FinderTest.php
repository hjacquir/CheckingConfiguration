<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use Hj\Finder;
use Hj\tests\UnitTestCase;

/**
 * Class FinderTest
 * @package Hj\Tests\Unit
 *
 * @covers Hj\Finder
 *
 * @todo Refactor
 */
class FinderTest extends UnitTestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $agent;

    public function setUp()
    {
        $this->agent = $this->hjGetMockAgent();
    }

    /**
     * @return Finder
     */
    public function getFinder()
    {
        return new Finder($this->agent);
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage The http user agent is not defined.
     */
    public function testShouldThrowAnExceptionWhenAgentIsNotDefined()
    {
        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue(null));

        $this->getFinder()->find();
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage The finder is empty. You must add matcher.
     */
    public function testShouldThrowAnExceptionWhenTheFinderDoNotContainAnyMatcher()
    {
        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue('foo-agent'));

        $this->getFinder()->find();
    }
}