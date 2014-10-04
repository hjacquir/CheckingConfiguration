<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Functional;

use Hj\Handler;
use Hj\Matchable\Firefox;
use Hj\Matchable\GoogleChrome;

/**
 * Class HandlerTest
 * @package Hj\Tests\Functional
 *
 * @covers Hj\Handler
 */
class HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldOutputAnExceptionMessageWhenTheHttpUserAgentIsNotDefined()
    {
        Handler::output();

        $this->expectOutputString('The http user agent is not defined.' . PHP_EOL);
    }

    public function testShouldOutputAnExceptionMessageWhenTheFinderGotNothing()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'foo';

        Handler::output();

        $this->expectOutputString('The browser and the platform are unknown' . PHP_EOL);
    }

    /**
     * @dataProvider provideBrowserNameData
     *
     * @param $name
     */
    public function testShouldOutputTheBrowserNameWhenTheFinderGotIt($name)
    {
        $_SERVER['HTTP_USER_AGENT'] = $name;

        Handler::output();

        $this->expectOutputString('Browser : ' . $name . ', version : Unknown' . PHP_EOL);
    }

    public function provideBrowserNameData()
    {
        return array(
            'Should find Firefox name' => array(Firefox::NAME),
            'Should fin Google Chrome nale' => array(GoogleChrome::NAME),
        );
    }

    /**
     * @dataProvider provideBrowserNameAndVersion
     *
     * @param string $httpServerPattern
     * @param string $expectedName
     * @param int $expectedVersion
     */
    public function testShouldOutputTheNameAndTheVersionOfBrowserWhenTheFinderGotIt(
        $httpServerPattern,
        $expectedName,
        $expectedVersion
    ) {
        $_SERVER['HTTP_USER_AGENT'] = $httpServerPattern;

        Handler::output();

        $this->expectOutputString('Browser : ' . $expectedName . ', version : ' . $expectedVersion . PHP_EOL);
    }

    public function provideBrowserNameAndVersion()
    {
        return array(
            'Should find Firefox name and version' => array(Firefox::NAME . ' 25', Firefox::NAME, '25'),
            'Should fin Google Chrome name and version' => array(GoogleChrome::NAME . '/58', GoogleChrome::NAME, '58'),
        );
    }
}