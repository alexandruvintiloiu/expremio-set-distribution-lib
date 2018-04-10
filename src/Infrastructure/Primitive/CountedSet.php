<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;

class CountedSet implements Set
{
    /** @var array */
    protected $set = [];

    /**
     * @param string $key
     * @param int $count
     */
    public function add(string $key, $count = 1)
    {;
        $this->set[$key] = isset($this->set[$key]) ? $this->set[$key]+$count : $count;
    }

    public function remove(string $key, $count = 1)
    {
        $this->set[$key] -= isset($this->set[$key]) ? $this->set[$key]-$count : $count;
    }

    public function get()
    {
        return $this->set;
    }

    public function getSortedByAttribute()
    {
        $set = $this->set;
        ksort($set);
        return $set;
    }

    public function getSortedByCount()
    {
        $set = $this->set;
        asort($set);
        return $set;
    }
}