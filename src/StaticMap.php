<?php

namespace SparksCoding\StaticMaps;

use SparksCoding\StaticMaps\Components\Map;
use SparksCoding\StaticMaps\Components\Marker;
use SparksCoding\StaticMaps\Components\Feature;

class StaticMap
{
    /**
     * @var string
     */
    public $apiKey;
    /**
     * @var string
     */
    public $builder;
    /**
     * @var object SparksCoding\StaticMaps\Components\Map
     */
    public $map;
    /**
     * @var array
     */
    public $markers = [];
    /**
     * @var array
     */
    public $styles = [];
    /**
     * @var null
     */
    public $uri = null;

    /**
     * StaticMap constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Add Markers
     *
     * @param Marker $markers
     * @return $this
     */
    public function addMarkers(Marker $markers)
    {
        foreach(func_get_args() as $marker) {
            $this->markers[] = $marker;
        }

        return $this;
    }

    /**
     * Add Styles
     *
     * @param Feature $features
     * @return $this
     */
    public function addStyles(Feature $features)
    {
        foreach(func_get_args() as $feature) {
            $this->styles[] = $feature;
        }

        return $this;
    }

    /**
     * Build URI
     *
     * @return string
     */
    public function buildUri()
    {
        return $this->builder->build()->uri();
    }

    /**
     * Key
     *
     * Named Constructor
     *
     * @param $key
     * @return static
     */
    public static function key($key)
    {
        return new static($key);
    }

    /**
     * Set Builder
     *
     * @param $builder
     * @return $this
     */
    public function setBuilder($builder)
    {
        $this->builder = new $builder($this);

        return $this;
    }

    /**
     * Set Map
     *
     * @param Map $map
     * @return $this
     */
    public function setMap(Map $map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * URI
     *
     * @return string
     */
    public function uri()
    {
        if($this->uri === null) {
            $this->uri = $this->buildUri();
        }

        return $this->uri;
    }
}