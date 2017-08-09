<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

defined('ROOT_DIR') || define('ROOT_DIR', dirname(__DIR__));
defined('APP_DIR') || define('APP_DIR', ROOT_DIR . '/app');

require_once(ROOT_DIR . '/vendor/autoload.php');

return new Tadtech\Website\Application(['debug' => getenv('DEV_MODE')]);
