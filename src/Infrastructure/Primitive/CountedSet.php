<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;


class CountedSet implements Set
{
    protected $set;

    public function add($key, $count = 1)
    {
        $this->set[$key] += $count;
    }

    public function remove($key, $count = 1)
    {
        $this->set[$key] -= $count;
    }

    public function get()
    {
        return $this->set;
    }
}