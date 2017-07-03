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
        $this->uri = $this->baseUri;
    }

    /**
     * Add Parameter
     *
     * @param $parameter
     * @param $value
     */
    public function addParameter($parameter, $value)
    {
        $this->uri .= $parameter . '=' . urlencode($value) . '&';
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