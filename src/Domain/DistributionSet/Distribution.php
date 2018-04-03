<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


class Distribution
{
    /** @var Attribute */
    protected $attribute;

    /** @var int */
    protected $count;

    /**
     * DistributionSetGroup constructor.
     * @param Attribute $attribute
     * @param int $count
     */
    public function __construct(Attribute $attribute, int $count = 1)
    {
        $this->attribute = $attribute;
        $this->count = $count;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
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