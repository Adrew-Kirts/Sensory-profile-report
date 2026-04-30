<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{
    public function testHomePageIsReachable(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testLoginPageIsReachable(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testRegisterPageIsReachable(): void
    {
        $client = static::createClient();
        $client->request('GET', '/register');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testProfileRequiresAuth(): void
    {
        $client = static::createClient();
        $client->request('GET', '/profil');

        $statusCode = $client->getResponse()->getStatusCode();
        $this->assertContains($statusCode, [302, 401, 403]);
    }

    public function testPatientsListRequiresAuth(): void
    {
        $client = static::createClient();
        $client->request('GET', '/patients');

        $statusCode = $client->getResponse()->getStatusCode();
        $this->assertContains($statusCode, [302, 401, 403]);
    }
}
