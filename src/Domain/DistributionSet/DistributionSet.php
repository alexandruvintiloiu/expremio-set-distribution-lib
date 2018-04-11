<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;

/** DistributionSet is intended for distributing 'nameless' objects that can be rebuilt if necessary */
class DistributionSet implements \JsonSerializable
{
    /** @var CountedSet */
    protected $countedSet;

    /** @var DistributableObject */
    protected $originalObjects;

    /**
     * DistributionSet constructor.
     */
    public function __construct()
    {
        $this->countedSet = new CountedSet();
    }

    public function add(Distribution $distribution)
    {
        $this->countedSet->add($distribution->getAttribute()->getObjectKey(), $distribution->getCount());
        $this->originalObjects[$distribution->getAttribute()->getObjectKey()] = $distribution->getAttribute();
    }

    public function remove(Distribution $distribution)
    {
        $this->countedSet->remove($distribution->getAttribute()->getObjectKey(), $distribution->getCount());
    }

    public function getObject(string $attributeKey)
    {
        return $this->originalObjects[$attributeKey];
    }

    public function get(): CountedSet
    {
        return $this->countedSet;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->countedSet;
    }
}