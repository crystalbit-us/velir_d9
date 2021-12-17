<?php

namespace Drupal\velir_tools\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "velir_tools_example",
 *   admin_label = @Translation("Welcome Message Example"),
 *   category = @Translation("velir_tools")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    // Load the current user.
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $logged_in = $user->isAuthenticated();
    $name = ($logged_in) ? $user->get('name')->value : NULL;
    $msg = (isset($name)) ? "Welcome, $name!" : '<a href="/user/login">Login</a>';

    $build['content'] = [
      '#markup' => $this->t($msg),
      '#cache' => [
      	'max-age' => 0,
      ]
    ];
    return $build;
  }

}
