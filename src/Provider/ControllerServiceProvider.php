<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tadtech\Website\Controller\LandingPageController;

/**
 * Registers application controllers
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class ControllerServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container['controller.landingPage'] = function () use ($container) {
            return new LandingPageController($container['twig']);
        };
    }
}
