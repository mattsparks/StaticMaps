<?php

namespace SparksCoding\StaticMaps\Components;


class Marker
{
    /**
     * @var string|null
     */
    public $anchor = null;
    /**
     * @var string|null
     */
    public $color = null;
    /**
     * @var string|null
     */
    public $label = null;
    /**
     * @var string|null
     */
    public $location = null;
    /**
     * @var string|null
     */
    public $icon = null;
    /**
     * @var string|null
     */
    public $size = null;

    /**
     * Marker constructor.
     *
     * @param $location
     */
    public function __construct($location)
    {
        $this->location = $location;
    }

    /**
     * Anchor
     *
     * @param $anchor
     * @return $this
     */
    public function anchor($anchor)
    {
        $this->anchor = $anchor;

        return $this;
    }

    /**
     * Color
     *
     * @param $color
     * @return $this
     */
    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Label
     *
     * @param $label
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Location
     *
     * @param $location
     * @return static
     */
    public static function location($location)
    {
        return new static($location);
    }

    /**
     * Icon
     *
     * @param $icon
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Size
     *
     * @param $size
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;

        return $this;
    }
}