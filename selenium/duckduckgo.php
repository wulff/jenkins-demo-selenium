<?php

require_once('/opt/php-webdriver/lib/__init__.php');

class WulffWebdriverTest extends PHPUnit_Framework_TestCase
{
  protected $session;

  public function setUp()
  {
    parent::setUp();
    $wd_host = 'http://localhost:4444/wd/hub';
    $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'firefox', WebDriverCapabilityType::ACCEPT_SSL_CERTS => TRUE);
    $this->driver = new WebDriver($wd_host, $capabilities);
  }

  public function tearDown()
  {
    $this->driver->quit();
    unset($this->driver);
    parent::tearDown();
  }

  public function test_duck_duck_search()
  {
    $this->driver->get('https://duckduckgo.com/');

    $title = $this->driver->findElement(WebDriverBy::id('logo_homepage_link'))->getAttribute('title');
    $this->assertEquals('About DuckDuckGo', $title, 'Logo link has the expected title');
  }
}
