<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;

class DistributionSet
{
    /** @var CountedSet */
    protected $countedSet;

    /**
     * DistributionSet constructor.
     */
    public function __construct()
    {
        $this->countedSet = new CountedSet();
    }


    public function add(Distribution $distribution)
    {
        $this->countedSet->add($distribution->getAttribute(), $distribution->getCount());
    }

    public function remove(Distribution $distribution)
    {
        $this->countedSet->remove($distribution->getAttribute(), $distribution->getCount());
    }

    public function get(): CountedSet
    {
        return $this->countedSet;
    }
}