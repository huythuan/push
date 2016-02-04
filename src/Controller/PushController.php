<?php

/**
 * @file
 * Build push function for class PushController
 */

namespace Drupal\push\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\push\PushRecord;
use Symfony\Component\DependencyInjection\ContainerInterface;
class PushController extends ControllerBase {
  protected $pushRecorder;
  /**
   * Contructor
   * @param PushRecord $recorder
   */
  public function __construct(PushRecord $recorder) {
    $this->pushRecorder = $recorder;
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Controller\ControllerBase::create()
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('push.push_record'));
  }
  /**
   * do a push for page push 
   * @param string $object
   * @param string $store
   * @param string $number
   * @return string[]|unknown[]|mixed[]|NULL[]|array[]
   */
  public function push($object, $store, $number) {
    $this->pushRecorder->doPush($object);
    if (!$number) {
      $number = $this->config('push.settings')->get('default_number');
    }
    return [
        '#theme' => 'push_page',
        '#object'  => $object,
        '#store'  => $store,
        '#time'  => $number,
    ];
  }
}