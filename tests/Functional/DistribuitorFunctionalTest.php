<?php

namespace Expremio\SetDistribution\Tests\Functional;

use Expremio\SetDistribution\Domain\DistributionSet\Distribution;
use Expremio\SetDistribution\Domain\DistributionSet\DistributionSet;
use Expremio\SetDistribution\Domain\DistributionSetResult\DistributionSetResult;
use Expremio\SetDistribution\Domain\Distributor\Distributor;
use Expremio\SetDistribution\Domain\Distributor\SquareMatrixTwoAttributeFittingStrategy;
use Expremio\SetDistribution\Tests\Fixtures\BallFixture;
use PHPUnit\Framework\TestCase;

class DistribuitorFunctionalTest extends TestCase
{

    public function testDistributionWorksForBasicExample()
    {
        $redBall = new BallFixture('red');
        $yellowBall = new BallFixture('yellow');
        $greenBall = new BallFixture('green');
        $blueBall = new BallFixture('blue');

        $redBalls = new Distribution($redBall, 2);
        $greenBalls = new Distribution($greenBall, 2);
        $blueBalls = new Distribution($blueBall, 6);
        $yellowBalls = new Distribution($yellowBall, 6);

        $distributionSet = new DistributionSet();
        $distributionSet->add($redBalls);
        $distributionSet->add($greenBalls);
        $distributionSet->add($blueBalls);
        $distributionSet->add($yellowBalls);

        $squareMatrixTwoAttributeFittingStrategy = new SquareMatrixTwoAttributeFittingStrategy();
        $distributor = new Distributor($distributionSet, $squareMatrixTwoAttributeFittingStrategy);
        $result = $distributor->distribute();

        self::assertInstanceOf(DistributionSetResult::class, $result);

//        $resultArray = $result->
//        $referenceArray = [['red' => 1, 'green' => 2]];
//
//        self::assertEquals($referenceArray, $resultArray);
    }
}
