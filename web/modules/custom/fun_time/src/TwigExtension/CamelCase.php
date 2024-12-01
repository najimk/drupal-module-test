<?php

namespace Drupal\fun_time\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CamelCase extends AbstractExtension
{

  /**
   * {@inheritdoc}
   */
  public function getFilters()
  {
    return [
      new TwigFilter('camel_string', [$this, 'camelString']),
    ];
  }

  /**
   * Turn the description text into CamelCase.
   * @param string $description text
   *  The description text provided in the config
   *
   * @return string
   * The description changed into camel case
   */
  public function camelString($description)
  {
    /**
     * To create a camelcase we have to first remove spaces in the
     * admin_description.
     * Also capitalise each word before returning the description
     * */
    $description = str_replace(' ', '', ucwords($description));
    return $description;
  }
}
