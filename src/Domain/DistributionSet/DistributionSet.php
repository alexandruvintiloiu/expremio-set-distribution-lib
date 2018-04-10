<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;

/** DistributionSet is intended for distributing 'nameless' objects that can be rebuilt if necessary */
class DistributionSet
{
    /** @var CountedSet */
    protected $countedSet;

    /** @var Attribute */
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
        $this->countedSet->add($distribution->getAttribute()->getAttributeKey(), $distribution->getCount());
        $this->originalObjects[$distribution->getAttribute()->getAttributeKey()] = $distribution->getAttribute();
    }

    public function remove(Distribution $distribution)
    {
        $this->countedSet->remove($distribution->getAttribute()->getAttributeKey(), $distribution->getCount());
    }

    public function getObject(string $attributeKey)
    {
        return $this->originalObjects[$attributeKey];
    }

    public function get(): CountedSet
    {
        return $this->countedSet;
    }
}