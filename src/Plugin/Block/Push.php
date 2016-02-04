<?php
namespace Drupal\push\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
/**
 * Reports Push Time
 * @Block (
 *   id = "push_time",
 *   admin_label = @Translation("Push Time"),
 *   category = @Translation("System")
 * )
 * @author nguyeth
 *
 */


class Push extends BlockBase {
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Block\BlockBase::defaultConfiguration()
   */
  public function defaultConfiguration() {
    return  ['active' => 1];
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Block\BlockBase::blockForm()
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['active'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Push active'),
        '#default_value' => $this->configuration['active'],
    ];
    return $form;
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Block\BlockBase::blockSubmit()
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['active'] = (bool)$form_state->getValue('active');
  }
  /**
   * 
   * {@inheritDoc}
   * @see \Drupal\Core\Block\BlockPluginInterface::build()
   */
  public function build() {
    $message = $this->configuration['active']
      ? $this->t('Pushing is active')
      : $this->t('Pushing is deactive');
    return [
        '#markup' => $message,
    ];
  }
}