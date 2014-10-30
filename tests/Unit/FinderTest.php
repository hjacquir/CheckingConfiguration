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

    public function testShouldHaveAnAgentByDefault()
    {
        $this->assertAttributeEquals($this->agent, 'agent', $this->getFinder());
    }

    public function testShouldAddMatchers()
    {
        $matcher = $this->hjGetMockMatcher();
        $finder = $this->getFinder();

        $this->assertAttributeEmpty('matchers', $finder);
        $finder->addMatcher($matcher);
        $this->assertAttributeNotEmpty('matchers', $finder);
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage The http user agent is not defined.
     */
    public function testShouldThrowAnExceptionWhenAgentIsNotDefined()
    {
        $this->agentExpectsGetHttpUserAgent(null);

        $this->getFinder()->find();
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage The finder is empty. You must add matcher.
     */
    public function testShouldThrowAnExceptionWhenTheFinderDoNotContainAnyMatcher()
    {
        $this->agentExpectsGetHttpUserAgent('foo-agent');

        $this->getFinder()->find();
    }

    /**
     * @dataProvider provideMatcherAndAgentData
     *
     * @param array $matchable1
     * @param array $matchable2
     * @param int $expectedNumberOfMatchable
     * @param array $expectedArrayOfMatchables
     */
    public function testShouldFind($matchable1, $matchable2, $expectedNumberOfMatchable, $expectedArrayOfMatchables)
    {
        $matchables = array();

        $this->agentExpectsGetHttpUserAgent('bar');

        $matcher1 = $this->hjGetMockMatcher();
        $matcher1
            ->expects($this->once())
            ->method('match')
            ->with($this->agent)
            ->will($this->returnValue($matchable1));

        $matcher2 = $this->hjGetMockMatcher();
        $matcher2
            ->expects($this->once())
            ->method('match')
            ->with($this->agent)
            ->will($this->returnValue($matchable2));

        $finder = $this->getFinder();
        $finder->addMatcher($matcher1);
        $finder->addMatcher($matcher2);

        $matchables = $finder->find();

        $this->assertSame($expectedNumberOfMatchable, count($matchables));
        $this->assertSame($expectedArrayOfMatchables, $matchables);
    }

    /**
     * @return array
     */
    public function provideMatcherAndAgentData()
    {
        $matchable1= $this->hjGetMockMatchable();
        $matchable2 = $this->hjGetMockMatchable();

        return array(
            'Should method find return an empty array when the matcher do not match and the agent is defined' => array(
                array(),
                array(),
                0,
                array(),
            ),
            'Should method find return an array of matchable when the matcher should match and the agent is defined' => array(
                array($matchable1),
                array($matchable2),
                2,
                array($matchable1, $matchable2),
            ),
        );
    }

    /**
     * @return Finder
     */
    private function getFinder()
    {
        return new Finder($this->agent);
    }

    /**
     * @param mixed $returnedValue
     */
    private function agentExpectsGetHttpUserAgent($returnedValue)
    {
        $this->agent
            ->expects($this->once())
            ->method('getHttpUserAgent')
            ->will($this->returnValue($returnedValue));
    }
}