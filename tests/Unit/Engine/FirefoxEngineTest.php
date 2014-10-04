<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit\Engine;

use Hj\Engine\FirefoxEngine;
use Hj\Matchable\Firefox;
use Hj\tests\UnitTestCase;

/**
 * @covers Hj\Engine\FirefoxEngine
 */
class FirefoxEngineTest extends UnitTestCase
{
    /**
     * @var FirefoxEngine
     */
    private $engine;

    public function setUp()
    {
        $this->engine = new FirefoxEngine();
    }

    public function testShouldBeAnEngine()
    {
        $this->hjAssertInstanceOfEngine($this->engine);
    }

    public function testShouldGetName()
    {
        $this->assertSame(Firefox::NAME, $this->engine->getName());
    }
}
