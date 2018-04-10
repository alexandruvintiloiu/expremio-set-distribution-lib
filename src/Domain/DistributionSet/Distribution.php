<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


class Distribution
{
    /** @var Attribute */
    protected $originalObject;

    /** @var int */
    protected $count;

    /**
     * DistributionSetGroup constructor.
     * @param Attribute $originalObject
     * @param int $count
     */
    public function __construct(Attribute $originalObject, int $count = 1)
    {
        $this->originalObject = $originalObject;
        $this->count = $count;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->originalObject;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }


}