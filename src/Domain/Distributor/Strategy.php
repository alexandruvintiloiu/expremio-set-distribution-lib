<?php


namespace Expremio\SetDistribution\Domain\Distributor;


interface Strategy
{
    public function distribute();
}