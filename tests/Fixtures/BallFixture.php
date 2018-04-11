<?php


namespace Expremio\SetDistribution\Tests\Fixtures;


use Expremio\SetDistribution\Domain\DistributionSet\DistributableObject;

class BallFixture implements DistributableObject
{
    protected $color;

    /**
     * BallFixture constructor.
     * @param $color
     */
    public function __construct($color)
    {
        $this->color = $color;
    }


    public function getObjectKey()
    {
        return $this->color;
    }
}