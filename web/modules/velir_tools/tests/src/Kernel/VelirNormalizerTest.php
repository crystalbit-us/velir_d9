<?php

namespace Drupal\Tests\velir_tools\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Test description.
 *
 * @group velir_tools
 */
class VelirNormalizerTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = ['velir_tools'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    // Mock required services here.
  }

  /**
   * Test callback.
   */
  public function testNormalizer() {
    $http_kernel = $this->container->get('http_kernel');
    //$result = $this->container->get('transliteration')->transliterate('Друпал');
    //$this->assertEquals('Drupal', $result);
	  //
    $response = $http_kernel->handle($request);

    $this->assertNotEqual($response->getStatusCode(), Response::HTTP_FORBIDDEN);
    $this->assertInstanceOf('JsonResponse', get_class($response)) ;
    $this->assertSession()->pageTextContains('velir');
    $this->assertSession()->pageTextContains('212');



  }

}
