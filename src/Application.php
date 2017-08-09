<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website;

use Silex\Application as SilexApplication;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Tadtech\Website\Provider\ControllerServiceProvider;
use Tadtech\Website\Provider\ErrorServiceProvider;

/**
 * Instantiates and configures the application
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class Application extends SilexApplication
{
    /**
     * @param array $values
     */
    public function __construct(array $values = array())
    {
        parent::__construct($values);

        // Register service providers
        $this->register(new ServiceControllerServiceProvider);
        $this->register(new ControllerServiceProvider);
        $this->register(new ErrorServiceProvider);
        $this->register(new TwigServiceProvider, [
            'twig.path' => APP_DIR . '/views',
            'twig.options' => [
                'cache' => ROOT_DIR . '/cache/twig',
                'strict_variables' => true,
            ],
        ]);

        // Load application routes from the YAML config file
        $this['routes'] = $this->extend('routes', function (RouteCollection $routes): RouteCollection {
            $fileLocator = new FileLocator(APP_DIR . '/config');
            $fileLoader = new YamlFileLoader($fileLocator);
            $collection = $fileLoader->load('routes.yml');
            $routes->addCollection($collection);
            return $routes;
        });
    }
}
