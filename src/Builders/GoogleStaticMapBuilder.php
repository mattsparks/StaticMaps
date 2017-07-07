<?php

namespace SparksCoding\StaticMaps\Builders;

class GoogleStaticMapBuilder extends Builder implements BuilderInterface
{
    /**
     * Formats
     */
    const ELEMENT_FORMAT = 'element:%s|%s';
    const PATH_FORMAT = '%s|%s';
    const POINT_FORMAT = '%s|';
    const PROPERTY_FORMAT = '%s:%s|';
    const STYLE_FORMAT = 'feature:%s|%s';
    const MULTI_STYLE_FORMAT = 'feature:%s|%s|%s';

    /**
     * @var array
     */
    protected $propertyMap = [
      'invertLightness' => 'invert_lightness'
    ];

    /**
     * @var string
     */
    public $baseUri = 'https://maps.googleapis.com/maps/api/staticmap?';

    /**
     * Add Base Parameters
     *
     * @return void
     */
    public function addBaseParameters()
    {
        foreach (get_object_vars($this->staticMap->map) as $parameter => $value) {
            if ($value) {
                $this->addParameter($parameter, $value);
            }
        }
    }

    /**
     * Add Key
     *
     * @return void
     */
    public function addKey()
    {
        $this->uri .= 'key=' . $this->staticMap->apiKey;
    }

    /**
     * Add Path
     *
     * @return void
     */
    public function addPath()
    {
        if(!$this->staticMap->path) {
            return;
        }

        $properties = get_object_vars($this->staticMap->path);
        $points     = $this->staticMap->path->points;

        unset($properties['points']);

        $this->addParameter('path', sprintf(
            self::PATH_FORMAT,
            $this->format($properties, self::PROPERTY_FORMAT),
            $this->formatPoints($points)
        ));
    }

    /**
     * Add Markers
     *
     * @return void
     */
    public function addMarkers()
    {
        foreach ($this->staticMap->markers as $marker) {
            $properties = get_object_vars($marker);
            unset($properties['location']);

            if ($this->hasNonNullProperties($marker)) {
                $value = $this->format($properties, self::PROPERTY_FORMAT) . '|' . $marker->location;
            } else {
                $value = $marker->location;
            }

            $this->addParameter('markers', $value);

        }
    }

    /**
     * Add Styles
     *
     * @return void
     */
    public function addStyles()
    {
        foreach ($this->staticMap->styles as $style) {
            $properties = get_object_vars($style);
            $elements   = $style->elements;

            unset($properties['name']);
            unset($properties['elements']);

            if ($elements) {
                foreach ($elements as $element) {
                    $this->addParameter('style', sprintf(
                        self::MULTI_STYLE_FORMAT,
                        $style->name,
                        $this->format($properties, self::PROPERTY_FORMAT),
                        $this->getElement($element)
                    ));
                }
            } else {
                $this->addParameter('style', sprintf(
                    self::STYLE_FORMAT,
                    $style->name,
                    $this->format($properties, self::PROPERTY_FORMATs)
                ));
            }
        }
    }

    /**
     * Build
     *
     * @return $this
     */
    public function build()
    {
        // Add base parameters
        $this->addBaseParameters();
        // Add markers
        $this->addMarkers();
        // Add styles
        $this->addStyles();
        // Add Path
        $this->addPath();
        // Add key
        $this->addKey();

        return $this;
    }

    /**
     * Format Properties
     *
     * @param array $params
     *
     * @return string
     */
    public function format(array $params, $format)
    {
        $temp = '';

        foreach ($params as $property => $value) {
            if ($value) {
                $temp .= sprintf($format, $this->mapProperty($property), $value);
            }
        }

        return rtrim($temp, '|');
    }

    /**
     * Format Points
     *
     * @param array $points
     *
     * @return string
     */
    public function formatPoints(array $points)
    {
        $temp = '';

        foreach ($points as $point) {
            $temp .= sprintf(self::POINT_FORMAT, $point);
        }

        return rtrim($temp, '|');
    }

    /**
     * Get Element
     *
     * @param object
     *
     * @return string
     */
    public function getElement($element)
    {
        $properties = get_object_vars($element);
        unset($properties['name']);

        $value = sprintf(
            self::ELEMENT_FORMAT,
            $element->name,
            $this->format($properties, self::PROPERTY_FORMAT)
        );

        return $value;
    }

    /**
     * Has Non-Null Properties
     *
     * @param $object
     *
     * @return bool
     */
    public function hasNonNullProperties($object)
    {
        foreach (get_object_vars($object) as $property => $value) {
            if ( ! is_null($value)) {
                return false;
            }
        }

        return true;
    }
}