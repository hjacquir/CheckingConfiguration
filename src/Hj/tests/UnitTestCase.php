<?php

/* Created by Hatim Jacquir
 * @author : Hatim Jacquir <hatimjacquir@gmail.com>
 */

namespace Hj\tests;

use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;
use ReflectionClass;

/**
 * UnitTestCase
 */
class UnitTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @param Object $object
     */
    protected function hjAssertInstanceOfMatchable($object)
    {
        $this->assertInstanceOf('\Hj\Matchable\Matchable', $object);
    }

    /**
     * @param Object $object
     */
    protected function hjAssertInstanceOfBrowser($object)
    {
        $this->assertInstanceOf('\Hj\Matchable\Browser', $object);
    }

    /**
     * @param Object $object
     */
    protected function hjAssertInstanceOfEngine($object)
    {
        $this->assertInstanceOf('\Hj\Engine\Engine', $object);
    }

    /**
     * @param Object $object
     */
    protected function hjAssertInstanceOfRegex($object)
    {
        $this->assertInstanceOf('\Hj\Regex\Regex', $object);
    }

    /**
     * @param Object $object
     */
    protected function hjAssertInstanceOfMatcher($object)
    {
        $this->assertInstanceOf('\Hj\Matcher\Matcher', $object);
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockEngine()
    {
        return $this->getMockBuilder('\Hj\Engine\Engine')->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockMatcher()
    {
        return $this->getMockBuilder('\Hj\Matcher\Matcher')->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockRegex()
    {
        return $this->getMockBuilder('\Hj\Regex\Regex')->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockBrowser()
    {
        return $this->getMockBuilder('\Hj\Matchable\Browser')->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockMatchable()
    {
        return $this->getMockBuilder('\Hj\Matchable\Matchable')->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function hjGetMockAgent()
    {
        return $this->getMockBuilder('\Hj\Agent')->disableOriginalConstructor()->getMock();
    }

    /**
    * Assert that an array has epected key and value
    *
    * @param array $expectedArray
    * @param mixed $expectedKey
    * @param mixed $expectedValue
    */
    protected function hjAssertIfTheArrayHasKeyAndValue(
        array $expectedArray,
        $expectedKey,
        $expectedValue
    ) {
        $this->assertArrayHasKey($expectedKey, $expectedArray);
        $this->assertSame($expectedValue, $expectedArray[$expectedKey]);
    }

     /**
      * Assert that object have getter and setter
      *
      * @param object $object The expected object
      * @param mixed $expectedAttribute The attribute concerned which one tests the getter and setter
      * @param mixed $expectedValue The expected value returned by the getter
      */
    protected function hjAssertThatObjectHaveGetAndSetMethods(
        $object,
        $expectedAttribute,
        $expectedValue
    ) {
        $appendedAttribute = ucfirst($expectedAttribute);

        $setMethod = 'set' . $appendedAttribute;
        $this->hjAssertIfTheMethodExist($object, $setMethod);

        $getMethod = 'get' . $appendedAttribute;
        $this->hjAssertIfTheMethodExist($object, $getMethod);

        $object->{$setMethod}($expectedValue);

        $this->assertSame($expectedValue, $object->{$getMethod}());
    }

   /**
    * Assert if the method exist
    *
    * @param Object $object The expected object
    * @param string $expectedMethodName The expected method name
    */
    protected function hjAssertIfTheMethodExist($object, $expectedMethodName)
    {
        $class   = new ReflectionClass($object);
        $method  = $class->getMethod($expectedMethodName);
        $message = 'The method : ' . $expectedMethodName .
                ' does not exist into ' . $method->class;

        $this->assertSame($expectedMethodName, $method->name, $message);
    }
}
