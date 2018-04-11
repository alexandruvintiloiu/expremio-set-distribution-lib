<?php


namespace Expremio\SetDistribution\Domain\DistributionSet;


class Distribution implements \JsonSerializable
{
    /** @var DistributableObject */
    protected $originalObject;

    /** @var int */
    protected $count;

    /**
     * DistributionSetGroup constructor.
     * @param DistributableObject $originalObject
     * @param int $count
     */
    public function __construct(DistributableObject $originalObject, int $count = 1)
    {
        $this->originalObject = $originalObject;
        $this->count = $count;
    }

    /**
     * @return DistributableObject
     */
    public function getAttribute(): DistributableObject
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


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [$this->getAttribute()->getObjectKey() => $this->count];
    }
}