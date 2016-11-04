<?php
namespace Puja\Configure\Result;
class Result
{
    protected $result;
    public function __construct($result)
    {
        $this->result = $result;
    }

    public function get($key, $defaultValue = null)
    {
        if (array_key_exists($key, $this->result)) {
            return $this->result[$key];
        }

        return $defaultValue;
    }

    public function getAll()
    {
        return $this->result;
    }
}