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
 * Error page controller
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class ErrorPageController
{
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var \Exception
     */
    private $exception;

    /**
     * @var int
     */
    private $code;

    /**
     * @param Twig_Environment $twig
     * @param \Exception $exception
     * @param int $code
     */
    public function __construct(Twig_Environment $twig, \Exception $exception, int $code)
    {
        $this->twig = $twig;
        $this->exception = $exception;
        $this->code = $code;
    }

    /**
     * Returns the rendered error page
     * @return string
     */
    public function renderAction(): string
    {
        $template = sprintf('errors/%s.html.twig', $this->code);

        if ($this->twig->getLoader()->exists($template)) {
            return $this->twig->render($template);
        }

        // Return a generic error page if we don't have a code specific template
        return $this->twig->render('errors/generic.html.twig');
    }
}
