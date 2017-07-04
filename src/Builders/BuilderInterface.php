<?php

namespace SparksCoding\StaticMaps\Builders;


interface BuilderInterface
{
    public function addBaseParameters();

    public function addKey();

    public function addMarkers();

    public function addStyles();

    public function build();
}