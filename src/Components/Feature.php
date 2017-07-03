<?php

namespace SparksCoding\StaticMaps\Components;


class Feature extends Styleable
{
    /**
     * @var array|null
     */
    public $elements = null;
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

    /**
     * Elements
     *
     * @param $element
     * @return $this
     */
    public function elements($element)
    {
        foreach(func_get_args() as $element) {
            $this->elements[] = $element;
        }

        return $this;
    }
}