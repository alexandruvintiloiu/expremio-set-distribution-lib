<?php


namespace Expremio\SetDistribution\Domain\DistributionSetResult;


use Expremio\SetDistribution\Domain\DistributionSet\Distribution;

class DistributionGroup
{
    protected $group = [];

    public function add(Distribution $distribution)
    {
        $this->group[] = $distribution;
    }
}