<?php

/**
 * @file
 * Contains the configuration setting for funtime module
 */

namespace Drupal\fun_time\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\migrate\Plugin\migrate\process\Get;

class FuntimeConfig extends ConfigFormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'funtime_config';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames()
  {
    return [
      'funtime.settings',
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    //load any available configuration to use as defaults
    $config = $this->config('funtime.settings');

    /**
     * using the $form[] we are going to add the two required textfields by adding
     * these elements to the array
     */

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('Enter something for the title'),
      '#required' => TRUE,
      '#default_value' => $config->get('title'),
    ];

    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Admin description'),
      '#description' => $this->t('Please provide a description here.'),
      '#required' => TRUE,
      '#default_value' => $config->get('description'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // load the current configurations.
    $config = $this->config('funtime.settings');

    $config->set('title', $form_state->getValue('title'))
      ->set('description', $form_state->getValue('description'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
