<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use Hj\Agent;
use Hj\tests\UnitTestCase;

/**
 * @covers \Hj\Agent
 */
class AgentTest extends UnitTestCase
{
    /**
     * @param string $httpUserAgent
     *
     * @return Agent
     */
    public function getAgent($httpUserAgent = null)
    {
        $_SERVER['HTTP_USER_AGENT'] = $httpUserAgent;

        return new Agent();
    }

    public function testShoulHaveHttpUserAgentAsNullWhenTheUserAgentIsNotSet()
    {
        $agent = $this->getAgent();

        $this->assertSame(null, $agent->getHttpUserAgent());
    }

    public function testShouldReturnHttpUserAgent()
    {
        $agent = $this->getAgent('Foo Bar');

        $this->assertSame('Foo Bar', $agent->getHttpUserAgent());

        unset($_SERVER['HTTP_USER_AGENT']);
    }
}
