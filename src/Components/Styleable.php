<?php

namespace SparksCoding\StaticMaps\Components;


class Styleable
{
    /**
     * @var string
     */
    public $color = null;
    /**
     * @var string
     */
    public $gama = null;
    /**
     * @var string
     */
    public $hue = null;
    /**
     * @var string
     */
    public $invertLightness = null;
    /**
     * @var string
     */
    public $lightness = null;
    /**
     * @var string
     */
    public $saturation = null;
    /**
     * @var string
     */
    public $visibility = null;
    /**
     * @var string
     */
    public $weight = null;

    /**
     * Color
     *
     * @param $color
     *
     * @return $this
     */
    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Gama
     *
     * @param $gama
     *
     * @return $this
     */
    public function gama($gama)
    {
        $this->gama = $gama;

        return $this;
    }

    /**
     * Hue
     *
     * @param $hue
     *
     * @return $this
     */
    public function hue($hue)
    {
        $this->hue = $hue;

        return $this;
    }

    /**
     * Invert
     *
     * @return $this
     */
    public function invert()
    {
        $this->invertLightness('true');

        return $this;
    }

    /**
     * Invert Lightness
     *
     * @param $invertLightness
     *
     * @return $this
     */
    public function invertLightness($invertLightness)
    {
        $this->invertLightness = $invertLightness;

        return $this;
    }

    /**
     * Lightness
     *
     * @param $lightness
     *
     * @return $this
     */
    public function lightness($lightness)
    {
        $this->lightness = $lightness;

        return $this;
    }

    /**
     * Name
     *
     * Named Constructor
     *
     * @param $name
     *
     * @return static
     */
    public static function name($name)
    {
        return new static($name);
    }

    /**
     * Saturation
     *
     * @param $saturation
     *
     * @return $this
     */
    public function saturation($saturation)
    {
        $this->saturation = $saturation;

        return $this;
    }

    /**
     * Visibility
     *
     * @param $visibility
     *
     * @return $this
     */
    public function visibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Weight
     *
     * @param $weight
     *
     * @return $this
     */
    public function weight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
}