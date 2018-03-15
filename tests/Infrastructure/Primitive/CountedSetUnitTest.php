<?php


use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;
use Expremio\SetDistribution\Tests\Utilities\MockInstancingHelper;
use PHPUnit\Framework\MockObject\Matcher\Invocation;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CountedSetUnitTest extends TestCase
{

    const CLASS_NAME = CountedSet::class;

    public function testConstructorDefaultBehaviour()
    {
        $constructorArguments = [];
        $method = 'set';

        $mock = $this->getMockWithoutConstructor([$method]);

        $this->setExpectations($mock, $this->once(), $method, $constructorArguments);
        $this->invokeConstructorOnMock($mock, self::CLASS_NAME, $constructorArguments);
    }

    protected function getMockWithoutConstructor(array $notStubbedMethods = [])
    {
        return $this->getMockBuilder(self::CLASS_NAME)
            ->disableOriginalConstructor()
            ->setMethods($notStubbedMethods)
            ->getMockForAbstractClass();
    }

    protected function setExpectations(MockObject $mock, Invocation $invocation, string $method, $target)
    {
        $mock->expects($invocation)
            ->method($method)
            ->with($target);
    }

    protected function invokeConstructorOnMock(MockObject $mock, string $className, array $arguments)
    {
        $reflectedClass = new ReflectionClass($className);
        $constructor = $reflectedClass->getConstructor();
        $constructor->invoke($mock, $arguments);
    }

    public function testConstructorDefaultBehaviourWithParameter()
    {
        $constructorArguments = ['test' => 4];

        $method = 'set';

        $mock = $this->getMockWithoutConstructor([$method]);
        $this->setExpectations($mock, $this->once(), $method, $constructorArguments);
        $this->invokeConstructorOnMock($mock, self::CLASS_NAME, $constructorArguments);
    }

    public function testGetMethod()
    {
        $value = ['someKey' => 'someValue'];

        $mock = $this->getMockWithoutConstructor(['get']);
        MockInstancingHelper::setObjectProperty($mock, 'set', $value);
        self::assertEquals($value, $this->invokeMethodOnMock($mock, 'get', self::CLASS_NAME, $value));
    }

    protected function invokeMethodOnMock(MockObject $mock, string $method, string $className, array $arguments)
    {
        $reflectedClass = new ReflectionClass($className);
        $constructor = $reflectedClass->getMethod($method);
        return $constructor->invoke($mock, $arguments);
    }

    public function testSetMethod()
    {
        $value = ['someKey' => 'someValue'];

        /** @var CountedSet $mock */
        $mock = $this->getMockWithoutConstructor();
        $mock->set($value);
        self::assertEquals($value, MockInstancingHelper::getObjectProperty($mock, 'set'));
    }
}
