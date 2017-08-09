<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website\Tests\Controller;

use Tadtech\Website\Controller\LandingPageController;
use Tadtech\Website\Provider\ControllerServiceProvider;
use Tadtech\Website\Tests\WebTestCase;

/**
 * Class ControllerServiceProviderTest
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class ControllerServiceProviderTest extends WebTestCase
{
    /**
     * @group functional
     */
    public function testControllersAreRegisteredByControllerProvider(): void
    {
        $this->app->register(new ControllerServiceProvider);
        $this->assertInstanceOf(LandingPageController::class, $this->app['controller.landingPage']);
    }
}
