<?php

namespace Drupal\velir_tools\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure velir_tools settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'velir_tools_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['velir_tools.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#default_value' => $this->config('velir_tools.settings')->get('first_name'),
    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#default_value' => $this->config('velir_tools.settings')->get('last_name'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!ctype_alpha($form_state->getValue('first_name'))) {
      $form_state->setErrorByName('first_name', $this->t('The value is not correct.'));
    }
    if (!ctype_alpha($form_state->getValue('last_name'))) {
      $form_state->setErrorByName('last_name', $this->t('The value is not correct.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('velir_tools.settings')
	    ->set('first_name', $form_state->getValue('first_name'))
	     ->set('last_name', $form_state->getValue('last_name'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
