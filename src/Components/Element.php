<?php

namespace SparksCoding\StaticMaps\Components;

class Element extends Styleable
{
    /**
     * @var string
     */
    public $name = null;

    /**
     * Element constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}