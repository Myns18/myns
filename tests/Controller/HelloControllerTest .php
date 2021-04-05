<?php
namespace App\Tests\Controller;

use App\Controller\Hello\HelloController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{
  public function testHelloRandomRoute()
  {
    $client = static::createClient();

    $crawler = $client->request("GET", "/Hello/helloRandom");

    $this->assertEquals(200, $client->getResponse()->getStatusCode());
    $this->assertStringContainsString("Hello ", $crawler->filter("h1")->text());
  }

  function testRandomNameGenerator()
  {
    $rdName = HelloController::generateRandomName();
    $this->assertGreaterThan(1, strlen($rdName));
  }
}