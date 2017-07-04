<?php

namespace SparksCoding\StaticMaps\Components;


class Path
{
    public $color = null;
    public $fillcolor = null;
    public $geodesic = null;
    public $points = [];
    public $weight = null;

    public function __construct(array $points)
    {
        $this->points = $points;
    }

    public function color($color)
    {
        $this->color = $color;

        return $this;
    }

    public function fillcolor($color)
    {
        $this->fillcolor = $color;

        return $this;
    }

    public function geodesic(bool $bool)
    {
        $this->geodesic = $bool;

        return $this;
    }

    public static function points(array $points)
    {
        return new static($points);
    }

    public function weight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }
}