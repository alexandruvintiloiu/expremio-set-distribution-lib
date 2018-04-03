<?php


namespace Expremio\SetDistribution\Domain\Distributor;


use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;

interface Strategy
{
    public function distribute(DistributionSet $distributionSet);
}