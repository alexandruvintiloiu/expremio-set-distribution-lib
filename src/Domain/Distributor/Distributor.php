<?php


namespace Expremio\SetDistribution\Domain\Distributor;


use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;
use Expremio\SetDistribution\Domain\DistributionSetResult\DistributionSetResult;

class Distributor
{
    /** @var DistributionSet */
    protected $distributionSet;

    /** @var Strategy */
    protected $strategy;

    /**
     * Distributor constructor.
     * @param Strategy $strategy
     * @param DistributionSet $distributionSet
     */
    public function __construct(DistributionSet $distributionSet, Strategy $strategy)
    {
        $this->strategy = $strategy;
        $this->distributionSet = $distributionSet;
    }

    public function distribute(): DistributionSetResult
    {
        $result = new DistributionSetResult();

        $this->strategy->distribute($this->distributionSet);

        return $result;
    }

}