<?php


namespace Expremio\SetDistribution\Domain\DistributionSetResult;


use Expremio\SetDistribution\Domain\DistributionSet\Attribute;
use Expremio\SetDistribution\Infrastructure\Primitive\CountedSet;

class DistributionSetResult
{
    /** @var CountedSet */
    protected $countedSet;

    /**
     * DistributionSetResult constructor.
     */
    public function __construct()
    {
        $this->countedSet = new CountedSet();
    }


    protected function add(Attribute $attribute, $count = 1)
    {
        $this->countedSet->add($attribute->getKey(), $count);
    }


}