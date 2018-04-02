<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;


interface Set
{
    public function add($key);

    public function remove($key);

    public function get();
}