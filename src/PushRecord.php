<?php
namespace Drupal\push;

use Drupal\Core\State\StateInterface;

class PushRecord {
  protected $item;
  /**
   * contructor for PushRecord class
   * @param StateInterface $item
   */
  public function __construct(StateInterface $state) {
    $this->item = $state;
  }
  
  /**
   * Store a push object
   * @param unknown $object
   */
  public function doPush($object) {
    $this->item->set('push.object', $object);
    return $this;
  }
  /**
   * return info stored in push.object
   */
  public function infoPush() {
    return $this->item->get('push.object');
  }
}