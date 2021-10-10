<?php

namespace aspirantzhang\octopusTwigBridge;

use ReflectionClass;
use Twig\Extension\AbstractExtension;
use Twig\TwigTest;
use aspirantzhang\octopusTwigBridge\nodevisitors\GetAttrAdjuster;

class Extension extends AbstractExtension
{
    public function getNodeVisitors()
    {
        return [
            new GetAttrAdjuster(),
        ];
    }

    public function getTests()
    {
        return [
            new TwigTest('instance of', function ($var, $instance) {
                $ref = new ReflectionClass($instance);
                return $ref->isInstance($var);
            }),
        ];
    }
}
