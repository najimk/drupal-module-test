<?php

namespace Drupal\fun_time\Controller;

use Drupal\Core\Controller\ControllerBase;

class Funtime extends ControllerBase
{
  public function content()
  {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Something will be here')
    ];
  }
}
