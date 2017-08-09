<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website\Tests;

use Silex\WebTestCase as BaseWebTestCase;
use Tadtech\Website\Application;

/**
 * Base class for functional tests
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
abstract class WebTestCase extends BaseWebTestCase
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @return Application
     */
    public function createApplication(): Application
    {
        return require ROOT_DIR . '/src/bootstrap.php';
    }
}
