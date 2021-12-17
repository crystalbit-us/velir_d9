<?php

namespace Drupal\velir_tools\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for velir_tools routes.
 */
class VelirToolsController extends ControllerBase {

  /**
   * Builds the response.
   */
   public function build() {

	  $first = \Drupal::config('velir_tools.settings')->get('first_name');
	  $last = \Drupal::config('velir_tools.settings')->get('last_name');
	  $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t("Hello, my name is $first $last."),
    ];
    return $build;
  }
   public function buildJson() {
	   $first = \Drupal::config('velir_tools.settings')->get('first_name');
          $last = \Drupal::config('velir_tools.settings')->get('last_name');
	if(true) {
	  $response = ['message' => "Hello, my name is $first $last.", 'status' => 'success'];
        }
        else {
          $response = ['message' => "An error has occurred.", 'status' => 'error'];
        }
    return new JsonResponse($response);
  }
}
