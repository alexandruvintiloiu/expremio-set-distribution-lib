<?php


namespace Expremio\SetDistribution\Domain\Distributor;


use Expremio\SetDistribution\Domain\DistributionSet\Distribution;
use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;
use Expremio\SetDistribution\Domain\DistributionSetResult\DistributionSetResult;

class SquareMatrixTwoAttributeFittingStrategy implements Strategy
{

    public function distribute(DistributionSet $distributionSet): DistributionSetResult
    {
        $result = new DistributionSetResult();

        $distributionSet = $distributionSet->get();
        $distributionSetArray = $distributionSet->getArray();

        asort($distributionSetArray);

        $attributeIndex = array_keys($distributionSetArray);

        $left = 0;
        $right = count($attributeIndex) - 1;

        while ($left !== $right) {
            $distribution = new Distribution($distributionSet->get(), $attributeIndex[$left);
            $result->add($distribution);
        }
    }
}