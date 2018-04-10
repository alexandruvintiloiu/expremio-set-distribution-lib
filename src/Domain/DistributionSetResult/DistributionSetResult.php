<?php


namespace Expremio\SetDistribution\Domain\DistributionSetResult;

class DistributionSetResult
{
    /** @var DistributionGroup[] */
    protected $groups = [];

    public function add(DistributionGroup $distributionGroup)
    {
        $this->groups[] = $distributionGroup;
    }
}