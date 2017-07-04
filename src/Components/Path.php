<?php

namespace SparksCoding\StaticMaps\Components;


class Path
{
    /**
     * @var string|null
     */
    public $color = null;
    /**
     * @var string|null
     */
    public $fillcolor = null;
    /**
     * @var string|null
     */
    public $geodesic = null;
    /**
     * @var array
     */
    public $points = [];
    /**
     * @var string|null
     */
    public $weight = null;

    /**
     * Path constructor.
     *
     * @param array $points
     */
    public function __construct(array $points)
    {
        $this->points = $points;
    }

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
     * Fill Color
     *
     * @param $color
     *
     * @return $this
     */
    public function fillcolor($color)
    {
        $this->fillcolor = $color;

        return $this;
    }

    /**
     * Geodesic
     *
     * @param bool $bool
     *
     * @return $this
     */
    public function geodesic(bool $bool)
    {
        $this->geodesic = $bool;

        return $this;
    }

    /**
     * Points
     *
     * @param array $points
     *
     * @return static
     */
    public static function points(array $points)
    {
        return new static($points);
    }

    /**
     * Weight
     *
     * @param int $weight
     *
     * @return $this
     */
    public function weight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }
}