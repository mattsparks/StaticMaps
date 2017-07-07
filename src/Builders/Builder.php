<?php

namespace SparksCoding\StaticMaps\Builders;

use SparksCoding\StaticMaps\StaticMap;

abstract class Builder implements BuilderInterface
{
    /**
     * @var string
     */
    protected $baseUri;
    /**
     * @var array
     */
    protected $parameterMap = [];
    /**
     * @var array
     */
    protected $propertyMap = [];
    /**
     * @var StaticMap
     */
    protected $staticMap;
    /**
     * @var string
     */
    protected $uri;

    /**
     * Builder constructor.
     *
     * @param StaticMap $staticMap
     */
    public function __construct(StaticMap $staticMap)
    {
        $this->staticMap = $staticMap;
        $this->uri       = $this->baseUri;
    }

    /**
     * Add Parameter
     *
     * @param $parameter
     * @param $value
     */
    public function addParameter($parameter, $value)
    {
        $this->uri .= $this->mapParameter($parameter) . '=' . urlencode($value) . '&';
    }

    /**
     * Map Parameter
     *
     * @param $parameter
     * @return mixed
     */
    public function mapParameter($parameter)
    {
        if (array_key_exists($parameter, $this->parameterMap)) {
            return $this->parameterMap[$parameter];
        }

        return $parameter;
    }

    /**
     * Map Property
     *
     * @param $property
     * @return mixed
     */
    public function mapProperty($property)
    {
        if (array_key_exists($property, $this->propertyMap)) {
            return $this->propertyMap[$property];
        }

        return $property;
    }

    /**
     * URI
     *
     * @return string
     */
    public function uri()
    {
        return $this->uri;
    }
}