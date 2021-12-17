<?php

namespace Drupal\velir_tools\Normalizer;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\TypedData\TypedDataInternalPropertiesHelper;
use Drupal\serialization\Normalizer\EntityNormalizer;
/**
 * Normalizes/denormalizes Drupal content entities into an array structure appending an attribute "velir" with value, 212.
 */
class VelirContentEntityNormalizer extends EntityNormalizer {

  /**
   * {@inheritdoc}
   *
	protected $supportedInterfaceOrClass = ContentEntityInterface::class; */
  /**
   * The interface or class that this Normalizer supports.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = 'Drupal\node\NodeInterface';

  /**
   * {@inheritdoc}
   */
  public function normalize($entity, $format = NULL, array $context = []) {
    $context += [
      'account' => NULL,
    ];

    $attributes = parent::normalize($entity, $format, $context);
    /*
    $attributes = [];
    foreach (TypedDataInternalPropertiesHelper::getNonInternalProperties($entity->getTypedData()) as $name => $field_items) {
      if ($field_items->access('view', $context['account'])) {
	      $attributes[$name] = $this->serializer->normalize($field_items, $format, $context);
    */
	      $attributes['velir'] = 212;
    //  }
    // }
    // Re-sort the array after our new addition.
    ksort($attributes);

    // Return the $attributes with our new value.
    return $attributes;
  }
}
