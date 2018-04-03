<?php


namespace Expremio\SetDistribution\Infrastructure\Primitive;


interface Set
{
    public function add(string $key);

    public function remove(string $key);

    public function get();
}