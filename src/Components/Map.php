<?php

namespace SparksCoding\StaticMaps\Components;


class Map
{
    /**
     * @var string|null
     */
    public $center = null;
    /**
     * @var string
     */
    public $format = 'PNG';
    /**
     * @var string|null
     */
    public $language = null;
    /**
     * @var string
     */
    public $type = 'roadmap';
    /**
     * @var string|null
     */
    public $region = null;
    /**
     * @var int
     */
    public $scale = 1;
    /**
     * @var string
     */
    public $size = '640x640';
    /**
     * @var int
     */
    public $zoom = 10;

    /**
     * Center
     *
     * @param $location
     * @return $this
     */
    public function center($location)
    {
        $this->center = $location;

        return $this;
    }

    /**
     * Create
     *
     * Named Constructor
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Format
     *
     * @param $format
     * @return $this
     */
    public function format($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Language
     *
     * @param $language
     * @return $this
     */
    public function language($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Region
     *
     * @param $region
     * @return $this
     */
    public function region($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Scale
     *
     * @param $scale
     * @return $this
     */
    public function scale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Size
     *
     * @param int $width
     * @param int $height
     * @return $this
     */
    public function size(int $width, int $height)
    {
        $this->size = sprintf('%dx%d', $width, $height);

        return $this;
    }

    /**
     * Type
     *
     * @param $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Zoom
     *
     * @param $zoom
     * @return $this
     */
    public function zoom($zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }
}