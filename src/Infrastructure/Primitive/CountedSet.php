<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;

class CountedSet implements Set, \JsonSerializable
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

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->set;
    }
}