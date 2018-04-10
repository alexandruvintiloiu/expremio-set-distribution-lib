<?php

namespace Expremio\SetDistribution\Domain\Distributor;

use Expremio\SetDistribution\Domain\DistributionSet\Distribution;
use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;
use Expremio\SetDistribution\Domain\DistributionSetResult\DistributionGroup;
use Expremio\SetDistribution\Domain\DistributionSetResult\DistributionSetResult;

class SquareMatrixTwoAttributeFittingStrategy implements Strategy
{
    /**
     * @param DistributionSet $distributionSet
     * @return DistributionSetResult
     * @throws InvalidDistributionException
     */
    public function distribute(DistributionSet $distributionSet): DistributionSetResult
    {
        $result = new DistributionSetResult();

        // for performance reasons we won't use OOP abstractions
        $undistributed = $distributionSet->get()->getSortedByCount();
        $undistributedCount = array_sum($undistributed);
        $n = (int)sqrt($undistributedCount);
        if($undistributedCount !== $n*$n)
        {
            throw new InvalidDistributionException("Distribution of {$undistributedCount} elements does not perfectly fit into {$n}x{$n} matrix");
        }

        $attributeIndex = array_keys($undistributed);

        $left = 0;
        $right = count($attributeIndex) - 1;

        while ($left < $right) {
            $distributionGroup = new DistributionGroup();
            $distributeCountLeft = $undistributed[$attributeIndex[$left]] < $n ? $undistributed[$attributeIndex[$left]] : $n;
            $distributeCountRight = $n - $distributeCountLeft;
            $distributionLeft = new Distribution($distributionSet->getObject($attributeIndex[$left]), $distributeCountLeft);
            $distributionRight = new Distribution($distributionSet->getObject($attributeIndex[$right]), $distributeCountRight);
            if ($distributeCountLeft > 0)
                $distributionGroup->add($distributionLeft);
            if ($distributeCountRight > 0)
                $distributionGroup->add($distributionRight);
            $result->add($distributionGroup);
            $undistributed[$attributeIndex[$right]] -= $distributeCountRight;
            $undistributed[$attributeIndex[$left]] -= $distributeCountLeft;
            if ($undistributed[$attributeIndex[$left]] === 0)
            {
                $left++;
            }
            if ($undistributed[$attributeIndex[$right]] === 0)
            {
                $right--;
            }
        }

        return $result;
    }
}