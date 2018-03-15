<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;

class CountedSet
{
    /** @var array */
    protected $set = [];

    /**
     * CountedSet constructor.
     * @param array $set
     */
    public function __construct(array $set = [])
    {
        $this->set($set);
    }

    /**
     * @param array $set
     */
    public function set(array $set): void
    {
        $this->set = $set;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->set;
    }

    public function add($attribute, int $count = 1)
    {
        $this->set[$attribute] += $count;
    }

    public function remove($attribute, int $count = 1)
    {
        $this->set[$attribute] -= $count;
    }
}