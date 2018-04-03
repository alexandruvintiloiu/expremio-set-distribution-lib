<?php


namespace Expremio\SetDistribution\Tests\Fixtures;


use Expremio\SetDistribution\Domain\DistributionSet\Attribute;

class BallFixture implements Attribute
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


    public function getAttributeKey()
    {
        return $this->color;
    }
}