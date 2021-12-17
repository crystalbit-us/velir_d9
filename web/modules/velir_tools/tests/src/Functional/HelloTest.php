<?php

namespace Drupal\Tests\velir_tools\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test description.
 *
 * @group velir_tools
 */
class HelloTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stable';

  /**
   * {@inheritdoc}
   */
  public static $modules = ['velir_tools'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    // Set up the test here.
  }

  /**
   * Test callback.
   */
  public function testHello() {
    $this->drupalGet('hello-velir-1');
    $this->assertResponse(200);
    $this->assertSession()->pageTextContains('Hello, my name is James Tarleton');
  }
}
