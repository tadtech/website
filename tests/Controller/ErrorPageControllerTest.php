<?php

/**
 * This file is part of the Tadtech website
 *
 * Copyright (c) Tadtech Ltd <info@tadtech.co.uk>
 */

declare(strict_types=1);

namespace Tadtech\Website\Tests\Controller;

use Tadtech\Website\Tests\WebTestCase;

/**
 * Class ErrorPageControllerTest
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class ErrorPageControllerTest extends WebTestCase
{
    /**
     * @group functional
     */
    public function testNotFoundPageContainsCorrectContent(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/foo');

        $this->assertTrue($client->getResponse()->isNotFound());
        $this->assertContains('404 Not Found :(', $crawler->filter('body')->text());
    }

    /**
     * @group functional
     */
    public function testGenericErrorPageContainsCorrectContent(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('POST', '/');

        $this->assertSame($client->getResponse()->getStatusCode(), 405);
        $this->assertContains('We\'re really sorry :(', $crawler->filter('body')->text());
    }
}
