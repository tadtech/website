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
        $this->assertContains('Welcome to Tadtech', $crawler->filter('body')->text());

        $this->assertSame('https://twitter.com/tadtechltd', $crawler->filter('a#twitter')->first()->attr('href'));
        $this->assertSame('https://www.facebook.com/tadtech', $crawler->filter('a#facebook')->first()->attr('href'));
        $this->assertSame('https://github.com/tadtech', $crawler->filter('a#github')->first()->attr('href'));
        $this->assertSame('mailto:info@tadtech.co.uk', $crawler->filter('a#email')->first()->attr('href'));
    }
}
