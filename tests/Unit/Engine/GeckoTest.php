<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit\Engine;

use Hj\Engine\Gecko;
use Hj\tests\UnitTestCase;

/**
 * @covers Hj\Engine\Gecko
 */
class GeckoTest extends UnitTestCase
{
    /**
     * @var Gecko
     */
    private $engine;

    public function setUp()
    {
        $this->engine = new Gecko();
    }

    public function testShouldBeAnEngine()
    {
        $this->hjAssertInstanceOfEngine($this->engine);
    }

    public function testShouldGetName()
    {
        $this->assertSame('Gecko', $this->engine->getName());
    }
}
