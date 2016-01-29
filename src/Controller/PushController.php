<?php

/**
 * @file
 * Build push function for class PushController
 */

namespace Drupal\push\Controller;

use Drupal\Core\Controller\ControllerBase;
class PushController extends ControllerBase {
  public function push($object, $store) {
    $message = $this->t('Push %object to  %store',[
        '%object' => $object,
        '%store' => $store,
    ]);
    
    return ['#markup' => $message];
  }
}