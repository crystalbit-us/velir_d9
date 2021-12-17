<?php

namespace Drupal\Tests\velir_tools\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test description.
 *
 * @group velir_tools
 */
class VelirAccessTest extends BrowserTestBase {

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
  public function testAnonymousaccess() {
    $anon_user = $this->drupalCreateUser(['access content']);
    //$this->drupalLogin($admin_user);
    $this->drupalGet('hello-velir-3');
    $this->assertResponse(403);
  }

  /**
   * Test callback.
   */
  public function testAdminaccess() {
    $admin_user = $this->drupalCreateUser(['access administration pages']);
    $this->drupalLogin($admin_user);
    $this->drupalGet('hello-velir-3');
    $this->assertResponse(200);
  }
}
