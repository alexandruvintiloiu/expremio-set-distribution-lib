<?php

namespace Expremio\SetDistribution\Tests\Utilities;


class MockInstancingHelper
{
    /**
     * @param string $className
     * @return object
     */
    public static function createInstanceWithoutConstructor(string $className)
    {
        $instanceReflection = new \ReflectionClass($className);
        return $instanceReflection->newInstanceWithoutConstructor();
    }

    /**
     * @param object $instance
     * @param string $property
     * @param mixed $value
     */
    public static function setObjectProperty($instance, string $property, $value)
    {
        $reflectionClass = new \ReflectionClass(get_class($instance));
        $reflectionProperty = $reflectionClass->getProperty($property);
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($instance, $value);
    }

    /**
     * @param $instance
     * @param string $property
     * @return mixed
     */
    public static function getObjectProperty($instance, string $property)
    {
        $reflectionClass = new \ReflectionClass(get_class($instance));
        $reflectionClassProperty = $reflectionClass->getProperty($property);
        $reflectionClassProperty->setAccessible(true);
        return $reflectionClassProperty->getValue($instance);
    }
}