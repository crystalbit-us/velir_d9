<?php

namespace Drupal\velir_tools\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'Uppercase' formatter.
 *
 * @FieldFormatter(
 *   id = "velir_tools_uppercase",
 *   label = @Translation("Uppercase"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class UppercaseFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#markup' => strtoupper($item->value),
      ];
    }

    return $element;
  }

}
