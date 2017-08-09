<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website\Controller;

use Twig_Environment;

/**
 * Landing page controller
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class LandingPageController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Returns the rendered landing page
     * @return string
     */
    public function renderAction(): string
    {
        return $this->twig->render('landing.html.twig');
    }
}
