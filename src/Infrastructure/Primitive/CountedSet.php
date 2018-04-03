<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;


class CountedSet implements Set
{
    /** @var array */
    protected $set;

    /**
     * @param string $key
     * @param int $count
     */
    public function add(string $key, $count = 1)
    {
        $this->set[$key] += $count;
    }

    public function remove(string $key, $count = 1)
    {
        $this->set[$key] -= $count;
    }

    public function getArray()
    {
        return $this->set;
    }
}