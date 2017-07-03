<?php

namespace SparksCoding\StaticMaps\Builders;

class GoogleStaticMapBuilder extends Builder implements BuilderInterface
{
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
        foreach(get_object_vars($this->staticMap->map) as $parameter => $value) {
            if($value) {
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
     * Add Markers
     *
     * @return void
     */
    public function addMarkers()
    {
        foreach($this->staticMap->markers as $marker) {
            $properties = get_object_vars($marker);
            unset($properties['location']);

            $this->addParameter('markers', $this->formatProperties($properties) . '|' . $marker->location);

        }
    }

    /**
     * Get Element
     *
     * @param object
     * @return string
     */
    public function getElement($element)
    {
        $properties = get_object_vars($element);
        unset($properties['name']);

        $value = sprintf('element:%s|%s', $element->name, $this->formatProperties($properties));

        return $value;
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
            $elements = $style->elements;

            unset($properties['name']);
            unset($properties['elements']);

            if($elements) {
                foreach ($elements as $element) {
                    $this->addParameter('style', sprintf(
                        'feature:%s|%s|%s',
                        $style->name,
                        $this->formatProperties($properties),
                        $this->getElement($element)
                    ));
                }
            } else {
                $this->addParameter('style', sprintf(
                    'feature:%s|%s',
                    $style->name,
                    $this->formatProperties($properties)
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
        // Add key
        $this->addKey();

        return $this;
    }

    /**
     * Format Properties
     *
     * @param array $params
     * @return string
     */
    public function formatProperties(array $params)
    {
        $temp = '';

        foreach($params as $property => $value) {
            if($value) {
                $temp .= sprintf('%s:%s|', $property, $value);
            }
        }

        return $temp;
    }
}