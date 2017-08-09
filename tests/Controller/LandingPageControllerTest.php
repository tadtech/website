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
 * Class LandingPageControllerTest
 * @author Ben Tadiar <ben@tadtech.co.uk>
 */
class LandingPageControllerTest extends WebTestCase
{
    /**
     * @group functional
     */
    public function testLandingPageContainsCorrectContent(): void
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('body:contains("Welcome to Tadtech")'));
    }
}
