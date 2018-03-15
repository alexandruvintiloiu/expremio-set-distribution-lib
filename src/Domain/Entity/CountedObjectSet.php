<?php


namespace Expremio\SetDistribution\Entity;


use Expremio\SetDistribution\Contract\DistributableObjectSet;
use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;

class CountedObjectSet
{
    /** @var CountedSet */
    protected $countedSet;

    public function __construct()
    {
    }

    public function add(DistributableObjectSet $object, int $count)
    {
        $this->countedSet->add($object->getAttribute(), $count);
    }

}