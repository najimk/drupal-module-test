<?php

/**
 * The funtime controller calss
 */

namespace Drupal\fun_time\Controller;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;

class Funtime extends ControllerBase
{
  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * create a config object
   */

  public function __construct(ConfigFactoryInterface $config_factory)
  {
    $this->configFactory = $config_factory;
  }

  public function content()
  {
    //load the available configuration
    $config = $this->configFactory->get('funtime.settings');
    $title = $config->get('title');
    $description = $config->get('description');

    return [
      '#theme' => 'funtime',
      '#title' => $this->t($title),
      '#description' => $this->t($description),
    ];
  }
}
