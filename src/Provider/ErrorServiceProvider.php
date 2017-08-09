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
use Symfony\Component\HttpFoundation\Request;
use Tadtech\Website\Controller\ErrorPageController;

/**
 * Registers application error handler
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class ErrorServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void
    {
        /** @var $container \Tadtech\Website\Application */
        $container->error(function (\Exception $e, Request $r, int $code) use ($container): string {
            $controller = new ErrorPageController($container['twig'], $e, $code);
            return $controller->renderAction();
        });
    }
}
