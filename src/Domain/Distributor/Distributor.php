<?php


namespace Expremio\SetDistribution\Domain\Distributor;


use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;

class Distributor
{
    /** @var Strategy */
    protected $strategy;

    /** @var DistributionSet */
    protected $distributionSet;

    /**
     * Distributor constructor.
     * @param Strategy $strategy
     * @param DistributionSet $distributionSet
     */
    public function __construct(Strategy $strategy, DistributionSet $distributionSet)
    {
        $this->strategy = $strategy;
        $this->distributionSet = $distributionSet;
    }

    public function distribute()
    {
        $this->strategy->distribute();
    }

}